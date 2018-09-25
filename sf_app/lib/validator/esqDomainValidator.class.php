<?php
/**
 * Description of esqDomainValidator
 *
 * @author Richtermeister
 */
class esqDomainValidator extends sfValidatorString
{
  public function configure($options = array(), $messages = array())
  {
    parent::configure($options = array(), $messages = array());
    $this -> addMessage("not_available", 'The domain "%value%" is already taken.');
    $this -> setMessage("invalid", 'The domain "%value%" is invalid. Please watch out for special characters.');
    $this -> setMessage("required", 'Please enter a domain name.');
  }

  protected function doClean($value)
  {
    if($value = parent::doClean($value))
    {
      return $this -> checkAvailability($value);
    }
  }

  public static function filterAvailable(array $domain_names)
  {
    $validator = new esqDomainValidator();
    foreach($domain_names as $name)
    {
      try
      {
        $name = $validator -> clean($name);
        $checked_names[] = $name;
      }
      catch(sfValidatorError $e)
      {
        //do nothing
      }
    }
    return isset($checked_names) ? $checked_names : null;
  }

  protected function checkAvailability($domain_name)
  {
    $extension = substr($domain_name, strrpos($domain_name, ".") + 1);
    $name = substr($domain_name, 0, strrpos($domain_name, "."));

    $domain = new esqLegacyDomainName;
    $domain -> set_SLD($name);
    $domain -> set_TLD($extension);

    if(!$raw_response = $domain -> domain_name_status_check())
    {
      throw new ServiceUnavailableException("Rcom Express Service not available");
    }
    
    if(sfConfig::get('sf_debug'))
    {
      sfContext::getInstance()->getEventDispatcher()->notify(new sfEvent($this, 'application.log', array('message' => $raw_response)));
    }

    // Create the XML object from the XML response
    $xml_response = simplexml_load_string($raw_response);
    
    if($xml_response -> ErrCount != 0)
    {
      throw new sfValidatorError($this, 'invalid', array('value' => $domain_name));
    }

    if($xml_response -> RRPCode != esqLegacyDomainName::RESPONSE_AVAILABLE)
    {
      throw new sfValidatorError($this, 'not_available', array('value' => $domain_name));
    }
    
    return $domain_name;
  }
}