<?php

class PluginteCalendarEvent extends BaseteCalendarEvent
{
  public function __toString()
  {
    return $this -> getDate().": ".$this -> getTitle();
  }
}