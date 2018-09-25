<?php

/**
 * EmailAccount filter form base class.
 *
 * @package    esqsites123
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseEmailAccountFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'website_id'         => new sfWidgetFormPropelChoice(array('model' => 'Website', 'add_empty' => true)),
      'domain_name_id'     => new sfWidgetFormPropelChoice(array('model' => 'Domain', 'add_empty' => true)),
      'local_address'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'forwarding_address' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'             => new sfWidgetFormFilterInput(),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'website_id'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Website', 'column' => 'id')),
      'domain_name_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Domain', 'column' => 'id')),
      'local_address'      => new sfValidatorPass(array('required' => false)),
      'forwarding_address' => new sfValidatorPass(array('required' => false)),
      'status'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('email_account_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmailAccount';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Text',
      'website_id'         => 'ForeignKey',
      'domain_name_id'     => 'ForeignKey',
      'local_address'      => 'Text',
      'forwarding_address' => 'Text',
      'status'             => 'Number',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
    );
  }
}
