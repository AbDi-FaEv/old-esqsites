<?php $this -> extend("layout"); ?>
<h2>Dear <?php echo $first_name ? $first_name : "Bar Affinity Partner"; ?></h2>

<p>EsqSites has always valued--and will continue to value-- your feedback.
Many of you have taken the time to discuss features your association would like EsqSites offer.
We've listened.  Many of those suggestions and comments were actually "integrated" into our system.
Therefore, it is with great pleasure that we announce the launch of our new bar association dashboard!</p>

<?php echo image_tag("email/bar_dash_screenshot.jpg", array("absolute" => true)); ?>

<p>Your dashboard will provide you access to the following features:</p>

<ul>
  <li>Ability to access real time data on your associations statistics<br /></li>
  <li>Ability to access revenue reports</li>
  <li>Ability to download print copy for placement in your associations periodicals</li>
  <li>Ability to download logos and buttons for your webpages</li>
  <li>Ability to communicate via "Live Chat" to assist with familiarizing you and your staff with dashboard features</li>
  <li>Ability to directly send feedback with suggestions and comments</li>
</ul>

<p>We encourage you to take a quick tour of this new feature - it only takes a few minutes.
To login into your association dashboard, simply browse to http://esqsites123.com/bars and log in with your credentials:</p>

<p>
  <strong>Username:</strong> <?php echo $bar -> getAbbreviation(); ?><br />
  <strong>Password:</strong> <?php echo $bar -> getPassword(); ?><br />
</p>

<p>After you log in, you can change your password to something more memorable.</p>

<p>We hope that you will enjoy using this new feature, but also continue to let us know
what we can do to further improve the level and quality of our service to your association.</p>