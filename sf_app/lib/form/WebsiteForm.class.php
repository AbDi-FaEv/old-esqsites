<?php

/**
 * Website form.
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class WebsiteForm extends BaseWebsiteForm
{
  public function configure()
  {
    $add_empty = "-- Please Select";
    
    $this -> widgetSchema["customer_id"] = new esqWidgetFormSelectCustomer(array("add_empty" => $add_empty));
    $this -> validatorSchema["customer_id"] = new sfValidatorPropelChoice(array("model" => "Customer", "criteria" => $this -> widgetSchema["customer_id"] -> getOption("criteria")));

    $status_choices = Website::getStates();
    $this -> widgetSchema["status"] = new sfWidgetFormSelect(array("choices" => $status_choices));
    $this -> validatorSchema["status"] = new sfValidatorChoice(array("choices" => array_keys($status_choices), "required" => true));

    $type_choices = Website::getFirmTypes();
    $this -> widgetSchema["firm_type"] = new sfWidgetFormSelect(array("choices" => $type_choices));
    $this -> validatorSchema["firm_type"] = new sfValidatorChoice(array("choices" => array_keys($type_choices), "required" => true));
    $this -> widgetSchema["state"] = new sfWidgetFormSelectUSState();

    $this -> widgetSchema["template_id"] -> setOption("add_empty", $add_empty);
    $this -> widgetSchema["website_attribute_id"] -> setOption("add_empty", $add_empty);

    $this -> validatorSchema["template_id"] -> setOption("required", true); //has to be associated with a template
    $this -> validatorSchema["website_attribute_id"] -> setOption("required", true); //has to be associated with a plan

    $this -> validatorSchema["email"] = new sfValidatorEmail(array("required" => false), array("invalid" => "This email seems invalid."));

    $this -> widgetSchema -> setLabel("website_attribute_id", "Hosting Plan");
    $this -> widgetSchema -> setLabel("template_id", "Template");

    $this -> widgetSchema["meta_description"] = new sfWidgetFormTextarea();
    $this -> widgetSchema["meta_keywords"] = new sfWidgetFormTextarea();

  }

  public function updatePhoneColumn($input)
  {
    return preg_replace ("/[^\d]/i", "", $input); //strip non-numeric characters
  }

  public function updateFaxColumn($input)
  {
    return preg_replace ("/[^\d]/i", "", $input);
  }
  
}