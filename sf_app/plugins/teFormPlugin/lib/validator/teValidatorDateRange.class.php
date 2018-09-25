<?php
/**
 *
 * @author Richtermeister
 */
class teValidatorDateRange extends sfValidatorDateRange
{
  public function __construct($options = array(), $messages = array())
  {
    $defaults['from_date'] = new sfValidatorDate(array('required' => false, "date_output" => "m/d/Y"));
    $defaults['to_date']   = new sfValidatorDate(array('required' => false, "date_output" => "m/d/Y"));
    
    parent::__construct(array_merge($defaults, $options), $messages);
  }
}