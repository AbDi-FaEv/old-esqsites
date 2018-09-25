<?php

/*
 * This file is part of the sfTemplatingPlugin package.
 * (c) 2010 Erin Millard <emwebdev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
* Wraps the standard template filesystem loader to provide extra functionality.
* 
* @package  sfTemplatingPlugin
* @author   Erin Millard <emwebdev@gmail.com>
* @version  $Id$
*/
class sfTemplatingTemplateLoaderFilesystem extends sfTemplateLoaderFilesystem
{
  /**
  * Constructor.
  *
  * @param  array   $templatePathPatterns  An array of path patterns to look for templates
  * @param  array   $templateDirs          An array of base paths where templates are stored, automatically set if not passed
  */
  public function __construct($templatePathPatterns = null, $templateDirs = null)
  {
    // prefix path unless null was explicitly passed
    if (null === $templateDirs && func_num_args() < 2)
    {
      $templateDirs = array(
        sfConfig::get('sf_template_dir', sfConfig::get('sf_root_dir').'/templates'),
      );
    }

    if (null === $templatePathPatterns)
    {
      $templatePathPatterns = array(
        '%name%.php',
      );
    }
    
    if ($templateDirs)
    {
      $templateDirs = (array)$templateDirs;
      $templatePathPatterns = (array)$templatePathPatterns;
      $tmpTemplatePathPatterns = $templatePathPatterns;
      $templatePathPatterns = array();
      
      foreach ($templateDirs as $templateDir)
      {
        foreach ($tmpTemplatePathPatterns as $templatePathPattern)
        {
          $templatePathPatterns[] = $templateDir.DIRECTORY_SEPARATOR.$templatePathPattern;
        }
      }
    }

    parent::__construct($templatePathPatterns);
  }
}