<?php

/**
 * MemberFeedback form base class.
 *
 * @method MemberFeedback getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseMemberFeedbackForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'customer_id' => new sfWidgetFormPropelChoice(array('model' => 'Customer', 'add_empty' => true)),
      'reply_email' => new sfWidgetFormInputText(),
      'subject'     => new sfWidgetFormInputText(),
      'message'     => new sfWidgetFormTextarea(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'MemberFeedback', 'column' => 'id', 'required' => false)),
      'customer_id' => new sfValidatorPropelChoice(array('model' => 'Customer', 'column' => 'id', 'required' => false)),
      'reply_email' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'subject'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'message'     => new sfValidatorString(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(array('required' => false)),
      'updated_at'  => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('member_feedback[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MemberFeedback';
  }


}
