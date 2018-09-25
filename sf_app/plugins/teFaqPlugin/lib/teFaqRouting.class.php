<?php

/**
 *
 * @package    teFaq
 * @subpackage plugin
 * @author     Daniel Richter
 */
class teFaqRouting
{

  static public function addRouteForAdmin(sfEvent $event)
  {
    $prefix = sfConfig::get('app_teFaqPlugin_admin_route_prefix', 'faqs');

    $event->getSubject()->prependRoute('te_faq_admin', new sfPropelRouteCollection(array(
      'name'                 => 'te_faq_admin',
      'model'                => 'teFaq',
      'module'               => 'teFaqAdmin',
      'prefix_path'          => $prefix,
      'with_wildcard_routes' => true,
      'requirements'         => array(),
    )));
  }
  
  static public function addRouteForFront(sfEvent $event)
  {
    $prefix = sfConfig::get('app_teFaqPlugin_route_prefix', 'faq');

    $event->getSubject()->prependRoute('te_faq', 
    	new sfPropelRoute('/faq', array("module" => "teFaq", "action" => "index"), array(), 
    		array("model" => "teFaq", "type" => "list")));

  }
  
}
