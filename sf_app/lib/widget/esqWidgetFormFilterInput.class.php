<?php

/**
 * Description of esqWidgetFormFilterInputclass
 *
 * @author Richtermeister
 */
class esqWidgetFormFilterInput extends sfWidgetFormFilterInput
{
  protected function configure($options = array(), $attributes = array())
  {
    parent::configure($options, $attributes);

    $this->addOption('with_not_empty', true);
    $this->addOption('not_empty_label', 'is not empty');
    $this -> addOption("template", "%input%<br />%empty_checkbox% %empty_label%<br />%not_empty_checkbox% %not_empty_label%");    
  }

  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $values = array_merge(array('text' => '', 'is_empty' => false, 'is_not_empty' => false), is_array($value) ? $value : array());

    return strtr($this->getOption('template'), array(
      '%input%'          => $this->renderTag('input', array_merge(array('type' => 'text', 'id' => $this->generateId($name), 'name' => $name.'[text]', 'value' => $values['text']), $attributes)),
      '%empty_checkbox%' => $this->getOption('with_empty') ? $this->renderTag('input', array('type' => 'checkbox', 'name' => $name.'[is_empty]', 'checked' => $values['is_empty'] ? 'checked' : '')) : '',
      '%empty_label%'    => $this->getOption('with_empty') ? $this->renderContentTag('label', $this->getOption('empty_label'), array('for' => $this->generateId($name.'[is_empty]'))) : '',
      '%not_empty_checkbox%' => $this->getOption('with_not_empty') ? $this->renderTag('input', array('type' => 'checkbox', 'name' => $name.'[is_not_empty]', 'checked' => $values['is_not_empty'] ? 'checked' : '')) : '',
      '%not_empty_label%' => $this -> getOption("with_not_empty") ? $this -> renderContentTag('label', $this -> getOption('not_empty_label'), array('for' => $this -> generateId($name.'[is_not_emtpy]'))) : '',
    ));
  }
}