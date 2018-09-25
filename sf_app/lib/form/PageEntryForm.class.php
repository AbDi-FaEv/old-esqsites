<?php

/**
 * PageEntry form.
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class PageEntryForm extends BasePageEntryForm
{
  public function configure()
  {
    unset($this["customer_id"], 
      $this["website_id"], 
      $this["page_id"], 
      $this["group_id"], 
      $this["rank"], 
      $this["created_at"], 
      $this["updated_at"], 
      $this["status"],
      $this["object_type"]);
    
    //default is regular text field - customize this higher up
    $this -> widgetSchema["data"] = new sfWidgetFormInputText();
    $this -> widgetSchema -> setFormFormatterName("list");
  }
}
