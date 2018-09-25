<?php

/**
 * PageGroup form.
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Richtermeister
 */
class PageGroupForm extends BasePageGroupForm
{
  
  public function configure()
  {
    if(!$factory = $this -> getOption("factory"))
    {
      throw new sfException("You have to pass the a form factory");
    }

    unset(
    $this["rank"],
    $this["created_at"], 
    $this["updated_at"], 
    $this["data"]);

    $this -> widgetSchema["page_id"] = new sfWidgetFormInputHidden();

    foreach($this -> object -> getPageEntrys() as $key => $page_entry)
    {
      $name = "entry_".$key;
      $this -> embedForm($name, new PageEntryForm($page_entry));
    }

    $page = $this -> object -> getPage();
    switch($page -> getPageContentDisplayTypeId())
    {
      case Page::DISPLAY_TYPE_BLANK: //clean
        $form = $this -> embeddedForms["entry_0"];
        $schema = $form -> getWidgetSchema();
        $form -> setWidget("data", $factory->getRichTextEditor());
        $form -> setValidator("data", $factory->getRichTextValidator(array('required' => false)));
        $schema -> setLabel("data", false);
        $this -> embedForm("entry_0", $form);
        $this -> widgetSchema["entry_0"] -> setLabel(false);
      break;
      case Page::DISPLAY_TYPE_GROUPED: //grouped entries (w/ optional links)
      case Page::DISPLAY_TYPE_GROUPED_WITH_LINKS:
        
        $form = $this -> embeddedForms["entry_0"];
        $schema = $form -> getWidgetSchema();
        $validator = $form -> getValidatorSchema();
        $validator["data"] -> setOption("required", true);
        $validator["data"] -> setMessage("required", "Please enter a title");
        $schema -> setLabel("data", "Title");
        $this -> embedForm("entry_0", $form);
        $this -> widgetSchema["entry_0"] -> setLabel(false);

        $form = $this -> embeddedForms["entry_1"];
        $schema = $form -> getWidgetSchema();
        $form -> setWidget("data", $factory->getRichTextEditor(array(), array("rows" => 30, "cols" => 60)));
        $form -> setValidator("data", $factory->getRichTextValidator(array('required' => false)));
        $schema -> setLabel("data", false);
        $this -> embedForm("entry_1", $form);
        $this -> widgetSchema["entry_1"] -> setLabel(false);

      break;
      case Page::DISPLAY_TYPE_LINKS:

        $form = $this -> embeddedForms["entry_0"];
        $schema = $form -> getWidgetSchema();
        $validator = $form -> getValidatorSchema();
        $validator["data"] -> setOption("required", true);
        $validator["data"] -> setMessage("required", "Please enter a title");
        $schema -> setLabel("data", "Title");
        $this -> embedForm("entry_0", $form);
        $this -> widgetSchema["entry_0"] -> setLabel(false);

        $form = $this -> embeddedForms["entry_1"];
        $schema = $form -> getWidgetSchema();
        $schema -> setLabel("data", "URL");
        $validator = $form -> getValidatorSchema();
        $validator["data"] = new sfValidatorUrl();
        $validator["data"] -> setOption("required", true);
        $this -> embedForm("entry_1", $form);
        $this -> widgetSchema["entry_1"] -> setLabel(false);

        $form = $this -> embeddedForms["entry_2"];
        $form -> setWidget("data", new sfWidgetFormTextarea(array(), array("rows" => 5, "cols" => 60)));
        $schema = $form -> getWidgetSchema();
        $schema -> setLabel("data", "Description");
        $this -> embedForm("entry_2", $form);
        $this -> widgetSchema["entry_2"] -> setLabel(false);

      break;
    }
  }
}
