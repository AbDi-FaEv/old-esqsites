<?php

/**
 * email_accounts module configuration.
 *
 * @package    esqsites123
 * @subpackage email_accounts
 * @author     Your name here
 * @version    SVN: $Id: configuration.php 12474 2008-10-31 10:41:27Z fabien $
 */
class email_accountsGeneratorConfiguration extends BaseEmail_accountsGeneratorConfiguration
{
  public function getFilterDefaults()
  {
    return array("status" => EmailAccount::STATUS_ACTIVE);
  }
}
