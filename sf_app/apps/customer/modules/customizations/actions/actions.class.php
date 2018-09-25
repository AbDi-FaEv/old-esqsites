<?php

require_once dirname(__FILE__).'/../lib/customizationsGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/customizationsGeneratorHelper.class.php';

/**
 * customizations actions.
 *
 * @package    esqsites123
 * @subpackage customizations
 * @author     Richtermeister
 */
class customizationsActions extends autoCustomizationsActions
{
  /**
   * allows customizing images
   *
   * @param sfWebRequest $request
   */
  public function executeImage(sfWebRequest $request)
  { 
    $website = $this -> getUser() -> getCurrentWebsite();
    $this -> template = $website -> getTemplate();

    $config = $this -> template -> getConfiguration();
    $this -> images = $config -> getAvailableImages();

    $base_query = TemplateCustomizationQuery::create() ->
      filterByWebsite($website) ->
      filterByWebsiteTemplate($website -> getTemplate()) ->
      filterByType(TemplateCustomization::TYPE_IMAGE);

    $this -> customizations = $base_query -> find() -> getArrayCopy("Reference");
    
    if($file = $request -> getParameter("file"))
    {
      $base_query -> filterByReference($request -> getParameter("reference")) -> 
        findOneOrCreate() ->
        setContent($file) ->
        save();

      $this -> getUser() -> setFlash("notice", "Image selected");
      $this -> redirect("@customize?action=image");
    }
  }

  /**
   * allows selecting a theme
   *
   * @param sfWebRequest $request
   */
  public function executeTheme(sfWebRequest $request)
  {
    $website = $this->getUser()->getCurrentWebsite();
    $template = $website->getTemplate();

    $this->themes = $template->getConfiguration()->getThemes();

    $query = TemplateCustomizationQuery::create() ->
      filterByWebsite($website) ->
      filterByWebsiteTemplate($template) ->
      filterByType(TemplateCustomization::TYPE_THEME);

    if($request->getMethod() == sfRequest::PUT)
    {
      //theme validation here?
      
      $query->findOneOrCreate()->setContent($request->getParameter('theme'))->save();

      $this->getUser()->setFlash("notice", "Theme selected");
      $this->redirect("@customize?action=theme");
    }

    $customization = $query->findOne();
    $this->current_theme = $customization ? $customization->getContent() : null;
  }

  /**
   * allows customizing CSS
   *
   * @param sfWebRequest $request
   */
  public function executeCss(sfWebRequest $request)
  {
    $website = $this -> getUser() -> getCurrentWebsite();
    $customization = TemplateCustomizationQuery::create() ->
      filterByWebsite($website) ->
      filterByWebsiteTemplate($website -> getTemplate()) ->
      filterByType(TemplateCustomization::TYPE_CSS) ->
      findOneOrCreate();

    $this -> form = new CssCustomizationForm($customization);
    if(in_array($request -> getMethod(), array(sfRequest::POST, sfRequest::PUT)))
    {
      $this -> form -> bind($request -> getParameter($this -> form -> getName()));
      if($this -> form -> isValid())
      {
        $this -> form -> save();
        $this -> getUser() -> setFlash("notice", "CSS customization applied");
        $this -> redirect("@customize?action=css");
      }
    }
  }
}