<?php
/**
 *
 * @author Richtermeister
 */
class ClientMessageNotificationEmail extends Swift_Message
{
  public function __construct(Customer $customer)
  {
    $body = 'Please log into your ESQSites account at http://www.esqsites123.com/members.php to review your new messages.';

    $count = $customer -> getNumNewClientMessages();
    $subject = "You have %s unreviewed client messages waiting";



    parent::__construct($subject, $body);

    $this -> setFrom("customercare@esqsites123.com");
    $this -> setTo($customer -> getEmail());
  }
}