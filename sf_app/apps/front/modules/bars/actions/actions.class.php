<?php

/**
 * bars actions.
 *
 * @package    esqsites123
 * @subpackage bars
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class barsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this -> associations = BarAssociationQuery::create() -> orderByName() -> find();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this -> bar = $this -> getRoute() -> getBarAssociation();
    $this -> getResponse() -> setTitle($this -> bar);
  }
}
