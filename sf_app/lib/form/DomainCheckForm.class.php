<?php
/**
 * Description of DomainCheckForm
 *
 * @author Richtermeister
 */
class DomainCheckForm extends BaseForm
{
  public function setup()
  {
    $this -> widgetSchema["domain"] = new sfWidgetFormInputText();
    $this -> validatorSchema["domain"] = new esqDomainValidator();

    $this -> widgetSchema -> setNameFormat("domain[%s]");
  }
}