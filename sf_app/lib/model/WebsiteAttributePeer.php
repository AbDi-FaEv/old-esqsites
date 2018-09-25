<?php

class WebsiteAttributePeer extends BaseWebsiteAttributePeer
{
  public static function getActive()
  {
    return self::doSelect(self::getActiveCriteria());
  }

  public static function getActiveCriteria()
  {
    $c = new Criteria;
    $c -> add(self::STATUS, WebsiteAttribute::STATUS_ACTIVE);
    return $c;
  }
}
