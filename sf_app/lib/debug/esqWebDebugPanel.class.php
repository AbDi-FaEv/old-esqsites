<?php
/**
 * Description of esqWebDebugPanel
 *
 * @author Richtermeister
 */
class esqWebDebugPanel extends sfWebDebugPanel
{
  protected $title = "ESQ";
  protected $website;

  public static function setWebsite(Website $website)
  {
    $this -> website = $website;
  }

  public function getTitle()
  {
    return $this -> title;
  }

  public function getPanelTitle()
  {
    return $this -> title;
  }

  public function getPanelContent()
  {
    $request = sfContext::getInstance() -> getRequest();
    $route = $request -> getAttribute("sf_route");
    $website = $route -> getWebsite();

    if($request -> getParameter("preview"))
    {
      $info[] = "Preview Mode";
    }
    $info[] = "Website: ".$website -> getId();
    $info[] = "Template: ".$website -> getTemplate() -> getReference();

    return implode("<br />", $info);
  }

  public static function registerPanel(sfEvent $event)
  {
    $class = __CLASS__;
    $panel = new $class($event -> getSubject());
    $event -> getSubject() -> setPanel("esq", $panel);
  }
}