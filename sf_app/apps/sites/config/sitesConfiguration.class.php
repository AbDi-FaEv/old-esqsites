<?php

class sitesConfiguration extends sfApplicationConfiguration
{
  public function configure()
  {
    ini_set("memory_limit", "100M");
    $this -> dispatcher -> connect("debug.web.load_panels", array("esqWebDebugPanel", "registerPanel"));
  }
}
