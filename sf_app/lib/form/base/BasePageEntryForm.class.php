<?php

/**
 * PageEntry form base class.
 *
 * @method PageEntry getObject() Returns the current form's model object
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePageEntryForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'group_id'   => new sfWidgetFormPropelChoice(array('model' => 'PageGroup', 'add_empty' => true)),
      'rank'       => new sfWidgetFormInputText(),
      'data'       => new sfWidgetFormTextarea(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'PageEntry', 'column' => 'id', 'required' => false)),
      'group_id'   => new sfValidatorPropelChoice(array('model' => 'PageGroup', 'column' => 'id', 'required' => false)),
      'rank'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'data'       => new sfValidatorString(array('required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('page_entry[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PageEntry';
  }


}
