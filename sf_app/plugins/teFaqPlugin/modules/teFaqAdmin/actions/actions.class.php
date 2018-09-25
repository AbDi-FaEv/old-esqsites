<?php

require_once dirname(__FILE__).'/../lib/teFaqAdminGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/teFaqAdminGeneratorHelper.class.php';

/**
 * teFaqAdmin actions.
 *
 * @package    mghsdtruth
 * @subpackage teFaqAdmin
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class teFaqAdminActions extends autoTeFaqAdminActions
{
	public function executeListOrder()
	{
		$this -> items = $this -> getRoute() -> getObjects();
	}
}
