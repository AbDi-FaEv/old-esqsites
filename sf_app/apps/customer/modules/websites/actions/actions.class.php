<?php

/**
 * websites actions.
 *
 * @package    esqsites123
 * @subpackage websites
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class websitesActions extends sfActions
{
  
  public function executeSelect(sfWebRequest $request)
  {
    $website = $this -> getRoute() -> getObject();
    if($website -> getCustomerId() == $this -> getUser() -> getId())
    {
      $this -> getUser() -> setCurrentWebsite($website);
      $this -> getUser() -> setFlash("notice", sprintf("Website \"%s\" selected", $website));
    }
    $this -> redirect("@homepage");
  }

  public function executeNew(sfWebRequest $request)
  {
    $this -> form = new WebsiteForm(new Website());

    if($request -> getMethod() == sfRequest::POST)
    {
      $this -> form -> bind($request -> getParameter($this -> form -> getName()));
      if($this -> form -> isValid())
      {
        $this -> form -> getObject() -> setCustomer($this -> getUser() -> getProfile());
        $website = $this -> form -> save();
      }
    }

    $this -> setTemplate("edit");
  }
  
  public function executeShow(sfWebRequest $request)
  {
    $this -> website = $this -> getUser() -> getCurrentWebsite();
  }
  
  public function executeEdit(sfWebRequest $request)
  {
    $this -> website = $this -> getUser() -> getCurrentWebsite();
    $this -> form = new WebsiteCustomerForm($this -> website);
    
    if($request -> getMethod() == sfRequest::PUT)
    {
      $this -> form -> bind($this -> getRequestParameter($this -> form -> getName()));
      if($this -> form -> isValid())
      {
        $website = $this -> form -> save();
        $this -> getUser() -> setFlash("notice", "Website Info Updated Successfully");
        $this -> redirect($this -> getModuleName()."/show");
      }
    }
  }
  
  public function executeAnalytics(sfWebRequest $request)
  {
    $this -> form = new AnalyticsForm($this -> getUser() -> getCurrentWebsite());
    if($request -> getMethod() == sfRequest::PUT)
    {
      $this -> form -> bind($request -> getParameter($this -> form -> getName()));
      if($this -> form -> isValid())
      {
        $this -> form -> save();
        $this -> getUser() -> setFlash("notice", "Analytics Settings updated successfully.");
        $this -> redirect("@homepage");
      }
    }
  }

  public function executePaymentAccount(sfWebRequest $request)
  {
    $this -> form = new PaymentAccountForm($this -> getUser() -> getCurrentWebsite());
    if($request -> getMethod() == sfRequest::PUT)
    {
      $this -> form -> bind($request -> getParameter($this -> form -> getName()));
      if($this -> form -> isValid())
      {
        $this -> form -> save();
        $this -> getUser() -> setFlash("notice", "Payment Account Settings updated successfully.");
        $this -> redirect("@homepage");
      }
    }
  }

  public function executeEditHostingPlan(sfWebRequest $request)
  {
    
  }

  public function executeView(sfWebRequest $request)
  {
    $path = $this -> getUser() -> getCurrentWebsite() -> getFullPath();
    $this -> redirect($path);
  }

  public function executeHosting(sfWebRequest $request)
  {
    $this -> plans = WebsiteAttributePeer::getActive();
  }

  public function executeSocialMedia(sfWebRequest $request)
  {
    $this -> form = new SocialMediaForm($this -> getUser() -> getCurrentWebsite());
    if($request -> getMethod() == sfRequest::PUT)
    {
      $this -> form -> bind($request -> getParameter($this -> form -> getName()));
      if($this -> form -> isValid())
      {
        $this -> form -> save();
        $this -> getUser() -> setFlash("notice", "Social Media Settings updated successfully.");
        $this -> redirect("@homepage");
      }
    }
  }
  
}
