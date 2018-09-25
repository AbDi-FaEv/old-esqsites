<?php

class sfValidatorCreditCardExpirationDate extends sfValidatorDate
{
  protected function configure($options = array(), $messages = array())
  {
    parent::configure($options, $messages);

    $this -> setOption("date_output", sfConfig::get('app_teCreditCardPlugin_cc_date_format', 'm/y'));
    $this -> setOption("min", time());
    $this -> setMessage("min", "This card seems expired");
  }

  protected function doClean($value)
  {
    
    if($value["month"] && $value["year"])
    {
      $last_day_of_month = cal_days_in_month(CAL_GREGORIAN, $value["month"], $value["year"]);
      $value["day"] = $last_day_of_month;
    }
    return parent::doClean($value);
  }
}