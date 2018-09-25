<h1>Account Profile</h1>

<?php include_partial("global/flashes"); ?>

<div id="sidebar">
  <div class="messagebox note">
    <p>These fields will <strong>NOT</strong> be displayed on your website and are for our records only.
    This information is kept strictly confidential.</p>
  </div>
  <?php if(false): ?>
  <div class="messagebox cancel">
    <h2>Cancelling Your Account</h2>
    <p>You can cancel your account at any time using the account cancellation form.</p>

    <ul class="sf_admin_actions">
      <li class="sf_admin_action_delete"><a href="<?php echo url_for("account/cancel"); ?>">Go To Cancellation Form &raquo;</a></li>
    </ul>
    <br class="clear" />
  </div>
  <?php endif; ?>
</div>


<div id="main_area">
<fieldset>
  <legend>Your Personal Info</legend>
<table>
  <tr><th>Username:</th><td><?php echo $customer -> getUsername(); ?></td></tr>
  <tr><th>Email:</th><td><?php echo $customer -> getEmail(); ?></td></tr>
  <tr><th>First Name:</th><td><?php echo $customer -> getFirstName(); ?></td></tr>
  <tr><th>Middle Name:</th><td><?php echo $customer -> getMiddleName(); ?></td></tr>
  <tr><th>Last Name:</th><td><?php echo $customer -> getLastName(); ?></td></tr>
  <tr><th>Birthdate:</th><td><?php echo $customer -> getBirthdate("m/d/Y"); ?></td></tr>
  <tr><th>Phone:</th><td><?php echo format_phone($customer -> getPhone()); ?></td></tr>
  <tr><th>Fax:</th><td><?php echo format_phone($customer -> getFax()); ?></td></tr>
</table>

</fieldset>

<ul class="sf_admin_actions">
  <li class="sf_admin_action_list"><?php echo link_to("Back", "@homepage"); ?></li>
  <li class="sf_admin_action_edit"><?php echo link_to("Edit Settings", "account/edit"); ?></li>
</ul>

<br class="clear" />
</div>