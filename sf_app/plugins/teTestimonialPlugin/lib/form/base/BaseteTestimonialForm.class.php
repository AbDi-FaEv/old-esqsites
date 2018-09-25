<?php

/**
 * teTestimonial form base class.
 *
 * @method teTestimonial getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseteTestimonialForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'source'       => new sfWidgetFormInputText(),
      'location'     => new sfWidgetFormInputText(),
      'company'      => new sfWidgetFormInputText(),
      'content'      => new sfWidgetFormTextarea(),
      'date'         => new sfWidgetFormDate(),
      'is_published' => new sfWidgetFormInputCheckbox(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
      'created_by'   => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'updated_by'   => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'teTestimonial', 'column' => 'id', 'required' => false)),
      'source'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'location'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'company'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'content'      => new sfValidatorString(array('required' => false)),
      'date'         => new sfValidatorDate(array('required' => false)),
      'is_published' => new sfValidatorBoolean(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(array('required' => false)),
      'updated_at'   => new sfValidatorDateTime(array('required' => false)),
      'created_by'   => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'updated_by'   => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('te_testimonial[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'teTestimonial';
  }


}
