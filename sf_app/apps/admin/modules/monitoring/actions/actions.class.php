<?php

/**
 * monitoring actions.
 *
 * @package    esqsites123
 * @subpackage monitoring
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class monitoringActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $c = new Criteria();
    $c -> addAscendingOrderByColumn(DomainPeer::NAME);
    $c -> add(DomainPeer::STATUS, Domain::STATUS_ACTIVE);
    $c -> add(DomainPeer::TYPE, Domain::TYPE_PURCHASED);
    $c -> addJoin(DomainPeer::ID, DomainCheckPeer::DOMAIN_ID, Criteria::LEFT_JOIN);
    $c -> addDescendingOrderByColumn(DomainCheckPeer::CREATED_AT);
    $c -> addGroupByColumn(DomainPeer::ID);
    $this -> domains = DomainPeer::doSelect($c);
  }
}
