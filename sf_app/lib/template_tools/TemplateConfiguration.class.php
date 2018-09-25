<?php

/**
 * encapsulates template meta settings
 *
 * @author Richtermeister
 */
class TemplateConfiguration
{
  protected $current_theme;
  protected $metas = array(
      "themes" => array(),
      "images" => array(),
      "javascripts" => array(),
      "stylesheets" => array()
    );
  
  public function __construct($template_path = null)
  {
    if($template_path && file_exists($template_path."/meta.yml"))
    {
      $this->loadMetas($template_path);
    }
  }

  /**
   * loads the meta configuration associated with a particular template
   *
   * @param string $template_path the path to a template directory
   */
  public function loadMetas($template_path)
  {
    $file = $template_path."/meta.yml";
    if(!file_exists($file))
    {
      throw new Exception(sprintf("Cannot read meta file %s", $file));
    }

    $this->metas = sfYaml::load($file);

    if(isset($this->metas["default_theme"]))
    {
      $this->setTheme($this->metas["default_theme"]);
    }
  }

  /**
   * returns whether this template supports customizable images
   * 
   * @return bool
   */
  public function hasCustomizableImages()
  {
    return isset($this->metas["images"]) && (count($this->metas["images"]) > 0);
  }

  /**
   * returns whether this template supports themes
   * 
   * @return bool
   */
  public function hasThemes()
  {
    return isset($this->metas["themes"]) && (count($this->metas["themes"]) > 0);
  }

  /**
   * returns an array of themes available to this template
   *
   * @return array
   */
  public function getThemes()
  {
    return $this->metas["themes"];
  }

  /**
   * configures this class according to the passed theme
   * 
   * @param string $theme
   * @return TemplateConfiguration
   */
  public function setTheme($theme)
  {
    if(!array_key_exists($theme, $this->metas["themes"]))
    {
      throw new Exception(sprintf('Theme "%s" does not exist for the selected template', $theme));
    }

    $this->current_theme = $theme;

    return $this;
  }

  /**
   * returns the name of the current theme
   * 
   * @return string
   */
  public function getTheme()
  {
    return $this->current_theme;
  }

  /**
   * returns the currently enabled javascript assets
   * 
   * @return array
   */
  public function getJavascripts()
  {
    return $this->metas["javascripts"];
  }

  /**
   * returns the currently enabled stylesheet assets
   *
   * @return array
   */
  public function getStylesheets()
  {
    $sheets = $this->metas["stylesheets"];

    if(isset($this->metas["themes"][$this->current_theme]))
    {
      $theme = $this->metas["themes"][$this->current_theme];
      $sheets[] = $theme["stylesheet"];
    }

    return $sheets;
  }
}