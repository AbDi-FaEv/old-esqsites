<?php

/**
 * Customer form.
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class CustomerForm extends CustomerAdminForm
{
  public function configure()
  {
  	parent::configure();

    $this -> widgetSchema["password"] = new sfWidgetFormInputPassword();
    
    $this -> widgetSchema -> setDefault("id", $this -> getObject() -> getId());
    
    $this -> widgetSchema -> setHelp("password", "enter new password to change"); 
    $this -> widgetSchema -> setHelp("username", "your username is used to log into your account");
    
    $this -> widgetSchema["password_repeat"] = new sfWidgetFormInputPassword();
    $this -> validatorSchema["password_repeat"] = new sfValidatorString(array("required" => false));
    
    $this->mergePostValidator(new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password_repeat', array(), array('invalid' => 'The two passwords must be the same.')));

    $this -> useFields(array("username", "password", "password_repeat", "email", "first_name", "middle_name", "last_name", "birthdate", "phone", "fax"));
    unset($this -> widgetSchema["id"]);
  }
  
  public function bind(array $taintedValues = null, array $taintedFiles = null)
  {
    //we keep the ID hidden from the UI
    $taintedValues["id"] = $this -> object -> getId();
    parent::bind($taintedValues, $taintedFiles);
  }
  
}
