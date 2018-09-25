<?php

/**
 * DomainCheck form base class.
 *
 * @method DomainCheck getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseDomainCheckForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'domain_id'   => new sfWidgetFormPropelChoice(array('model' => 'Domain', 'add_empty' => true)),
      'status_code' => new sfWidgetFormInputText(),
      'host'        => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'DomainCheck', 'column' => 'id', 'required' => false)),
      'domain_id'   => new sfValidatorPropelChoice(array('model' => 'Domain', 'column' => 'id', 'required' => false)),
      'status_code' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'host'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('domain_check[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DomainCheck';
  }


}
