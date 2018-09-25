<?php

//updated for propel1.3
sfPropelBehavior::registerHooks('moderation', 
  array(
    'Peer:doSelectStmt:doSelectStmt' => array('sfPropelModerationBehavior', 'updateCriteria'), 
    'Peer:doCount'           	=> array('sfPropelModerationBehavior', 'updateCriteria')
  )
);

if(sfConfig::get('app_teBlogPlugin_register_routes', true) && in_array('teBlog', sfConfig::get('sf_enabled_modules', array())))
{
  $this->dispatcher->connect('routing.load_configuration', array('teBlogRouting', 'addRoutesForBlog'));
}
if(sfConfig::get('app_teBlogPlugin_register_routes', true) && in_array('teBlogPostAdmin', sfConfig::get('sf_enabled_modules', array())))
{
  $this->dispatcher->connect('routing.load_configuration', array('teBlogRouting', 'addRoutesForAdmin'));
}