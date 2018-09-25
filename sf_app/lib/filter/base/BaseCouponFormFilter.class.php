<?php

/**
 * Coupon filter form base class.
 *
 * @package    esqsites123
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseCouponFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'code'                             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'                           => new sfWidgetFormFilterInput(),
      'description'                      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'setup'                            => new sfWidgetFormFilterInput(),
      'current_usage'                    => new sfWidgetFormFilterInput(),
      'max_usage'                        => new sfWidgetFormFilterInput(),
      'bar_association_id'               => new sfWidgetFormPropelChoice(array('model' => 'BarAssociation', 'add_empty' => true)),
      'activation_date'                  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'expiration_date'                  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'                       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'                       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'coupon_to_hosting_plan_link_list' => new sfWidgetFormPropelChoice(array('model' => 'WebsiteAttribute', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'code'                             => new sfValidatorPass(array('required' => false)),
      'status'                           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'description'                      => new sfValidatorPass(array('required' => false)),
      'setup'                            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'current_usage'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'max_usage'                        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'bar_association_id'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'BarAssociation', 'column' => 'id')),
      'activation_date'                  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'expiration_date'                  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_at'                       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'                       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'coupon_to_hosting_plan_link_list' => new sfValidatorPropelChoice(array('model' => 'WebsiteAttribute', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('coupon_filters[%s]');

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

    $criteria->addJoin(CouponToHostingPlanLinkPeer::COUPON_ID, CouponPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(CouponToHostingPlanLinkPeer::HOSTING_PLAN_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(CouponToHostingPlanLinkPeer::HOSTING_PLAN_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Coupon';
  }

  public function getFields()
  {
    return array(
      'id'                               => 'Text',
      'code'                             => 'Text',
      'status'                           => 'Number',
      'description'                      => 'Text',
      'setup'                            => 'Number',
      'current_usage'                    => 'Number',
      'max_usage'                        => 'Number',
      'bar_association_id'               => 'ForeignKey',
      'activation_date'                  => 'Date',
      'expiration_date'                  => 'Date',
      'created_at'                       => 'Date',
      'updated_at'                       => 'Date',
      'coupon_to_hosting_plan_link_list' => 'ManyKey',
    );
  }
}
