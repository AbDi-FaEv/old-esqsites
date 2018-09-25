<?php
/**
 *
 * @author Richtermeister
 */
class esqValidatorSimpleCouponCode extends sfValidatorString
{
  protected function configure($options = array(), $messages = array())
  {
    parent::configure($options, $messages);

    $this -> setMessage('invalid', 'This code does not exist in the system.');
  }

  public function doClean($value)
  {
    $code = strtoupper(parent::doClean($value));

    if(!$coupon = CouponQuery::create() -> findOneByCode($code))
    {
      throw new sfValidatorError($this, 'invalid');
    }

    return $coupon;
  }
}