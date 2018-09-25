<?php

/**
 *
 * @package    teContactFormRouting
 * @subpackage teFrontPlugin
 * @author     Daniel Richter
 */
class teContactFormRouting
{
  
  static public function addRoute(sfEvent $event)
  {
    $prefix = sfConfig::get("app_teContactFormPlugin_route_prefix", "contact");

    $event->getSubject()->prependRoute('te_contact_form',
    	new sfRoute('/'.$prefix, array("module" => "teContactForm", "action" => "handleForm")));
    		
  }
  
}
