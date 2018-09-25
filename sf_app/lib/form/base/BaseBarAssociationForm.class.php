<?php

/**
 * BarAssociation form base class.
 *
 * @method BarAssociation getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseBarAssociationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                     => new sfWidgetFormInputText(),
      'abbreviation'             => new sfWidgetFormInputText(),
      'primary_contact_email'    => new sfWidgetFormInputText(),
      'contact_info'             => new sfWidgetFormTextarea(),
      'notes'                    => new sfWidgetFormTextarea(),
      'password'                 => new sfWidgetFormInputText(),
      'last_login'               => new sfWidgetFormDateTime(),
      'affinity_expiration_date' => new sfWidgetFormDate(),
      'affinity_start_date'      => new sfWidgetFormDate(),
      'id'                       => new sfWidgetFormInputHidden(),
      'created_at'               => new sfWidgetFormDateTime(),
      'updated_at'               => new sfWidgetFormDateTime(),
      'slug'                     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'name'                     => new sfValidatorString(array('max_length' => 255)),
      'abbreviation'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'primary_contact_email'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'contact_info'             => new sfValidatorString(array('required' => false)),
      'notes'                    => new sfValidatorString(array('required' => false)),
      'password'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'last_login'               => new sfValidatorDateTime(array('required' => false)),
      'affinity_expiration_date' => new sfValidatorDate(array('required' => false)),
      'affinity_start_date'      => new sfValidatorDate(array('required' => false)),
      'id'                       => new sfValidatorPropelChoice(array('model' => 'BarAssociation', 'column' => 'id', 'required' => false)),
      'created_at'               => new sfValidatorDateTime(array('required' => false)),
      'updated_at'               => new sfValidatorDateTime(array('required' => false)),
      'slug'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'BarAssociation', 'column' => array('name'))),
        new sfValidatorPropelUnique(array('model' => 'BarAssociation', 'column' => array('abbreviation'))),
        new sfValidatorPropelUnique(array('model' => 'BarAssociation', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('bar_association[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'BarAssociation';
  }


}
