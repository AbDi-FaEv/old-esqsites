<?php

/**
 * CheddarGetterNotification filter form base class.
 *
 * @package    esqsites123
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseCheddarGetterNotificationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'content'    => new sfWidgetFormFilterInput(),
      'website_id' => new sfWidgetFormPropelChoice(array('model' => 'Website', 'add_empty' => true)),
      'type'       => new sfWidgetFormFilterInput(),
      'result'     => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'content'    => new sfValidatorPass(array('required' => false)),
      'website_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Website', 'column' => 'id')),
      'type'       => new sfValidatorPass(array('required' => false)),
      'result'     => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('cheddar_getter_notification_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CheddarGetterNotification';
  }

  public function getFields()
  {
    return array(
      'content'    => 'Text',
      'website_id' => 'ForeignKey',
      'type'       => 'Text',
      'result'     => 'Text',
      'id'         => 'Number',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
