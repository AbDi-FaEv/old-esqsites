<?php

class sfWidgetFormSelectCreditCardType extends sfWidgetFormSelectRadio
{
  public function __construct($options = array(), $attributes = array())
  {
    $options['choices'] = teCreditCard::getTypes();
    $options["class"] = "radio_list credit_card_type";
    parent::__construct($options, $attributes);
  }
  
  protected function formatChoices($name, $value, $choices, $attributes)
  {
    $inputs = array();
    foreach ($choices as $key => $option)
    {
      $baseAttributes = array(
        'name'  => substr($name, 0, -2),
        'type'  => 'radio',
        'value' => self::escapeOnce($key),
        'id'    => $id = $this->generateId($name, self::escapeOnce($key)),
        'class' => $key //this is what we're after here
      );

      if (strval($key) == strval($value === false ? 0 : $value))
      {
        $baseAttributes['checked'] = 'checked';
      }

      $inputs[] = array(
        'input' => $this->renderTag('input', array_merge($baseAttributes, $attributes)),
        'label' => $this->renderContentTag('label', $option, array('for' => $id, 'class' => $key)),
      );
    }

    return call_user_func($this->getOption('formatter'), $this, $inputs);
  }

  public function formatter($widget, $inputs)
  {
    $rows = array();
    foreach ($inputs as $input)
    {
      $rows[] = $this->renderContentTag('li', $input['input'].$this->getOption('label_separator').$input['label']);
    }

    return $this->renderContentTag('ul', implode($this->getOption('separator'), $rows), array('class' => $this->getOption('class')));
  }

  public function getStylesheets()
  {
    return array("/teSimpleCreditCardPlugin/css/forms" => "all");
  }
}