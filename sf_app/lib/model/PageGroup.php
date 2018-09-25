<?php

class PageGroup extends BasePageGroup
{
  public function getPageEntry()
  {
    if($entries = $this -> getPageEntrys())
    {
      return $entries -> pop();
    }
  }

  public function getPageEntrys($criteria = null, PropelPDO $con = null)
  {
    if(!$this -> isNew())
    {
      if ($criteria === null)
      {
        $criteria = new Criteria(PageGroupPeer::DATABASE_NAME);
      }
      elseif ($criteria instanceof Criteria)
      {
        $criteria = clone $criteria;
      }
      $criteria -> addAscendingOrderByColumn(PageEntryPeer::RANK);
    }
    return parent::getPageEntrys($criteria, $con);
  }

  public function initialize(Page $page)
  {

    $this -> setPageId($page -> getId());

    $num_entries = 0;
    switch($page -> getPageContentDisplayTypeId())
    {
      case Page::DISPLAY_TYPE_GROUPED: //grouped
      case Page::DISPLAY_TYPE_GROUPED_WITH_LINKS:
        $num_entries = 2;
      break;
      case Page::DISPLAY_TYPE_LINKS: //links
        $num_entries = 3;
      break;
      case Page::DISPLAY_TYPE_PAYMENT:
      case Page::DISPLAY_TYPE_BLANK: //blank page
        $num_entries = 1;
      break;
      case Page::DISPLAY_TYPE_CASE_SUBMIT:
        $num_entries = 1; //this one is weird.. handled on a group level
      break;
      case Page::DISPLAY_TYPE_MAP:
        $num_entries = 6;
      break;
    }
    
    for($i = 0;$i < $num_entries;$i++)
    {
      $entry = new PageEntry();
      $entry -> setRank($i + 1);
      $this -> addPageEntry($entry);
    }
  }

  /**
   * ensures that id gets generated during save
   *
   * @param PropelPDO $con
   * @return bool
   */
  public function preInsert(PropelPDO $con = null)
  {
    $this -> setId(PageGroupPeer::generatePk());
    return parent::preInsert($con);
  }

  /**
   * ensures that some fields are updated to make copy more unique
   *
   * @param bool $deepCopy
   * @return PageGroup
   */
  public function copy($deepCopy = false)
  {
    return parent::copy($deepCopy)->
      setCreatedAt(time())->
      setUpdatedAt(time());
  }

}
