<?php

/**
 *
 * @package    teEventCalendar
 * @subpackage plugin
 * @author     Daniel Richter
 */
class teEventCalendarRouting
{

  static public function addRouteForAdmin(sfEvent $event)
  {
    $prefix = sfConfig::get("app_teEventCalendarPlugin_route_prefix_admin", sfConfig::get("app_teEventCalendarPlugin_route_prefix", "events"));

    $event->getSubject()->prependRoute('te_event_calendar_admin', new sfPropelRouteCollection(array(
      'name'                 => 'te_event_calendar_admin',
      'model'                => 'teCalendarEvent',
      'module'               => 'teEventCalendarAdmin',
      'prefix_path'          => $prefix,
      'with_wildcard_routes' => true,
      'requirements'         => array(),
    )));

  }
  
  static public function addRouteForFront(sfEvent $event)
  {
    
    $prefix = sfConfig::get("app_teEventCalendarPlugin_route_prefix", "events");

    $event->getSubject()->prependRoute('te_calendar_event_list',
    	new sfPropelRoute('/'.$prefix,
          array("module" => "teEventCalendar", "action" => "index"),
          array(), //no requirements
          array("model" => "teCalendarEvent", "type" => "list")));

    $event->getSubject()->prependRoute('te_calendar_event_date',
    	new sfPropelRoute('/'.$prefix.'/:date',
          array("module" => "teEventCalendar", "action" => "showDate"),
          array(), //no requirements
          array("model" => "teCalendarEvent", "type" => "list")));

    $event->getSubject()->prependRoute('te_calendar_event_show',
    	new sfPropelRoute('/'.$prefix.'/:date/:slug',
          array("module" => "teEventCalendar", "action" => "show"),
          array(), //no requirements
          array("model" => "teCalendarEvent", "type" => "object")));
  }
  
}