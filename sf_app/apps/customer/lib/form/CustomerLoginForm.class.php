<?php

class CustomerLoginForm extends sfForm 
{
  
  public function setup()
  {
    $this -> setWidgets(array(
      "username" => new sfWidgetFormInput(),
      "password" => new sfWidgetFormInputPassword()
    ));
    
    $this -> setValidators(array(
      "username" => new sfValidatorString(array(), array("required" => "Please enter your username")),
      "password" => new sfValidatorString(array(), array("required" => "Please enter your password"))
    ));

    $this -> widgetSchema["remember"] = new sfWidgetFormInputCheckbox();
    $this -> validatorSchema["remember"] = new sfValidatorBoolean();
    
    $this -> validatorSchema->setPostValidator(new esqCustomerLoginValidator());
    
    $this -> widgetSchema -> setNameFormat("login[%s]");
    
    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
    
}