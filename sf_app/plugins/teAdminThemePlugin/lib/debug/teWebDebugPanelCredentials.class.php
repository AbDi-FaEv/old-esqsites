<?php
/**
 * Description of teWebDebugPanelCredentialsclass
 *
 * @author Richtermeister
 */
class teWebDebugPanelCredentials extends sfWebDebugPanel
{
  protected $title = "Credentials";

  public function getTitle()
  {
    $title = '<img src="/teAdminThemePlugin/images/icons/small/permissions.png" alt="Credentials" /> '.$this -> title;

    if(sfContext::getInstance() -> getUser() -> isSuperAdmin())
    {
      $title .= "(*)";
    }
    else
    {
      $title .= "(".count(sfContext::getInstance() -> getUser() -> getAllPermissions()).")";
    }
    return $title;
  }

  public function getPanelTitle()
  {
    return $this -> title;
  }

  public function getPanelContent()
  {
    $permissions = sfContext::getInstance() -> getUser() -> getAllPermissions();
    foreach($permissions as $permission)
    {
      $sortable_credentials[$permission -> getName()] = $permission -> getTitle();
    }
    if(isset($sortable_credentials))
    {
      $content = '<table class="sfWebDebugLogs" style="width: 500px"><tr><th>title</th><th>name</th></tr>';
      asort($sortable_credentials);
      foreach($sortable_credentials as $name => $title)
      {
        $content .= '<tr><td>'.$title.'</td><td>'.$name.'</td></tr>';
      }
      $content .= "</table>";
      return $content;
    }
  }

  public static function registerPanel(sfEvent $event)
  {
    if(sfContext::getInstance() -> getUser() instanceof sfGuardSecurityUser)
    {
      $class = __CLASS__;
      $panel = new $class($event -> getSubject());
      $event -> getSubject() -> setPanel("credentials", $panel);
    }
  }
}