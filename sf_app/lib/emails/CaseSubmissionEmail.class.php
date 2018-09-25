<?php
/**
 * represents a case submission email
 *
 * @author Richtermeister
 */
class CaseSubmissionEmail extends Swift_Message
{  

  public function  __construct($case, $type)
  {
    $subject = sprintf("[%s Case Submission Form] - %s", $case -> getDomain(), $case -> getSubject());

    switch($type)
    {
      case ClientMessage::SEND_TYPE_NOTICE_STORE:
        $body = $this -> getNotificationBody($case);
      break;
      case ClientMessage::SEND_TYPE_MESSAGE_NO_STORE:
      case ClientMessage::SEND_TYPE_MESSAGE_STORE:
        $body = $this -> getMessageBody($case);
      break;
    }

    parent::__construct($subject, $body, 'text/html');
    $this -> setFrom(array($case -> getEmail() => $case -> getName())); //sender for notification email
  }

  protected function getMessageBody($case)
  {
    $message = nl2br($case -> getMessage());
    return <<<EOF
    <table>
  <tr>
    <th align="left">SENT FROM:</th>
    <td>{$case -> getDomain()}</td>
  </tr>
  <tr>
    <th align="left">NAME:</th>
    <td>{$case -> getName()}</td>
  </tr>
  <tr>
    <th align="left">EMAIL:</th>
    <td>{$case -> getEmail()}</td>
  </tr>
  <tr>
    <th align="left">PHONE:</th>
    <td>{$case -> getPhone()}</td>
  </tr>
  <tr>
    <th align="left">SUBJECT:</th>
    <td>{$case -> getSubject()}</td>
  </tr>
  <tr>
    <th align="left" valign="top">MESSAGE:</th>
    <td>{$message}</td>
  </tr>
</table>

<hr />

To log into your EsqSites123.com account, visit: https://esqsites123.com/members<br />
- Your EsqSites123.com Support Team
EOF;
  }

  protected function getNotificationBody($case)
  {
    return <<<EOF
    You have a new message in your ESQSITES inbox.<br />
To view your message, copy and paste (or just click on) the following link into your web browser navigation bar, press enter and login.
<br />
https://esqsites123.com/members
<br /><br />
- Your EsqSites123.com Support Team
EOF;
  }
}