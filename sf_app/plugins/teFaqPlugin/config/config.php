<?php

if(sfConfig::get('app_te_faq_plugin_routes_register', true) && in_array('teFaqAdmin', sfConfig::get('sf_enabled_modules', array())))
{
  $this->dispatcher->connect('routing.load_configuration', array('teFaqRouting', 'addRouteForAdmin'));
}

if(sfConfig::get('app_te_faq_plugin_routes_register', true) && in_array('teFaq', sfConfig::get('sf_enabled_modules', array())))
{
  $this->dispatcher->connect('routing.load_configuration', array('teFaqRouting', 'addRouteForFront'));
}