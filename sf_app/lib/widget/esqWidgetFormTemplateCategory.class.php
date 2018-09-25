<?php
/**
 * Description of esqWidgetFormTemplateCategory
 *
 * @author Richtermeister
 */
class esqWidgetFormTemplateCategory extends sfWidgetFormPropelChoice
{
  protected function configure($options = array(), $attributes = array())
  {
    parent::configure($options, $attributes);
    $this -> setOption("model", "TemplateCategory");
    $this -> setOption("order_by", array("Name", "asc"));
    $this -> setOption("add_empty", "-- All Categories --");
  }
}