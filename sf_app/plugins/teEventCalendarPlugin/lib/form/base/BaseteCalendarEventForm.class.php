<?php

/**
 * teCalendarEvent form base class.
 *
 * @method teCalendarEvent getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseteCalendarEventForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'date'         => new sfWidgetFormDate(),
      'time'         => new sfWidgetFormTime(),
      'title'        => new sfWidgetFormInputText(),
      'extract'      => new sfWidgetFormTextarea(),
      'description'  => new sfWidgetFormTextarea(),
      'location'     => new sfWidgetFormInputText(),
      'is_published' => new sfWidgetFormInputCheckbox(),
      'created_by'   => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'updated_by'   => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'id'           => new sfWidgetFormInputHidden(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
      'slug'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'date'         => new sfValidatorDate(),
      'time'         => new sfValidatorTime(array('required' => false)),
      'title'        => new sfValidatorString(array('max_length' => 255)),
      'extract'      => new sfValidatorString(array('required' => false)),
      'description'  => new sfValidatorString(array('required' => false)),
      'location'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_published' => new sfValidatorBoolean(array('required' => false)),
      'created_by'   => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'updated_by'   => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'id'           => new sfValidatorPropelChoice(array('model' => 'teCalendarEvent', 'column' => 'id', 'required' => false)),
      'created_at'   => new sfValidatorDateTime(array('required' => false)),
      'updated_at'   => new sfValidatorDateTime(array('required' => false)),
      'slug'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'teCalendarEvent', 'column' => array('title', 'date'))),
        new sfValidatorPropelUnique(array('model' => 'teCalendarEvent', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('te_calendar_event[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'teCalendarEvent';
  }


}
