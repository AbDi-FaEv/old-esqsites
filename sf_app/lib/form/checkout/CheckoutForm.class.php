<?php
/**
 * main checkout form, handles payment processing and populates 3rd party systems
 *
 * @author Richtermeister
 */
class CheckoutForm extends BaseForm
{

  public function setup()
  {
    if((!$user = $this -> getOption("user")) || !$user instanceof sfUser)
    {
      throw new sfException("Expecting user object");
    }

    $website = $user -> getTemporaryWebsite();

    $this -> embedForm("domain", new DomainRegistrationForm());
    $website_info = array_merge($user -> getFormInfo("previewInfo"), array("plan" => $website -> getWebsiteAttributeId()));
    $this -> embedForm("website_info", new CheckoutWebsiteInfoForm($website_info));
    $this -> embedForm("account", new CheckoutAccountForm());
    $this -> embedForm("cc", new CheddarGetterCreditCardForm());
    
    $this -> widgetSchema["coupon_code"] = new sfWidgetFormInputText();
    $this -> validatorSchema["coupon_code"] = new sfValidatorString(array("required" => false));

    $this -> mergePostValidator(new esqValidatorCouponCode());
    
    $this -> widgetSchema["agree_to_terms"] = new sfWidgetFormInputCheckbox();
    $this -> validatorSchema["agree_to_terms"] = new sfValidatorBoolean(array("required" => true));

    $this -> widgetSchema["allow_mailing"] = new sfWidgetFormInputCheckbox(array("default" => false)); //per iContact rules
    $this -> validatorSchema["allow_mailing"] = new sfValidatorBoolean(array("required" => false));

    $this -> widgetSchema -> setNameFormat("checkout[%s]");
    $this -> widgetSchema -> setDefaultFormFormatterName("None");
  }

  /**
   * convenience method to log messages
   * 
   * @param string $message
   * @return CheckoutForm
   */
  protected function log($message)
  {
    if(self::$dispatcher)
    {
      self::$dispatcher -> notify(new sfEvent($this, 'esq.log', array("message" => $message)));
    }
    return $this; //fluent
  }

  /**
   * initiates processing of a new customer signup
   * 
   * @return Website
   */
  public function save()
  {
    if(!$this -> isBound() || !$this -> isValid())
    {
      throw new sfException("Form must be bound and valid to be saved.");
    }

    try
    {
      $con = Propel::getConnection();
      $con -> beginTransaction();

      $website = $this -> doSave();

      $con -> commit();
      return $website;
    }
    catch(CheddarGetter_Response_Exception $e)
    {
      $con -> rollBack();
      $this -> log("CG error: ".$e -> getCode()." ".$e -> getMessage()." (".$e -> getAuxCode().")");

      if(!in_array($e -> getCode(), array(CheddarGetter_Response_Exception::PRECONDITION_FAILED, CheddarGetter_Response_Exception::UNPROCESSABLE_ENTITY))) //something other than invalid data
      {
        throw $e;
      }

      //set error message to cc form
      $this -> getErrorSchema() -> addError(
        new sfValidatorErrorSchema($this -> validatorSchema["cc"]["number"],
          array("cc" => new sfValidatorErrorSchema($this -> validatorSchema["cc"]["number"],
            array("number" => new sfValidatorError($this -> validatorSchema["cc"]["number"], $e -> getMessage()))))));

      return false;
    }

  }

  /**
   * processes new customer signup
   * 
   * @return Website
   */
  protected function doSave()
  {
    /**
     * @var myUser $user
     */
    $user = $this -> getOption("user");

    $this -> log(sprintf("Starting Checkout Procedure - Customer ID: %s", $user -> getTemporaryCustomer() -> getId()));

    //save submitted data to make sure we have it if something goes wrong
    $website_info = $this -> getValue("website_info");
    $account_info = $this -> getValue("account");

    /**
     * @var Website $website
     */
    $website = $user -> getTemporaryWebsite();
    $website -> fromArray($website_info, BasePeer::TYPE_FIELDNAME);
    $website -> save();

    /**
     * @var Customer $customer
     */
    $customer = $user -> getTemporaryCustomer();
    $customer -> fromArray($website_info, BasePeer::TYPE_FIELDNAME); //stores name, etc.
    $customer -> fromArray($account_info, BasePeer::TYPE_FIELDNAME); //stores password & username
    $customer -> save();

    $this -> log("Creating customer in CheddarGetter");

    $cg = esqContainer::getInstance() -> getSubscriptionService();
    $cg -> createWebsite($website, CheddarGetterCreditCardForm::localToGlobal($this -> getValue("cc"))); //convert field names to CG
    $this -> log("Customer Created (CG ID: ".$website -> getCgId().")");

    //mailing list
    if($this -> getValue("allow_mailing"))
    {
      $this -> log("Adding customer to mailing list");
      try
      {
        $list_api = esqContainer::getInstance() -> getMailingListService();
        $list_api -> addCustomer($customer);
      }
      catch(Exception $e)
      {
        $this -> log("Failed: ".$e -> getMessage());
        if(sfConfig::get("sf_debug")) throw $e; //don't interrupt real checkout
      }
    }
    else
    {
      $this -> log("Customer opted out of mailing");
    }

    //coupon / discounts
    if($coupon = $this -> getValue("coupon"))
    {
      $this -> log(sprintf("Coupon '%s'", (string) $coupon));
      $website -> applyCoupon($coupon);

      //code indicates bar association?
      if($bar_association = $coupon -> getPotentialBarAssociation())
      {
        $this -> log(sprintf("Associating customer with bar: '%s'", (string) $bar_association));
        $customer -> setBarAssociation($bar_association) ->
          setCreditBarAssociation(true);
      }
    } //end of coupon

    //domain registration
    $domain_values = $this -> getValue("domain");
    if($domain_values["type"] == Domain::REGISTRATION_TYPE_ESQ) //add domain price to invoice
    {
      $this -> log(sprintf("Purchasing domain '%s'", $domain_values["name"]));
      $cg -> addCustomCharge($website, sfConfig::get("app_domain_price"), $domain_values["name"], "Domain Registration");
    }

    $this -> log("Finished Payment process."); //payment cleared - all is good

    $this -> activateAccount();

    $website -> setDispatcher(self::$dispatcher); //we want to log how page/dir creation goes
    $website -> resetPages();
    $website -> createDirectories();

    return $website;
  }

  protected function activateAccount()
  {
    $this -> log("Activating Account");
    
    $user     = $this -> getOption("user");
    $customer = $user -> getTemporaryCustomer();
    $website  = $user -> getTemporaryWebsite();
    $plan     = $website -> getHostingPlan();

    //activate customer
    $customer -> setType(Customer::TYPE_REGULAR);
    $customer -> setStatus(Customer::STATUS_ACTIVE);
    $customer -> save();

    $domain_values = $this -> getValue("domain");

    //insert & activate domain
    $domain = new Domain();
    $domain -> setName($domain_values["name"]);
    $domain -> setRegistrationType($domain_values["type"]);
    $domain -> setStatus(Domain::STATUS_ACTIVE);
    $domain -> setType(Domain::TYPE_PURCHASED);
    $domain -> setWebsite($website);
    $domain -> save();

    //activate website
    $website -> setStatus(Website::STATUS_ACTIVE);
    $website -> setType(Website::TYPE_PURCHASED);
    $website -> setPrimaryDomainId($domain -> getId());
    $website -> save();

    $this -> log("Done Activating Account");
  }

}