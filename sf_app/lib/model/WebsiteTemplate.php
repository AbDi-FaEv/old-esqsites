<?php

class WebsiteTemplate extends BaseWebsiteTemplate
{
  const STATUS_ACTIVE   = 1;
  const STATUS_INACTIVE = 2;

  const TYPE_STANDARD = "standard";
  const TYPE_CUSTOM   = "custom";

  protected static $types = array(
    self::TYPE_STANDARD => "Standard",
    self::TYPE_CUSTOM => "Custom");

  protected static $states = array(
    self::STATUS_ACTIVE => "Active",
    self::STATUS_INACTIVE => "Inactive");

  protected $configuration;

  public function __toString()
  {
    return $this -> getReference() ." ". $this -> getTitle();
  }

  /**
   * returns an object representing the meta info for this template
   * 
   * @return TemplateConfiguration
   */
  public function getConfiguration()
  {
    if(!$this -> configuration)
    {
      $this -> configuration = new TemplateConfiguration($this->getPath());
    }
    
    return $this -> configuration;
  }

  /**
   * returns whether this template supports themes
   * 
   * @return bool
   */
  public function hasThemes()
  {
    return $this->getConfiguration()->hasThemes();
  }

  /**
   * returns whether this template supports customizable images
   *
   * @return bool
   */
  public function hasCustomizableImages()
  {
    return $this->getConfiguration()->hasCustomizableImages();
  }
  
  /**
   * returns a list of status choices for templates
   * 
   * @return array
   */
  public static function getStates()
  {
    return self::$states;
  }

  /**
   * returns the string representation of this template's status
   *
   * @return string
   */
  public function getStatusString()
  {
    return isset(self::$states[$this -> getStatus()]) ? self::$states[$this -> getStatus()] : "invalid";
  }

  public static function getTypes()
  {
    return self::$types;
  }

  public function getTypeString()
  {
    return isset(self::$types[$this -> getType()]) ? self::$types[$this ->getType()] : "invalid";
  }

  /**
   * returns the url to this template's preview image
   * 
   * @return string
   */
  public function getImageUrl()
  {
    return $this -> getBaseUrl()."/preview.jpg";
  }
  
  public function getNumUsed()
  {
    $c = new Criteria();
    $c -> add(WebsitePeer::TEMPLATE_ID, $this -> getId());
    $c -> add(WebsitePeer::STATUS, Website::STATUS_ACTIVE);
    return WebsitePeer::doCount($c);
  }

  /**
   * ensures a primary key is generated before saving
   *
   * @param PropelPDO $con
   * @return bool
   */
  public function preInsert(PropelPDO $con = null)
  {
    $this -> setId(WebsiteTemplatePeer::generatePk());
    
    return parent::preInsert($con);
  }

  /**
   * returns the relative url to this template's directory
   *
   * @return string
   */
  public function getBaseUrl()
  {
    return substr($this -> getPath(), strlen(sfConfig::get("sf_web_dir")));
  }

  /**
   * returns the file system path to this template's directory
   *
   * @return string
   */
  public function getPath()
  {
    return sfConfig::get("app_templates_dir")."/".$this -> getReference();
  }

  public function getUsage()
  {
    return WebsiteQuery::create() ->
      filterByWebsiteTemplate($this) ->
      useCustomerQuery() ->
      filterByReal() ->
      endUse() ->
      count();
  }
}