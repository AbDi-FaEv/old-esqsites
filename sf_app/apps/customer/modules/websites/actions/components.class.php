<?php

/**
 * websites actions.
 *
 * @package    esqsites123
 * @subpackage websites
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class websitesComponents extends sfComponents
{
  public function executeList()
  {
  	$this -> websites = $this -> getUser() -> getProfile() -> getWebsites();
  }
}
