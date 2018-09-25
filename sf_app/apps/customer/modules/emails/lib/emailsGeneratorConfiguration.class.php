<?php

/**
 * emails module configuration.
 *
 * @package    esqsites123
 * @subpackage emails
 * @author     Your name here
 * @version    SVN: $Id: configuration.php 12474 2008-10-31 10:41:27Z fabien $
 */
class emailsGeneratorConfiguration extends BaseEmailsGeneratorConfiguration
{
  public function getFormOptions()
  {
    return array("user" => sfContext::getInstance() -> getUser());
  }
}
