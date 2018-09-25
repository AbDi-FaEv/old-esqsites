<?php

class ResourceCategory extends BaseResourceCategory
{
  public function getResources($criteria = null, PropelPDO $con = null)
  {
    $criteria = is_null($criteria) ? new Criteria() : clone $criteria;
    $criteria -> addAscendingOrderByColumn(ResourcePeer::COMPANY_NAME);
    return parent::getResources($criteria);
  }
}
