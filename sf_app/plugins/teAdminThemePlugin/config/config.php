<?php

foreach (array('teUserAdmin', 'teGroupAdmin', 'tePermissionAdmin') as $module)
{
  if (in_array($module, sfConfig::get('sf_enabled_modules')))
  {
    $this->dispatcher->connect('routing.load_configuration', array('teUserAdminRouting', 'addRouteFor'.substr($module, 2)));
  }
}
if(in_array("teAdminTheme", sfConfig::get('sf_enabled_modules')))
{
  $this->dispatcher->connect('routing.load_configuration', array('teUserAdminRouting', 'addRouteForProfileUpdate'));
}
$this -> dispatcher -> connect("debug.web.load_panels", array("teWebDebugPanelCredentials", "registerPanel"));
$this->getConfigCache()->registerConfigHandler('config/te_tabs.yml', 'sfSimpleYamlConfigHandler');