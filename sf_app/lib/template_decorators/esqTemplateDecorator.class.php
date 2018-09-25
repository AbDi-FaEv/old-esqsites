<?php

/**
 * wraps a template object to add additional methods for use within templates
 *
 * @author Richtermeister
 */
class esqTemplateDecorator extends esqBaseDecorator
{
  protected $template;
  protected $website;
  protected $images; //images used in this template
  protected $configuration;

  public function __construct(WebsiteTemplate $template, Website $website)
  {
    $this -> template = $template;
    $this -> website = $website;

    //load customizations
    $customizations = TemplateCustomizationQuery::create() ->
      filterByWebsite($website) ->
      filterByOptionalTemplate($template) ->
      find();

    if(count($customizations))
    {
      $this -> addCustomizations($customizations);
    }

    parent::__construct($template);
  }

  /**
   * applies customizations to this template (css, images)
   *
   * @param PropelObjectCollection $customizations
   * @return esqTemplateDecorator
   */
  public function addCustomizations(PropelObjectCollection $customizations)
  {
    $css = array();

    //$image_meta = $this -> template -> getMetaInfo() -> getImages(); //these are the available images
    $image_meta = array();

    foreach($customizations as $c)
    {
      switch($c -> getType())
      {
        case TemplateCustomization::TYPE_CSS:
          $css[] = $c -> getContent();
        break;
        case TemplateCustomization::TYPE_IMAGE:
          //set the selected image
          $this->images[$c -> getReference()] = $image_meta[$c -> getReference()][$c -> getContent()];
        break;
        case TemplateCustomization::TYPE_THEME:
          $this->getConfiguration()->setTheme($c->getContent());
        break;
      }
    }

    $this -> custom_css = implode("\n", $css);

    return $this;
  }

  /**
   * returns the images used by this template
   * 
   * @return array
   */
  public function getImages()
  {
    return $this -> images;
  }

  /**
   * returns the configuration for the wrapped template
   *
   * @return TemplateConfiguration
   */
  public function getConfiguration()
  {
    if(!$this->configuration)
    {
      $this->configuration = new TemplateConfiguration($this->template->getPath());
    }

    return $this->configuration;
  }

  /**
   * returns the stylesheets used by this template
   *
   * @return array
   */
  public function getStylesheets()
  {
    return $this->getConfiguration()->getStylesheets();
  }

  /**
   * returns the javascripts used by this template
   * 
   * @return array
   */
  public function getJavascripts()
  {
    return $this->getConfiguration()->getJavascripts();
  }
}