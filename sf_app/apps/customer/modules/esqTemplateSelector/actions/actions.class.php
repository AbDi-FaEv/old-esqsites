<?php

require_once dirname(__FILE__).'/../../../../../plugins/esqTemplateSelectorPlugin/modules/esqTemplateSelector/lib/BaseesqTemplateSelectorActions.class.php';

/**
 * esqTemplateSelector actions.
 * 
 * @package    esqTemplateSelectorPlugin
 * @subpackage esqTemplateSelector
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12534 2008-11-01 13:38:27Z Kris.Wallsmith $
 */
class esqTemplateSelectorActions extends BaseesqTemplateSelectorActions
{
  protected function handleTemplateSelection($id)
  {
    $website = $this -> getUser() -> getCurrentWebsite();
    $website -> setTemplateId($id);
    $website -> save();

    $this -> getUser() -> setFlash("notice", "Website Design Updated Successfully");
    $this -> redirect($this -> getRouteName());
  }

  protected function getRouteName()
  {
    return "@template_select";
  }

  protected function getWebsite()
  {
    return $this -> getUser() -> getCurrentWebsite();
  }

  protected function getSelectedTemplateId()
  {
    return $this -> getUser() -> getCurrentWebsite() -> getTemplateId();
  }

  /**
   * temporarily overridden, so that tony can see the new templates
   * 
   * @return PropelObjectCollection $templates
   */
  protected function getTemplates()
  {
    $query = WebsiteTemplateQuery::create();
    $website = $this -> getUser() -> getCurrentWebsite();

    if(!in_array($website -> getId(), array(sfConfig::get("app_tonys_website_id"), "b6de64186369454c644bf1a83001ab51"))) //hack hack hack
    {
      $query -> filterByPublic();
    }

    if($category = $this -> getRequest() -> getParameter("category"))
    {
      $query -> filterByCategoryId($category);
    }

    //or owned by customer? what about the custom ones?
    return $query -> find();
  }
}
