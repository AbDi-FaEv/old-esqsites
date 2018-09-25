<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of teUserAdminFormclass
 *
 * @author Richtermeister
 */
class teUserAdminForm extends sfGuardUserAdminForm
{
  public function configure()
  {
    parent::configure();

    unset($this["sf_guard_user_permission_list"]);

    if(($user = $this -> getOption("user")) && !$user instanceof sfUser)
    {
      throw new InvalidArgumentException("Expecting sfUser");
    }

    if(!$user || !$user -> isSuperAdmin())
    {
      unset($this["is_super_admin"]);
    }

    $this -> validatorSchema["email"] = new sfValidatorEmail(array("required" => true), array("invalid" => "This email seems invalid."));
    $this -> validatorSchema["password"] -> setOption("min_length", 6);

    $this -> widgetSchema['sf_guard_user_group_list'] -> setOption('order_by', array("Name", "asc"));
    $this -> widgetSchema['sf_guard_user_group_list'] -> setOption('expanded', true);
  }
}