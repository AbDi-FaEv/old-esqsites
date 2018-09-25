<?php

/**
 * Host filter form base class.
 *
 * @package    esqsites123
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseHostFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'internal_ip'          => new sfWidgetFormFilterInput(),
      'external_ip'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'port'                 => new sfWidgetFormFilterInput(),
      'name'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'global_document_root' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'save_max'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'type'                 => new sfWidgetFormFilterInput(),
      'status'               => new sfWidgetFormFilterInput(),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'internal_ip'          => new sfValidatorPass(array('required' => false)),
      'external_ip'          => new sfValidatorPass(array('required' => false)),
      'port'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'name'                 => new sfValidatorPass(array('required' => false)),
      'global_document_root' => new sfValidatorPass(array('required' => false)),
      'save_max'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'type'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'status'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('host_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Host';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Text',
      'internal_ip'          => 'Text',
      'external_ip'          => 'Text',
      'port'                 => 'Number',
      'name'                 => 'Text',
      'global_document_root' => 'Text',
      'save_max'             => 'Number',
      'type'                 => 'Number',
      'status'               => 'Number',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
    );
  }
}
