<?php

/**
 * teTestimonialPlugin configuration.
 * 
 * @package     teTestimonialPlugin
 * @subpackage  config
 * @author      Your name here
 * @version     SVN: $Id: PluginConfiguration.class.php 17207 2009-04-10 15:36:26Z Kris.Wallsmith $
 */
class teTestimonialPluginConfiguration extends sfPluginConfiguration
{
  const VERSION = '1.0.0-DEV';

  /**
   * @see sfPluginConfiguration
   */
  public function initialize()
  {
    if(sfConfig::get('app_teTestimonialsPlugin_register_routes', true) && in_array('teTestimonialAdmin', sfConfig::get('sf_enabled_modules', array())))
    {
      $this->dispatcher->connect('routing.load_configuration', array('teTestimonialRouting', 'addRouteForAdmin'));
    }
  }
}
