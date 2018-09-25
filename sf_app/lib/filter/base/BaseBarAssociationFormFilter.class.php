<?php

/**
 * BarAssociation filter form base class.
 *
 * @package    esqsites123
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseBarAssociationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'abbreviation'             => new sfWidgetFormFilterInput(),
      'primary_contact_email'    => new sfWidgetFormFilterInput(),
      'contact_info'             => new sfWidgetFormFilterInput(),
      'notes'                    => new sfWidgetFormFilterInput(),
      'password'                 => new sfWidgetFormFilterInput(),
      'last_login'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'affinity_expiration_date' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'affinity_start_date'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'slug'                     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'                     => new sfValidatorPass(array('required' => false)),
      'abbreviation'             => new sfValidatorPass(array('required' => false)),
      'primary_contact_email'    => new sfValidatorPass(array('required' => false)),
      'contact_info'             => new sfValidatorPass(array('required' => false)),
      'notes'                    => new sfValidatorPass(array('required' => false)),
      'password'                 => new sfValidatorPass(array('required' => false)),
      'last_login'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'affinity_expiration_date' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'affinity_start_date'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'slug'                     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bar_association_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'BarAssociation';
  }

  public function getFields()
  {
    return array(
      'name'                     => 'Text',
      'abbreviation'             => 'Text',
      'primary_contact_email'    => 'Text',
      'contact_info'             => 'Text',
      'notes'                    => 'Text',
      'password'                 => 'Text',
      'last_login'               => 'Date',
      'affinity_expiration_date' => 'Date',
      'affinity_start_date'      => 'Date',
      'id'                       => 'Number',
      'created_at'               => 'Date',
      'updated_at'               => 'Date',
      'slug'                     => 'Text',
    );
  }
}
