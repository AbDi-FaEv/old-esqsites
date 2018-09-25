<?php

/**
 * PageGroup form.
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Richtermeister
 */
class PageGroupPaymentForm extends PageGroupBlankForm
{
  public function configure()
  {
    parent::configure();
    
    $this -> widgetSchema["entry_0"] -> setLabel("data", "Message");
    $this -> widgetSchema["entry_0"] -> setHelp("data", "this message will be shown before the payment form.");
  }
}
