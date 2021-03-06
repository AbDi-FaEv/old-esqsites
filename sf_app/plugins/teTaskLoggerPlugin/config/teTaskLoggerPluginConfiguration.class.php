<?php

/**
 * teTaskLoggerPlugin configuration.
 * 
 * @package     teTaskLoggerPlugin
 * @subpackage  config
 * @author      Your name here
 * @version     SVN: $Id: PluginConfiguration.class.php 17207 2009-04-10 15:36:26Z Kris.Wallsmith $
 */
class teTaskLoggerPluginConfiguration extends sfPluginConfiguration
{
  const VERSION = '1.0.0-DEV';

  /**
   * @see sfPluginConfiguration
   */
  public function initialize()
  {
    if(sfConfig::get('app_teTaskLoggerPlugin_routes_register', true) && in_array('teTaskLogs', sfConfig::get('sf_enabled_modules', array())))
    {
      $this->dispatcher->connect('routing.load_configuration', array('teTaskLoggerRouting', 'addRoute'));
    }
  }
}
