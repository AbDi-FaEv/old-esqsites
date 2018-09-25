<?php
/**
 *
 * @author Richtermeister
 */
class CheddarGetterInvoice
{
  protected $number;
  protected $charges;
  protected $due_date;

  public function __construct($invoice)
  {
    $this -> number = $invoice["number"];
    $this -> charges = $invoice["charges"];
    $this -> due_date = $invoice["billingDatetime"];
  }

  public function getNumber()
  {
    return $this -> number;
  }

  public function getTotal()
  {
    $total = 0;
    foreach($this -> getCharges() as $charge)
    {
      $total += $charge["quantity"] * $charge["eachAmount"];
    }
    return $total;
  }

  public function getCharges()
  {
    return $this -> charges;
  }

  public function getDueDate($format = "m/d/Y")
  {
    return date($format, strtotime($this -> due_date));
  }
}