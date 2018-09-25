<?php

/**
 * WebsiteAttribute filter form base class.
 *
 * @package    esqsites123
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseWebsiteAttributeFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'cg_code'                          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rank'                             => new sfWidgetFormFilterInput(),
      'description'                      => new sfWidgetFormFilterInput(),
      'max_main_menu_pages'              => new sfWidgetFormFilterInput(),
      'max_emails'                       => new sfWidgetFormFilterInput(),
      'price'                            => new sfWidgetFormFilterInput(),
      'setup_price'                      => new sfWidgetFormFilterInput(),
      'status'                           => new sfWidgetFormFilterInput(),
      'includes_payment_page'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'coupon_to_hosting_plan_link_list' => new sfWidgetFormPropelChoice(array('model' => 'Coupon', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'cg_code'                          => new sfValidatorPass(array('required' => false)),
      'rank'                             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'description'                      => new sfValidatorPass(array('required' => false)),
      'max_main_menu_pages'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'max_emails'                       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'price'                            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'setup_price'                      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'status'                           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'includes_payment_page'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'coupon_to_hosting_plan_link_list' => new sfValidatorPropelChoice(array('model' => 'Coupon', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('website_attribute_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addCouponToHostingPlanLinkListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(CouponToHostingPlanLinkPeer::HOSTING_PLAN_ID, WebsiteAttributePeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(CouponToHostingPlanLinkPeer::COUPON_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(CouponToHostingPlanLinkPeer::COUPON_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'WebsiteAttribute';
  }

  public function getFields()
  {
    return array(
      'id'                               => 'Text',
      'cg_code'                          => 'Text',
      'rank'                             => 'Number',
      'description'                      => 'Text',
      'max_main_menu_pages'              => 'Number',
      'max_emails'                       => 'Number',
      'price'                            => 'Number',
      'setup_price'                      => 'Number',
      'status'                           => 'Number',
      'includes_payment_page'            => 'Boolean',
      'coupon_to_hosting_plan_link_list' => 'ManyKey',
    );
  }
}
