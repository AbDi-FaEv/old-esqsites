<?php
/**
 * Description of esqPageGroupedEntries
 *
 * @author Richtermeister
 */
class esqPageCaseSubmit extends esqPageDecorator
{
  public function getMessage()
  {
    $groups = $this -> getPageGroupsJoinPageEntries();
    return $groups[0] -> getPageEntry();
  }

  public function getNotificationType()
  {
    $groups = $this -> getPageGroupsJoinPageEntries();
    return $groups[2] -> getPageEntry();
  }

  public function getNotificationEmails()
  {
    $groups = $this -> getPageGroupsJoinPageEntries();
    $emails_string = $groups[1] -> getPageEntry();
    $emails = preg_split("/[,;\s]/", $emails_string); //split emails by comma, semi-colon, whitespace, and line-breaks
    foreach($emails as $key => $email)
    {
      $emails[$key] = trim($email);
      if($emails[$key] == "")
      {
        unset($emails[$key]);
      }
    }
    return $emails;
  }

  public function getNotificationEmailsAsArray()
  {
  }

}