<?php

/**
 * Website form base class.
 *
 * @method Website getObject() Returns the current form's model object
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseWebsiteForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'cg_id'                   => new sfWidgetFormInputText(),
      'cim_customer_profile_id' => new sfWidgetFormInputText(),
      'cim_payment_profile_id'  => new sfWidgetFormInputText(),
      'customer_id'             => new sfWidgetFormPropelChoice(array('model' => 'Customer', 'add_empty' => false)),
      'type'                    => new sfWidgetFormInputText(),
      'rank'                    => new sfWidgetFormInputText(),
      'firm_name'               => new sfWidgetFormInputText(),
      'firm_type'               => new sfWidgetFormInputText(),
      'website_name'            => new sfWidgetFormInputText(),
      'primary_domain_id'       => new sfWidgetFormPropelChoice(array('model' => 'Domain', 'add_empty' => true)),
      'email'                   => new sfWidgetFormInputText(),
      'address'                 => new sfWidgetFormInputText(),
      'city'                    => new sfWidgetFormInputText(),
      'state'                   => new sfWidgetFormInputText(),
      'zip'                     => new sfWidgetFormInputText(),
      'phone'                   => new sfWidgetFormInputText(),
      'fax'                     => new sfWidgetFormInputText(),
      'template_id'             => new sfWidgetFormPropelChoice(array('model' => 'WebsiteTemplate', 'add_empty' => true)),
      'website_attribute_id'    => new sfWidgetFormPropelChoice(array('model' => 'WebsiteAttribute', 'add_empty' => true)),
      'status'                  => new sfWidgetFormInputText(),
      'path'                    => new sfWidgetFormInputText(),
      'host_id'                 => new sfWidgetFormPropelChoice(array('model' => 'Host', 'add_empty' => false)),
      'analytics_code'          => new sfWidgetFormInputText(),
      'payment_account_id'      => new sfWidgetFormInputText(),
      'meta_description'        => new sfWidgetFormInputText(),
      'meta_keywords'           => new sfWidgetFormInputText(),
      'social_media'            => new sfWidgetFormTextarea(),
      'last_payment_update'     => new sfWidgetFormDateTime(),
      'last_billing_date'       => new sfWidgetFormDate(),
      'cancelled_at'            => new sfWidgetFormDateTime(),
      'created_at'              => new sfWidgetFormDateTime(),
      'updated_at'              => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorPropelChoice(array('model' => 'Website', 'column' => 'id', 'required' => false)),
      'cg_id'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cim_customer_profile_id' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cim_payment_profile_id'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'customer_id'             => new sfValidatorPropelChoice(array('model' => 'Customer', 'column' => 'id')),
      'type'                    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'rank'                    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'firm_name'               => new sfValidatorString(array('max_length' => 255)),
      'firm_type'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'website_name'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'primary_domain_id'       => new sfValidatorPropelChoice(array('model' => 'Domain', 'column' => 'id', 'required' => false)),
      'email'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'address'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'city'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'state'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'zip'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'phone'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fax'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'template_id'             => new sfValidatorPropelChoice(array('model' => 'WebsiteTemplate', 'column' => 'id', 'required' => false)),
      'website_attribute_id'    => new sfValidatorPropelChoice(array('model' => 'WebsiteAttribute', 'column' => 'id', 'required' => false)),
      'status'                  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'path'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'host_id'                 => new sfValidatorPropelChoice(array('model' => 'Host', 'column' => 'id')),
      'analytics_code'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'payment_account_id'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'meta_description'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'meta_keywords'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'social_media'            => new sfValidatorString(array('required' => false)),
      'last_payment_update'     => new sfValidatorDateTime(array('required' => false)),
      'last_billing_date'       => new sfValidatorDate(array('required' => false)),
      'cancelled_at'            => new sfValidatorDateTime(array('required' => false)),
      'created_at'              => new sfValidatorDateTime(array('required' => false)),
      'updated_at'              => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'Website', 'column' => array('customer_id', 'firm_name'))),
        new sfValidatorPropelUnique(array('model' => 'Website', 'column' => array('host_id', 'path'))),
      ))
    );

    $this->widgetSchema->setNameFormat('website[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Website';
  }


}
