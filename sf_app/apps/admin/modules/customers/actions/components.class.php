<?php

/**
 *
 * @author Richtermeister
 */
class customersComponents extends sfComponents
{
  public function executeMailingListInfo()
  {
    try
    {
      $api = esqContainer::getInstance() -> getMailingListService();
      $lists = $api -> getLists();
      foreach($lists as $key => $list)
      {
        $lists[$list["listId"]] = $list;
        unset($lists[$key]);
      }

      $this -> lists = $lists;
      $this -> subscriptions = $api -> GetContactSubscriptions($this -> customer -> getIcontactId());
    }
    catch(Exception $e)
    {
      $this -> exception = $e;
    }
  }
}