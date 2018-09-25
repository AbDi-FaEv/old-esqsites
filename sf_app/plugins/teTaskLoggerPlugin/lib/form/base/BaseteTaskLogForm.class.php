<?php

/**
 * teTaskLog form base class.
 *
 * @method teTaskLog getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseteTaskLogForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'task_name'  => new sfWidgetFormInputText(),
      'arguments'  => new sfWidgetFormInputText(),
      'options'    => new sfWidgetFormInputText(),
      'summary'    => new sfWidgetFormInputText(),
      'started_at' => new sfWidgetFormDateTime(),
      'ended_at'   => new sfWidgetFormDateTime(),
      'status'     => new sfWidgetFormInputText(),
      'log_file'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'teTaskLog', 'column' => 'id', 'required' => false)),
      'task_name'  => new sfValidatorString(array('max_length' => 255)),
      'arguments'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'options'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'summary'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'started_at' => new sfValidatorDateTime(array('required' => false)),
      'ended_at'   => new sfValidatorDateTime(array('required' => false)),
      'status'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'log_file'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('te_task_log[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'teTaskLog';
  }


}
