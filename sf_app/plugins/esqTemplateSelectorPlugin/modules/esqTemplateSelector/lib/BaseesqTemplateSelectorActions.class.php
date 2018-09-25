<?php

/**
 * handles template selection
 * 
 * @package     esqTemplateSelectorPlugin
 * @subpackage  esqTemplateSelector
 * @author      Richtermeister
 */
abstract class BaseesqTemplateSelectorActions extends sfActions
{
  protected function getTemplates()
  {
    $query = WebsiteTemplateQuery::create() -> filterByPublic() -> orderByRank();

    if($category = $this -> getRequest() -> getParameter("category"))
    {
      $query -> filterByCategoryId($category);
    }

    //or owned by customer? what about the custom ones?
    return $query -> find();
  }

  public function executeSelectTemplate(sfWebRequest $request)
  {
    $this -> templates = $this -> getTemplates();
    $this -> category_widget = new esqWidgetFormTemplateCategory();
    $this -> route_name = $this -> getRouteName();
    $this -> selected_template_id = $this -> getSelectedTemplateId();
    if($this -> selected_template_id == null && is_array($this -> templates))
    {
      $this -> selected_template_id = $this -> templates[key($this -> templates)] -> getId();
    }

    if($request -> getMethod() == sfRequest::PUT)
    {
      $website_info = $this -> getRequestParameter("website");
      $template_id = $website_info["template_id"];
      $this -> handleTemplateSelection($template_id);
    }

    if($request -> isXmlHttpRequest())
    {
      $this -> setLayout(false); //not sure why, but this doesn't automatically happen in customer area
    }
  }
  
  abstract protected function getRouteName();
  abstract protected function handleTemplateSelection($id);
  abstract protected function getWebsite();
  abstract protected function getSelectedTemplateId();
}