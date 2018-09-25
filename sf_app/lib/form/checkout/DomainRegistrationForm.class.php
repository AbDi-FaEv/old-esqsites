<?php
/**
 * Description of DomainRegistrationForm
 *
 * @author Richtermeister
 */
class DomainRegistrationForm extends BaseForm
{
  public function setup()
  {

    $domain_choices = array(
      Domain::REGISTRATION_TYPE_ESQ => "Register a New Domain, OR",
      Domain::REGISTRATION_TYPE_OTHER => "Use Your Existing Domain Name"
    );

    $this -> setWidgets(array(
      "type" => new sfWidgetFormChoice(array("choices" => $domain_choices, "expanded" => true)),
      "name" => new esqWidgetFormDomainName()
    ));

    $this -> setValidators(array(
      "type" => new sfValidatorChoice(array("choices" => array_keys($domain_choices)),
        array("required" => "Please choose if you want to register a new domain name or use an existing one for your website")),
      "name" => new esqValidatorDomainName(array(), array("required" => "Please enter a domain name")),
    ));

    $this -> mergePostValidator(new sfValidatorCallback(array("callback" => array($this, "validate"))));

    $this -> setDefault("type", Domain::REGISTRATION_TYPE_ESQ);
    $this -> widgetSchema -> setNameFormat("domain_registration[%s]");
    
    //check if already in system!
  }

  /**
   *  validates whether domain name is still available
   */
  public function validate($validator, $values)
  {
    if ($values["type"] != Domain::REGISTRATION_TYPE_ESQ || $values["name"] == "")
    {
      return $values;
    }

    $domain_name = $values["name"];

    $validator = new esqDomainValidator();
    try
    {
      $domain_name = $validator -> clean($domain_name);
      return $values; //return original values
    }
    catch(sfValidatorError $e)
    {
      throw new sfValidatorErrorSchema($validator, array("name" => $e));
    }
  }
}