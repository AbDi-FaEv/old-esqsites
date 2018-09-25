<?php

/**
 * sfModeratedContent form base class.
 *
 * @method sfModeratedContent getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BasesfModeratedContentForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'object_id'         => new sfWidgetFormInputText(),
      'object_model'      => new sfWidgetFormInputText(),
      'user_name'         => new sfWidgetFormInputText(),
      'user_email'        => new sfWidgetFormInputText(),
      'title'             => new sfWidgetFormTextarea(),
      'content'           => new sfWidgetFormTextarea(),
      'url'               => new sfWidgetFormTextarea(),
      'status'            => new sfWidgetFormInputText(),
      'comment'           => new sfWidgetFormTextarea(),
      'moderated_at'      => new sfWidgetFormDateTime(),
      'object_updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'sfModeratedContent', 'column' => 'id', 'required' => false)),
      'object_id'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'object_model'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'user_name'         => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'user_email'        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'title'             => new sfValidatorString(array('required' => false)),
      'content'           => new sfValidatorString(array('required' => false)),
      'url'               => new sfValidatorString(array('required' => false)),
      'status'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'comment'           => new sfValidatorString(array('required' => false)),
      'moderated_at'      => new sfValidatorDateTime(array('required' => false)),
      'object_updated_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_moderated_content[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfModeratedContent';
  }


}
