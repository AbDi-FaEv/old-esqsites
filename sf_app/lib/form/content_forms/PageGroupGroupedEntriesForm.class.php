<?php

/**
 * PageGroup form.
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Richtermeister
 */
class PageGroupGroupedEntriesForm extends PageGroupForm
{
  
  public function configure()
  {
    parent::configure();

    if(isset($this -> widgetSchema["entry_0"]))
    {
      $this -> widgetSchema["entry_0"] -> setLabel("data", "Entry Title / Heading");
    }
    
    if(isset($this -> embeddedForms["entry_1"]))
    {
      $form = $this -> embeddedForms["entry_1"];
      $form -> setWidget("data", $this->getOption('factory')->getRichTextEditor(array(), array("rows" => 30, "cols" => 60)));
      $form -> setvalidator("data", $this->getOption('factory')->getRichTextValidator(array('required' => false)));
      $widgetschema = $form -> getWidgetSchema();
      $this -> embedForm("entry_1", $form);

      $this -> widgetSchema["entry_1"] -> setLabel("data", "Content");
    }
    //$this -> widgetSchema["entry_1"] -> setHelp("data", "Message before directions here.");
  }
}
