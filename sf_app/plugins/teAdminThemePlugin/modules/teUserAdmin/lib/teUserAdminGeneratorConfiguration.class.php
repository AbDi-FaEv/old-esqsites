<?php

/**
 * teUserAdmin module configuration.
 *
 * @package    tpr
 * @subpackage teUserAdmin
 * @author     Your name here
 * @version    SVN: $Id: configuration.php 12474 2008-10-31 10:41:27Z fabien $
 */
class teUserAdminGeneratorConfiguration extends BaseTeUserAdminGeneratorConfiguration
{
  public function getFormOptions()
  {
    return array("user" => sfContext::getInstance() -> getUser());
  }
}
