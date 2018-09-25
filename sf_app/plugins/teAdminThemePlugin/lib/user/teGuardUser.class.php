<?php
/**
 * Description of teGuardUserclass
 *
 * @author Richtermeister
 */
class teGuardUser extends sfGuardSecurityUser
{
  public function __toString()
  {
      return $this -> getUsername();
  }

  public function getId()
  {
    return $this -> getAttribute('user_id', null, 'sfGuardSecurityUser');
  }
}