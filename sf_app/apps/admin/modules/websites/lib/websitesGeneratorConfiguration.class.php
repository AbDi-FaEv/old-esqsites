<?php

/**
 * websites module configuration.
 *
 * @package    esqsites123
 * @subpackage websites
 * @author     Your name here
 * @version    SVN: $Id: configuration.php 12474 2008-10-31 10:41:27Z fabien $
 */
class websitesGeneratorConfiguration extends BaseWebsitesGeneratorConfiguration
{
  public function getFilterDefaults()
  {
    return array("status" => Customer::STATUS_ACTIVE);
  }
}
