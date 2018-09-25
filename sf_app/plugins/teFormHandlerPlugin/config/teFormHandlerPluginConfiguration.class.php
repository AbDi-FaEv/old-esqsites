<?php

/**
 * teFormHandlerPlugin configuration.
 * 
 * @package     teFormHandlerPlugin
 * @subpackage  config
 * @author      Richtermeister
 * @version     SVN: $Id: PluginConfiguration.class.php 17207 2009-04-10 15:36:26Z Kris.Wallsmith $
 */
class teFormHandlerPluginConfiguration extends sfPluginConfiguration
{
  const VERSION = '1.0.0-DEV';

  /**
   * @see sfPluginConfiguration
   */
  public function initialize()
  {
    if(in_array('teFormSubmissionAdmin', sfConfig::get('sf_enabled_modules', array())))
    {
      $this->dispatcher->connect('routing.load_configuration', array('teFormHandlerRouting', 'addAdminRoutes'));
    }

    if(in_array('teFormHandler', sfConfig::get('sf_enabled_modules', array())))
    {
      $this->dispatcher->connect('routing.load_configuration', array('teFormHandlerRouting', 'addFrontRoutes'));
    }
  }
}
