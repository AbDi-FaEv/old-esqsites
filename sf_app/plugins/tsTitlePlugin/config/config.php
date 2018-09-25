<?php

/**
 * @package tsTitlePlugin
 */
$configCache = sfProjectConfiguration::getActive()->getConfigCache();
$configCache->registerConfigHandler('modules/*/config/view.yml', 'tsTitleViewConfigHandler');
sfConfig::set('sf_factory_response', 'tsTitleWebResponse');

