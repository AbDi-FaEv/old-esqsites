<?php

require_once dirname(__FILE__).'/../lib/teTaskLogsGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/teTaskLogsGeneratorHelper.class.php';

/**
 * teTaskLogs actions.
 *
 * @package    skinmedica
 * @subpackage teTaskLogs
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class teTaskLogsActions extends autoTeTaskLogsActions
{
  public function executeShow()
  {
    $this -> log = $this -> getRoute() -> getObject();
  }
}
