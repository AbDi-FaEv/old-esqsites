<?php

class BarAssociation extends BaseBarAssociation
{
  protected static $revenue_levels = array(
    array("min" => 1, "max" => 50, "share" => 5, "name" => "Bronze"),
    array("min" => 51, "max" => 75, "share" => 10, "name" => "Silver"),
    array("min" => 76, "max" => 100, "share" => 15, "name" => "Gold"),
    array("min" => 101, "max" => null, "share" => 20, "name" => "Platinum"),
  );

  public static function getRevenueLevels()
  {
    return self::$revenue_levels;
  }

  public function getRevenueLevel()
  {
    $total = $this -> getNumCustomers(true);
    foreach($this -> getRevenueLevels() as $level)
    {
      if(($total >= $level["min"]) && (!$level["max"] || ($total <= $level["max"])))
      {
        return $level;
      }
    }
  }

  public function regeneratePassword()
  {
    $password = strtoupper(substr(md5(rand()), 0, 6));
    return $this -> setPassword($password);
  }

  public function getPromoCode()
  {
    return $this -> getAbbreviation();
  }

  public function getNumCustomersToNextRevenueLevel()
  {
    $current_customers = $this -> getNumCustomers(true);
    $levels = $this -> getRevenueLevels();
    $current_level = $this -> getRevenueLevel();
    $current_key = array_search($current_level, $levels);

    if($current_customers == 0)
    {
      return $levels[0]["min"];
    }

    if(isset($levels[$current_key + 1]))
    {
      $needed_customers = $levels[$current_key + 1]["min"];
      return $needed_customers - $current_customers;
    }

    return false;
  }

  public function hasLandingPage()
  {
    return is_dir($this -> getLandingPageDir());
  }

  public function getLandingPageDir()
  {
    return sfConfig::get("sf_web_dir").$this -> getLandingPageUrl(false);
  }

  public function getLandingPageUrl($absolute = true)
  {
    $url = "/jumpPage/".strtolower($this -> getAbbreviation());
    return $absolute ? "http://www.esqsites123.com".$url : $url;
  }

  public function getCustomerSignupDates($format = 'U', $credited = true)
  {
    $query = CustomerQuery::create() ->
      filterByBarAssociation($this) ->
      orderByCreatedAt();
    if($credited)
    {
      $query -> filterByCreditBarAssociation(true);
    }
    foreach($query -> find() as $customer)
    {
      $dates[$customer -> getId()] = $customer -> getCreatedAt($format);
    }
    
    return isset($dates) ? $dates : null;
  }

  /**
   * @return Customer
   */
  public function getFirstCustomer()
  {
    return CustomerQuery::create() ->
      //filterByReal() -> //not sure how this meshes with past
      filterByBarAssociation($this) ->
      filterByCreditBarAssociation(true) ->
      orderByCreatedAt() ->
      findOne();
  }

  public function getNumCustomers($credit = false, $live = true)
  {
    $query = CustomerQuery::create() ->
      filterByBarAssociation($this);

    if($live)
    {
      $query -> filterByReal();
    }

    if($credit)
    {
      $query -> filterByCreditBarAssociation(true);
    }

    return $query -> count();
  }

  public function checkPassword($password)
  {
    return $password == $this -> getPassword();
  }

  public function isAffinityExpired()
  {
    $date = $this -> getAffinityExpirationDate("U");
    return ($date && ($date < time()));
  }

  public function getReferralCode()
  {
    return $this -> getAbbreviation();
  }

  public function hasLogo()
  {
    return file_exists(sfConfig::get("sf_web_dir").$this -> getLogoUrl());
  }

  public function getLogoUrl()
  {
    return "/uploads/bar-logos/".$this -> getAbbreviation().".jpg";
  }
}