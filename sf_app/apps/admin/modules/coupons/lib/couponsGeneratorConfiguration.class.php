<?php

/**
 * coupons module configuration.
 *
 * @package    esqsites123
 * @subpackage coupons
 * @author     Your name here
 * @version    SVN: $Id: configuration.php 12474 2008-10-31 10:41:27Z fabien $
 */
class couponsGeneratorConfiguration extends BaseCouponsGeneratorConfiguration
{
  public function getFilterDefaults()
  {
    return array("status" => "");
  }
}
