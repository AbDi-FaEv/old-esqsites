<?php

/**
 * PageGroup filter form base class.
 *
 * @package    esqsites123
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePageGroupFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'page_id'    => new sfWidgetFormPropelChoice(array('model' => 'Page', 'add_empty' => true)),
      'rank'       => new sfWidgetFormFilterInput(),
      'data'       => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'page_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Page', 'column' => 'id')),
      'rank'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'data'       => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('page_group_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PageGroup';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Text',
      'page_id'    => 'ForeignKey',
      'rank'       => 'Number',
      'data'       => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
