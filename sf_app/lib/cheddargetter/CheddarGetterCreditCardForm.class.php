<?php
/**
 * extends regular CC form to format fields according to CG requirements
 *
 * @author Richtermeister
 */
class CheddarGetterCreditCardForm extends teSimpleCreditCardForm
{
  public function  __construct($defaults = array(), $options = array())
  {
    parent::__construct(self::globalToLocal($defaults), array_merge(array("fancy" => false, "split_name" => true), $options));

    $this -> validatorSchema["expiration_date"] -> setOption("date_output", "m/Y");
  }

  public function configure()
  {
    parent::configure();

    if($this -> getOption("with_address"))
    {
      $this -> widgetSchema["ccAddress"] = new sfWidgetFormInput(array("label" => "Billing Address"));
      $this -> validatorSchema["ccAddress"] = new sfValidatorString();
      
      $this -> widgetSchema["ccZip"] = new sfWidgetFormInput(array("label" => "Billing Zipcode"));
      $this -> validatorSchema["ccZip"] = new sfValidatorString();
    }

    $this -> widgetSchema -> setNameFormat("cc[%s]");
  }

  public function getValues()
  {
    return self::localToGlobal(parent::getValues());
  }

  public static function localToGlobal($values)
  {
    $values["ccNumber"] = $values["number"]; unset($values["number"]);
    $values["ccFirstName"] = $values["first_name"]; unset($values["first_name"]);
    $values["ccLastName"] = $values["last_name"]; unset($values["last_name"]);
    $values["ccType"] = $values["type"]; unset($values["type"]); //convert type?
    $values["ccExpiration"] = $values["expiration_date"]; unset($values["expiration_date"]);

    return $values;
  }

  public static function globalToLocal($values)
  {  
    if(isset($values["ccFirstName"]))
    {
      $values["first_name"] = $values["ccFirstName"];
      unset($values["ccFirstName"]);
    }
    
    if(isset($values["ccLastName"]))
    {
      $values["last_name"] = $values["ccLastName"];
      unset($values["ccLastName"]);
    }

    if(isset($values["ccType"]))
    {
      switch($values["ccType"])
      {
        case "visa":
          $values["ccType"] = "v";
        break;
      }
      
      $values["type"] = $values["ccType"];
      unset($values["ccType"]);
    }

    if(isset($values["ccExpirationDate"]))
    {
      $values["expiration_date"] = $values["ccExpirationDate"];
      unset($values["ccExpirationDate"]);
    }

    return $values;
  }
}