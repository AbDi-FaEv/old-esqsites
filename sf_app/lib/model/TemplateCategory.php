<?php

class TemplateCategory extends BaseTemplateCategory
{
  public function __toString()
  {
    return $this -> getName();
  }

  public function getNameAndCount()
  {
    return $this -> getName()." (".$this -> countWebsiteTemplates().")";
  }

  public function save(PropelPDO $con = null)
  {
    if($this -> isNew())
    {
      $this -> setId(TemplateCategoryPeer::generatePk());
    }
    parent::save($con);
  }
}
