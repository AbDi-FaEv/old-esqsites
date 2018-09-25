<?php

/**
 * teFaq actions.
 *
 * @package    TenEleven Plugins
 * @subpackage FAQ
 * @author     Richtermeister
 */
class teFaqActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this -> faqs = teFaqQuery::create() -> find();
  }
}
