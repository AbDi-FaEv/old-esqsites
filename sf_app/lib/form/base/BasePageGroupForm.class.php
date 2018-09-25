<?php

/**
 * PageGroup form base class.
 *
 * @method PageGroup getObject() Returns the current form's model object
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePageGroupForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'page_id'    => new sfWidgetFormPropelChoice(array('model' => 'Page', 'add_empty' => true)),
      'rank'       => new sfWidgetFormInputText(),
      'data'       => new sfWidgetFormTextarea(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'PageGroup', 'column' => 'id', 'required' => false)),
      'page_id'    => new sfValidatorPropelChoice(array('model' => 'Page', 'column' => 'id', 'required' => false)),
      'rank'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'data'       => new sfValidatorString(array('required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('page_group[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PageGroup';
  }


}
