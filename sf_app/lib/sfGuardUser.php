<?php

/**
 *  overriding parent to change __toString
 */
class sfGuardUser extends PluginsfGuardUser
{
  public function __toString()
  {
    $name = $this -> getFirstName()." ".$this -> getLastName();
    if(!trim($name))
    {
      $name = parent::__toString();
    }
    return $name;
  }
}