<?php
/**
 *
 * @author Richtermeister
 */
class teLinkNodeRenderer implements teNodeRendererInterface
{
  protected $route;
  protected $label_method;
  protected $options;

  public function __construct($route, $label_method = null, $options = array(), $attributes = array())
  {
    $this -> route = $route;
    $this -> options = $options;
    $this -> attributes = $attributes;
    $this -> label_method = $label_method;
  }

  public function render($node)
  {
    $label = ($this -> label_method) ? call_user_func(array($node, $this -> label_method)) : (string) $node;
    return link_to($label, $this -> route, $node, $this -> getNodeAttributes($node));
  }

  public function getNodeAttributes($node)
  {
    return $this -> attributes;
  }

  public function getOptions()
  {
    return $this -> options;
  }

  public function setOption($option, $value)
  {
    $this -> options[$option] = $value;
  }

  public function getOption($option, $default = null)
  {
    if(isset($this -> options[$option]))
    {
      return $this -> options[$option];
    }
    return $default;
  }
}