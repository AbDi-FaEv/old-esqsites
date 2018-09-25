<?php
/**
 * Description of teTab
 *
 * @author Richtermeister
 */
class teTab
{
  protected $route;
  protected $label;
  protected $module;
  protected $credentials;

  public function __construct($route, $params = array())
  {
    $this -> route = $route;
    $this -> label = isset($params["label"]) ? $params["label"] : $route;
    $this -> module = isset($params["module"]) ? $params["module"] : null;
    $this -> credentials = isset($params["credentials"]) ? $params["credentials"] : null;
  }

  public function getRoute()
  {
    return $this -> route;
  }

  public function getLabel()
  {
    return $this -> label;
  }

  public function getModule()
  {
    return $this -> module;
  }

  public function getCredentials()
  {
    return $this -> credentials;
  }
}