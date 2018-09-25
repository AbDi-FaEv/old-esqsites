<?php
/**
 *
 * @author Richtermeister
 */
class AdminSignupNotificationEmail extends Swift_Message
{
  public function __construct(Website $website)
  {
    $body = $this -> getBodyContent($website);
    parent::__construct("New ESQ Customer", $body);
    $this -> setFrom("no-reply@esqsites123.com");
  }

  public function getBodyContent(Website $website)
  {

    return <<<EOF
Great News!

{$website -> getCustomer() -> getFullName()} just signed up for a {$website -> getHostingPlan() -> getNumPages()} page website.

The temporary website is at: {$website -> getFullPath()}

Have a great day,
-- ESQSites
EOF;
  }
}
