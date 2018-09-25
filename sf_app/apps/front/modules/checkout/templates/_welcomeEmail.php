<h1>Welcome to ESQSites!</h1>

Congratulations, your website has been created!

<p>
To view your website, just paste the link below in the address bar on your browser.Your temporary website address is:
<?php echo $website -> getFullPath(); ?>
</p>

<p>
To edit and or make changes to your site you can log in from the <a href="http://esqsites123.com">EsqSites123.com</a> home page or click on the link below
</p>

Browse to: <a href="https://esqsites123.com/members">https://esqsites123.com/members</a>


<p style="font-weight: bold">
username: <?php echo $website -> getCustomer() -> getUsername(); ?><br />
password: <?php echo $website -> getCustomer() -> getPassword(); ?>
</p>

<p>
If you registered a domain name with EsqSites123.com, then just ignore the following 2 steps:
</p>

<p>
If you DID NOT register your domain name with esqsites123.com , you will need to complete 1 of 2 tasks to get your domain name to work with your new website.
</p>

<p>
1.   You can change your domain name's DNS "A" record. This will make it so only your domain name will point at ESQ's webservers while your domain name's current email settings will remain unchanged (i.e. yourName@yourDomain.com will still be handled by a third party email provider).   If you already have email accounts setup and in use with your existing domain name and you do NOT want EsqSites123.com handling your email forwarding, then this is the option for you. Just login to your domain name registrar (i.e. godaddy, register.com, etc.) and set your domain name's "A" record to point to <b>"188.166.25.224"</b>.
</p>

<p>
2.  The second option is to switch your domain name's DNS servers. This allows EsqSites123.com to give you full control of your email accounts for your domain name. Just login into your domain name registrar (i.e. godaddy, register.com, etc.) and edit your primary and secondary DNS server settings as follows:
</p>
------------------------------</br>
Primary DNS: NS.RACKSPACE.COM</br>
Secondary DNS: NS2.RACKSPACE.COM</br>
------------------------------</br>

<p>
If you are unable or do not know how to switch your domain name's name servers or "A" record, please contact <a href="mailto:dns@esqsites123.com">dns@esqsites123.com</a> or <a href="mailto:support@esqsites123.com">support@esqsites123.com</a> and we can make the switch free of charge. Please note that changes to your domain name's DNS or A records can take up to 48-72 hours to take full effect.
</p>

<p>
If you registered your domain name through EsqSites123.com, please allow from 48-72 hours for your domain name to become active. Domain name activation time is based on when the DNS settings are changed, so if you are doing this yourself, expect a 48-72 hour delay from the time you make the initial changes to your domain's DNS information.
</p>

<p>
Finally, if you have any questions please feel free to contact support at:
<a href="mailto:customercare@esqsites123.com">customercare@esqsites123.com</a>
or via phone: (619) 237-5422
</p>

<p>
Have a great day, -- Your ESQSites Team
</p>

