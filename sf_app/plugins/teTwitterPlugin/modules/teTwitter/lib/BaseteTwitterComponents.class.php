<?php
/**
 * Description of BaseteTwitterComponents
 *
 * @author Richtermeister
 */
class BaseteTwitterComponents extends sfComponents
{
  public function executeRecent()
  {
    $url = sfConfig::get("app_teTwitterPlugin_feed");
    
    try
    {
      $this -> feed = sfFeedPeer::createFromWeb($url);
      $this -> feed = sfFeedPeer::aggregate(array($this -> feed), array("limit" => sfConfig::get("app_teTwitterPlugin_limit", 5)));
    }
    catch(Exception $e)
    {
      $this -> feed = false;
      return sfView::SUCCESS;
    }
  }
}