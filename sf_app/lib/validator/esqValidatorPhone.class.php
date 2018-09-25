<?php
/**
 * Description of esqValidatorPhone
 *
 * @author Richtermeister
 */
class esqValidatorPhone extends sfValidatorString
{
  protected function doClean($value)
  {
    if($value = parent::doClean($value))
    {
      return preg_replace ("/[^\d]/i", "", $value); //strip non-numeric characters
    }
  }
}