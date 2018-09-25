<?php

/**
 *
 * @author Richtermeister
 */
class PaymentAccountForm extends BaseFormPropel
{
  public function setup()
  {
    $this -> setWidgets(array(
      "payment_account_id" => new sfWidgetFormInput(),
    ));

    $this -> setValidators(array(
      "payment_account_id" => new sfValidatorString(array("required" => false, "trim" => true))
    ));

    //$this -> widgetSchema -> setHelp("analytics_code", "Format: UA-xxxxxx-x");
    $this -> widgetSchema -> setNameFormat("payment[%s]");
  }

  public function getModelName()
  {
    return 'Website';
  }
}