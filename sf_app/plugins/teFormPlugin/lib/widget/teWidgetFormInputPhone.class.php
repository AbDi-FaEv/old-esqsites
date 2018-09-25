<?php
/**
 * widget that renders a phone input field, using jQuery masked input
 *
 * @author Richtermeister
 */
class teWidgetFormInputPhone extends sfWidgetFormInputText
{
  protected function configure($options = array(), $attributes = array())
  {
    $this->addOption('mask', '(999) 999-9999');
    parent::configure($options, $attributes);
  }

  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    return parent::render($name, $value, $attributes, $errors).sprintf('
<script>
  jQuery(document).ready(function(){
    $("#%s").mask("%s");
  });
</script>', $this -> generateId($name), $this -> getOption("mask"));
  }

  public function getJavaScripts()
  {
    return array("/teFormPlugin/js/jquery.maskedinput.js");
  }
}