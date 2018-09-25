<?php

class PageEntry extends BasePageEntry
{
  public function __toString()
  {
    return $this -> getData();
  }

  public function preInsert(PropelPDO $con = null)
  {
    $this -> setId(PageEntryPeer::generatePk());
    return parent::preInsert($con);
  }
  
}
