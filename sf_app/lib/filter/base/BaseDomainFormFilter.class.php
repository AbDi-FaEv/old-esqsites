<?php

/**
 * Domain filter form base class.
 *
 * @package    esqsites123
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseDomainFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'website_id'        => new sfWidgetFormPropelChoice(array('model' => 'Website', 'add_empty' => true)),
      'name'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'type'              => new sfWidgetFormFilterInput(),
      'registration_type' => new sfWidgetFormFilterInput(),
      'is_auto_renew'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'status'            => new sfWidgetFormFilterInput(),
      'expiration_date'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'last_renewal_date' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'website_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Website', 'column' => 'id')),
      'name'              => new sfValidatorPass(array('required' => false)),
      'type'              => new sfValidatorPass(array('required' => false)),
      'registration_type' => new sfValidatorPass(array('required' => false)),
      'is_auto_renew'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'status'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'expiration_date'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'last_renewal_date' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('domain_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Domain';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Text',
      'website_id'        => 'ForeignKey',
      'name'              => 'Text',
      'type'              => 'Text',
      'registration_type' => 'Text',
      'is_auto_renew'     => 'Boolean',
      'status'            => 'Number',
      'expiration_date'   => 'Date',
      'last_renewal_date' => 'Date',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
    );
  }
}
