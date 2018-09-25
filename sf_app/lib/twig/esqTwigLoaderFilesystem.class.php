<?php
/**
 * custom twig file loader to automatically add .twig to template names
 *
 * @author Richtermeister
 */
class esqTwigLoaderFilesystem extends Twig_Loader_Filesystem
{
  protected function findTemplate($name)
  {
    if(!strpos($name, ".twig"))
    {
      $name = $name.".twig";
    }
    
    return parent::findTemplate($name);
  }

  public function configureForTemplate(WebsiteTemplate $template)
  {
    $paths[] = sfConfig::get("app_templates_dir")."/".$template -> getReference();
    $paths[] = sfConfig::get("app_templates_dir")."/base"; //always look in default last

    $this ->setPaths($paths);
  }
}