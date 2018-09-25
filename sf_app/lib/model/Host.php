<?php

class Host extends BaseHost
{
  const STATUS_ACTIVE = 1;
  const STATUS_SUSPENDED = 2;
  const STATUS_CANCELLED = 3;
  
  protected static $states = array(self::STATUS_ACTIVE => "Active", 
                  self::STATUS_SUSPENDED => "Suspended", 
                  self::STATUS_CANCELLED => "Cancelled");
  
  public static function getStates()
  {
    return self::$states;
  }
  
  public function getStatusString()
  {
    return isset(self::$states[$this -> getStatus()]) ? self::$states[$this -> getStatus()] : "invalid";
  }
  
  public function __toString()
  {
    return $this -> getName();
  }
}
