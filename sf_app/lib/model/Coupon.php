<?php

class Coupon extends BaseCoupon
{
  const STATUS_ACTIVE = 1;
  const STATUS_INACTIVE = 2;
  
  
  protected static $states = array(
    self::STATUS_ACTIVE => "Active",
    self::STATUS_INACTIVE => "Inactive"
    );

  public static function getStates()
  {
    return self::$states;
  }

  /**
   * returns an auto-description of this coupon, based on its parameters
   * @return string
   */
  public function getAutoDescription()
  {
    $date_format = "m/d/Y h:iA";
    $description = round($this -> getSetup())."% setup discount";
    if($bar = $this -> getBarAssociation())
    {
      $description .= " for members of ".$bar;
    }

    if($this -> getActivationDate() || $this -> getExpirationDate())
    {
      $description .= " (active";
      if($this -> getActivationDate())
      {
        $description .= " from ".$this -> getActivationDate($date_format);
      }
      if($this -> getExpirationDate())
      {
        $description .= " until ".$this -> getExpirationDate($date_format);
      }
      $description .= ")";
    }

    return $description;
  }

  public function getDescriptionForCustomer()
  {
    if($this -> getDescription() != "")
    {
      return $this -> getDescription();
    }
    return $this -> getAutoDescription();
  }

  public function getDataSnapshot()
  {
    $data = $this -> toArray();
    if($bar = $this -> getBarAssociation())
    {
      $data["BarAssociation"] = (string) $bar;
    }
    foreach($this -> getWebsiteAttributes() as $hosting_plan)
    {
      $data["HostingPlans"][] = (string) $hosting_plan;
    }
    return $data;
  }
  
  public function getStatusString()
  {
    return isset(self::$states[$this -> getStatus()]) ? self::$states[$this -> getStatus()] : "invalid";
  }

  public function getDiscountForHostingPlan(WebsiteAttribute $plan)
  {
    return $plan -> getSetupPrice() - floor($plan -> getSetupPrice() * (1 - $this -> getSetup() / 100));
  }
  
  public function __toString()
  {
    return $this -> getCode()." - ".$this -> getDescription();
  }

  public function save(PropelPDO $con = null)
  {
    if($this -> isNew())
    {
      //initialize new customer account
      $this -> setId(CouponPeer::generatePk());
    }
    return parent::save($con);
  }

  public function getPotentialBarAssociation(PropelPDO $con = null)
  {
    if(!$association = $this -> getBarAssociation($con))
    {
      $association = BarAssociationQuery::create() -> findOneByAbbreviation($this -> getCode());
    }
    return $association;
  }

  public function getNumUsed()
  {
    return WebsiteQuery::create() -> filterByCoupon($this) ->
      filterByStatus(Website::STATUS_ACTIVE)->
      useCustomerQuery() ->
        filterByReal() ->
      endUse() ->
      count();
  }
}
