<?php
/**
 * Description of RevenueFormclass
 *
 * @author Richtermeister
 */
class RevenueForm extends BaseForm
{
  public function setup()
  {
    $years = range(date("Y"), 2006);

    $this -> setWidgets(array(
      "month" => new sfWidgetFormCreditCardExpirationDate(array("years" => array_combine($years, $years))),
      "code" => new sfWidgetFormPropelChoice(array("model" => "BarAssociation", "add_empty" => "-- Any --", "order_by" => array("Name", "asc")))
    ));

    $this -> setValidators(array(
      "month" => new sfValidatorCreditCardExpirationDate(array("date_output" => "m/d/Y", "required" => false)),
      "code" => new sfValidatorPropelChoice(array("model" => "BarAssociation", "required" => false))
    ));
    $this -> validatorSchema["month"] -> setOption("min", null);

    $this -> widgetSchema -> setNameFormat("filter[%s]");
  }
}