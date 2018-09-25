<?php

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Daniel Richter
 */
class teUserAdminRouting
{

  static public function addRouteForUserAdmin(sfEvent $event)
  {
    $event->getSubject()->prependRoute('sf_guard_user', new sfPropelRouteCollection(array(
      'name'                 => 'sf_guard_user',
      'model'                => 'sfGuardUser',
      'module'               => 'teUserAdmin',
      'prefix_path'          => 'users',
      'with_wildcard_routes' => true,
      'requirements'         => array(),
    )));
  }

  static public function addRouteForGroupAdmin(sfEvent $event)
  {
    $event->getSubject()->prependRoute('sf_guard_group', new sfPropelRouteCollection(array(
      'name'                 => 'sf_guard_group',
      'model'                => 'sfGuardGroup',
      'module'               => 'teGroupAdmin',
      'prefix_path'          => 'users/groups',
      'with_wildcard_routes' => true,
      'requirements'         => array(),
    )));
  }

  static public function addRouteForPermissionAdmin(sfEvent $event)
  {
    $event->getSubject()->prependRoute('sf_guard_permission', new sfPropelRouteCollection(array(
      'name'                 => 'sf_guard_permission',
      'model'                => 'sfGuardPermission',
      'module'               => 'tePermissionAdmin',
      'prefix_path'          => 'users/permissions',
      'with_wildcard_routes' => true,
      'requirements'         => array(),
    )));
  }

  static public function addRouteForProfileUpdate(sfEvent $event)
  {
    $event->getSubject()->prependRoute('te_profile_update', new sfRequestRoute('/your-profile',
        array("module" => "teAdminTheme", "action" => "updateProfile"), array("sf_method" => array("get", "put"))
      ));
  }
}
