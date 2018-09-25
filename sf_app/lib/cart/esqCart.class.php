<?php
/**
 * Helper class to facilitate mini-receipt data access
 *
 * @author Richtermeister
 */
class esqCart
{
  protected $user;
  protected $domain_type;
  
  public function __construct(sfUser $user)
  {
    $this -> user = $user;
    $this -> domain_type = Domain::REGISTRATION_TYPE_ESQ;
  }

  public function setDomainType($domain_type)
  {
    $this -> domain_type = $domain_type;
  }

  public function getDomainType()
  {
    return $this -> domain_type;
  }

  public function getGrandTotal()
  {
    $website = $this -> user -> getTemporaryWebsite();
    $hosting = $website -> getHostingPlan();

    return $hosting -> getPrice()
          + $hosting -> getSetupPrice()
          + $this -> getDomainTotal()
          - $this -> getDiscountTotal();
  }

  public function getDomainTotal()
  {
    return $this -> domain_type == Domain::REGISTRATION_TYPE_ESQ ? sfConfig::get("app_domain_price") : 0;
  }

  public function getDiscountTotal()
  {
    return 0;
  }
}