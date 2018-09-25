<?php

class myUser extends sfBasicSecurityUser
{

  /**
   * stores a form submission
   *
   * @param string $form_name
   * @param array $values
   */
  public function setFormInfo($form_name, $values)
  {
    $this -> setAttribute($form_name, $values, "forms");
  }

  public function getFormInfo($form_name)
  {
    return $this -> getAttribute($form_name, array(), "forms");
  }

  public function hasTemporaryCustomer()
  {
    return null != $this -> getAttribute("customer_id");
  }

  public function hasTemporaryWebsite()
  {
    return null != $this -> getAttribute("website_id");
  }

  public function reset()
  {
    $this -> getAttributeHolder() -> clear();
  }


  /**
   * Always returns a temporary customer object, creates new one if neccessary
   *
   * @return Customer A temporary customer
   */
  public function getTemporaryCustomer()
  {
    if(!$this -> getAttribute("customer_id"))
    {
      $customer = new Customer(Customer::TYPE_SHOPPING);
      $customer -> save();
      $this -> setAttribute("customer_id", $customer -> getId());
    }
    return CustomerPeer::retrieveByPk($this -> getAttribute("customer_id"));
  }

  /**
   * Always returns a temporary website object, creates new one if neccessary
   * 
   * @return Website A temporary website
   */
  public function getTemporaryWebsite()
  {
    if(!$this -> getAttribute("website_id"))
    {
      $website = new Website();
      $website -> setCustomer($this -> getTemporaryCustomer());
      $website -> save();
      $this -> setAttribute("website_id", $website -> getId());
    }
    return WebsitePeer::retrieveByPk($this -> getAttribute("website_id"));
  }

  public function hasCheckoutInProgress($flag = null)
  {
    if($flag)
    {
      $this -> setAttribute("checkout_started", $flag);
    }
    return $this -> getAttribute("checkout_started");
  }

  public function getSalutation()
  {
    if($this -> hasTemporaryCustomer())
    {
      $name = $this -> getTemporaryCustomer() -> getFirstName();
    }
    return (isset($name) && $name != "") ? $name : null;
  }

  /**
   * tries to find a coupon object based on users selected hosting plan and entered coupon code
   * 
   * @return mixed
   */
  public function getCoupon()
  {
    if($code = $this -> getAttribute("coupon_code") && $hosting = $this -> getTemporaryWebsite() -> getHostingPlan())
    {
      return CouponPeer::retrieveActiveByCodeAndPlan($code, $hosting -> getId());
    }
  }
}
