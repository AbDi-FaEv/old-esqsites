<?php

class CustomerPeer extends BaseCustomerPeer
{
  public static function getActiveCriteria($c = null)
  {
    if(null == $c)
    {
      $c = new Criteria();
    }
    $c -> add(self::STATUS, Customer::STATUS_ACTIVE);
    $c -> add(self::TYPE, array(Customer::TYPE_REGULAR, Customer::TYPE_TEST), Criteria::IN);

    return $c;
  }
  
  public static function retrieveByUsername($username, $active = true)
  {
    $c = new Criteria();
    $c -> add(self::USERNAME, $username);
    if($active)
    {
      $c -> add(self::STATUS, Customer::STATUS_ACTIVE);
    }
    return self::doSelectOne($c);
  }

  public static function retrieveByMbClientId($id)
  {
    $c = new Criteria();
    $c -> add(self::MB_CLIENT_ID, $id);
    return self::doSelectOne($c);
  }

  public static function retrieveByMbClientIds($ids)
  {
    $c = new Criteria();
    $c -> add(self::MB_CLIENT_ID, $ids, Criteria::IN);
    return self::doSelect($c);
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

  public static function validateUniqueEmail(sfValidatorBase $validator, $value)
  {
    $c = self::getActiveCriteria();
    $c -> add(self::EMAIL, $value);
    return self::doCount($c) == 0;
  }

  public static function validateUniqueUsername(sfValidatorBase $validator, $value)
  {
    $c = self::getActiveCriteria();
    $c -> add(self::USERNAME, $value);
    return self::doCount($c) == 0;
  }

  public function getActive()
  {
    $c = self::getActiveCriteria();
    return self::doSelect($c);
  }
}
