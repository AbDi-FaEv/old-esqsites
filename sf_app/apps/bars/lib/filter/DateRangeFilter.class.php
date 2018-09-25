<?php
/**
 *
 * @author Richtermeister
 */
class DateRangeFilter extends sfForm
{
  public function setup()
  {
    $this -> widgetSchema["start"] = new sfWidgetFormJQueryDate(array("image" => "/teFormPlugin/images/datepicker.png", "config" => "{changeYear: true, changeMonth: true}"));
    $this -> widgetSchema["end"] = new sfWidgetFormJQueryDate(array("image" => "/teFormPlugin/images/datepicker.png", "config" => "{changeYear: true, changeMonth: true}"));

    $this -> validatorSchema["start"] = new sfValidatorDate(array("date_output" => "U", "min" => $this -> getOption("start"), "max" => strtotime("1 day ago")));
    $this -> validatorSchema["end"] = new sfValidatorDate(array("date_output" => "U", "max" => time(), "min" => $this -> getOption("start")));

    $this -> widgetSchema -> setNameFormat("date_range[%s]");
  }
}