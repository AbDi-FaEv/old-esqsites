<?php

/*
 * This file is part of the sfTemplatingPlugin package.
 * (c) 2010 Erin Millard <emwebdev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
* Template renderer for standard HTML/PHP templates.
* 
* @package  sfTemplatingPlugin
* @author   Erin Millard <emwebdev@gmail.com>
* @version  $Id: sfTemplatingTemplateRendererHtmlPhp.class.php 30623 2010-08-11 00:04:19Z ezzatron $
*/
class sfTemplatingTemplateRendererHtmlPhp extends sfTemplatingTemplateRendererPhp
{
  /**
  * @var sfParameterHolder
  */
  protected $parameters;
  
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

    $this->parameters = new sfParameterHolder();
    $this->parameters->add($parameters);
    
    $parameters = array_map(array($this, 'escape'), $parameters);

    return parent::evaluate($template, $parameters);
  }
  
  /**
  * Escapes a value using sfOutputEscaper.
  * 
  * @param   mixed  $value  The value to escape
  * 
  * @return  sfOutputEscaper  An escaper instance
  */
  public function escape($value)
  {
    try
    {
      sfContext::getInstance()->getConfiguration()->loadHelpers('Escaping');
    }
    catch (sfException $e) {}
    
    $escapingMethod = array($this, '_escape');
    if (defined('ESC_SPECIALCHARS')) $escapingMethod = ESC_SPECIALCHARS;

    try
    {
      return sfOutputEscaper::escape($escapingMethod, $value);
    }
    catch (sfException $e) {}
    
    return $value;
  }
  
  /**
  * Escapes a value similar to symfony's escaping system
  * 
  * @param   mixed  $value  The value to escape
  * 
  * @return  string  The escaped value
  */
  public function _escape($value)
  {
    return is_string($value) ? htmlspecialchars($value, ENT_QUOTES, sfConfig::get('sf_charset')) : $value;
  }

  /**
  * Retrieves the non-escaped value of a parameter.
  *
  * @param  string  $name     A parameter name
  * @param  mixed   $default  A default parameter value
  *
  * @return  mixed  A raw parameter value, if the parameter exists, otherwise null
  */
  public function getRaw($name, $default = null)
  {
    return $this->parameters->get($name, $default);
  }
  
  /**
  * Retrieves the escaped value of a parameter.
  *
  * @param  string  $name     A parameter name
  * @param  mixed   $default  A default parameter value
  *
  * @return  mixed  An escaped parameter value, if the parameter exists, otherwise null
  */
  public function getEscaped($name, $default = null)
  {
    return $this->escape($this->getRaw($name, $default));
  }
}