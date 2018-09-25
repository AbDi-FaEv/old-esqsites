<?php

/**
 * resources actions.
 *
 * @package    esqsites123
 * @subpackage resources
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class resourcesActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $criteria = new Criteria();
    $criteria -> addAscendingOrderByColumn(ResourceCategoryPeer::NAME);
    $criteria -> addJoin(ResourceCategoryPeer::ID, ResourcePeer::CATEGORY_ID);
    $criteria -> addGroupByColumn(ResourceCategoryPeer::ID);
    $this -> categories = ResourceCategoryPeer::doSelect($criteria);
  }

  public function executeCategory(sfWebRequest $request)
  {
    $this -> category = $this -> getRoute() -> getObject();
    $this -> getResponse() -> setTitle($this -> category -> getName());
  }
}
