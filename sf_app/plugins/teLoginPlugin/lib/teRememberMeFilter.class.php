<?php

/**
 * Processes the "remember me" cookie.
 * 
 * This filter should be added to the application filters.yml file **above**
 * the security filter:
 * 
 *    remember_me:
 *      class: sfGuardRememberMeFilter
 * 
 *    security: ~
 * 
 * @package    symfony
 * @subpackage teLoginPlugin
 * @author     Richtermeister
 */
class teRememberMeFilter extends sfFilter
{
  /**
   * @see sfFilter
   */
  public function execute($filterChain)
  {
    if(!$model = $this->getParameter('model'))
    {
      throw new sfException('teRememberMeFilter requires model parameter');
    }

    $cookie_name = $this->getParameter('cookie_name', 'teLoginRemember');
    $user = $this->context->getUser();

    if (
      $this->isFirstCall()
      &&
      !$user->isAuthenticated()
      &&
      $cookie = $this->context->getRequest()->getCookie($cookie_name)
    )
    {
      if ($entity = PropelQuery::from($model)->filterByRememberKey($cookie)->findOne())
      {
        $user->login($entity);
      }
    }

    $filterChain->execute();
  }
}