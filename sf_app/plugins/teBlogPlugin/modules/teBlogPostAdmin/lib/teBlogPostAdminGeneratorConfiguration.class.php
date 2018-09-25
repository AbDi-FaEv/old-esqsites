<?php

/**
 * teBlogPostAdmin module configuration.
 *
 * @package    tpr
 * @subpackage teBlogPostAdmin
 * @author     Your name here
 * @version    SVN: $Id: configuration.php 12474 2008-10-31 10:41:27Z fabien $
 */
class teBlogPostAdminGeneratorConfiguration extends BaseteBlogPostAdminGeneratorConfiguration
{
  public function getFormOptions()
  {
    return array("user" => sfContext::getInstance() -> getUser());
  }
}
