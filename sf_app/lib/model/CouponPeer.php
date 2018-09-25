<?php

class CouponPeer extends BaseCouponPeer
{
  public static function codeExists($code)
  {
    $c = new Criteria();
    $c -> add(self::CODE, $code);
    return self::doCount($c) > 0;
  }

  public static function doSelectActive($c = null)
  {
    $c = (null == $c) ? new Criteria() : clone $c;
    $c -> add(self::STATUS, Coupon::STATUS_ACTIVE);
    return self::doSelect($c);
  }

  public static function retrieveActiveByCodeAndPlan($code, $plan)
  {
    $c = new Criteria();
    $c -> add(self::STATUS, Coupon::STATUS_ACTIVE);
    $c -> add(self::CODE, $code);
    $c -> add(self::WEBSITE_ATTRIBUTE_ID, $plan);
    return self::doSelectOne($c);
  }

  public static function generatePk()
  {
    do
    {
      $pk = substr(md5(rand()), 0, 32);
    }
    while(self::retrieveByPk($pk));

    return $pk;
  }
}
