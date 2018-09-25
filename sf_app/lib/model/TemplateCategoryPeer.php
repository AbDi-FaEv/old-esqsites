<?php

class TemplateCategoryPeer extends BaseTemplateCategoryPeer
{
  public static function getAll()
  {
    return self::doSelect(new Criteria);
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

  public static function getActive()
  {
    $c = new Criteria();
    $c -> addJoin(self::ID, WebsiteTemplatePeer::CATEGORY_ID);
    return self::doSelect($c);
  }
}
