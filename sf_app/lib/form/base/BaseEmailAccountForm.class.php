<?php

/**
 * EmailAccount form base class.
 *
 * @method EmailAccount getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseEmailAccountForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'website_id'         => new sfWidgetFormPropelChoice(array('model' => 'Website', 'add_empty' => true)),
      'domain_name_id'     => new sfWidgetFormPropelChoice(array('model' => 'Domain', 'add_empty' => false)),
      'local_address'      => new sfWidgetFormInputText(),
      'forwarding_address' => new sfWidgetFormInputText(),
      'status'             => new sfWidgetFormInputText(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorPropelChoice(array('model' => 'EmailAccount', 'column' => 'id', 'required' => false)),
      'website_id'         => new sfValidatorPropelChoice(array('model' => 'Website', 'column' => 'id', 'required' => false)),
      'domain_name_id'     => new sfValidatorPropelChoice(array('model' => 'Domain', 'column' => 'id')),
      'local_address'      => new sfValidatorString(array('max_length' => 255)),
      'forwarding_address' => new sfValidatorString(array('max_length' => 255)),
      'status'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'created_at'         => new sfValidatorDateTime(array('required' => false)),
      'updated_at'         => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'EmailAccount', 'column' => array('domain_name_id', 'local_address')))
    );

    $this->widgetSchema->setNameFormat('email_account[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmailAccount';
  }


}
