<?php
/**
 * Description of teValidatorJQueryDateTime
 *
 * @author Richtermeister
 */
class teValidatorJQueryDateTime extends sfValidatorDate
{
  protected function configure($options = array(), $messages = array())
  {
    parent::configure($options, $messages);
    $this -> setOption("with_time", true);
  }

  protected function doClean($value)
  {
    if(is_array($value))
    {
      $value = $value["date"]." ".$value["time"];
    }
    return parent::doClean($value);
  }
}