<?php
/**
 * Description of CheckoutStep
 *
 * @author Richtermeister
 */
class CheckoutStep
{
  protected $name;
  protected $route;
  protected $is_current = false;
  protected $is_accessible = false;
  protected $is_optional = false;
  
  public function __construct($name, $route)
  {
    $this -> name = $name;
    $this -> route = $route;
  }

  public function getRoute()
  {
    return $this -> route;
  }

  public function __toString()
  {
    return $this -> name;
  }

  public function isCurrent()
  {
    return $this -> is_current;
  }

  public function setIsCurrent($flag)
  {
    $this -> is_current = $flag;
  }

  public function isOptional()
  {
    return $this -> is_optional;
  }

  public function setIsOptional($flag)
  {
    $this -> is_optional = $flag;
  }

  public function isAccessible()
  {
    return $this -> is_accessible;
  }

  public function setIsAccessible($flag)
  {
    $this -> is_accessible = $flag;
  }

  
}