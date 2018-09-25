<?php

/**
 * account actions.
 *
 * @package    esqsites123
 * @subpackage account
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class accountActions extends sfActions
{
  
  public function executeShow(sfWebRequest $request)
  {
    $this -> customer = $this -> getUser() -> getProfile();
  }
  
  public function executeEdit(sfWebRequest $request)
  {
    $this -> form = new CustomerForm($this -> getUser() -> getProfile());
    
    if($request -> getMethod() == sfRequest::PUT)
    {
      $this -> form -> bind($this -> getRequestParameter($this -> form -> getName()));
      if($this -> form -> isValid())
      {
        $customer = $this -> form -> save();
        $this -> getUser() -> setFlash("notice", "Account Settings Updated Successfully");
        $this -> redirect("@account");
      }
    }
  }
  
  public function executeShowBilling(sfWebRequest $request)
  {
    $cg = esqContainer::getInstance() -> getService("cg.api");
    $this -> websites = $this -> getUser() -> getProfile() -> getWebsites();
    $this -> subscriptions = array();

    foreach($this -> websites as $website)
    {
      if(!$website -> getCgId()) continue;

      try
      {
        $response = $cg -> getCustomer($website -> getId());
        $this -> subscriptions[$website -> getId()] = new CheddarGetterSubscription($response -> getCustomerSubscription());
      }
      catch(Exception $e)
      {
        $this -> subscriptions[$website -> getId()] = false;
      }
    }
  }

  public function executeEditBilling(sfWebRequest $request)
  {
    $this -> website = $this -> getRoute() -> getWebsite();
    $this -> forward404Unless($this -> website -> getCustomerId() == $this -> getUser() -> getId());

    $cg = esqContainer::getInstance() -> getSubscriptionService();

    $subscription = array();
    if($this -> website -> getCgId() && ($request -> getMethod() == sfRequest::GET)) //customer already has CG account | GET = don't need to retrieve during update
    {
      try
      {
        $subscription =  $cg -> getCustomer($this -> website -> getId()) -> getCustomerSubscription();
      }
      catch(Exception $e)
      {
        return sfView::ERROR;
      }
    }

    $this -> form = new CheddarGetterCreditCardForm($subscription, array("with_address" => true));

    if($request -> getMethod() != sfRequest::GET)
    {
      $this -> form -> bind($request -> getParameter($this -> form -> getName()));
      
      if($this -> form -> isValid())
      {
        $values = $this -> form -> getValues();

        try
        {
          if($this -> website -> getCgId())
          {
            $response = $cg -> editSubscription($this -> website -> getId(), null, $values);
          }
          else
          {
            $response = $cg -> createWebsite($this -> website, $values);
          }
          $this -> website -> setLastPaymentUpdate(time()) -> activate();
          $this -> website -> getCustomer() -> activate();

          $this -> getUser() -> setFlash("notice", "Payment information updated successfully.");
        }
        catch(CheddarGetter_Response_Exception $e)
        {
          $errormessage = $e -> getMessage();
          //log for debugging
          $this -> logMessage("CG error: ".$e -> getAuxCode(), 'err');

          //set error message to cc form
          $validator_schema = $this -> form -> getValidatorSchema();
          $this -> form -> getErrorSchema() -> addError(
            new sfValidatorError($validator_schema["number"], $errormessage));

          return sfView::SUCCESS;
        }
        catch(Exception $e)
        {
          //consider validation errors? move this into form?
          return sfView::ERROR;
        }
        
        $this -> getUser() -> setFlash("notice", "Account Updated Successfully.");
        $this -> redirect("@show_billing");
      }
    }
  }

  public function executeCancel(sfWebRequest $request)
  {
    $this -> form = new AccountCancellationForm($this -> getUser() -> getProfile());
    if($request -> getMethod() == sfRequest::POST)
    {
      $this -> form -> bind($request -> getParameter($this -> form -> getName()));
      if($this -> form -> isValid())
      {
        //act on form info
        die("implement this");
      }
    }
  }
  
}
