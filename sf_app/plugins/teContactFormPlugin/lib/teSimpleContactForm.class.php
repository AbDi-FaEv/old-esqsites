<?php
/**
 *
 * @author Richtermeister
 */
class teSimpleContactForm extends sfForm
{
  public function setup()
  {
    $this -> widgetSchema -> setNameFormat("contact[%s]");
    $this -> widgetSchema -> setDefaultFormFormatterName("list");

    $this -> widgetSchema["company_name"] = new sfWidgetFormInput();
    $this -> widgetSchema["contact_name"] = new sfWidgetFormInput();
    $this -> widgetSchema["email"] = new sfWidgetFormInput();
    $this -> widgetSchema["phone"] = new sfWidgetFormInput(array("label" => "Telephone"));
    $this -> widgetSchema["comments"] = new sfWidgetFormTextarea();

    $this -> validatorSchema["company_name"] = new sfValidatorString();
    $this -> validatorSchema["contact_name"] = new sfValidatorString();
    $this -> validatorSchema["email"] = new sfValidatorEmail();
    $this -> validatorSchema["phone"] = new sfValidatorString();
    $this -> validatorSchema["comments"] = new sfValidatorString(array("required" => false));
  }
}