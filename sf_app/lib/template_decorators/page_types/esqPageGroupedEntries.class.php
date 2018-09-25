<?php
/**
 * Description of esqPageGroupedEntries
 *
 * @author Richtermeister
 */
class esqPageGroupedEntries extends esqPageDecorator
{
  public function getEntries()
  {
    foreach($this -> getPageGroupsJoinPageEntries() as $group)
    {
      $entries = $group -> getPageEntrys();

      $entry = new stdClass();
      $entry -> title = $entries[0];
      $entry -> description = $entries[1];
      
      $a_entries[] = $entry;
    }
    return $a_entries;
  }
}