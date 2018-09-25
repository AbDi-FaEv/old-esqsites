<?php

/**
 * PageGroup form.
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Richtermeister
 */
class PageGroupCaseSubmitForm extends PageGroupForm
{
  
  public function configure()
  {
    parent::configure();
    
    $form = $this -> embeddedForms["entry_0"];
    $form -> setWidget("data", new sfWidgetFormTextarea());
    $this -> embedForm("entry_0", $form);
    
    $this -> widgetSchema["entry_0"] -> setLabel("data", "Message");
    $this -> widgetSchema["entry_0"] -> setHelp("data", "Message to place onto page before submit form.");
    
    //$this -> widgetSchema["entry_1"] -> setLabel("data", "Destination Email Address");
    //$this -> widgetSchema["entry_1"] -> setHelp("data", "can be more than one, please separate addresses by commas");    
    
  }
}
