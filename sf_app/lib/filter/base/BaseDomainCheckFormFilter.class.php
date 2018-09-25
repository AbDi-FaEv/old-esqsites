<?php

/**
 * DomainCheck filter form base class.
 *
 * @package    esqsites123
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseDomainCheckFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'domain_id'   => new sfWidgetFormPropelChoice(array('model' => 'Domain', 'add_empty' => true)),
      'status_code' => new sfWidgetFormFilterInput(),
      'host'        => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'domain_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Domain', 'column' => 'id')),
      'status_code' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'host'        => new sfValidatorPass(array('required' => false)),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('domain_check_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DomainCheck';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'domain_id'   => 'ForeignKey',
      'status_code' => 'Number',
      'host'        => 'Text',
      'created_at'  => 'Date',
    );
  }
}
