<?php

/**
 * index actions.
 *
 * @package    esqsites123
 * @subpackage index
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class indexActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    
  }

  public function executeSecure(sfWebRequest $request)
  {
    
  }

  public function executeTest()
  {
    $domains = DomainQuery::create() ->
      useWebsiteQuery() ->
        useCustomerQuery() ->
          filterByReal() ->
        endUse() ->
      endUse() ->
      filterByIsAutoRenew(true) ->
      filterByRegistrationType(Domain::REGISTRATION_TYPE_ESQ) ->
      filterByExpirationDate(array("max" => strtotime("+1 month"))) ->
      orderByName() ->
      find();
  }

  public function executeCgLog()
  {
    $this -> logs = CheddarGetterNotificationQuery::create() ->
      limit(100) ->
      joinWith("Website") ->
      useWebsiteQuery() ->
        joinWith("Customer") ->
      endUse() ->
      lastCreatedFirst() ->
      find();
  }

}
