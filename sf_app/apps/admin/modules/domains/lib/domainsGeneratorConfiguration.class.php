<?php

/**
 * domains module configuration.
 *
 * @package    esqsites123
 * @subpackage domains
 * @author     Your name here
 * @version    SVN: $Id: configuration.php 12474 2008-10-31 10:41:27Z fabien $
 */
class domainsGeneratorConfiguration extends BaseDomainsGeneratorConfiguration
{
  public function getFilterDefaults()
  {
    return array(
      "status" => Domain::STATUS_ACTIVE,
      "registration_type" => Domain::REGISTRATION_TYPE_ESQ
      );
  }
}
