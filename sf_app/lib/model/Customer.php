<?php

/**
 * represents a customer entity in the system
 *
 * @author Richtermeister
 */
class Customer extends BaseCustomer
{
  const TYPE_REGULAR 	= 1;
  const TYPE_SHOPPING	= 2;
  const TYPE_TEST       = 3;

  const STATUS_ACTIVE 	= 1;
  const STATUS_SUSPENDED = 2;
  const STATUS_CANCELLED = 3;

  const SKILL_BEGINNER = 0;
  const SKILL_ADVANCED = 1;

  protected static $types = array(
      self::TYPE_REGULAR  => "Regular Customer",
      self::TYPE_SHOPPING => "Shopping Customer",
      self::TYPE_TEST     => "Test Account"
  );

  protected static $states = array(
      self::STATUS_ACTIVE     => "Active",
      self::STATUS_SUSPENDED  => "Suspended",
      self::STATUS_CANCELLED  => "Cancelled"
  );

  protected static $skill_levels = array(
    self::SKILL_BEGINNER => 'Beginner',
    self::SKILL_ADVANCED => 'Advanced'
  );
  
  //DSG 2013-01
  /** 
   * @var string RememberKey the value for creating remember me functionality
   */
  protected $remember_key;

  protected $esq_domains;
  protected $num_new_client_messages;
  protected $requires_cg_sync = false; //flag to indicate whether CG sync is required

  /**
   * constructor
   * 
   * @todo consider if this is necessary
   * @param string $type
   */
  public function __construct($type = null)
  {
    parent::__construct();
    
    if($type)
    {
      $this->setType($type);
    }

    $this->setSkillLevel(self::SKILL_BEGINNER);
    $this->setStatus(self::STATUS_ACTIVE);
  }

  /**
   * returns the available skill levels
   * 
   * @return array
   */
  public static function getSkillLevelChoices()
  {
    return self::$skill_levels;
  }

  public function getNumNewClientMessages()
  {
    if(!$this -> num_new_client_messages)
    {
      $this -> num_new_client_messages = ClientMessageQuery::create() ->
        filterByCustomer($this) ->
        filterByIsViewed(false) ->
        count();
    }
    return $this -> num_new_client_messages;
  }

  /**
   * generates a unique referral code (random 6 digit|character uppercase hash)
   *
   * @return string
   */
  public static function generateReferralCode()
  {
    do
    {
      $code = strtoupper(substr(md5(rand()), 0, 6));
    }
    while(CustomerQuery::create() -> findOneByReferralCode($code));
    
    return $code;
  }

  public function isReal()
  {
    return $this -> getType() != self::TYPE_SHOPPING;
  }

  public function hasEsqDomains()
  {
    return count($this -> getEsqDomains());
  }

  public function getEsqDomains()
  {
    if(!$this -> esq_domains)
    {
      $this -> esq_domains = DomainQuery::create() ->
        filterByRegistrationType(Domain::REGISTRATION_TYPE_ESQ) ->
        useWebsiteQuery() ->
          filterByCustomer($this) ->
        endUse() ->
        find();
    }
    return $this -> esq_domains;
  }

  public function countWebsites(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
  {
    $criteria = null === $criteria ? new Criteria() : clone $criteria;
    $criteria -> add(WebsitePeer::TYPE, Website::TYPE_PURCHASED);
    return parent::countWebsites($criteria, $distinct, $con);
  }

  public function getWebsites($criteria = null, PropelPDO $con = null)
  {
    $criteria = null === $criteria ? new Criteria() : clone $criteria;
    $criteria -> add(WebsitePeer::TYPE, Website::TYPE_PURCHASED);
    return parent::getWebsites($criteria, $con);
  }

  public static function getTypes()
  {
      return self::$types;
  }

  public static function getStates()
  {
      return self::$states;
  }

  public function getStatusString()
  {
      return isset(self::$states[$this -> getStatus()]) ? self::$states[$this -> getStatus()] : "invalid";
  }

  public function getTypeString()
  {
      return isset(self::$types[$this -> getType()]) ? self::$types[$this -> getType()] : "invalid";
  }

  public function getFullName()
  {
      return $this -> getLastName().", ".$this -> getFirstName()." ".$this -> getMiddleName();
  }

  public function getEmailName()
  {
    return $this -> getEmail()." ".$this -> getFullName();
  }
	
  public function __toString()
  {
      return $this -> getFullName();
  }

  /**
   * returns whether the passed password matches the stored password for this customer
   *
   * @param string $password
   * @return bool
   */
  public function checkPassword($password)
  {
    return $this -> getPassword() == $password;
  }

  /**
   * ensures that password cannot be set to nothing
   *
   * @todo consider throwing exception
   * @param string $password
   * @return void
   */
  public function setPassword($password)
  {
    if (!empty($password))
    {
      parent::setPassword($password);
    }

    return $this; //fluent
  }

  /**
   * @todo  change datatype in database and get rid of this function
   * @return timestamp
   */
  public function getBirthdate($format = null)
  {
    if($date = parent::getBirthdate())
    {
      $month = substr($date, 0, 2);
      $day = substr($date, 2, 2);
      $year = substr($date, 4, 4);

      $timestamp = mktime(null, null, null, $month, $day, $year);

      if(null == $format)
      {
        return $timestamp;
      }
      else
      {
        return date($format, $timestamp);
      }
    } 
  }

  /**
   * initializes new customer accounts with unique ID and other fields
   * 
   * @param PropelPDO $con
   * @return bool
   */
  public function preInsert(PropelPDO $con = null)
  {
    $this -> setId(CustomerPeer::generatePk());
    $this -> setReferralCode(self::generateReferralCode());
    return parent::preInsert($con);
  }

  /**
   * custom hook to watch for potential CG sync issues
   * 
   * @param PropelPDO $con
   */
  public function preUpdate(PropelPDO $con = null)
  {
    $this -> requires_cg_sync = $this -> isColumnModified(CustomerPeer::EMAIL); //only email is time-sensitive
    return parent::preUpdate($con);
  }

  /**
   * custom hook to update CG if neccessary
   */
  public function postUpdate(PropelPDO $con = null)
  {
    if($this -> requires_cg_sync)
    {
      $cg_api = esqContainer::getInstance() ->getSubscriptionService();
      
      foreach($this -> getWebsites() as $website)
      {
        $cg_api -> syncronizeWebsite($website);
      }
      
      $this -> requires_cg_sync = false;
    }
    parent::postUpdate($con);
  }

  /**
   * cancels this customer throughout the system
   *
   * @param PropelPDO $con
   * @return Customer
   */
  public function cancel(PropelPDO $con = null)
  {
    if ($con === null)
    {
      $con = Propel::getConnection(CustomerPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
    }

    $con->beginTransaction();

    try
    {
      foreach($this -> getWebsites() as $website)
      {
        $website -> cancel($con);
      }

      $this -> setStatus(self::STATUS_CANCELLED) -> save();
      $con -> commit();
      return $this;
    }
    catch(Exception $e)
    {
      $con->rollBack();
      throw $e;
    }
  }

  public function suspend()
  {
    foreach($this -> getWebsites() as $website)
    {
      $website -> suspend();
    }
    $this -> setStatus(self::STATUS_SUSPENDED) -> save();
    return $this;
  }

  public function activate()
  {
    $this -> setStatus(self::STATUS_ACTIVE) -> save();
    return $this;
  }

  /**
   * ensures that only shopping types can be truly deleted. all others are set to cancelled.
   *
   * @todo consider if cancelling should use cancel() method (affect CG)
   * @param PropelPDO $con
   */
  public function delete(PropelPDO $con = null)
  {
    if($this -> getType() == self::TYPE_SHOPPING)
    {
      parent::delete($con); //shopping types we can really delete
    }
    else
    {
      //all others are just cancelled
      $this -> setStatus(self::STATUS_CANCELLED);
      $this -> save();
    }
  }
  
  /** DSG 2013-01 */
  public function getRememberKey()
  {
      return $this->remember_key;
  }
  
  /** DSG 2013-01 */
  public function setRememberKey($rememberKey)
  {
      $this->remember_key = $rememberKey;
  }
}