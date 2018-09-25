<?php

/**
 * ClientMessage form base class.
 *
 * @method ClientMessage getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseClientMessageForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'website_id'              => new sfWidgetFormPropelChoice(array('model' => 'Website', 'add_empty' => true)),
      'domain'                  => new sfWidgetFormInputText(),
      'name'                    => new sfWidgetFormInputText(),
      'email'                   => new sfWidgetFormInputText(),
      'phone'                   => new sfWidgetFormInputText(),
      'subject'                 => new sfWidgetFormInputText(),
      'message'                 => new sfWidgetFormTextarea(),
      'submitted_by_ip'         => new sfWidgetFormInputText(),
      'submitted_by_user_agent' => new sfWidgetFormTextarea(),
      'is_spam'                 => new sfWidgetFormInputCheckbox(),
      'is_viewed'               => new sfWidgetFormInputCheckbox(),
      'deleted_at'              => new sfWidgetFormDateTime(),
      'created_at'              => new sfWidgetFormDateTime(),
      'updated_at'              => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorPropelChoice(array('model' => 'ClientMessage', 'column' => 'id', 'required' => false)),
      'website_id'              => new sfValidatorPropelChoice(array('model' => 'Website', 'column' => 'id', 'required' => false)),
      'domain'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'name'                    => new sfValidatorString(array('max_length' => 255)),
      'email'                   => new sfValidatorString(array('max_length' => 255)),
      'phone'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'subject'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'message'                 => new sfValidatorString(array('required' => false)),
      'submitted_by_ip'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'submitted_by_user_agent' => new sfValidatorString(array('required' => false)),
      'is_spam'                 => new sfValidatorBoolean(array('required' => false)),
      'is_viewed'               => new sfValidatorBoolean(array('required' => false)),
      'deleted_at'              => new sfValidatorDateTime(array('required' => false)),
      'created_at'              => new sfValidatorDateTime(array('required' => false)),
      'updated_at'              => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('client_message[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClientMessage';
  }


}
