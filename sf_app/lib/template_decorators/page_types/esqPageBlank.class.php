<?php
/**
 * Description of esqPageBlank
 *
 * @author Richtermeister
 */
class esqPageBlank extends esqPageDecorator
{
  public function getContent()
  {
    return $this -> page -> getPageGroup() -> getPageEntry();
  }
}