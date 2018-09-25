<?php

/**
 * Page form.
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class PageAdminForm extends BasePageForm
{
  public function configure()
  {
    //clears up apparently unused page types
    $query = PageContentDisplayTypeQuery::create() -> filterByName('', Criteria::NOT_EQUAL);
    $this -> widgetSchema["page_content_display_type_id"] -> setOption("criteria", $query);
    
    $this -> widgetSchema["template_type_id"] -> setOption("add_empty", false);
    $this -> widgetSchema["template_type_id"] -> setLabel("Template Type");
    
    $this -> widgetSchema["page_content_display_type_id"] -> setLabel("Page Type");

    $this -> widgetSchema["meta_description"] = new sfWidgetFormTextarea();
    $this -> widgetSchema["meta_keywords"] = new sfWidgetFormTextarea();

    unset($this["created_at"], 
      $this["updated_at"], 
      $this["rank"], 
      $this["menu_type"]); //not sure if we want / need menu type
  }
}
