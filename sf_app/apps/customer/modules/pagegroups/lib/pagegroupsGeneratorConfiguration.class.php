<?php

/**
 * pagegroups module configuration.
 *
 * @package    esqsites123
 * @subpackage pagegroups
 * @author     Richtermeister
 */
class pagegroupsGeneratorConfiguration extends BasePagegroupsGeneratorConfiguration
{
  public function getForm($object = null, $options = array())
  {
    if(null == $object)
    {
      $object = new PageGroup();

      $request = sfContext::getInstance() -> getRequest();
      $page_group = $request -> getParameter("page_group");
      $page = PagePeer::retrieveByPk($page_group["page_id"]);
      $object -> initialize($page);
    }

    $user = sfContext::getInstance()->getUser();
    
    return parent::getForm($object, array('user' => $user, 'factory' => new esqCustomerFormFactory($user)));
  }
}
