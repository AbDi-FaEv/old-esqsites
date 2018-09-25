<?php
/**
 * Description of tePermissionAdminFormclass
 *
 * @author Richtermeister
 */
class tePermissionAdminForm extends sfGuardPermissionForm
{
  public function configure()
  {
    parent::configure();
    $this -> widgetSchema -> moveField("title", "first");

    $this -> widgetSchema -> setHelp("title", "Human-readable title");
    $this -> widgetSchema -> setHelp("name", "Internal name used by framework and plugins");
    $this -> widgetSchema -> setHelp("description", "optional notes as to what this permission is used for");
  }
}