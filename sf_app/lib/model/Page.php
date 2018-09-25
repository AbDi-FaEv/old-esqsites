<?php

class Page extends BasePage implements IPage
{
  const DISPLAY_TYPE_BLANK = '0062dd3485066ce18edaa2145e9edb28';
  const DISPLAY_TYPE_GROUPED_WITH_LINKS = '8035ccd79af1575c11d22b1cfc73870b';
  const DISPLAY_TYPE_GROUPED = '59ecd7d47ecd45afc78a3a37565b4b63';
  const DISPLAY_TYPE_CASE_SUBMIT = 'f847c5b148bb0906d1376f0033632cb5';
  const DISPLAY_TYPE_LINKS = 'd38f482c45cf6fb7c6afed832a7b977e';
  const DISPLAY_TYPE_MAP = 'fb476a47c6cee69e63eb2fcfb53127f4';
  const DISPLAY_TYPE_SITEMAP = '74a3f4d0dc54f5985424a7890d744719';
  const DISPLAY_TYPE_PAYMENT = 'payment';

  const TEMPLATE_TYPE_MAIN = "6a2bf92c9e453f7f8ffff18500365123";
  const TEMPLATE_TYPE_SUB = "100bf70957faf2528a1e5c5a0e436bd9";

  const STATUS_ACTIVE = 1;
  const STATUS_INACTIVE = 2;

  const MENU_TYPE_MAIN = 1;
  
  protected static $states = array(
    self::STATUS_ACTIVE   => "Active",
    self::STATUS_INACTIVE => "Inactive"
    );

  public function __construct()
  {
    parent::__construct();
    
    //set defaults
    $this -> setStatus(Page::STATUS_INACTIVE);
    $this -> setMenuType(self::MENU_TYPE_MAIN);
  }

  /**
   * overrides parent to null out some fields that shouldn't be copied
   *
   * @param bool $deepCopy
   * @return Page
   */
  public function copy($deepCopy = false)
  {
    return parent::copy($deepCopy)->
      setCreatedAt(time())->
      setUpdatedAt(time())->
      setRank(null); //proper rank gets re-generated automatically
  }

  public function getTemplateFile()
  {
    if($this ->getTemplateTypeId() == Page::TEMPLATE_TYPE_MAIN)
    {
      return "main"; //there always is a main
    }
    elseif($this ->getTemplateTypeId() == Page::TEMPLATE_TYPE_SUB)
    {
      //sometimes there's no sub, so let's double check
      $template = $this ->getWebsite() ->getTemplate();
      $dir = sfConfig::get("app_templates_dir").DIRECTORY_SEPARATOR.$template -> getReference();

      return file_exists($dir.DIRECTORY_SEPARATOR."sub.twig") ? "sub" : "main";
    }

    return "fullpage"; //fallback
  }
  
  public static function getStates()
  {
    return self::$states;
  }
  
  public function getStatusString()
  {
    return isset(self::$states[$this -> getStatus()]) ? self::$states[$this -> getStatus()] : "invalid";
  }
  
  //helper while the datamodel isn't clean
  public function getPageGroup()
  {
    if($groups = $this -> getPageGroupsJoinPageEntries())
    {
      return $groups -> shift();
    }
  }

  public function getPageGroups($criteria = null, PropelPDO $con = null)
  {
    if ($criteria === null) {
      $criteria = new Criteria(PagePeer::DATABASE_NAME);
    }
    elseif ($criteria instanceof Criteria)
    {
      $criteria = clone $criteria;
    }
    $criteria -> addAscendingOrderByColumn(PageGroupPeer::RANK);
    return parent::getPageGroups($criteria, $con);
  }

  /**
   *
   * similar to getPageGroups, but this one makes sure those groups are actually valid..
   * seems like there's bad data in the db
   */
  public function getPageGroupsJoinPageEntries()
  {
    $criteria = new Criteria();
    $criteria -> addJoin(PageGroupPeer::ID, PageEntryPeer::GROUP_ID);
    $criteria -> addGroupByColumn(PageGroupPeer::ID);
    return $this -> getPageGroups($criteria);
  }

  public function countValidPageGroups()
  {
    $c = new Criteria();
    $c -> addJoin(PageGroupPeer::ID, PageEntryPeer::GROUP_ID);
    $c -> addGroupByColumn(PageGroupPeer::ID);
    return $this -> countPageGroups($c);
  }

  /**
   * using hook to generate ID for this page, ensure proper rank is set within website, and initializes page groups
   *
   * @param PropelPDO $con
   * @return bool
   */
  public function preInsert(PropelPDO $con = null)
  {
    $this -> setId(PagePeer::generatePk());

    if (!$this -> countPageGroups()) //copied pages already have pagegroups
    {
      $this -> initialize();
    }
    return parent::preInsert($con);
  }

  /**
   * @param PropelPDO $con
   */
  public function save(PropelPDO $con = null)
  {
    //ensure link names are unique
    if ($this->isColumnModified(PagePeer::LINK_NAME) && $this->getLinkName())
    {
      $this->setLinkName($this->makeLinkNameUnique($this->getLinkName()));
    } 
    elseif (!$this->getLinkName())
    {
      $this->setLinkName($this->generateLinkName());
    }

    //make sure each page associated with a website has a rank
    if (!$this -> getRank() && ($website = $this -> getWebsite())) //copied pages already have a rank
    {
      $this -> setRank($website -> getMaxPageRank($this -> getMenuType()) + 1); //move page to end of line
    }

    parent::save($con);
  }

  protected function generateLinkName()
  {
    $base_title = substr($this -> getTitle(), 0, 20);
    //consider adding ... to the end?
    return $this -> makeLinkNameUnique($base_title);
  }

  protected function makeLinkNameUnique($link_name, $separator = ' ', $increment = 0)
  {
    $link_name2 = empty($increment) ? $link_name : $link_name . $separator . $increment;
    $link_nameAlreadyExists = PageQuery::create()
        ->filterByLinkName($link_name2)
        ->filterByWebsiteId($this -> getWebsiteId())
        ->prune($this)
        ->count();
    if ($link_nameAlreadyExists) {
        return $this->makeLinkNameUnique($link_name, $separator, ++$increment);
    } else {
        return $link_name2;
    }
  }

  /**
   * overriding parent to limit slug uniqueness to website
   *
   * @see BasePage
   */
  protected function makeSlugUnique($slug, $separator = '-', $increment = 0)
  {
      $slug2 = empty($increment) ? $slug : $slug . $separator . $increment;
      $slugAlreadyExists = PageQuery::create()
          ->filterBySlug($slug2)
          ->filterByWebsiteId($this -> getWebsiteId())
          ->prune($this)
          ->count();
      if ($slugAlreadyExists) {
          return $this->makeSlugUnique($slug, $separator, ++$increment);
      } else {
          return $slug2;
      }
  }

  /**
   * mimics sortable behavior, except this respects website and menu type as scope
   *
   * @param string $direction
   */
  public function move($direction)
  {
    $c = new Criteria();
    $c -> add(PagePeer::WEBSITE_ID, $this -> getWebsiteId());
    $c -> add(PagePeer::MENU_TYPE, $this -> getMenuType());
    
    switch($direction)
    {
      case "up":
        $c -> add(PagePeer::RANK, $this -> getRank(), Criteria::LESS_THAN);
        $c -> addDescendingOrderByColumn(PagePeer::RANK);
      break;
      case "down":
        $c -> add(PagePeer::RANK, $this -> getRank(), Criteria::GREATER_THAN);
        $c -> addAscendingOrderByColumn(PagePeer::RANK);
      break;
    }
    
    if($partner = PagePeer::doSelectOne($c))
    {
      
      $my_rank = $this -> getRank();
      $this -> setRank($partner -> getRank());
      $partner -> setRank($my_rank);
      
      $this -> save();
      $partner -> save();
    }
  }

  public function getMaxGroupRank()
  {
    //custom query to the rescue
    $sql = sprintf("SELECT MAX(%s) AS max_rank FROM %s WHERE %s = '%s'",
      PageGroupPeer::RANK,
      PageGroupPeer::TABLE_NAME,
      PageGroupPeer::PAGE_ID, $this -> getId());

    $con = Propel::getConnection();
    $result = $con -> query($sql);
    return (int) $result -> fetchColumn(0);
  }

  public function isMultiGroup()
  {
    return !in_array($this -> getPageContentDisplayTypeId(), array(
        self::DISPLAY_TYPE_BLANK,
        self::DISPLAY_TYPE_PAYMENT,
        self::DISPLAY_TYPE_CASE_SUBMIT,
        self::DISPLAY_TYPE_MAP)
    );
  }

  protected function initialize()
  {
    if(!$this -> isMultiGroup())
    {
      if($this -> getPageContentDisplayTypeId() == Page::DISPLAY_TYPE_CASE_SUBMIT) //this one is special for some reason..
      {
        //associate 3 groups..
        $group1 = new PageGroup();
        $group1 -> initialize($this);
        $group1 -> setRank(1);

        $group2 = new PageGroup();
        $group2 -> initialize($this);
        $group2 -> setRank(2);
        //consider setting users email as default email

        $group3 = new PageGroup();
        $entries = $group3 -> initialize($this);
        $group3 -> setRank(3);
        $group3 -> getPageEntrys() -> getFirst() -> setData(ClientMessage::SEND_TYPE_NOTICE_STORE); //default value
        $this -> collPageGroups = array($group1, $group2, $group3); //this might need to be migrated to propel15 collections
      }
      else
      {
        $group = new PageGroup();
        $group -> initialize($this);
        $group -> setRank(1);
        $this -> collPageGroups[] = $group;
      }
    }
  }
  
}
