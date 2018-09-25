<?php
/**
 *
 * @author Richtermeister
 */
class CustomerBillingForm extends sfForm
{
    public function setup()
    {
      $this -> widgetSchema -> setDefaultFormFormatterName("table");
      $this -> widgetSchema["first_name"] = new sfWidgetFormInput();
      $this -> widgetSchema["last_name"] = new sfWidgetFormInput();
      $this -> widgetSchema["email"] = new sfWidgetFormInput();
      $this -> widgetSchema["address"] = new sfWidgetFormInput();
      $this -> widgetSchema["city"] = new sfWidgetFormInput();
      $this -> widgetSchema["state"] = new sfWidgetFormSelectUSState();
      $this -> widgetSchema["zip"] = new sfWidgetFormInput();
      $this -> widgetSchema["phone"] = new sfWidgetFormInput();
      $this -> widgetSchema["fax"] = new sfWidgetFormInput();

      $this -> widgetSchema["update_billing"] = new sfWidgetFormInputCheckbox();
      $this -> validatorSchema["update_billing"] = new sfValidatorPass();


      $this -> widgetSchema["card_name"] = new sfWidgetFormInput();
      $this -> widgetSchema["card_number"] = new sfWidgetFormInput();
      $this -> widgetSchema["card_type"] = new sfWidgetFormSelect(array("choices" => ModernBillApi::getCreditCardTypes()));
      $this -> widgetSchema["card_expiration_date"] = new sfWidgetFormCreditCardExpirationDate();
      
      $this -> widgetSchema -> setLabel("card_name", "Name on Card");
      $this -> widgetSchema -> setLabel("update_billing", "check this box to update payment information");


      $this -> validatorSchema["first_name"] = new sfValidatorString();
      $this -> validatorSchema["last_name"] = new sfValidatorString();
      $this -> validatorSchema["email"] = new sfValidatorEmail();
      $this -> validatorSchema["address"] = new sfValidatorString();
      $this -> validatorSchema["city"] = new sfValidatorString();
      $this -> validatorSchema["state"] = new sfValidatorString();
      $this -> validatorSchema["zip"] = new sfValidatorString();
      $this -> validatorSchema["phone"] = new sfValidatorString();
      $this -> validatorSchema["fax"] = new sfValidatorString();
      $this -> validatorSchema["card_number"] = new sfValidatorString();
      $this -> validatorSchema["card_name"] = new sfValidatorString();
      $this -> validatorSchema["card_expiration_date"] = new sfValidatorCreditCardExpirationDate();
      $this -> validatorSchema["card_type"] = new sfValidatorChoice(array("choices" => array_keys(ModernBillApi::getCreditCardTypes())));

      $this -> widgetSchema -> setNameFormat("customer[%s]");
    }

    public function bind(array $taintedValues = null, array $taintedFiles = null)
    {
      if(!isset($taintedValues["update_billing"]))
      {
        $this -> validatorSchema["card_name"] -> setOption("required", false);
        $this -> validatorSchema["card_number"] -> setOption("required", false);
        $this -> validatorSchema["card_type"] -> setOption("required", false);
        $this -> validatorSchema["card_expiration_date"] -> setOption("required", false);
      }
      parent::bind($taintedValues, $taintedFiles);
    }
}