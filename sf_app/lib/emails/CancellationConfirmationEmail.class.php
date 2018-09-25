<?php
/**
 * represents the cancellation confirmation email for customers who canceled their account
 *
 * @author Richtermeister
 */
class CancellationConfirmationEmail extends Swift_Message
{  

  public function  __construct(Customer $customer)
  {
    $subject = "Cancellation Confirmation";
    $body = $this -> getBodyCopy($customer);

    parent::__construct($subject, $body, 'text/html');

    $this -> setFrom("customercare@esqsites123.com");
    $this -> setTo($customer -> getEmail());
  }

  protected function getBodyCopy(Customer $customer)
  {
    return <<<EOF
<p>
This is to confirm the cancellation of your website {}.
</p>

<p>
Have a great day,
-- Your ESQSites Team
</p>
EOF;
  }
}