<?php

/**
 * Customer filter form base class.
 *
 * @package    esqsites123
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseCustomerFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'bar_association_id'     => new sfWidgetFormPropelChoice(array('model' => 'BarAssociation', 'add_empty' => true)),
      'credit_bar_association' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'sales_person_id'        => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'mb_client_id'           => new sfWidgetFormFilterInput(),
      'icontact_id'            => new sfWidgetFormFilterInput(),
      'referral_code'          => new sfWidgetFormFilterInput(),
      'referred_by'            => new sfWidgetFormPropelChoice(array('model' => 'Customer', 'add_empty' => true)),
      'type'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'username'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'password'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'first_name'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'middle_name'            => new sfWidgetFormFilterInput(),
      'last_name'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'birthdate'              => new sfWidgetFormFilterInput(),
      'phone'                  => new sfWidgetFormFilterInput(),
      'fax'                    => new sfWidgetFormFilterInput(),
      'status'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'last_login'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'skill_level'            => new sfWidgetFormFilterInput(),
      'created_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'bar_association_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'BarAssociation', 'column' => 'id')),
      'credit_bar_association' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'sales_person_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'mb_client_id'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'icontact_id'            => new sfValidatorPass(array('required' => false)),
      'referral_code'          => new sfValidatorPass(array('required' => false)),
      'referred_by'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Customer', 'column' => 'id')),
      'type'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'username'               => new sfValidatorPass(array('required' => false)),
      'password'               => new sfValidatorPass(array('required' => false)),
      'email'                  => new sfValidatorPass(array('required' => false)),
      'first_name'             => new sfValidatorPass(array('required' => false)),
      'middle_name'            => new sfValidatorPass(array('required' => false)),
      'last_name'              => new sfValidatorPass(array('required' => false)),
      'birthdate'              => new sfValidatorPass(array('required' => false)),
      'phone'                  => new sfValidatorPass(array('required' => false)),
      'fax'                    => new sfValidatorPass(array('required' => false)),
      'status'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'last_login'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'skill_level'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('customer_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Customer';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Text',
      'bar_association_id'     => 'ForeignKey',
      'credit_bar_association' => 'Boolean',
      'sales_person_id'        => 'ForeignKey',
      'mb_client_id'           => 'Number',
      'icontact_id'            => 'Text',
      'referral_code'          => 'Text',
      'referred_by'            => 'ForeignKey',
      'type'                   => 'Number',
      'username'               => 'Text',
      'password'               => 'Text',
      'email'                  => 'Text',
      'first_name'             => 'Text',
      'middle_name'            => 'Text',
      'last_name'              => 'Text',
      'birthdate'              => 'Text',
      'phone'                  => 'Text',
      'fax'                    => 'Text',
      'status'                 => 'Number',
      'last_login'             => 'Date',
      'skill_level'            => 'Number',
      'created_at'             => 'Date',
      'updated_at'             => 'Date',
    );
  }
}
