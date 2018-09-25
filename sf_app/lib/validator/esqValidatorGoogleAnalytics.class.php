<?php
/**
 * Description of esqValidatorGoogleAnalytics
 *
 * @author Richtermeister
 */
class esqValidatorGoogleAnalytics extends sfValidatorRegex
{
  public function __construct($options = array(), $messages = array())
  {
    $options["pattern"] = "/^UA\-[\d]{5,8}\-[\d]{1}$/";
    parent::__construct($options, $messages);
  }
}