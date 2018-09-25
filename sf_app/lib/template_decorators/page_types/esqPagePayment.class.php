<?php

/**
 *
 * @author Richtermeister
 */
class esqPagePayment extends esqPageBlank
{
  public function getAccountId()
  {
    return $this -> page -> getWebsite() -> getPaymentAccountId();
  }
}