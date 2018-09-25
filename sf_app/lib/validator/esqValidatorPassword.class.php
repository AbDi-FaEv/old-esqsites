<?php
/**
 * Description of esqValidatorPassword
 *
 * @author Richtermeister
 */
class esqValidatorPassword extends sfValidatorString
{
  protected function configure($options = array(), $messages = array())
  {
    parent::configure($options, $messages);
    $this -> setOption("min_length", 5);
    $this -> setMessage("min_length", 'This password is too short (%min_length% characters min).');
  }
}