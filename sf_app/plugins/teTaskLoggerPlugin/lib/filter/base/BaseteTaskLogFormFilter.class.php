<?php

/**
 * teTaskLog filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseteTaskLogFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'task_name'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'arguments'  => new sfWidgetFormFilterInput(),
      'options'    => new sfWidgetFormFilterInput(),
      'summary'    => new sfWidgetFormFilterInput(),
      'started_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'ended_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'status'     => new sfWidgetFormFilterInput(),
      'log_file'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'task_name'  => new sfValidatorPass(array('required' => false)),
      'arguments'  => new sfValidatorPass(array('required' => false)),
      'options'    => new sfValidatorPass(array('required' => false)),
      'summary'    => new sfValidatorPass(array('required' => false)),
      'started_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'ended_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'status'     => new sfValidatorPass(array('required' => false)),
      'log_file'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('te_task_log_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'teTaskLog';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'task_name'  => 'Text',
      'arguments'  => 'Text',
      'options'    => 'Text',
      'summary'    => 'Text',
      'started_at' => 'Date',
      'ended_at'   => 'Date',
      'status'     => 'Text',
      'log_file'   => 'Text',
    );
  }
}
