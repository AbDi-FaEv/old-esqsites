<?php

$custom_config = dirname(__FILE__)."/../ckfinder_config.php";
if(file_exists($custom_config))
{
  require_once($custom_config);
}
else
{
  require_once("config_original.php");
}