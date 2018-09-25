<?php

class PageContentDisplayTypePeer extends BasePageContentDisplayTypePeer
{
  public static function getAll()
  {
    $c = new Criteria;
    return self::doSelect($c);
  }
}
