<?php

/**
 * represents a Website entity in the system, and a row from the website table in the database
 */
class Website extends BaseWebsite
{
  const TYPE_PURCHASED = 1;
  const TYPE_TEMPORARY = 2;

  const STATUS_ACTIVE     = 1;
  const STATUS_PENDING    = 2;
  const STATUS_SUSPENDED  = 3;
  const STATUS_CANCELLED  = 4;

  const FIRM_TYPE_SOLO        = "solo";
  const FIRM_TYPE_PARTNERSHIP = "partnership";
  const FIRM_TYPE_LARGE       = "firm";

  const MENU_TYPE_MAIN    = 1;
  const MENU_TYPE_FOOTER  = 2;
  const MENU_TYPE_OTHER   = 3;

  protected $num_email_accounts;
  protected $cg_account;

  protected static $states = array(self::STATUS_ACTIVE => "Active",
                                  self::STATUS_SUSPENDED => "Suspended",
                                  self::STATUS_CANCELLED => "Cancelled");

  protected static $firm_types = array(self::FIRM_TYPE_SOLO => "Solo", 
                  self::FIRM_TYPE_PARTNERSHIP => "Partnership", 
                  self::FIRM_TYPE_LARGE => "Large Company");

  /**
   * @todo consider if this is neccessary
   */
  public function __construct()
  {
    parent::__construct();

    $this -> setStatus(self::STATUS_PENDING);
    $this -> setType(self::TYPE_TEMPORARY);
    $this -> setHostId('0448a1eb1bf0f982e5feca0db5d60967'); //does this need to be hardcoded?
  }

  /**
   * convenience method
   * 
   * @return WebsiteTemplate
   */
  public function getTemplate()
  {
    return $this ->getWebsiteTemplate();
  }

  /**
   * ensures that CG account is kept in sync with this website
   *
   * @todo consider sync'ing customer fields as well
   * @param PropelPDO $con
   * @return bool whether to proceed with update
   */
  public function preUpdate(PropelPDO $con = null)
  {
    if($this -> isColumnModified(WebsitePeer::WEBSITE_ATTRIBUTE_ID)) //website has switched plans
    {
      if($this -> getCgId()) //website has CG account
      {
        //update plan in cheddargetter
        $new_plan = $this -> getHostingPlan();

        $cg_client = esqContainer::getInstance() -> getSubscriptionService();
        $cg_client -> switchHostingPlan($this, $new_plan);
      }

      //disable pages that are not supported by new hosting plan
      $this -> getHostingPlan() -> enforcePageStatus($this);
    }

    return true; //update may proceed
  }

  /**
   * @return bool whether this website has esq-hosted domains
   */
  public function hasEsqDomains()
  {
    return DomainQuery::create() ->
      filterByRegistrationType(Domain::REGISTRATION_TYPE_ESQ) ->
      filterByWebsite($this) ->
      count() > 0;
  }

  /**
   * returns a list of received CG notifications associated with this account
   * be advised that our app may have missed some notifications due to downtime
   *
   * @return PropelObjectCollection
   */
  public function getCgTransactions()
  {
    return CheddarGetterNotificationQuery::create() ->
      filterByWebsite($this) ->
      lastCreatedFirst() ->
      find();
  }

  /**
   * applies a coupon to this website (can be used retroactively)
   *
   * @param Coupon $coupon
   * @param bool $issue_discount whether to issue a discount in CG
   * @return Website fluent interface
   */
  public function applyCoupon(Coupon $coupon, $issue_discount = true)
  {
    //calculate a discount value
    if($issue_discount && ($discount = $coupon -> getDiscountForHostingPlan($this -> getHostingPlan())))
    {
      $cg = esqContainer::getInstance() -> getSubscriptionService();
      $cg -> issueDiscount($this, $discount, $coupon -> getDescriptionForCustomer());
    }

    return $this -> registerCouponUsage($coupon);
  }

  /**
   * registers the usage of a coupon for posteriority
   *
   * @param Coupon $coupon
   * @param int $time the timestamp when this coupon is to be registered
   * @return Website
   */
  public function registerCouponUsage(Coupon $coupon, $time = null)
  {
    $usage = new CouponUsage();
    $usage -> populateFromCoupon($coupon) ->
      setWebsite($this) ->
      setCreatedAt(null === $time ? time() : $time);

    return $this; //fluent interface
  }

  /**
   * returns a date one month into the fugure based on either a reference or the last billing date
   *
   * @param string the date format to return
   * @param string|int an anchor time to regard as "today"
   * @return string|int a formatted time
   */
  public function getNextBillingDate($format = 'm/d/Y', $reference = null)
  {
    if(null === $reference) $reference = time();

    if($last_date = $this -> getLastBillingDate('U'))
    {
      $next_date = $last_date;
      for($months = 1;$next_date < $reference;$months++)
      {
        $next_date = strtotime($this -> getLastBillingDate()." +".$months." month");
      }
      return date($format, $next_date);
    }
  }

  /**
   * overrides parent to ensure domains are ordered by name
   *
   * @see BaseWebsite
   * @param Criteria $criteria
   * @param PropelPDO $con
   * @return PropelObjectCollection
   */
  public function getDomains($criteria = null, PropelPDO $con = null)
  {
    $criteria = null === $criteria ? new Criteria() : clone $criteria;
    $criteria -> addAscendingOrderByColumn(DomainPeer::NAME);
    return parent::getDomains($criteria, $con);
  }

  /**
   * returns this website converted to a string
   *
   * @return string this website as string
   */
  public function __toString()
  {
    if($name = parent::__toString()) return $name;
    if($name = $this -> getWebsiteName());
    return " - empty - ";
  }

  /**
   * cancels this website throughout the system (including subscription service)
   *
   * @return Website
   */
  public function cancel()
  {
    if($this -> getCgId()) //website exists in CG
    {
      //cancel client in subscription solution
      $service = esqContainer::getInstance() -> getSubscriptionService();
      $service -> cancelSubscription($this -> getId());
    }

    $this -> setStatus(self::STATUS_CANCELLED) -> save();
    return $this; //fluent
  }

  /**
   * sets this website to status: active (nothing more)
   * 
   * @return Website
   */
  public function activate()
  {
    $this -> setStatus(self::STATUS_ACTIVE) -> save();
    return $this; //fluent
  }

  /**
   * sets this website to status: suspended (nothing more)
   *
   * @return Website
   */
  public function suspend()
  {
    $this -> setStatus(self::STATUS_SUSPENDED) -> save();
    return $this;
  }

  /**
   * overrides parent to ensure that path is unset
   * (can't have 2 websites with same path or cheddargetter id)
   *
   * @return Website a copy of this website
   */
  public function copy($deepCopy = false)
  {
    $copy = parent::copy($deepCopy);
    $copy -> setPath(null);
    $copy -> setCgId(null);
    return $copy;
  }

  /**
   * alias to getWebsiteAttribute
   *
   * @todo rename WebsiteAttribute to HostingPlan
   * @return HostingPlan
   */
  public function getHostingPlan()
  {
    return $this -> getWebsiteAttribute();
  }

  /**
   * returns the status options a Website object can have
   *
   * @return array
   */
  public static function getStates()
  {
      return self::$states;
  }

  /**
   * returns the firm type options a Website object can have
   *
   * @return array
   */
  public static function getFirmTypes()
  {
    return self::$firm_types;
  }

  /**
   * checks whether a directory associated with this website exists
   * 
   * @return bool
   */
  public function directoryExists()
  {
    return is_dir($this -> getAbsolutePath());
  }
  
  public function getFirmTypeString()
  {
    return isset(self::$firm_types[$this -> firm_type]) ? self::$firm_types[$this -> firm_type] : "invalid";
  }
	
  public function getStatusString()
  {
      return isset(self::$states[$this -> getStatus()]) ? self::$states[$this -> getStatus()] : "invalid";
  }
  
  public function getFullPath()
  {
    if($host = $this -> getHost())
    {
      return "http://".$host -> getExternalIp()."/customer/".$this -> getPath()."/htdocs/";
    }
    else
    {
      return $this -> getAbsolutePath();
    }
  }

  /**
   * ensures that this entity has a unique primary key before insertion into database
   *
   * @param PropelPDO $con
   * @return bool whether to proceed with the insertion
   */
  public function preInsert(PropelPDO $con = null)
  {
    $this -> setId(WebsitePeer::generatePk()); //ids are generated manually
    return true;
  }

  /**
   * returns a collection of Pages associated with this Website and a specific menu type
   *
   * @param string $type
   * @param int $limit
   * @return PropelObjectCollection
   */
  public function getPagesByMenuType($type, $limit = null)
  {
    $query = PageQuery::create() ->
      filterByMenuType($type);

    if($limit)
    {
      $query -> limit($limit);
    }
    return $this -> getPages($query);
  }

  /**
   * overriding parent to order pages by rank
   *
   * @see BaseWebsite
   * @return PropelObjectCollection
   */
  public function getPages($criteria = null, PropelPDO $con = null)
  {
    return parent::getPages(PageQuery::create(null, $criteria) -> orderByRank(), $con);
  }

  /**
   * returns a collection of active(!) pages associated with this website and a specific menu type
   *
   * @param string $type
   * @param int $limit
   * @return PropelObjectCollection the active pages
   */
  public function getActivePagesByMenuType($type, $limit = null)
  {
    $query = PageQuery::create() -> 
      filterByMenuType($type) ->
      filterByStatus(Page::STATUS_ACTIVE);

    if($limit)
    {
      $query -> limit($limit);
    }
    
    return $this -> getPages($query);
  }

  /**
   * toggles a page associated with this website to active or inactive, potentially declining activation
   *
   * @param Page $page
   * @return bool whether the operation was successful
   */
  public function togglePageStatus(Page $page)
  {
    if(!$this -> getHostingPlan() -> includesPageType($page -> getPageContentDisplayType()))
    {
      return false; //can't enable pages that aren't in hosting plan
    }
    elseif($page -> getStatus() == Page::STATUS_ACTIVE)
    {
      $page -> setStatus(Page::STATUS_INACTIVE) -> save();
      return true; //active pages can always be disabled
    }
    elseif($this -> getNumActivePages() < $this -> getHostingPlan() -> getMaxMainMenuPages())
    {
      $page -> setStatus(Page::STATUS_ACTIVE) -> save();
      return true;
    }
    
    return false;
  }

  /**
   * returns the number of active pages associated with this website
   *
   * @return int
   */
  public function getNumActivePages()
  {
    $query = PageQuery::create() ->
      filterByStatus(Page::STATUS_ACTIVE) ->
      filterByMenuType(Page::MENU_TYPE_MAIN);
    return $this -> countPages($query);
  }

  /**
   * returns a relative path to the userfiles associated with this website
   *
   * @return string
   */
  public function getUserfilesUrl()
  {
    return "/userFiles/".$this -> getPath()."/userFiles";
  }

  /**
   * returns the number of email accounts associated with this website
   *
   * @return int
   */
  public function getNumEmailAccounts()
  {
    if(!isset($this -> num_email_accounts))
    {
      $c = new Criteria;
      $c -> addJoin(EmailAccountPeer::DOMAIN_NAME_ID, DomainPeer::ID);
      $c -> add(DomainPeer::WEBSITE_ID, $this -> getId());
      $this -> num_email_accounts = EmailAccountPeer::doCount($c);
    }
    return $this -> num_email_accounts;
  }

  /**
   * returns the maximum page rank associated with this website
   *
   * @param string $menu_type
   * @return int
   */
  public function getMaxPageRank($menu_type = null)
  {
    //custom query to the rescue
    $sql = "SELECT MAX(".PagePeer::RANK.") AS max_rank
      FROM ".PagePeer::TABLE_NAME."
      WHERE ".PagePeer::WEBSITE_ID." = '".$this -> getId()."'";
    if($menu_type)
    {
      $sql .= " AND ".PagePeer::MENU_TYPE." = '".$menu_type."'";
    }
    $con = Propel::getConnection();
    $result = $con -> query($sql);
    return (int) $result -> fetchColumn(0);
  }

  /**
   * returns either a particular social network setting, or an array of all settings
   *
   * @param string $network
   * @return array|string
   */
  public function getSocialMedia($network = null)
  {
    $settings = unserialize(parent::getSocialMedia());
    if($network)
    {
      return isset($settings[$network]) ? $settings[$network] : null;
    }
    return $settings;
  }

  /**
   * optionally serializes a social media array to make it fit for storage
   * 
   * @param mixed $v
   * @return Website
   */
  public function setSocialMedia($v)
  {
    if(is_array($v))
    {
      $v = serialize($v);
    }
    
    return parent::setSocialMedia($v); //fluent
  }

  /**
   * returns the homepage associated with this website
   *
   * @return Page
   */
  public function getHomepage()
  {
    return PageQuery::create() ->
      filterByWebsite($this) ->
      filterByMenuType(Page::MENU_TYPE_MAIN) ->
      filterByStatus(Page::STATUS_ACTIVE) ->
      orderByRank() ->
      findOne();
  }

  /**
   * attempts to find a 404 page associated with this website
   *
   * @throws sfException
   * @return Page
   */
  public function get404Page()
  {
    if($pages = $this -> getPagesByMenuType(3))
    {
      return $pages[0];
    }
    throw new sfException("Todo: implement universal 404 page");
  }

  /**
   * replaces all pages of this website with copies of the pages of a prototype website
   *
   * @return Website
   */
  public function resetPages(Website $prototype = null)
  {
    //delete current pages
    $this -> getPages() -> delete();
    $this -> clearPages();
    
    if(!$prototype)
    {
      $prototype = WebsitePeer::retrievePreviewWebsite();
    }
    
    $num_active_pages = $this -> getHostingPlan() -> getMaxMainMenuPages();
    foreach($prototype -> getPages() as $key => $page) //key is being used as counter
    {
      $page = $page -> copy(true); //deep copy to get page entries
      $page -> setWebsite($this);

      if(!$this -> getHostingPlan() -> includesPageType($page -> getPageContentDisplayType()))
      {
        $status = Page::STATUS_INACTIVE;
      }
      elseif(in_array($page -> getMenuType(), array(Website::MENU_TYPE_FOOTER, Website::MENU_TYPE_OTHER))) //submenu and 404 page are always active
      {
        $status = Page::STATUS_ACTIVE;
      }
      else
      {
        $status = $key < $num_active_pages ? Page::STATUS_ACTIVE : Page::STATUS_INACTIVE; //only active if within plan
      }

      $page -> setStatus($status) -> save();
    }

    return $this; //fluent interface
  }

  /**
   * enables this website to dispatch events (optional, used during checkout for example)
   * 
   * @param sfEventDispatcher $dispatcher
   * @return Website
   */
  public function setDispatcher(sfEventDispatcher $dispatcher)
  {
    $this -> dispatcher = $dispatcher;
    return $this; //fluent
  }

  /**
   * helper method to issue a log message from the website, in case logging is supported
   *
   * @param string $msg
   * @param string $priority
   */
  protected function log($msg, $priority = Propel::LOG_INFO)
  {
    if(isset($this -> dispatcher))
    {
      $this -> dispatcher -> notify(new sfEvent($this, "esq.log", array("message" => $msg)));
    }
    parent::log($msg, $priority);
  }

  /**
   * returns a unique string that can be used as file system path to this website
   * 
   * @return string a unique string
   */
  public function generatePath()
  {
    return md5($this -> getId(). $_SERVER['SERVER_SIGNATURE'] . date('Y-m-d H:i:s A') . microtime());
  }

  /**
   * returns an absolute path to the user-files directory associated with this website
   *
   * @return string
   */
  public function getFilesPath()
  {
    return realpath(sfConfig::get("app_customer_base_directory").DIRECTORY_SEPARATOR.$this -> getPath()."/userFiles");
  }

  /**
   * returns an absolute path to the director associated with this website
   *
   * @return string
   */
  public function getAbsolutePath()
  {
    return realpath(sfConfig::get("app_customer_base_directory").DIRECTORY_SEPARATOR.$this -> getPath()."/htdocs/");
  }

  /**
   * returns the CG account associated with this website
   *
   * @see CheddarGetter_Client
   * @return CheddarGetter_Response
   */
  public function getCgAccount()
  {
    if(!isset($this -> cg_account))
    {
      $service = esqContainer::getInstance() -> getSubscriptionService();
      $this -> cg_account = $service -> getCustomer($this -> getId());
    }

    return $this -> cg_account;
  }

  /**
   * creates file system directories associated with this website
   *
   * @todo might need to execute this on a different server in a multiserver environment..
   * @param string $base_directory (optional) a directory to consider as root for added directories
   * @return Website
   */
  public function createDirectories($base_directory = null)
  {
    if(null === $base_directory)
    {
      $base_directory = sfConfig::get("app_customer_base_directory"); //not sure if this should be passed in
    }

    if(!$base_directory)
    {
      throw new sfException("You need to provide a directory to generate website files");
    }

    if($this -> directoryExists()) //check if dir already exists
    {
      return true;
    }
    
    $fs = new sfFilesystem(isset($this -> dispatcher) ? $this -> dispatcher : null);

    //create a new unique 32 digit string (this will be our user directory)
	$dirname = $this -> generatePath();
	$customer_dir = substr($dirname, 0, 1).'/'. substr($dirname, 1, 1).'/'.substr($dirname, 2, 1).'/'.$dirname;

    $this -> log("Website path: ".$customer_dir);
    $this -> setPath($customer_dir); //record it
    
    if(!$this -> isNew())
    {
      $this -> save(); //we don't want to persist new objects. might be used for testing.
    }

	//directory path to create
    $customer_dir = $base_directory.DIRECTORY_SEPARATOR.$customer_dir;

    $dirs = array("htdocs", "userFiles");
    $this -> log("Creating website directories: ".implode(", ", $dirs));

    //create the htdocs, and user files directory
    foreach($dirs as $dir)
    {
      $dir = $customer_dir.DIRECTORY_SEPARATOR.$dir;
      if(!$fs -> mkdirs($dir))
      {
        $this -> log("Could not create directory: ".$dir);
        throw new sfException("Could not create directory: ".$dir);
      }
    }

    $template_directory = sfConfig::get("app_templates_dir");

    $skeleton = sfConfig::get("app_skeleton_dir");
    $target = $customer_dir.DIRECTORY_SEPARATOR."htdocs";
    $copy_on_windows = true; //only for test purposes

    $fs -> symlink($base_directory, $target.DIRECTORY_SEPARATOR."userFiles", $copy_on_windows); // Create the "userFiles" symlink to point back at the customer base directory
    $fs -> symlink($template_directory, $target.DIRECTORY_SEPARATOR."templates", $copy_on_windows); //create the "templates" symlink to make all templates accessible

    //this could be improved..
    $fs -> symlink($skeleton.DIRECTORY_SEPARATOR."sites.htaccess", $target.DIRECTORY_SEPARATOR.".htaccess", $copy_on_windows);
    $fs -> symlink($skeleton.DIRECTORY_SEPARATOR."sites.php", $target.DIRECTORY_SEPARATOR."control.php", $copy_on_windows);

    // Create the 4 directoris neccessary for FCKeditor to function properly
    $target = $customer_dir.DIRECTORY_SEPARATOR."userFiles";
    $fs -> mkdirs($target.DIRECTORY_SEPARATOR."File");
    $fs -> mkdirs($target.DIRECTORY_SEPARATOR."Image");
    $fs -> mkdirs($target.DIRECTORY_SEPARATOR."Flash"); //neccessary?
    $fs -> mkdirs($target.DIRECTORY_SEPARATOR."Media"); //neccessary?

    $this -> log("Directories created successfully");

    return $this; //fluent
  }
}