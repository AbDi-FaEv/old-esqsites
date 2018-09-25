<?php

/**
 *
 * @author Richtermeister
 */
class teEventCalendarComponents extends sfComponents
{
  public function executeMinilist()
  {
    $limit = isset($this -> limit) ? $this -> limit : 5;
    $this -> events = teCalendarEventPeer::getCurrent($limit);
  }
}