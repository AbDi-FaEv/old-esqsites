<?php

/**
 * api actions.
 *
 * @package    esqsites123
 * @subpackage api
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class apiActions extends sfActions
{

  public function executeCgTransaction(sfWebRequest $request)
  {
    $customer_info = $request -> getParameter("customer");
    $transaction = $request -> getParameter("transaction");

    $website = WebsiteQuery::create() -> findPk($customer_info["code"]);

    //log transaction
    $notification = new CheddarGetterNotification();
    $notification ->
      setContent(serialize($request -> getParameterHolder() -> getAll())) ->
      setWebsite($website) ->
      setType(CheddarGetterNotification::TYPE_TRANSACTION) ->
      setResult($transaction["response"]) ->
      save();

    $this -> forward404Unless($website);

    if($transaction["response"] == CheddarGetterNotification::RESULT_APPROVED)
    {
      $website -> setLastBillingDate(time()) -> save();
    }

    //log a human readable string?
    
    return sfView::NONE;
  }

  public function executeCgCancellation(sfWebRequest $request)
  {
    $customer_info = $request -> getParameter("customer");

    $website = WebsiteQuery::create() -> findPk($customer_info["code"]);
    $this -> forward404Unless($website);

    //log transaction
    $notification = new CheddarGetterNotification();
    $notification -> 
      setContent(serialize($request -> getParameterHolder() -> getAll())) ->
      setWebsite($website) ->
      setType(CheddarGetterNotification::TYPE_CANCELLATION) ->
      save();

    $customer = $website -> getCustomer();
    if($customer -> countWebsites() == 1)
    {
      $customer -> suspend(); //whole customer goes away
    }
    else
    {
      $website -> suspend(); //only one website goes away
    }
    
    return sfView::NONE;
  }
}