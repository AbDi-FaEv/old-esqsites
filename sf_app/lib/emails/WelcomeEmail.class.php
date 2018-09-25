<?php
/**
 * represents the welcome email to new customers
 *
 * @author Richtermeister
 */
class WelcomeEmail extends Swift_Message
{  

  public function  __construct(Website $website, $include_domain_info = null)
  {
    if(null === $include_domain_info)
    {
      $include_domain_info = $website -> hasEsqDomains();
    }

    $subject = "Welcome to ESQSites!";
    $body = $this -> getBodyCopy($website);

    parent::__construct($subject, $body, 'text/html');

    $this -> setFrom("customercare@esqsites123.com");
    $this -> setTo($website -> getEmail());
  }

  protected function getBodyCopy(Website $website)
  {
    return <<<EOF
<h1>Welcome to ESQSites!</h1>

<p>
Your website has been created!<br />
Your temporary website address is: {$website -> getFullPath()}
</p>

<p>
To edit and or make changes to your site you can log into Quick Edit(tm):<br /><br />

Browse to: https://esqsites123.com/members<br />
<strong>
Username: {$website -> getCustomer() -> getUsername()}<br />
Password: {$website -> getCustomer() -> getPassword()}
</strong>
</p>

<p>
If you did not register a new domain name with esqsites123.com for your website
then you will need to complete 1 of 2 tasks to get your domain name to work with
your new website (if you bought a domain name with EsqSites123.com, then just
ignore the following 2 steps):
</p>

<p>
1.) You can change your domain name's DNS "A" record.  This will make it so only your
domain name will point at ESQ's webservers while your domain name's current email
settings will remain unchanged (i.e. yourName@yourDomain.com will still be handled
by a third party email provider).  Again, if you already have email accounts setup
and in use with your existing domain name and you do NOT want EsqSites123.com
handling your email forwarding, then this is the option for you. Just login to your
domain name registrar (i.e. godaddy, register.com, etc.) and set your domain name's
"A" record to point to "108.166.25.224".
</p>

<p>
2.) The second option is to switch your domain name's DNS servers.  This allows
EsqSites123.com to give you full control of your email accounts for your domain
name.  Just login into your domain name registrar (i.e. godaddy, register.com, etc.)
and edit your primary and secondary DNS server settings as follows:<br />
------------------------------<br />
Primary DNS:    NS.RACKSPACE.COM<br />
Secondary DNS:  NS2.RACKSPACE.COM<br />
------------------------------
</p>

<p>
If you are unable or do not know how to switch your domain name's name servers or
"A" record, please contact dns@esqsites123.com or support@esqsites123.com and we can
make the switch free of charge.  Please note that changes to your domain name's
DNS or A records can take up to 48-72 hours to take full effect.
</p>

<p>
If you bought a domain name through EsqSites123.com, please allow from 48-72 hours
for your domain name to become active.  Domain name activation time is based on
when the DNS settings are changed, so if you are doing this yourself, expect a 48-72
hour delay from the time you make the initial changes to your domain's DNS information.
</p>

<p>
Finally, if you have any questions please feel free to contact support at:<br />
customercare@esqsites123.com<br />
or via phone: (619) 237-5422
</p>

<p>
Have a great day,
-- Your ESQSites Team
</p>
EOF;
  }

  protected function getDomainInstructions()
  {
    
  }
}
