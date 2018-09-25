<?php

class EmailAccount extends BaseEmailAccount
{
  const STATUS_ACTIVE = 1;
  const STATUS_PENDING_ACTIVATION = 2;
  const STATUS_PENDING_REMOVAL = 3; // Set status to PENDING REMOVAL, so we later remove this entry when we run the cron script
  
  protected static $states = array(
    self::STATUS_ACTIVE => "Active", 
    self::STATUS_PENDING_ACTIVATION => "Pending Activation", 
    self::STATUS_PENDING_REMOVAL => "Pending Removal"
  );
  
  public static function getStates()
  {
    return self::$states;
  }
  
  public function getStatusString()
  {
    return isset(self::$states[$this -> getStatus()]) ? self::$states[$this -> getStatus()] : "invalid";
  }

  public function getFullLocalAddress()
  {
    return $this -> getLocalAddress()."@".$this -> getDomain();
  }
  
  public function getFromEmail()
  {
    if($domain = $this -> getDomain())
    {
      $domain = $domain -> getName();
    }
    return $this -> getLocalAddress()."@".$domain;
  }
  
  public function delete(PropelPDO $con = null)
  {
    if($this -> getStatus() == self::STATUS_PENDING_ACTIVATION) //new accounts aren't yet added to our IMAP
    {
      return parent::delete($con); //delete right away
    }
    else
    {
      $this -> setStatus(self::STATUS_PENDING_REMOVAL); //CRON will clean this up
      $this -> save();
    }
  }
  
  public function forceDelete(PropelPDO $con = null)
  {
    parent::delete($con);
  }

  /**
   *
   * @todo  create new status - pending update
   */
  public function save(PropelPDO $con = null)
  {
    
    if($this -> isNew())
    {
      $this -> setStatus(self::STATUS_PENDING_ACTIVATION);
      $this -> setId(EmailAccountPeer::generatePk());
    }
    elseif($this -> isColumnModified(EmailAccountPeer::LOCAL_ADDRESS)
       || $this -> isColumnModified(EmailAccountPeer::FORWARDING_ADDRESS)
       || $this -> isColumnModified(EmailAccountPeer::DOMAIN_NAME_ID))
    {
      $this -> setStatus(self::STATUS_PENDING_ACTIVATION);
    }
    
    parent::save($con);
  }
}
