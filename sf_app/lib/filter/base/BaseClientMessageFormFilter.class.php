<?php

/**
 * ClientMessage filter form base class.
 *
 * @package    esqsites123
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseClientMessageFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'website_id'              => new sfWidgetFormPropelChoice(array('model' => 'Website', 'add_empty' => true)),
      'domain'                  => new sfWidgetFormFilterInput(),
      'name'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'phone'                   => new sfWidgetFormFilterInput(),
      'subject'                 => new sfWidgetFormFilterInput(),
      'message'                 => new sfWidgetFormFilterInput(),
      'submitted_by_ip'         => new sfWidgetFormFilterInput(),
      'submitted_by_user_agent' => new sfWidgetFormFilterInput(),
      'is_spam'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_viewed'               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'deleted_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'website_id'              => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Website', 'column' => 'id')),
      'domain'                  => new sfValidatorPass(array('required' => false)),
      'name'                    => new sfValidatorPass(array('required' => false)),
      'email'                   => new sfValidatorPass(array('required' => false)),
      'phone'                   => new sfValidatorPass(array('required' => false)),
      'subject'                 => new sfValidatorPass(array('required' => false)),
      'message'                 => new sfValidatorPass(array('required' => false)),
      'submitted_by_ip'         => new sfValidatorPass(array('required' => false)),
      'submitted_by_user_agent' => new sfValidatorPass(array('required' => false)),
      'is_spam'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_viewed'               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'deleted_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('client_message_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClientMessage';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Text',
      'website_id'              => 'ForeignKey',
      'domain'                  => 'Text',
      'name'                    => 'Text',
      'email'                   => 'Text',
      'phone'                   => 'Text',
      'subject'                 => 'Text',
      'message'                 => 'Text',
      'submitted_by_ip'         => 'Text',
      'submitted_by_user_agent' => 'Text',
      'is_spam'                 => 'Boolean',
      'is_viewed'               => 'Boolean',
      'deleted_at'              => 'Date',
      'created_at'              => 'Date',
      'updated_at'              => 'Date',
    );
  }
}
