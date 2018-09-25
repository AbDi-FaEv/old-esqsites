<?php
/**
 * Description of CheckoutInfoForm
 *
 * @author Richtermeister
 */
class CheckoutPreviewForm extends BaseForm
{
  public function setup()
  {
    $type_choices = Website::getFirmTypes();

    $this -> setWidgets(array(
      "first_name" => new sfWidgetFormInputText(),
      "last_name" => new sfWidgetFormInputText(),
      "firm_name" => new sfWidgetFormInputText(),
      "firm_type" => new sfWidgetFormSelect(array("choices" => $type_choices)),
      "email" => new sfWidgetFormInputText(),
      "address" => new sfWidgetFormInputText(),
      "city" => new sfWidgetFormInputText(),
      "state" => new sfWidgetFormSelectUSState(),
      "zip" => new sfWidgetFormInputText(),
      "phone" => new sfWidgetFormInputText(),
      "fax" => new sfWidgetFormInputText(),
    ));

    $this -> setValidators(array(
      "first_name" => new sfValidatorString(array("required" => false)),
      "last_name" => new sfValidatorString(array("required" => false)),
      "firm_name" => new sfValidatorString(array("required" => false)),
      "firm_type" => new sfValidatorChoice(array("choices" => array_keys($type_choices), "required" => true)),
      "email" => new sfValidatorString(array("required" => false)),
      "address" => new sfValidatorString(array("required" => false)),
      "city" => new sfValidatorString(array("required" => false)),
      "state" => new sfValidatorString(array("required" => false)),
      "zip" => new sfValidatorString(array("required" => false)),
      "phone" => new esqValidatorPhone(array("required" => false)),
      "fax" => new esqValidatorPhone(array("required" => false))
    ));

    $this -> widgetSchema -> setDefaultFormFormatterName("None");
    $this -> widgetSchema -> setNameFormat("website_info[%s]");
  }
}