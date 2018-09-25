<?php

/**
 * PageGroup form.
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Richtermeister
 */
class PageGroupMapForm extends PageGroupForm
{
  
  public function configure()
  {
    parent::configure();
    
    $form = $this -> embeddedForms["entry_0"];
    $form -> setWidget("data", $this->getOption('factory')->getRichTextEditor(array(), array("rows" => 30, "cols" => 60)));
    $form -> setValidator("data", $this->getOption('factory')->getRichTextValidator(array('required' => false)));
    $this -> embedForm("entry_0", $form);
    
    $this -> widgetSchema["entry_0"] -> setLabel("data", "Message");
    $this -> widgetSchema["entry_0"] -> setHelp("data", "this message will be shown before your directions.");
    $this -> widgetSchema["entry_1"] -> setLabel("data", "Address");
    $this -> widgetSchema["entry_2"] -> setLabel("data", "City");    
    
    $form = $this -> embeddedForms["entry_3"];
    $form -> setWidget("data", new sfWidgetFormSelectUSState());
    $this -> embedForm("entry_3", $form);
    
    $this -> widgetSchema["entry_3"] -> setLabel("data", "State");
    
    $this -> widgetSchema["entry_4"] -> setLabel("data", "Zipcode");
    $this -> widgetSchema["entry_5"] -> setLabel("data", "Link Name");
    $this -> widgetSchema["entry_5"] -> setHelp("data", "This is the text that your website visitors will click on to get directions");
  }
}
