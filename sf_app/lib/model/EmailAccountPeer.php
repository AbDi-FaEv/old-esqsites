<?php

class EmailAccountPeer extends BaseEmailAccountPeer
{
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
