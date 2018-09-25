<?php

require_once dirname(__FILE__).'/../lib/clientmessagesGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/clientmessagesGeneratorHelper.class.php';

/**
 * clientmessages actions.
 *
 * @package    esqsites123
 * @subpackage clientmessages
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class clientmessagesActions extends autoClientmessagesActions
{
  protected function buildCriteria()
  {
    return parent::buildCriteria() ->
      useWebsiteQuery() ->
        filterByCustomerId($this -> getUser() -> getId()) ->
      endUse();
  }

  public function executeMarkAsViewed(sfWebRequest $request)
  {
    $message = $this -> getRoute() -> getClientMessage();
    $message -> setIsViewed(true) -> save();

    $this -> redirect("client_message");
  }

  public function executeBatchMarkAsViewed(sfWebRequest $request)
  {
    $messages = ClientMessageQuery::create() -> findPks($request -> getParameter("ids"));
    foreach($messages as $message)
    {
      $message -> setIsViewed(true) -> save();
    }

    $this -> redirect("client_message");
  }
}
