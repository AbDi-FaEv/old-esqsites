<?php

/**
 * teTaskLog filter form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
class teTaskLogFormFilter extends BaseteTaskLogFormFilter
{
  public function configure()
  {
    $this -> widgetSchema["status"] = new sfWidgetFormSelect(array("choices" => array("" => "") + teTaskLog::getStatusChoices()));
    $this -> widgetSchema["task_name"] = new sfWidgetFormSelect(array("choices" => array("" => "") + teTaskLog::getNameChoices()));
    $this -> widgetSchema["started_at"] -> setOption("with_empty", false);
  }
  
  public function getFields()
  {
    return array_merge(parent::getFields(), array("status" => "ForeignKey", "task_name" => "ForeignKey"));
  }
}
