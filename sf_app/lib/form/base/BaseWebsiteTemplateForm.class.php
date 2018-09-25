<?php

/**
 * WebsiteTemplate form base class.
 *
 * @method WebsiteTemplate getObject() Returns the current form's model object
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseWebsiteTemplateForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'type'        => new sfWidgetFormInputText(),
      'reference'   => new sfWidgetFormInputText(),
      'category_id' => new sfWidgetFormPropelChoice(array('model' => 'TemplateCategory', 'add_empty' => true)),
      'title'       => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'customer_id' => new sfWidgetFormPropelChoice(array('model' => 'Customer', 'add_empty' => true)),
      'status'      => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
      'rank'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'WebsiteTemplate', 'column' => 'id', 'required' => false)),
      'type'        => new sfValidatorString(array('max_length' => 255)),
      'reference'   => new sfValidatorString(array('max_length' => 255)),
      'category_id' => new sfValidatorPropelChoice(array('model' => 'TemplateCategory', 'column' => 'id', 'required' => false)),
      'title'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description' => new sfValidatorString(array('required' => false)),
      'customer_id' => new sfValidatorPropelChoice(array('model' => 'Customer', 'column' => 'id', 'required' => false)),
      'status'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(array('required' => false)),
      'updated_at'  => new sfValidatorDateTime(array('required' => false)),
      'rank'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'WebsiteTemplate', 'column' => array('reference')))
    );

    $this->widgetSchema->setNameFormat('website_template[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'WebsiteTemplate';
  }


}
