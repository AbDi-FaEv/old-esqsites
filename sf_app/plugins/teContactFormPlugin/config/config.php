<?php

if(sfConfig::get('app_teContactFormPlugin_register_routes', true) && in_array('teContactForm', sfConfig::get('sf_enabled_modules', array())))
{
  $this->dispatcher->connect('routing.load_configuration', array('teContactFormRouting', 'addRoute'));
}