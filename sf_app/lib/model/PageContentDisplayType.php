<?php

class PageContentDisplayType extends BasePageContentDisplayType
{
  public function __toString()
  {
    return $this -> getName();
  }
}
