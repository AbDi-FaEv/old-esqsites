<?php

/**
 * Website filter form base class.
 *
 * @package    esqsites123
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseWebsiteFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'cg_id'                   => new sfWidgetFormFilterInput(),
      'cim_customer_profile_id' => new sfWidgetFormFilterInput(),
      'cim_payment_profile_id'  => new sfWidgetFormFilterInput(),
      'customer_id'             => new sfWidgetFormPropelChoice(array('model' => 'Customer', 'add_empty' => true)),
      'type'                    => new sfWidgetFormFilterInput(),
      'rank'                    => new sfWidgetFormFilterInput(),
      'firm_name'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'firm_type'               => new sfWidgetFormFilterInput(),
      'website_name'            => new sfWidgetFormFilterInput(),
      'primary_domain_id'       => new sfWidgetFormPropelChoice(array('model' => 'Domain', 'add_empty' => true)),
      'email'                   => new sfWidgetFormFilterInput(),
      'address'                 => new sfWidgetFormFilterInput(),
      'city'                    => new sfWidgetFormFilterInput(),
      'state'                   => new sfWidgetFormFilterInput(),
      'zip'                     => new sfWidgetFormFilterInput(),
      'phone'                   => new sfWidgetFormFilterInput(),
      'fax'                     => new sfWidgetFormFilterInput(),
      'template_id'             => new sfWidgetFormPropelChoice(array('model' => 'WebsiteTemplate', 'add_empty' => true)),
      'website_attribute_id'    => new sfWidgetFormPropelChoice(array('model' => 'WebsiteAttribute', 'add_empty' => true)),
      'status'                  => new sfWidgetFormFilterInput(),
      'path'                    => new sfWidgetFormFilterInput(),
      'host_id'                 => new sfWidgetFormPropelChoice(array('model' => 'Host', 'add_empty' => true)),
      'analytics_code'          => new sfWidgetFormFilterInput(),
      'payment_account_id'      => new sfWidgetFormFilterInput(),
      'meta_description'        => new sfWidgetFormFilterInput(),
      'meta_keywords'           => new sfWidgetFormFilterInput(),
      'social_media'            => new sfWidgetFormFilterInput(),
      'last_payment_update'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'last_billing_date'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'cancelled_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'cg_id'                   => new sfValidatorPass(array('required' => false)),
      'cim_customer_profile_id' => new sfValidatorPass(array('required' => false)),
      'cim_payment_profile_id'  => new sfValidatorPass(array('required' => false)),
      'customer_id'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Customer', 'column' => 'id')),
      'type'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'rank'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'firm_name'               => new sfValidatorPass(array('required' => false)),
      'firm_type'               => new sfValidatorPass(array('required' => false)),
      'website_name'            => new sfValidatorPass(array('required' => false)),
      'primary_domain_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Domain', 'column' => 'id')),
      'email'                   => new sfValidatorPass(array('required' => false)),
      'address'                 => new sfValidatorPass(array('required' => false)),
      'city'                    => new sfValidatorPass(array('required' => false)),
      'state'                   => new sfValidatorPass(array('required' => false)),
      'zip'                     => new sfValidatorPass(array('required' => false)),
      'phone'                   => new sfValidatorPass(array('required' => false)),
      'fax'                     => new sfValidatorPass(array('required' => false)),
      'template_id'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'WebsiteTemplate', 'column' => 'id')),
      'website_attribute_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'WebsiteAttribute', 'column' => 'id')),
      'status'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'path'                    => new sfValidatorPass(array('required' => false)),
      'host_id'                 => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Host', 'column' => 'id')),
      'analytics_code'          => new sfValidatorPass(array('required' => false)),
      'payment_account_id'      => new sfValidatorPass(array('required' => false)),
      'meta_description'        => new sfValidatorPass(array('required' => false)),
      'meta_keywords'           => new sfValidatorPass(array('required' => false)),
      'social_media'            => new sfValidatorPass(array('required' => false)),
      'last_payment_update'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'last_billing_date'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'cancelled_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('website_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Website';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Text',
      'cg_id'                   => 'Text',
      'cim_customer_profile_id' => 'Text',
      'cim_payment_profile_id'  => 'Text',
      'customer_id'             => 'ForeignKey',
      'type'                    => 'Number',
      'rank'                    => 'Number',
      'firm_name'               => 'Text',
      'firm_type'               => 'Text',
      'website_name'            => 'Text',
      'primary_domain_id'       => 'ForeignKey',
      'email'                   => 'Text',
      'address'                 => 'Text',
      'city'                    => 'Text',
      'state'                   => 'Text',
      'zip'                     => 'Text',
      'phone'                   => 'Text',
      'fax'                     => 'Text',
      'template_id'             => 'ForeignKey',
      'website_attribute_id'    => 'ForeignKey',
      'status'                  => 'Number',
      'path'                    => 'Text',
      'host_id'                 => 'ForeignKey',
      'analytics_code'          => 'Text',
      'payment_account_id'      => 'Text',
      'meta_description'        => 'Text',
      'meta_keywords'           => 'Text',
      'social_media'            => 'Text',
      'last_payment_update'     => 'Date',
      'last_billing_date'       => 'Date',
      'cancelled_at'            => 'Date',
      'created_at'              => 'Date',
      'updated_at'              => 'Date',
    );
  }
}
