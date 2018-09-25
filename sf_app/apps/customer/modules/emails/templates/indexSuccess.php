<h1>Manage Email Accounts</h1>

<?php include_partial("global/flashes"); ?>

<div id="sidebar">
  <div class="note messagebox">
    <p>EsqSites123.com is not an email provider, but we do provide an <strong>email "forwarding" service</strong> to your existing email address.</p>
    <p>For example, if your current email address is "joesmith@yahoo.com" you will continue to utilize yahoo's email service.
    EsqSites123.com allows you to present a more professional image by allowing you to create a forwarding email account
    (i.e. joesmith@smithlaw.com).  Thus, by using our forwarding service, your clients and opposing counsel,
    will address their emails to the "joesmith@smithlaw.com" address, but you will still receive mail via your
    existing email provider (i.e.yahoo, msn, aol, gmail, etc.).</p>
    <p>The difference is purely aesthetic and makes you and your office appear more professional.</p>
  </div>
</div>

<div id="main_area">

<?php foreach($website -> getDomains() as $domain): ?>
<fieldset>
  <legend>Email Forwards @ <?php echo $domain; ?></legend>

  <p>You have <strong><?php echo $website -> getNumEmailAccounts(); ?></strong> out of <strong><?php echo $website -> getHostingPlan() -> getNumEmails(); ?></strong> email forwards set up.
    <!--<a href="">Click here to enable more forwards.</a>-->
  </p>

  <?php if($website -> getNumEmailAccounts() > 0): ?>
  <table class="sf_admin_list" width="100%">
    <tr>
      <th>Status</th>
      <th>&nbsp;</th>
      <th colspan="2">Actions</th>
    </tr>
  <?php foreach($domain -> getEmailAccounts() as $key => $email_account): ?>
    <tr>
      <td class="<?php echo $email_account -> getStatus() == EmailAccount::STATUS_PENDING_REMOVAL ? "red" : "green"; ?>">
        <?php if($email_account -> getStatus() == EmailAccount::STATUS_ACTIVE) echo image_tag("lightbulb"); ?>
        <?php if($email_account -> getStatus() == EmailAccount::STATUS_PENDING_REMOVAL) echo image_tag("clock_delete"); ?>
        <?php if($email_account -> getStatus() == EmailAccount::STATUS_PENDING_ACTIVATION) echo image_tag("clock_add"); ?>
        <?php echo $email_account -> getStatusString(); ?>
      </td>
      <td><strong><?php echo $email_account -> getFromEmail(); ?></strong> forwards to <strong><?php echo $email_account -> getForwardingAddress(); ?></strong></td>
      <?php if($email_account -> getStatus() != EmailAccount::STATUS_PENDING_REMOVAL): ?>
        <td width="16"><?php echo link_to(image_tag("email_edit"), "email_account_edit", $email_account, "title=Edit This Forwarding"); ?></td>
        <td width="16"><?php echo link_to(image_tag("email_delete"), "email_account_delete", $email_account, "title=Delete This Forwarding confirm=Delete Email Forwarding? Are you sure? method=delete"); ?></td>
      <?php else: ?>
        <td colspan="2"><?php echo link_to(image_tag("arrow_undo"), "emails/reactivate?id=".$email_account -> getId(), "title=Re-Activate This Forwarding confirm=Re-Activate Email Forwarding? Are you sure? method=put"); ?></td>
      <?php $pending = true; 
        endif; ?>
    </tr>
  <?php endforeach; ?>
  </table>
  <?php endif; ?>

  <?php if($website -> getNumEmailAccounts() < $website -> getHostingPlan() -> getNumEmails()): ?>
  <ul class="sf_admin_actions">
    <li class="sf_admin_action_add"><?php echo link_to("Add Email Forward", "email_account_new", array("domain_name_id" => $domain -> getId())); ?></li>
  </ul>
  <?php endif; ?>
  
</fieldset>
<?php endforeach; ?>

<?php if(isset($pending)): ?>
<div class="time">
  <p>One of your account is scheduled to be updated. 
    Please allow up to one hour for changes to take effect.</p>
</div>
<?php endif; ?>

</div>