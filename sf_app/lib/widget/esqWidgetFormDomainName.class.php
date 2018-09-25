<?php
/**
 * custom widget to enter a well-formatted domain name
 *
 * @author Richtermeister
 */
class esqWidgetFormDomainName extends sfWidgetForm
{
  protected function configure($options = array(), $attributes = array())
  {
    //$this->addOption('with_empty', true);
    $this->addOption('types', array("com", "net", "org", "us", "biz", "law.pro"));
    $this->addOption('template', 'http://%input%.%select%');
  }

  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $values = array('name' => '', 'type' => null);

    if(is_array($value))
    {
      $values = array_merge($values, is_array($value) ? $value : array());
    }
    elseif($value != "")
    {
      list($values["name"], $values["type"]) = explode(".", $value); //maybe allow more than one . ?
    }

    $select_widget = new sfWidgetFormSelect(array("choices" => array_combine($this -> getOption("types"), $this -> getOption("types"))));

    return strtr($this->getOption('template'), array(
      '%input%'  => $this->renderTag('input', array_merge(array('type' => 'text', 'id' => $this->generateId($name), 'name' => $name.'[name]', 'value' => $values['name']), $attributes)),
      '%select%' => $select_widget -> render($name."[type]", $values["type"])
    ));
  }
}