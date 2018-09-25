<?php

require_once dirname(__FILE__).'/../lib/emailsGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/emailsGeneratorHelper.class.php';

/**
 * emails actions.
 *
 * @package    esqsites123
 * @subpackage emails
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class emailsActions extends autoEmailsActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this -> website = $this -> getUser() -> getCurrentWebsite();
  }

  /**
   * overriding parent so that we can pass the default domain id
   */
  public function executeNew(sfWebRequest $request)
  {
    $domain = DomainQuery::create() -> findPk($request -> getParameter("domain_name_id"));
    $this -> forward404Unless($this -> getUser() -> getCurrentWebsite() -> getId() == $domain -> getWebsiteId()); //enforce ownership

    parent::executeNew($request);
    $this -> form -> setDefault("domain_name_id", $domain -> getId());
  }

  public function executeReactivate(sfWebRequest $request)
  {
    $account = $this -> getRoute() -> getObject();
    //implement security here!

    $account -> setStatus(EmailAccount::STATUS_ACTIVE);
    $account -> save();

    $this -> getUser() -> setFlash("notice", "Email Account Re-Activated.");
    $this -> redirect("@email_account");
  }
}
