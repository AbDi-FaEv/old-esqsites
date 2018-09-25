<?php
require_once dirname(__FILE__).'/../lib/vendor/symfony/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

ini_set("memory_limit", "50M");

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    // for compatibility / remove and enable only the plugins you want
    $this->enableAllPluginsExcept(array('sfDoctrinePlugin', 'sfPropelPlugin'));
    if(@$_ENV["COMPUTERNAME"] != "SKYNET") //for live server
    {
      $web_dir = dirname(__FILE__)."/../../htdocs";
      $this -> setWebDir($web_dir);
    }

    sfValidatorBase::setDefaultMessage("required", "This field is required.");
    sfValidatorBase::setDefaultMessage("invalid", "This field seems invalid.");

    sfConfig::set("sf_twig_lib_dir", sfConfig::get("sf_lib_dir")."/vendor");
  }
}
