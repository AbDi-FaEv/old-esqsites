<?php
/**
 * Description of esqCouponValidator
 *
 * @author Richtermeister
 */
class esqValidatorCouponCode extends sfValidatorBase
{
  protected function configure($options = array(), $messages = array())
  {
    $this -> setMessage('invalid', 'This code is invalid.');
    $this -> addMessage('expired', 'This coupon has expired.');
    $this -> addMessage('not_active_yet', 'This coupon is not active yet.');
    $this -> addMessage('invalid_plan', 'This coupon does not apply for the hosting plan you selected.');
  }

  public function doClean($values)
  {
    $code = strtoupper($values["coupon_code"]);
    $plan_id = $values["website_info"]["plan"];

    //other validators would need to catch this
    if(!$code || !$plan_id)
    {
      return $values;
    }

    if(!$coupon = CouponQuery::create() -> filterByStatus(Coupon::STATUS_ACTIVE) -> findOneByCode($code))
    {
      $error = new sfValidatorError($this, 'invalid');
      throw new sfValidatorErrorSchema($this, array('coupon_code' => $error));
    }

    $plan = HostingPlanQuery::create() -> findPk($plan_id);

    if(CouponQuery::create() -> filterByHostingPlan($plan) -> filterByCode($code) -> count() == 0)
    {
      $error = new sfValidatorError($this, 'invalid_plan');
      throw new sfValidatorErrorSchema($this, array('coupon_code' => $error));
    }

    //test for expired
    if($coupon -> getExpirationDate() && ($coupon -> getExpirationDate('U') < time()))
    {
      $error = new sfValidatorError($this, 'expired');
      throw new sfValidatorErrorSchema($this, array('coupon_code' => $error));
    }

    //test for expired
    if($coupon -> getActivationDate() && ($coupon -> getActivationDate('U') > time()))
    {
      $error = new sfValidatorError($this, 'not_active_yet');
      throw new sfValidatorErrorSchema($this, array('coupon_code' => $error));
    }

    $values["coupon"] = $coupon;
    return $values;
  }
}