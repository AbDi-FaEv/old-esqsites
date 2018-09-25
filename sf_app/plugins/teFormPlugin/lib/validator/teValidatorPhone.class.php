<?php
/**
 *
 * @author Richtermeister
 */
class teValidatorPhone extends sfValidatorString
{
  public function configure($options = array(), $messages = array())
  {
    $this -> addOption("format_output", true);

    $this -> setMessage("invalid", "This phone number seems invalid.");
    $this -> addMessage("leading_one", "Please start with a valid area code.");
    parent::configure($options, $messages);
  }

  public function doClean($number)
  {
    $number = parent::doClean($number);
    $number = preg_replace("/[^0-9]/", '', $number);

    if(substr($number, 0, 1) == "1")
    {
      throw new sfValidatorError($this, 'leading_one');
    }

    $length = strlen($number);
    if($length < 10 || $length > 14)
    {
      throw new sfValidatorError($this, 'invalid');
    }

    return $this -> getOption("format_output") ? self::formatNumber($number) : $number;
  }

  public static function formatNumber($number)
  {
    $sArea      = substr($number,0,3);
    $sPrefix    = substr($number,3,3);
    $sNumber    = substr($number,6,4);
    $extension  = substr($number, 10, 4);

    $number = "(".$sArea.")".$sPrefix."-".$sNumber;
    if($extension)
    {
      $number .= " x".$extension;
    }
    return $number;
  }
}