<?php

/**
 * TemplateType form base class.
 *
 * @method TemplateType getObject() Returns the current form's model object
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTemplateTypeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'rank'        => new sfWidgetFormInputText(),
      'name'        => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'TemplateType', 'column' => 'id', 'required' => false)),
      'rank'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 255)),
      'description' => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'TemplateType', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('template_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TemplateType';
  }


}
