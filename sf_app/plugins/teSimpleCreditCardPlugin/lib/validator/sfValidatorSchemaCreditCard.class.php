<?php

class sfValidatorSchemaCreditCard extends sfValidatorSchema
{
  protected static $regexes = array(
    teCreditCard::TYPE_MASTERCARD => "^5[1-5]{1}[0-9]{14}$",
    teCreditCard::TYPE_VISA => "^4[0-9]{12,15}$",
    teCreditCard::TYPE_AMERICAN_EXPRESS => "^(34|37)[0-9]{13}$",
    teCreditCard::TYPE_DINERS => "^6011[0-9]{12}$"
  );

  public function __construct($options = array(), $messages = array())
  {
    $this->addOption('number_field', "number");
    $this->addOption('type_field', "type");


    if(isset($options["number_field"]))
    {
      $this -> setOption("number_field", $options["number_field"]);
    }
    if(isset($options["type_field"]))
    {
      $this -> setOption("type_field", $options["type_field"]);
    }

    $this->addOption('throw_global_error', false);

    parent::__construct(null, $options, $messages);
    
    $this -> setMessage("invalid", "This number seems invalid for the type of card you selected.");
  }

  /**
   * @see sfValidatorBase
   */
  protected function doClean($values)
  {
    if (is_null($values))
    {
      $values = array();
    }

    if (!is_array($values))
    {
      throw new InvalidArgumentException('You must pass an array parameter to the clean() method');
    }

    $number = isset($values[$this->getOption('number_field')]) ? $values[$this->getOption('number_field')] : null;
    $number = preg_replace ("[\s]", "", $number);
    $type = isset($values[$this->getOption('type_field')]) ? $values[$this->getOption('type_field')] : null;

    if($number && $type)
    {
      if(!array_key_exists($type, self::$regexes))
      {
        throw new InvalidArgumentException(sprintf('The credit card type "%s" is not supported.', $type));
      }

      $regex = self::$regexes[$type];
      //die($regex."<br />".$number);
      $valid = eregi($regex, $number);

      if (!$valid)
      {
        $error = new sfValidatorError($this, 'invalid', array(
          'number'  => $number,
          'type' => $type
        ));

        if ($this->getOption('throw_global_error'))
        {
          throw $error;
        }

        throw new sfValidatorErrorSchema($this, array($this->getOption('number_field') => $error));
      }
    }

    return $values;
  }
}