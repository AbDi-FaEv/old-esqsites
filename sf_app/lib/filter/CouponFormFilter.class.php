<?php

/**
 * Coupon filter form.
 *
 * @package    esqsites123
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class CouponFormFilter extends BaseCouponFormFilter
{
  public function configure()
  {
    $status_choices = array("" => "-- Any") + Coupon::getStates();
    $this -> widgetSchema["status"] = new sfWidgetFormChoice(array("choices" => $status_choices));
    $this -> validatorSchema["status"] = new sfValidatorChoice(array("choices" => array_keys(Coupon::getStates()), "required" => false));
  }
  
  public function getFields()
  {
    $fields = parent::getFields();
    $fields["status"] = "ForeignKey";
    return $fields;
  }
}
