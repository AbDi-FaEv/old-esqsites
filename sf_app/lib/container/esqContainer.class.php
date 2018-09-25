<?php
/**
 * Description of esqContainer
 *
 * @author Richtermeister
 */
class esqContainer
{
  protected static $instance;

  /**
   *
   * @return esqServiceContainer
   */
  public static function getInstance()
  {
    if(!self::$instance)
    {
      $name = "esqBaseServiceContainer";
      $file = sfConfig::get("sf_cache_dir")."/".$name.".php";

      if(sfConfig::get("sf_debug") || !file_exists($file))
      {
        $service_file = sfConfig::get("sf_config_dir").'/services.yml'; //this glues everything together

        if(!file_exists($service_file))
        {
          throw new sfException("No service definition file found.");
        }

        $sc = new sfServiceContainerBuilder();
        $loader = new sfServiceContainerLoaderFileYaml($sc);
        $loader->load($service_file);

        $dumper = new sfServiceContainerDumperPhp($sc);
        file_put_contents($file, $dumper -> dump(array("class" => $name)));
      }

      require_once $file;
      $container = new esqServiceContainer();
      $container -> addParameters(sfConfig::getAll());

      self::$instance = $container;
    }
    return self::$instance;
  }
}