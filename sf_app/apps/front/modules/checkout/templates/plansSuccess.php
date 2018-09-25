<h1>
    Hosting Packages
</h1>
<!--
<div class="span-6 colborder">
  <h3>All Hosting Packages Include:</h3>
  <ul>
    <li><strong>Admin Dashboard</strong><br />A userfriendly  control panel to edit all aspects of your website: create, edit, delete web pages, manage email forwarding accounts, update payment information, receive case submissions...</li>
    <li><strong>Disclaimer Page</strong><br />EsqSites123.com offers a "Disclaimer" page to all of our clients, free of charge. </li>
    <li><strong>Web hosting</strong><br />In order to appear on the world wide web, your web site needs to be "hosted" or served up from a computer at some physical locating. With ESQSites, monthly hosting is included with your website.</li>
    <li><strong>Email Forwarding</strong><br />Allow people to send messages to yourName@yourDomainName.com while you receive those messages in your regular email inbox, i.e. you can have your mail sent to your yahoo! email account or msn hotmail account without anyone every knowing you use yahoo! or msn for email.</li>
  </ul>
</div>
-->
<p>How many pages do you want to appear on your website? Don't worry &ndash; your plan can be upgraded / downgraded at any time.<br />Simply begin by choosing the plan that seems right for you now, and adjust as you go.</p>

<div class="span-24 last" id="plans">

  <div class="plan starter">
    <h2>
        <?php echo link_to("Starter", "@plan_select?id=starter", array("method" => "put")); ?>
    </h2>
    <p>
    <strong>1 Page website</strong><br />
    <strong>$9.95/month</strong><br />
    $99 one-time setup<br />
    </p>
    <p>
    Page Suggestions:<br />
    - Home<br />
    </p>
    <p>
    <strong>Includes:</strong><br />
    - Dashboard Login<br />
    - Disclaimer page<br />
    - Hosting<br />
    - 1 Email Account
    </p>
  </div>
  <div class="plan basic">
    <h2><?php echo link_to("Basic", "@plan_select?id=basic", array("method" => "put")); ?></h2>
    <p>
    <strong>3 Page website</strong><br />
    <strong>$19.95/month</strong><br />
    $149 one-time setup<br />
    </p>
    <p>
    Page Suggestions:<br />
    - Home<br />
    - Attorney Profile<br />
    - Contact Us
    </p>
    <p>
    <strong>Includes:</strong><br />
    - Dashboard Login<br />
    - Disclaimer page<br />
    - Hosting<br />
    - 1 Email Account
    </p>
  </div>
  <div class="plan standard">
    <h2><?php echo link_to("Standard", "@plan_select?id=standard", array("method" => "put")); ?></h2>
    <p>
    <strong>5 Page website</strong><br />
    <strong>$29.95/month</strong><br />
    $199 one-time setup<br />
    </p>
    <p>
    Page Suggestions:<br />
    - Home<br />
    - Attorney Profile<br />
    - Contact Us<br />
    - Map/Directions<br />
    - News
    </p>
    <p>
    <strong>Includes:</strong><br />
    - Dashboard Login<br />
    - Disclaimer page<br />
    - Hosting<br />
    - 2 Email Accounts
    </p>
  </div>
  <div class="plan deluxe">
    <h2><?php echo link_to("Deluxe", "@plan_select?id=deluxe", array("method" => "put")); ?></h2>
    <p>
    <strong>7 Page website</strong><br />
    <strong>$39.95/month</strong><br />
    $249 one-time setup<br />
    </p>
    <p>
    Page Suggestions:<br />
    - Home<br />
    - Attorney Profile<br />
    - Practice Areas<br />
    - Contact Us<br />
    - Case Submission<br />
    - Map/Directions<br />
    - News
    </p>
    <p>
    <strong>Includes:</strong><br />
    - Dashboard Login<br />
    - Disclaimer page<br />
    - Hosting<br />
    - 5 Email Accounts
    </p>
  </div>
  <div class="plan premium">
    <h2><?php echo link_to("Premium", "@plan_select?id=premium", array("method" => "put")); ?></h2>
    <p>
    <strong>10 Page website</strong><br />
    <strong>$49.95/month</strong><br />
    $299 one-time setup<br />
    </p>
    <p>
    Page Suggestions:<br />
    - Home<br />
    - Attorney Profile<br />
    - Practice Areas<br />
    - Settlements<br />
    - Contact Us<br />
    - FAQ<br />
    - Links<br />
    - Case Submission<br />
    - Map/Directions<br />
    - News
    </p>
    <p>
    <strong>Includes:</strong><br />
    - Dashboard Login<br />
    - Disclaimer page<br />
    - Hosting<br />
    - 8 Email Accounts
    </p>
  </div>
</div>

<script>
  $().ready(function(){
    $(".plan").corner("10px").click(function(){
      var dest = $(this).find("a").attr('href');
      window.location.href = dest;
    });
  });   
</script>

<?php //echo link_to("Customize your Website", "@preview_info"); ?>