<?php


require_once(dirname(__FILE__).'/../../../esq_symfony/config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('customer', 'prod', false);
sfContext::createInstance($configuration)->dispatch();
