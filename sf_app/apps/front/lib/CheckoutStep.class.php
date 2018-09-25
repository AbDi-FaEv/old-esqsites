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
  protected $is_completed = false;
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

  public function isCompleted()
  {
    return $this -> is_completed;
  }

  public function setIsCompleted($flag)
  {
    $this -> is_completed = $flag;
  }

  
}