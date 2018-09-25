<?php

/**
 * Host form base class.
 *
 * @method Host getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseHostForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'internal_ip'          => new sfWidgetFormInputText(),
      'external_ip'          => new sfWidgetFormInputText(),
      'port'                 => new sfWidgetFormInputText(),
      'name'                 => new sfWidgetFormInputText(),
      'global_document_root' => new sfWidgetFormInputText(),
      'save_max'             => new sfWidgetFormInputText(),
      'type'                 => new sfWidgetFormInputText(),
      'status'               => new sfWidgetFormInputText(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorPropelChoice(array('model' => 'Host', 'column' => 'id', 'required' => false)),
      'internal_ip'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'external_ip'          => new sfValidatorString(array('max_length' => 255)),
      'port'                 => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'name'                 => new sfValidatorString(array('max_length' => 255)),
      'global_document_root' => new sfValidatorString(array('max_length' => 255)),
      'save_max'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'type'                 => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'status'               => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'created_at'           => new sfValidatorDateTime(array('required' => false)),
      'updated_at'           => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'Host', 'column' => array('name'))),
        new sfValidatorPropelUnique(array('model' => 'Host', 'column' => array('external_ip'))),
      ))
    );

    $this->widgetSchema->setNameFormat('host[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Host';
  }


}
