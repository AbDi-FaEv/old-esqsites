<?php
/**
 * Description of teCheckboxNodeRendererclass
 *
 * @author Richtermeister
 */
class teChoiceNodeRenderer implements teNodeRendererInterface
{
  protected $name;
  protected $widget;
  protected $selected = array();
  protected $disabled = array();
  
  public function __construct($name, $selected = array(), $multiple = true, $disabled = null)
  {
    $this -> name     = $multiple ? $name."[]" : $name;
    $this -> widget   = $multiple ? new sfWidgetFormInputCheckbox() : new sfWidgetFormInputRadio();
    if($selected)
    {
      $this -> selected = $selected;
    }
    if($disabled)
    {
      $this -> disabled = is_array($disabled) ? $disabled : array($disabled);
    }
  }

  public function render($node)
  {
    $name     = $this -> name;
    $pk       = $node -> getPrimaryKey();
    $selected = in_array($pk, $this -> selected);
    $disabled = in_array($pk, $this -> disabled);
    $widget   = $this -> widget -> render($name, $selected, array("value" => $pk, "disabled" => $disabled));
    $id       = $this -> widget -> generateId($name, $pk);
    $label    = '<label for="'.$id.'">'.$node.'</label>';
    return $widget."&nbsp;".$label;
  }
}