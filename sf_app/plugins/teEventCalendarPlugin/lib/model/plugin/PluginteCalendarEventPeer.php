<?php

class PluginteCalendarEventPeer extends BaseteCalendarEventPeer
{
  public static function getCurrent($limit = null)
  {
    
    $c = new Criteria;
    $c -> add(self::IS_PUBLISHED, true);
    $c -> add(self::DATE, time(), Criteria::GREATER_EQUAL);
    $c -> addAscendingOrderByColumn(self::DATE);
    
    if($limit)
    {
      $c -> setLimit($limit);
    }
    return self::doSelect($c);
    
  }

}
