<?php

class Domain extends BaseDomain
{
  const TYPE_PURCHASED = 1;
  const TYPE_TEMPORARY = 2;

  const REGISTRATION_TYPE_ESQ        = 'dae457';
  const REGISTRATION_TYPE_OTHER      = 'a875d1';
  const REGISTRATION_TYPE_TRANSFER   = '9f17e4';

  const STATUS_ACTIVE = 1;
  const STATUS_SUSPENDED = 2;
  const STATUS_CANCELLED = 3;

  protected $browser;

  protected static $types = array(self::TYPE_PURCHASED => "Purchased",
                                  self::TYPE_TEMPORARY => "Temporary");

  protected static $states = array(self::STATUS_ACTIVE => "Active",
                                  self::STATUS_SUSPENDED => "Suspended",
                                  self::STATUS_CANCELLED => "Cancelled");

  protected static $registration_types = array(
                self::REGISTRATION_TYPE_ESQ => "ESQ",
                self::REGISTRATION_TYPE_OTHER => "3rd party",
                self::REGISTRATION_TYPE_TRANSFER => "Transfer",
                );

  public function applyDefaultValues()
  {
    parent::applyDefaultValues();
    $this -> setRegistrationType(self::REGISTRATION_TYPE_OTHER);
    $this -> setType(self::TYPE_PURCHASED);
  }

  public function triggerRenewal()
  {
    $new_expiration_date = strtotime($this -> getExpirationDate()." + 1 year");
    
    return $this ->
      setExpirationDate($new_expiration_date) ->
      setLastRenewalDate(time());
  }

  public function getLastDomainCheck()
  {
    $c = new Criteria();
    $c -> add(DomainCheckPeer::DOMAIN_ID, $this -> getId());
    $c -> addDescendingOrderByColumn(DomainCheckPeer::CREATED_AT);
    return DomainCheckPeer::doSelectOne($c);
  }

  public static function getRegistrationTypes()
  {
    return self::$registration_types;
  }

  public static function getTypes()
  {
    return self::$types;
  }

  public function getRegistrationTypeString()
  {
    return isset(self::$registration_types[$this -> getRegistrationType()]) ? self::$registration_types[$this -> getRegistrationType()] : "";
  }

  public static function getStates()
  {
    return self::$states;
  }

  public function getStatusString()
  {
    return isset(self::$states[$this -> getStatus()]) ? self::$states[$this -> getStatus()] : null;
  }

  public function getTypeString()
  {
    return isset(self::$types[$this -> getType()]) ? self::$types[$this -> getType()] : null;
  }

  public function getNumEmails()
  {
    return $this -> countEmailAccounts();
  }

  public function save(PropelPDO $con = null)
  {
    if($this -> isNew())
    {
      $this -> setId(DomainPeer::generatePk());
    }
    return parent::save($con);
  }

  public function getBrowser()
  {
    if(!$this -> browser)
    {
      $this -> browser = new sfWebBrowser();
      try
      {
        $this -> browser -> get("http://".$this -> getName());
      }
      catch(Exception $e)
      {
        //?
      }
    }
    return $this -> browser;
  }

  public function getResponseCode()
  {
    return $this -> getBrowser() -> getResponseCode();
  }

  public function isHostedByEsq()
  {
    return strpos($this -> getBrowser() -> getResponseText(), "symfony");
  }
}
