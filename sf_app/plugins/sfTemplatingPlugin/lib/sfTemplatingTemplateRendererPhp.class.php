<?php

/*
 * This file is part of the sfTemplatingPlugin package.
 * (c) 2010 Erin Millard <emwebdev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
* Wraps the standard PHP template renderer to provide extra functionality.
* 
* @package  sfTemplatingPlugin
* @author   Erin Millard <emwebdev@gmail.com>
* @version  $Id: sfTemplatingTemplateRendererPhp.class.php 30623 2010-08-11 00:04:19Z ezzatron $
*/
class sfTemplatingTemplateRendererPhp extends sfTemplateRendererPhp
{
  /**
  * @var boolean
  */
  protected static $helpersLoaded = false;
  
  /**
  * @var boolean
  */
  protected static $isNested = false;
  
  /**
  * @var string
  */
  protected $layout;
  
  /**
  * Constructor.
  * 
  * @param  string  $layout  The name of the layout template to extend, automatically set if not passed
  */
  public function __construct($layout = null)
  {
    // extend layout unless null was explicitly passed
    if (null === $layout && func_num_args() < 1)
    {
      $layout = sfConfig::get('app_sf_templating_plugin_layout', 'layout');
    }
    
    $this->layout = $layout;
  }
  
  /**
  * Evaluates a template.
  *
  * @param  sfTemplateStorage  $template    The template to render
  * @param  array              $parameters  An array of parameters to pass to the template
  *
  * @return  string|false  The evaluated template, or false if the renderer is unable to render the template
  */
  public function evaluate(sfTemplateStorage $template, array $parameters = null)
  {
    if (null === $parameters) $parameters = array();

    self::loadCoreAndStandardHelpers();

    if ($this->layout && !self::$isNested)
    {
      $layoutNameParts = explode(':', $this->layout);
      $layoutName = array_pop($layoutNameParts);

      if (strpos((string)$template, $layoutName) === false)
      {
        $this->extend($this->layout);
      }
    }
    
    self::$isNested = true;
    $result = parent::evaluate($template, $parameters);
    self::$isNested = false;

    return $result;
  }
  
  /**
  * Loads the core symfony helpers, and those defined in configuration as 'standard helpers'.
  */
  public static function loadCoreAndStandardHelpers()
  {
    if (self::$helpersLoaded) return;
    self::$helpersLoaded = true;
    
    $helpers = array_unique(array_merge(
      array('Helper', 'Url', 'Asset', 'Tag', 'Escaping'),
      sfConfig::get('sf_standard_helpers', array())
    ));

    try
    {
      sfContext::getInstance()->getConfiguration()->loadHelpers($helpers);
    }
    catch (sfException $e) {}
  }
}