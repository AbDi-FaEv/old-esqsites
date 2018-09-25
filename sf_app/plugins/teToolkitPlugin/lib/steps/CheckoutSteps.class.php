<?php
/**
 * Description of CheckoutSteps
 *
 * @author Richtermeister
 */
abstract class CheckoutSteps implements ArrayAccess, Iterator
{

  protected $count;
  protected $current;
  protected $step_names = array();

  protected static $instance;

  protected function __construct()
  {
    //build steps
    foreach($this -> step_names as $key => $name)
    {
      $this -> steps[$key] = new CheckoutStep($name, $this -> step_routes[$key]);
    }
  }

  public function getHighest($include_optional = true)
  {
    foreach($this as $step)
    {
      if(!$step -> isAccessible())
      {
        if(!$include_optional && $step -> isOptional())
        {
          continue;
        }
        return isset($previous_step) ? $previous_step : $step;
      }
      $previous_step = $step;
    }
    return isset($previous_step) ? $previous_step : current($this -> steps); //safe than sorry
  }

  public function getHighestIndex()
  {
    return array_search($this -> getHighest(), $this -> steps);
  }

  /**
   *  helper method, because keys are not stored in the step objects
   */
  public function getKeyForStep(CheckoutStep $input_step)
  {
    foreach($this -> step_names as $key => $step)
    {
      if($this -> steps[$key] == $input_step)
      {
        return $key;
      }
    }
  }

  public function setCurrent($step_name)
  {
    //make all other steps NOT current
    foreach($this as $step)
    {
      $step -> setIsCurrent(false);
    }
    if(isset($this -> steps[$step_name]))
    {
      $this -> steps[$step_name] -> setIsCurrent(true);
    }

    return $this; //fluent interface
  }

  public function getCurrent()
  {
    foreach($this -> steps as $step)
    {
      if($step -> isCurrent())
      {
        return $step;
      }
    }
    return $this -> steps[key($this -> steps)]; //safe than sorry
  }

  public function getSteps()
  {
    return $this -> steps;
  }

  public function restrictAll()
  {
    foreach($this -> steps as $step)
    {
      $step -> setIsAccessible(false);
    }
    return $this;
  }

  /**
   *  required for ArrayAccess interface
   */
  public function offsetExists($name)
  {
    return isset($this -> steps[$name]);
  }

  /**
   *  required for ArrayAccess interface
   */
  public function offsetGet($name)
  {
    return $this -> steps[$name];
  }

  /**
   *  required for ArrayAccess interface
   */
  public function offsetSet($name, $value)
  {
    throw new LogicException('Cannot update checkout steps.');
  }

  /**
   *  required for ArrayAccess interface
   */
  public function offsetUnset($offset)
  {
    throw new LogicException('Cannot unset checkout steps.');
  }

  /**
   *  required for Iterator interface
   */
  public function rewind()
  {
    reset($this -> steps);
    $this -> count = count($this -> steps);
  }

  /**
   *  required for Iterator interface
   */
  public function key()
  {
    return key($this -> steps);
  }

  /**
   *  required for Iterator interface
   */
  public function current()
  {
    return current($this -> steps);
  }

  /**
   *  required for Iterator interface
   */
  public function next()
  {
    next($this -> steps);
    --$this -> count;
  }

  /**
   *  required for Iterator interface
   */
  public function valid()
  {
    return $this -> count > 0;
  }
}