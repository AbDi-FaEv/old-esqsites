<?php

class PagePeer extends BasePagePeer
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

  public static function retrieveByWebsiteAndUrl($website_id, $url)
  {
    $c = new Criteria();
    $c -> add(self::WEBSITE_ID, $website_id);
    $c -> add(self::URL, $url);
    return self::doSelectOne($c);
  }
}
