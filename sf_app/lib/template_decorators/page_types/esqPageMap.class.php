<?php
/**
 * Description of esqPageGroupedEntries
 *
 * @author Richtermeister
 */
class esqPageMap extends esqPageDecorator
{
  protected function getEntries()
  {
    if(!isset($this -> entries))
    {
      $group = $this -> getPageGroup();
      $this -> entries = $group -> getPageEntrys();
    }
    return $this -> entries;
  }

  public function getMessage()
  {
    $entries = $this -> getEntries();
    return $entries[0];
  }

  public function getAddress()
  {
    $entries = $this -> getEntries();
    return $entries[1];
  }

  public function getCity()
  {
    $entries = $this -> getEntries();
    return $entries[2];
  }

  public function getState()
  {
    $entries = $this -> getEntries();
    return $entries[3];
  }

  public function getZip()
  {
    $entries = $this -> getEntries();
    return $entries[4];
  }

  public function getDescription()
  {
    $entries = $this -> getEntries();
    return $entries[5];
  }

  public function getGeoLocatableAddress()
  {
    $address = $this -> getAddress().', '.$this -> getCity().', '.$this -> getState().' '.$this -> getZip();
    return $address;
  }
}