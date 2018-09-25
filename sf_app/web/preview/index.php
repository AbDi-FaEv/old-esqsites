<?php

$admin_ips = array(
  "66.91.248.210", //danny home
  "98.155.71.203", //danny amanda,
  "69.63.215.78" //danny work
);
//$admin_ips = array(); //disabling admin view

require_once(dirname(__FILE__).'/../../config/ProjectConfiguration.class.php');
if(in_array($_SERVER["REMOTE_ADDR"], $admin_ips))
{
  $configuration = ProjectConfiguration::getApplicationConfiguration('sites', 'dev', true); //dev mode with debug toolbar
}
else
{
  $configuration = ProjectConfiguration::getApplicationConfiguration('sites', 'prod', false);
}
sfContext::createInstance($configuration)->dispatch();