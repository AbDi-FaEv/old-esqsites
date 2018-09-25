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
  public function getForm($object = null, $options = array())
  {
    if(null == $object)
    {
      $object = new Domain();
      $object -> setWebsiteId(sfContext::getInstance() -> getUser() -> getCurrentWebsite() -> getId());
    }
    return parent::getForm($object, $options);
  }
}
