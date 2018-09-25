<?php
/**
 * Description of CheckoutInfoForm
 *
 * @author Richtermeister
 */
class CheckoutWebsiteInfoForm extends CheckoutPreviewForm
{
  public function setup()
  {
    parent::setup();

    $this -> validatorSchema["first_name"] -> setOption("required", true);
    $this -> validatorSchema["last_name"] -> setOption("required", true);
    $this -> validatorSchema["address"] -> setOption("required", true);
    $this -> validatorSchema["city"] -> setOption("required", true);
    $this -> validatorSchema["state"] -> setOption("required", true);
    $this -> validatorSchema["zip"] = new sfValidatorInteger(array(), array("invalid" => '"%value%" is not a valid zipcode.'));
    
    $this -> validatorSchema["email"] = new sfValidatorEmail(array("required" => true), array("invalid" => "This email seems invalid."));
    
    $this -> widgetSchema["plan"] = new sfWidgetFormPropelChoice(array("label" => "Hosting Plan", "model" => "WebsiteAttribute", "criteria" => WebsiteAttributePeer::getActiveCriteria())); //limit this
    $this -> validatorSchema["plan"] = new sfValidatorPropelChoice(array("model" => "WebsiteAttribute"));

    $this->validatorSchema->setPostValidator(
      new esqValidatorPropelUnique(
        array('model' => 'Customer', 'column' => array('email'), "criteria" => CustomerPeer::getActiveCriteria()),
        array("invalid" => "This email is already in use."))
    );

    $years = range(date('Y') - 18, 1920);
    $years = array_combine($years, $years);
    $options["years"] = $years;

    $this -> widgetSchema["birthdate"] = new esqWidgetFormBirthdate($options);
    $this -> validatorSchema["birthdate"] = new sfValidatorDate(array("required" => false));
    $this -> widgetSchema -> moveField("plan", "first");

    $this -> widgetSchema -> setHelp("email", "Please enter a real email that you are able to check, so we can send you your welcome message.");
  }
}