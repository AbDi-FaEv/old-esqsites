<?php
/**
 * Description of esqPageBlank
 *
 * @author Richtermeister
 */
class esqPageLinks extends esqPageDecorator
{
  public function getLinks()
  {
    foreach($this -> getPageGroups() as $group)
    {
      $entries = $group -> getPageEntrys();

      $link = new stdClass();
      $link -> url = $entries[1];
      $link -> title = $entries[0];
      $link -> description = $entries[2];
      
      $links[] = $link;
    }
    return $links;
  }
}