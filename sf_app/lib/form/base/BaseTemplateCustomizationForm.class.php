<?php

/**
 * TemplateCustomization form base class.
 *
 * @method TemplateCustomization getObject() Returns the current form's model object
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTemplateCustomizationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'website_id'   => new sfWidgetFormPropelChoice(array('model' => 'Website', 'add_empty' => false)),
      'template_id'  => new sfWidgetFormPropelChoice(array('model' => 'WebsiteTemplate', 'add_empty' => true)),
      'type'         => new sfWidgetFormInputText(),
      'content'      => new sfWidgetFormInputText(),
      'reference'    => new sfWidgetFormInputText(),
      'related_file' => new sfWidgetFormInputText(),
      'id'           => new sfWidgetFormInputHidden(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'website_id'   => new sfValidatorPropelChoice(array('model' => 'Website', 'column' => 'id')),
      'template_id'  => new sfValidatorPropelChoice(array('model' => 'WebsiteTemplate', 'column' => 'id', 'required' => false)),
      'type'         => new sfValidatorString(array('max_length' => 255)),
      'content'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'reference'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'related_file' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id'           => new sfValidatorPropelChoice(array('model' => 'TemplateCustomization', 'column' => 'id', 'required' => false)),
      'created_at'   => new sfValidatorDateTime(array('required' => false)),
      'updated_at'   => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('template_customization[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TemplateCustomization';
  }


}
