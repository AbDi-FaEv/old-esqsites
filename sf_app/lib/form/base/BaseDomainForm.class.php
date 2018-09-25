<?php

/**
 * Domain form base class.
 *
 * @method Domain getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseDomainForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'website_id'        => new sfWidgetFormPropelChoice(array('model' => 'Website', 'add_empty' => false)),
      'name'              => new sfWidgetFormInputText(),
      'type'              => new sfWidgetFormInputText(),
      'registration_type' => new sfWidgetFormInputText(),
      'is_auto_renew'     => new sfWidgetFormInputCheckbox(),
      'status'            => new sfWidgetFormInputText(),
      'expiration_date'   => new sfWidgetFormDate(),
      'last_renewal_date' => new sfWidgetFormDate(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'Domain', 'column' => 'id', 'required' => false)),
      'website_id'        => new sfValidatorPropelChoice(array('model' => 'Website', 'column' => 'id')),
      'name'              => new sfValidatorString(array('max_length' => 255)),
      'type'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'registration_type' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_auto_renew'     => new sfValidatorBoolean(array('required' => false)),
      'status'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'expiration_date'   => new sfValidatorDate(array('required' => false)),
      'last_renewal_date' => new sfValidatorDate(array('required' => false)),
      'created_at'        => new sfValidatorDateTime(array('required' => false)),
      'updated_at'        => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('domain[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Domain';
  }


}
