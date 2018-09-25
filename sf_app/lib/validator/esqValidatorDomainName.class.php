<?php
/**
 * custom validator to go along with esqWidgetFormDomainName
 *
 * @author Richtermeister
 */
class esqValidatorDomainName extends sfValidatorRegex
{
  protected function configure($options = array(), $attributes = array())
  {
    parent::configure($options, $attributes);
    
    $this -> setOption("pattern", "/^[a-zA-Z0-9-]*$/"); //only characters, numbers and dashes

    $this -> setOption("max_length", 60);
    $this -> addMessage('invalid_type', "The extension \"value\" is not supported.");
    $this -> setMessage("invalid", 'The domain "%value%" is invalid. Please watch out for special characters. Only letters, numbers, and the "-" character are allowed.');
    $this -> setMessage("required", 'Please enter a domain name.');

    $this -> addOption('types', array("com", "net", "org", "us", "biz", "law.pro"));
    $this -> addOption('strip_prefix', false);
  }

  public function clean($value)
  {
    if(!isset($value["name"]) || !isset($value["type"]))
    {
      throw new sfValidatorError($this, 'invalid', array('value' => $value));
    }

    if($this -> getOption("strip_prefix"))
    {
      $value["name"] = str_replace(array("http://", "https://", "www."), "", $value["name"]);
    }
    
    $value["name"] = parent::clean($value["name"]); //this validates required option and regex

    if(!in_array($value["type"], $this -> getOption("types")))
    {
      throw new sfValidatorError($this, 'invalid_type', array('value' => $value));
    }

    return $value["name"].".".$value["type"];
  }

}