<?php
/**
 * Description of teWidgetFormBoolean
 *
 * @author Richtermeister
 */
class teWidgetFormBoolean extends sfWidgetFormSelectRadio
{
  public function __construct($options = array(), $attributes = array())
  {
    $options["choices"] = array(1 => "Yes", 0 => "No");
    parent::__construct($options, $attributes);
  }
}