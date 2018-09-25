<?php

/**
 * Skeleton subclass for representing a row from the 'esq_coupon_usage' table.
 *
 *
 *
 * @package    propel.generator.lib.model
 */
class CouponUsage extends BaseCouponUsage
{
  public function __toString()
  {
    return $this -> getCouponCode()." - ".$this -> getCouponDescription();
  }

  public function populateFromCoupon(Coupon $coupon)
  {
    return $this -> setCouponCode($coupon -> getCode()) ->
      setCouponDescription($coupon -> getAutoDescription()) ->
      setCouponRawDump(serialize($coupon -> getDataSnapshot()));
  }
} // CouponUsage
