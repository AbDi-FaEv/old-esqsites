<?php

/**
 * PageGroup form.
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Richtermeister
 */
class PageGroupBlankForm extends PageGroupForm
{
  
  public function configure()
  {
    parent::configure();

    $user = $this->getOption('user');
    
    $form = $this -> embeddedForms["entry_0"];
    $form -> setWidget("data", $this->getOption('factory')->getRichTextEditor(array(), array("rows" => 50, "cols" => 60)));
    $form -> setValidator("data", $this->getOption('factory')->getRichTextValidator(array('required' => false)));
    $this -> embedForm("entry_0", $form);
    
    $this -> widgetSchema["entry_0"] -> setLabel("data", false);
    $this -> widgetSchema["entry_0"] -> setHelp("data", "");
  }
}
