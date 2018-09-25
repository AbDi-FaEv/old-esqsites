<?php

/**
 * PageGroup form.
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Richtermeister
 */
class PageGroupLinksForm extends PageGroupForm
{
  
  public function configure()
  {
    parent::configure();

    
    $form = $this -> embeddedForms["entry_0"];
    $form -> setValidator("data", new sfValidatorString());
    $this -> embedForm("entry_0", $form);
    $this -> widgetSchema["entry_0"] -> setLabel("data", "Link Name");

    $form = $this -> embeddedForms["entry_1"];
    $form -> setValidator("data", new sfValidatorUrl());
    $this -> embedForm("entry_1", $form);
    $this -> widgetSchema["entry_1"] -> setLabel("data", "Link URL");
    
    $form = $this -> embeddedForms["entry_2"];
    $form -> setWidget("data", new sfWidgetFormTextarea());// setLabel("data", "Description");
    $this -> embedForm("entry_2", $form);
    $this -> widgetSchema["entry_2"] -> setLabel("data", "Description");


  }
}
