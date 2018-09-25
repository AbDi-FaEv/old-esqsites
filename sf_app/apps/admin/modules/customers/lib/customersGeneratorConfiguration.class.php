<?php

/**
 * customers module configuration.
 *
 * @package    esqsites123
 * @subpackage customers
 * @author     Your name here
 * @version    SVN: $Id: configuration.php 12474 2008-10-31 10:41:27Z fabien $
 */
class customersGeneratorConfiguration extends BaseCustomersGeneratorConfiguration
{
  public function getFilterDefaults()
  {
    return array("group" => "active");
  }

  public function getFormOptions()
  {
    return array("user" => sfContext::getInstance() -> getUser());
  }
}
