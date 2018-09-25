<?php

/**
 * sfComment form base class.
 *
 * @method sfComment getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BasesfCommentForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'commentable_model' => new sfWidgetFormInputText(),
      'commentable_id'    => new sfWidgetFormInputText(),
      'comment_namespace' => new sfWidgetFormInputText(),
      'title'             => new sfWidgetFormInputText(),
      'text'              => new sfWidgetFormTextarea(),
      'author_id'         => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'author_name'       => new sfWidgetFormInputText(),
      'author_email'      => new sfWidgetFormInputText(),
      'author_website'    => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'sfComment', 'column' => 'id', 'required' => false)),
      'commentable_model' => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'commentable_id'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'comment_namespace' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'title'             => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'text'              => new sfValidatorString(array('required' => false)),
      'author_id'         => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'author_name'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'author_email'      => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'author_website'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'        => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_comment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfComment';
  }


}
