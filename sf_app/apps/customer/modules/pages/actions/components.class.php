<?php
/**
 *
 * @author Richtermeister
 */
class pagesComponents extends sfComponents
{
  public function executeContenttypes()
  {
    $this -> types = PageContentDisplayTypePeer::getAll();
  }
}