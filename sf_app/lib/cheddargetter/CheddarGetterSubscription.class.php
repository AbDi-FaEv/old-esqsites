<?php
/**
 *
 * @author Richtermeister
 */
class CheddarGetterSubscription
{
  protected $first_name;
  protected $last_name;
  protected $card_type;
  protected $card_last_four;
  protected $expiration_date;

  public function __construct($subscription)
  {
    $this -> first_name = $subscription["ccFirstName"];
    $this -> last_name = $subscription["ccLastName"];
    $this -> card_type = $subscription["ccType"];
    $this -> card_last_four = $subscription["ccLastFour"];
    $this -> expiration_date = $subscription["ccExpirationDate"];
  }

  public function getFirstName()
  {
    return $this -> first_name;
  }

  public function getLastName()
  {
    return $this -> last_name;
  }

  public function getCardType()
  {
    switch($this -> card_type)
    {
      case "mc":
        return "MasterCard";
      break;
      case "v":
        return "VISA";
      break;
    }
    return $this -> card_type;
  }

  public function getCardLastFour()
  {
    return $this -> card_last_four;
  }

  public function getExpirationDate($format = "m/Y")
  {
    return date($format, strtotime($this -> expiration_date));
  }
}