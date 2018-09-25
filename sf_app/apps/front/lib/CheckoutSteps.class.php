<?php
/**
 * Description of CheckoutSteps
 *
 * @author Richtermeister
 */
class CheckoutSteps implements ArrayAccess, Iterator
{
  const STEP_GALLERY = 'gallery';
  const STEP_PLANS = 'plans';
  const STEP_INFO = 'info';
  const STEP_PREVIEW = 'preview';
  const STEP_CHECKOUT = 'checkout';

  protected $count;
  protected $current;
  protected static $instance;

  protected $step_names = array(
    self::STEP_GALLERY => "Select Design",
    self::STEP_PLANS => "Choose Hosting",
    self::STEP_INFO => "Enter Info",
    self::STEP_PREVIEW => "Preview Your Site",
    self::STEP_CHECKOUT => "Checkout"
  );

  protected $step_routes = array(
    self::STEP_GALLERY => "@gallery",
    self::STEP_PLANS => "@plans",
    self::STEP_INFO => "@preview_info",
    self::STEP_PREVIEW => "@preview",
    self::STEP_CHECKOUT => "@checkout"
  );

  protected function __construct(sfUser $user)
  {
    //build steps
    foreach($this -> step_names as $key => $name)
    {
      $this -> steps[$key] = new CheckoutStep($name, $this -> step_routes[$key]);
    }

    //we don't want to force people to preview if they want to skip to checkout..
    $this -> steps[self::STEP_PREVIEW] -> setIsOptional(true);

    if($user -> hasTemporaryWebsite())
    {
      $website = $user -> getTemporaryWebsite();
      if(null != $website -> getTemplateId())
      {
        $this -> steps[self::STEP_GALLERY] -> setIsCompleted(true);
      }
      if(null != $website -> getWebsiteAttributeId())
      {
        $this -> steps[self::STEP_PLANS] -> setIsCompleted(true);
      }
    }

    if($user -> getFormInfo("previewInfo"))
    {
      $this -> steps[self::STEP_INFO] -> setIsCompleted(true);
      $this -> steps[self::STEP_PREVIEW] -> setIsCompleted(true);
    }
  }

  public function getHighest($include_optional = true)
  {
    foreach($this as $step)
    {
      if(!$step -> isCompleted())
      {
        if(!$include_optional && $step -> isOptional())
        {
          continue;
        }
        return $step;
      }
    }
    return $this -> steps[key($this -> steps)]; //safe than sorry
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

  public static function getInstance(sfUser $user)
  {
    if(!self::$instance)
    {
      self::$instance = new CheckoutSteps($user);
    }
    return self::$instance;
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
  }

  public function getSteps()
  {
    return $this -> steps;
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
    return array_search(key($this -> steps), array_keys($this -> step_names)) + 1;
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