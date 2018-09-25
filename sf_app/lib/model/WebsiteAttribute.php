<?php

/**
 * represents a hosting plan
 * @todo eventually rename this to HostingPlan
 */
class WebsiteAttribute extends BaseWebsiteAttribute
{
  const STATUS_ACTIVE = 1;
  const STATUS_SUSPENDED = 2;
  const STATUS_CANCELLED = 3;
  
  protected static $states = array(self::STATUS_ACTIVE => "Active", 
                  self::STATUS_SUSPENDED => "Suspended", 
                  //self::STATUS_CANCELLED => "Cancelled"
                  );
  
  public function __toString()
  {
    $name = $this -> getDescription();
    if($this -> getStatus() != self::STATUS_ACTIVE)
    {
      $name .= " (Legacy)";
    }
    return $name;
  }

  /**
   * returns whether a particular page type is included in this hosting plan
   *
   * @param PageContentDisplayType $type
   * @return boolean
   */
  public function includesPageType(PageContentDisplayType $type)
  {
    if($type -> getId() == Page::DISPLAY_TYPE_PAYMENT)
    {
      return $this -> getIncludesPaymentPage();
    }

    return true; //normal pages aren't restricted
  }

  /**
   * disables pages that aren't supported by the current hosting plan
   */
  public function enforcePageStatus(Website $website)
  {
    foreach($website -> getActivePagesByMenuType(Website::MENU_TYPE_MAIN) as $page)
    {
      if(!$this -> includesPageType($page -> getPageContentDisplayType()))
      {
        $page -> setStatus(Page::STATUS_INACTIVE) -> save();
      }
    }
  }
  
  public static function getStates()
  {
    return self::$states;
  }
  
  public function getStatusString()
  {
    return isset(self::$states[$this -> getStatus()]) ? self::$states[$this -> getStatus()] : "invalid";
  }

  /**
   * helper method to integrate better with CG
   */
  public function getNumPages()
  {
    return $this -> getMaxMainMenuPages();
  }

  /**
   * helper method to integrate better with CG
   */
  public function getNumEmails()
  {
    return $this -> getMaxEmails();
  }
  
  public function getNumUsed()
  {
    $c = new Criteria();
    $c -> add(WebsitePeer::WEBSITE_ATTRIBUTE_ID, $this -> getId());
    $c -> add(WebsitePeer::STATUS, Website::STATUS_ACTIVE);
    return WebsitePeer::doCount($c);
  }

  public function applyCoupon(Coupon $coupon)
  {
    //apply changes to plan values, depending on coupon..

    //setup price
    if($setup = $coupon -> getSetup())
    {
      $this -> setSetupPrice($setup);
    }

    //monthly price
    if($hosting_price = $coupon -> getPrice())
    {
      $this -> setPrice($hosting_price);
    }

  }
}
