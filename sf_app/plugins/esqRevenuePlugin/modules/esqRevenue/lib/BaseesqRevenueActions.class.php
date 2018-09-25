<?php

/**
 * Base actions for the esqRevenuePlugin esqRevenue module.
 * 
 * @package     esqRevenuePlugin
 * @subpackage  esqRevenue
 * @author      Your name here
 * @version     SVN: $Id: BaseActions.class.php 12534 2008-11-01 13:38:27Z Kris.Wallsmith $
 */
abstract class BaseesqRevenueActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this -> form = new QuarterlyRevenueForm();
    Propel::disableInstancePooling();

    if($request -> getMethod() == sfRequest::POST)
    {
      $this -> form -> bind($request -> getParameter($this -> form -> getName()));
      $this -> setTemplate("grouped");
    }
    else
    {
      $this -> plans = HostingPlanQuery::create() -> withNumUsed() -> find();
    }
  }
}
