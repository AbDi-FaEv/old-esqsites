<?php
/**
 * Description of esqWidgetFormBirthdate
 *
 * @author Richtermeister
 */
class esqWidgetFormBirthdate extends sfWidgetFormDate
{
  protected function configure($options = array(), $attributes = array())
  {
    parent::configure($options, $attributes);

    $years = range(date('Y') - 18, 1920);
    $years = array_combine($years, $years);
    $this -> setOption("years", $years);

    $this->addOption('empty_values', array('year' => 'YYYY', 'month' => 'MM', 'day' => 'DD'));
  }
}