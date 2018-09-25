<?php

/**
 * Customer form base class.
 *
 * @method Customer getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseCustomerForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'bar_association_id'     => new sfWidgetFormPropelChoice(array('model' => 'BarAssociation', 'add_empty' => true)),
      'credit_bar_association' => new sfWidgetFormInputCheckbox(),
      'sales_person_id'        => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'mb_client_id'           => new sfWidgetFormInputText(),
      'icontact_id'            => new sfWidgetFormInputText(),
      'referral_code'          => new sfWidgetFormInputText(),
      'referred_by'            => new sfWidgetFormPropelChoice(array('model' => 'Customer', 'add_empty' => true)),
      'type'                   => new sfWidgetFormInputText(),
      'username'               => new sfWidgetFormInputText(),
      'password'               => new sfWidgetFormInputText(),
      'email'                  => new sfWidgetFormInputText(),
      'first_name'             => new sfWidgetFormInputText(),
      'middle_name'            => new sfWidgetFormInputText(),
      'last_name'              => new sfWidgetFormInputText(),
      'birthdate'              => new sfWidgetFormInputText(),
      'phone'                  => new sfWidgetFormInputText(),
      'fax'                    => new sfWidgetFormInputText(),
      'status'                 => new sfWidgetFormInputText(),
      'last_login'             => new sfWidgetFormDateTime(),
      'skill_level'            => new sfWidgetFormInputText(),
      'created_at'             => new sfWidgetFormDateTime(),
      'updated_at'             => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorPropelChoice(array('model' => 'Customer', 'column' => 'id', 'required' => false)),
      'bar_association_id'     => new sfValidatorPropelChoice(array('model' => 'BarAssociation', 'column' => 'id', 'required' => false)),
      'credit_bar_association' => new sfValidatorBoolean(array('required' => false)),
      'sales_person_id'        => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'mb_client_id'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'icontact_id'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'referral_code'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'referred_by'            => new sfValidatorPropelChoice(array('model' => 'Customer', 'column' => 'id', 'required' => false)),
      'type'                   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'username'               => new sfValidatorString(array('max_length' => 255)),
      'password'               => new sfValidatorString(array('max_length' => 255)),
      'email'                  => new sfValidatorString(array('max_length' => 255)),
      'first_name'             => new sfValidatorString(array('max_length' => 255)),
      'middle_name'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'last_name'              => new sfValidatorString(array('max_length' => 255)),
      'birthdate'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'phone'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fax'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'status'                 => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'last_login'             => new sfValidatorDateTime(array('required' => false)),
      'skill_level'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'created_at'             => new sfValidatorDateTime(array('required' => false)),
      'updated_at'             => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'Customer', 'column' => array('mb_client_id'))),
        new sfValidatorPropelUnique(array('model' => 'Customer', 'column' => array('referral_code'))),
      ))
    );

    $this->widgetSchema->setNameFormat('customer[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Customer';
  }


}
