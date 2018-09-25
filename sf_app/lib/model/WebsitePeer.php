<?php

class WebsitePeer extends BaseWebsitePeer
{
  public static function getActiveCriteria()
  {
    $c = new Criteria();
    $c -> add(WebsitePeer::STATUS, Website::STATUS_ACTIVE);
    $c -> add(WebsitePeer::TYPE, Website::STATUS_ACTIVE);
    $c -> addAscendingOrderByColumn(WebsitePeer::WEBSITE_NAME);
    return $c;
  }

  public static function retrieveByPath($path, $active = true)
  {
    $c = new Criteria();
    $c -> add(self::PATH, $path);
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

  public static function retrievePreviewWebsite()
  {
    if(!$website = WebsitePeer::retrieveByPk(sfConfig::get("app_preview_website_id")))
    {
      throw new sfException("No preview website id set, or website does not exist");
    }
    return $website;
  }
}
