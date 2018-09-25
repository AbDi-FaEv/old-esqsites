<?php
/**
 *
 * @author Richtermeister
 */
class teWidgetFormFeet extends sfWidgetFormChoice
{

  public function __construct($options = array(), $attributes = array())
  {
    $this -> addOption('start', 4);
    $this -> addOption('end', 7);
    $this -> addOption("add_empty");

    $options = array_merge(array("choices" => new sfCallable(array($this, 'getChoices'))), $options);
    parent::__construct($options, $attributes);
  }

  public function getChoices()
  {
    $choices = array();
    for($i = $this -> getOption("start");$i <= $this -> getOption("end");$i++)
    {
      for($j = 0;$j < 13;$j++)
      {
        $choice = $i."' ".$j.'"';
        $choices[$choice] = $choice;
      }
    }
    $choices = array_reverse($choices, true);

    if($empty = $this -> getOption("add_empty"))
    {
      $choices = array("" => $empty) + $choices;
    }

    return $choices;
  }
}