<?php
/**
 * Description of components
 *
 * @author Richtermeister
 */
class checkoutComponents extends sfComponents
{
  public function executeSteps()
  {
    $this -> steps = CheckoutSteps::getInstance($this -> getUser());
  }

  public function executeMiniReceipt()
  {
    $this -> website = $this -> getUser() -> getTemporaryWebsite();
    $this -> cart = new esqCart($this -> getUser());
  }
}