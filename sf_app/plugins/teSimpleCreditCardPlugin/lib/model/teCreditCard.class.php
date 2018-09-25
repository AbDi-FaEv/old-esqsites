<?php

/**
 *
 * @author Daniel Richter
 */
class teCreditCard
{
  const TYPE_MASTERCARD = 'mc';
  const TYPE_VISA = 'v';
  const TYPE_AMERICAN_EXPRESS = 'ae';
  const TYPE_DINERS = 'dc';

  protected static $types = array(
    self::TYPE_MASTERCARD => "Master Card",
    self::TYPE_VISA => "Visa",
    self::TYPE_AMERICAN_EXPRESS => "American Express",
    self::TYPE_DINERS => "Diners Club"
  );

  public static function getTypes($limit_types = array())
  {
    return ($limit_types) ? array_intersect_key(self::$types, array_flip($limit_types)) : self::$types;
  }

  public static function getTypesExcept($remove_types = array())
  {
    return array_diff(self::$types, $remove_types);
  }

  public static function getTypeString($type)
  {
    return isset(self::$types[$type]) ? self::$types[$type] : null;
  }

  public static function formatExpirationDate($date)
  {
    $time = strtotime($date);
    //maybe validate valid date input?
    return date("m/y", $time);
  }

  public static function getMonth($date)
  {
    return date("m", strtotime($date));
  }

  public static function getYear($date, $full = true)
  {
    return date($full ? "Y" : "y", strtotime($date));
  }

  public static function obfuscate($number, $char = "X", $length = 4)
  {
    return substr_replace($number, str_repeat($char, strlen($number) - $length), 0, strlen($number) - $length);
  }
}