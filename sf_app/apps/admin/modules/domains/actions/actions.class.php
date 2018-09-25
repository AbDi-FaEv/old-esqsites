<?php

require_once dirname(__FILE__).'/../lib/domainsGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/domainsGeneratorHelper.class.php';

/**
 * domains actions.
 *
 * @package    esqsites123
 * @subpackage domains
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class domainsActions extends autoDomainsActions
{
  public function executeNew(sfWebRequest $request)
  {
    parent::executeNew($request);
    if($this -> getRequestParameter("domain"))
    {
      $this -> form -> setDefaults($this -> getRequestParameter("domain"));
    }
  }
  
  public function executeShow()
  {
    $this -> domain = $this -> getRoute() -> getObject();
  }
  
  public function executeShowWebsite()
  {
    $domain = $this -> getRoute() -> getObject();
    $website = $domain -> getWebsite();
    $this -> redirect($this -> getController() -> genUrl("@website_show?id=".$website -> getId()));
  }
}
