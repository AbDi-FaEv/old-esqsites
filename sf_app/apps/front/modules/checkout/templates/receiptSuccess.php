<h1><strong>Thank You</strong> and welcome to ESQSites!</h1>

<strong>Congratulations, <?php echo $customer -> getFirstName(); ?>!</strong> Your website has been created.</p>

<p>A confirmation email has been sent to <strong><?php echo $customer -> getEmail(); ?></strong> with your username and password.</p>

<p>You can <a target="_blank" href="<?php echo $website -> getFullPath(); ?>">view your site right now!</a><br />
Please allow from 48-72 hours for your domain name (<? echo $domain; ?>) to be propagated around the internet.<br />
Once this is complete you can visit your website at http://<?php echo $domain; ?>.</p>

<p>You can begin editing your website, including changing your website template, adding/deleting pages and uploading pictures at any time by logging into your <a href="/members">admin dashboard</a>.</p>

<p>If you have any questions, please feel free to contact customer support at <?php echo mail_to("support@esqsites123.com"); ?>.</p>

<p>Thank you for your business, and have a great day!<br />
- Your ESQSites Team</p>