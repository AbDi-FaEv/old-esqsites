<?php
/**
 * customization of CG client class to add ESQ-specific functionality
 *
 * @author Richtermeister
 */
class esqCheddarGetterClient extends CheddarGetter_Client
{

  /**
   * creates a CG account for every website the passed customer owns
   * 
   * @param Customer $customer
   * @param array $cc_info
   */
  public function createCustomer(Customer $customer, $cc_info)
  {
    foreach($customer -> getWebsites() as $website)
    {
      $this -> createWebsite($website, $cc_info);
    }
  }

  /**
   * overriding parent to throw exception in case of error
   *
   * @return CheddarGetter_Response
   */
  public function editSubscription($code, $id = null, array $data)
  {
    $response = parent::editSubscription($code, $id, $data);
    $response -> handleEmbeddedErrors();
    return $response;
  }

  /**
   * nomen est omen - disabled for sanity reasons
   */
  public function deleteAllCustomers()
  {
    throw new sfExeption("disabled for extra safety");
    
//    return new CheddarGetter_Response(
//      $this->request(
//        '/customers/delete-all/confirm/1/productCode/'.$this -> getProductCode()
//      )
//    );
  }

  /**
   * switches an existing CG customer to a different hosting plan
   *
   * @param Website $website the website to switch the hosting plan for
   * @param WebsiteAttribute $hosting_plan the hosting plan to switch to
   * @return CheddarGetter_Response
   */
  public function switchHostingPlan(Website $website, WebsiteAttribute $hosting_plan)
  {
    $subscription_info = array("planCode" => $hosting_plan -> getCgCode());
    return $this -> editSubscription($website -> getId(), null, $subscription_info);
  }

  /**
   * converts a Website object to a CG friendly array
   *
   * @param Website $website
   * @return array a hash containing CG account fields
   */
  public static function websiteToArray(Website $website)
  {
    $customer = $website -> getCustomer();
    
    $data = array(
      'code'      => $website -> getId(),
      'firstName' => trim(substr(strip_tags($customer -> getFirstName()), 0, 20)),
      'lastName'  => trim(substr(strip_tags($customer -> getLastName()), 0, 20)),
      'company'   => trim(substr(strip_tags($website -> getFirmName()), 0, 30)), //CG has a 30 char limit
      'email'     => trim($customer -> getEmail()),
      'metaData'  => array("customer_id" => $customer -> getId())
	);

    return $data;
  }

  /**
   * ensures that data in CG is up to date
   *
   * @param Website $website
   * @return bool whether the website data was out of sync
   */
  public function syncronizeWebsite(Website $website)
  {
    $subscription_service = esqContainer::getInstance() -> getSubscriptionService();
    
    $cg_account           = $website -> getCgAccount();
    $cg_customer_info     = $cg_account -> getCustomer();

    //see if the crucial fields are out of sync
    $update_data = self::websiteToArray($website);
    
    if(
      trim($cg_customer_info["firstName"]) != $update_data["firstName"]
      || trim($cg_customer_info["lastName"]) != $update_data["lastName"]
      || trim($cg_customer_info["email"]) != $update_data["email"]
      || trim($cg_customer_info["company"]) != $update_data["company"]
      )
    {
      //yep, out of sync - update subscription service
      $result = $subscription_service -> editCustomerOnly($website -> getId(), null, $update_data);
      return true;
    }
    
    return false; //was in sync
  }

  /**
   * creates an account in CG for the passed website and CC info
   *
   * @param Website $website the website to create a CG account for
   * @param array $cc_info the Credit Card fields required to start a CG account
   */
  public function createWebsite(Website $website, $cc_info)
  {
    $customer = $website -> getCustomer();
    $plan     = $website -> getHostingPlan();

    $cc_info["planCode"] = $plan -> getCgCode();

    $cc_defaults["ccFirstName"] = strip_tags($customer -> getFirstName());
    $cc_defaults["ccLastName"]  = strip_tags($customer -> getLastName());
    $cc_defaults["ccAddress"]   = strip_tags($website -> getAddress());
    $cc_defaults["ccZip"]       = strip_tags($website -> getZip());

    $cc_info = array_merge($cc_defaults, $cc_info);

    if($website -> getLastBillingDate()) //this website has been billed before, keep it in montly interval
    {
      $cc_info["initialBillDate"] = $website -> getNextBillingDate("Y-m-d");
    }

    $data = self::websiteToArray($website);
    $data['subscription'] = $cc_info; //merge CC info

    $response = $this -> newCustomer($data) -> toArray();
    $response = array_pop($response);
    $website -> setCgId($response["id"]) -> save();
    /** @todo need to also store CIM ids */

    //update quantities of trackable items
    $this -> setItemQuantity($website -> getId(), null, array("itemCode" => HostingPlan::PAGES, "quantity" => $plan -> getNumPages()));
    $this -> setItemQuantity($website -> getId(), null, array("itemCode" => HostingPlan::EMAILS, "quantity" => $plan -> getNumEmails()));
  }

  /**
   * adds a discount (negative custom charge) to a website's next invoice
   * 
   * @param Website $website the website to apply the discount to
   * @param float $amount the discount amount
   * @param string $description the description to apply to the charge
   * @param string $charge_code the CG internal code for reference (optional)
   */
  public function issueDiscount(Website $website, $amount, $description = null, $charge_code = null)
  {
    $amount = abs($amount) * -1;
    $charge_code = $charge_code ? $charge_code : "Discount";
    $this -> addCharge($website -> getId(), null, array("chargeCode" => $charge_code, "quantity" => "1", "eachAmount" => $amount, "description" => $description));
  }

  /**
   * adds a charge to a website's next invoice
   *
   * @param Website $website
   * @param float $amount
   * @param string $description
   * @param string $charge_code the CG internal code for reference
   */
  public function addCustomCharge(Website $website, $amount, $description = null, $charge_code = null)
  {
    $charge_code = $charge_code ? $charge_code : "Custom Charge";
    $this -> addCharge($website -> getId(), null, array("chargeCode" => $charge_code, "quantity" => "1", "eachAmount" => $amount, "description" => $description));
  }
}