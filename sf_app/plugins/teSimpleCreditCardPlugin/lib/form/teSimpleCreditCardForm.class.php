<?php
/**
 * Description of teSimpleCreditCardForm
 *
 * @author Richtermeister
 */
class teSimpleCreditCardForm extends sfForm
{

  public function setup()
  {
    if($this -> getOption("split_name", false))
    {
      $this -> widgetSchema["first_name"] = new sfWidgetFormInput(array("label" => "Card First Name"));
      $this -> validatorSchema["first_name"] = new sfValidatorString();
      $this -> widgetSchema["last_name"] = new sfWidgetFormInput(array("label" => "Card Last Name"));
      $this -> validatorSchema["last_name"] = new sfValidatorString();
    }
    else
    {
      $this -> widgetSchema["name"] = new sfWidgetFormInput(array("label" => "Name on Card"));
      $this -> validatorSchema["name"] = new sfValidatorString();
    }

    $this -> widgetSchema["number"] = new sfWidgetFormInput(array("label" => "Card Number"));
    $this -> validatorSchema["number"] = new sfValidatorString();

    if($this -> getOption("fancy", true))
    {
      $this -> widgetSchema["type"] = new sfWidgetFormSelectCreditCardType();
    }
    else
    {
      $this -> widgetSchema["type"] = new sfWidgetFormSelect(array("choices" => array("" => "-- Please Select --") + teCreditCard::getTypes()));
    }
    $this -> validatorSchema["type"] = new sfValidatorChoice(array("choices" => array_keys(teCreditCard::getTypes())));
    $this -> widgetSchema["type"] -> setLabel("Card Type");
    
    $this -> widgetSchema["expiration_date"] = new sfWidgetFormCreditCardExpirationDate();
    $this -> validatorSchema["expiration_date"] = new sfValidatorCreditCardExpirationDate();
    
    $this -> validatorSchema -> setPostValidator(new sfValidatorSchemaCreditCard(array("type_field" => "type", "number_field" => "number")));

  }
}