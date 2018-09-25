<?php
/**
 *
 * @author Richtermeister
 */
class PasswordEmail extends Swift_Message
{
  public function __construct(Customer $customer)
  {
    parent::__construct("EQSSites Password Reminder", $this -> getBodyContent($customer));
    $this -> setFrom("customercare@esqsites123.com");
    $this -> setTo($customer -> getEmail());
  }

  protected function getBodyContent(Customer $customer)
  {
    return <<<EOF
Hi {$customer -> getFirstName()},

here is your ESQSites access information:

Username: {$customer -> getUsername()}
Password: {$customer -> getPassword()}

If you have any questions please feel free to contact support at:
customercare@esqsites123.com or via phone (619) 237-5422

Have a great day,
-- Your ESQSites Team
EOF;
  }
}