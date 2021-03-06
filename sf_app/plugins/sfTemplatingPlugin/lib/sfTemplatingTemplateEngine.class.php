<?php

/*
 * This file is part of the sfTemplatingPlugin package.
 * (c) 2010 Erin Millard <emwebdev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
* Wraps the standard template engine to provide extra functionality.
* 
* @package  sfTemplatingPlugin
* @author   Erin Millard <emwebdev@gmail.com>
* @version  $Id: sfTemplatingTemplateEngine.class.php 31854 2011-01-19 05:30:46Z ezzatron $
*/
class sfTemplatingTemplateEngine extends sfTemplateEngine
{
  /**
  * Constructor.
  *
  * @param  sfTemplateLoaderInterface  $loader     A loader instance
  * @param  array                      $renderers  An array of renderer instances
  * @param  sfTemplateHelperSet        $helperSet  A helper set instance
  */
  public function __construct(sfTemplateLoaderInterface $loader = null, array $renderers = null, sfTemplateHelperSet $helperSet = null)
  {
    if (null === $loader) $loader = new sfTemplatingTemplateLoaderFilesystem();
    if (null === $renderers) $renderers = array();
    
    if (!array_key_exists('php', $renderers))
    {
      $renderers['php'] = new sfTemplatingTemplateRendererPhp();
    }
    
    parent::__construct($loader, $renderers, $helperSet);
  }
}
