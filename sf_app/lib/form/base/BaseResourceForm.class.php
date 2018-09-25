<?php

/**
 * Resource form base class.
 *
 * @method Resource getObject() Returns the current form's model object
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseResourceForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'category_id'  => new sfWidgetFormPropelChoice(array('model' => 'ResourceCategory', 'add_empty' => true)),
      'company_name' => new sfWidgetFormInputText(),
      'image_url'    => new sfWidgetFormInputText(),
      'url'          => new sfWidgetFormInputText(),
      'url_title'    => new sfWidgetFormInputText(),
      'email'        => new sfWidgetFormInputText(),
      'description'  => new sfWidgetFormTextarea(),
      'created_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'Resource', 'column' => 'id', 'required' => false)),
      'category_id'  => new sfValidatorPropelChoice(array('model' => 'ResourceCategory', 'column' => 'id', 'required' => false)),
      'company_name' => new sfValidatorString(array('max_length' => 255)),
      'image_url'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'url'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'url_title'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description'  => new sfValidatorString(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('resource[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Resource';
  }


}
