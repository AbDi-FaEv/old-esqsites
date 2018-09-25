<?php

if(sfConfig::get('app_teEventCalendarPlugin_register_routes', true) && in_array('teEventCalendarAdmin', sfConfig::get('sf_enabled_modules', array())))
{
  $this->dispatcher->connect('routing.load_configuration', array('teEventCalendarRouting', 'addRouteForAdmin'));
}

if(sfConfig::get('app_teEventCalendarPlugin_register_routes', true) && in_array('teEventCalendar', sfConfig::get('sf_enabled_modules', array())))
{
  $this->dispatcher->connect('routing.load_configuration', array('teEventCalendarRouting', 'addRouteForFront'));
}
