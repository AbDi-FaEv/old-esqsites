<?php

/**
 * pages module configuration.
 *
 * @package    esqsites123
 * @subpackage pages
 * @author     Richtermeister
 */
class pagesGeneratorConfiguration extends BasePagesGeneratorConfiguration
{
  public function getFormOptions()
  {
    $user = sfContext::getInstance() -> getUser();
    return array("user" => $user, 'factory' => new esqCustomerFormFactory($user));
  }
}
