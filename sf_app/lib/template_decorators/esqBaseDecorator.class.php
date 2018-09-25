<?php

/**
 * Description of esqBaseDecorator
 *
 * @author Richtermeister
 */
class esqBaseDecorator
{
  protected $wrapped_object;

  public function __construct($object)
  {
    $this -> wrapped_object = $object;
  }

  public function __call($method_name, $params)
  {
    $method_names = array($method_name, 'get'.ucfirst($method_name));

    foreach($method_names as $method)
    {
      if(method_exists($this -> wrapped_object, $method))
      {
        return call_user_func_array(array($this -> wrapped_object, $method), $params);
      }
    }
    $class = get_class($this);
    throw new PropelException(sprintf('Call to undefined method %s::%s', $class, $method_name));
  }
}