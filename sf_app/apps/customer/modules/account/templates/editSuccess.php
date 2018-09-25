<h1>Update Account Profile</h1>

<div id="sidebar">
  <div class="messagebox note">
    <p>This information is only used to allow you to access your account, and to allow us to contact you if we need to.
    It will NOT be displayed on your website.</p>
  </div>
</div>

<div id="main_area">
<?php echo $form -> renderFormTag(url_for("account/edit")); ?>

<?php echo $form -> renderGlobalErrors(); ?>

<fieldset>
<legend>Account Login</legend>
<table class="lines">
  <?php echo $form["username"] -> renderRow(); ?>
  <?php echo $form["password"] -> renderRow(); ?>
  <?php echo $form["password_repeat"] -> renderRow(); ?>
</table>
</fieldset>

<fieldset>
<legend>Contact Information</legend>
<table class="lines">
  <?php echo $form["email"] -> renderRow(); ?>
  <?php echo $form["first_name"] -> renderRow(); ?>
  <?php echo $form["middle_name"] -> renderRow(); ?>
  <?php echo $form["last_name"] -> renderRow(); ?>
  <?php echo $form["birthdate"] -> renderRow(); ?>
  <?php echo $form["phone"] -> renderRow(); ?>
  <?php echo $form["fax"] -> renderRow(); ?>
</table>
</fieldset>

<?php echo $form -> renderHiddenFields(); ?>

<ul class="sf_admin_actions">
  <li class="sf_admin_action_list"><?php echo link_to("Back", "account/show"); ?></li>
  <li class="sf_admin_action_save"><input type="submit" value="Update" /></li>
</ul>

<br class="clear" />

</form>
<script>
$().ready(function(){
  $("#customer_phone").add("#customer_fax").mask("(999) 999-9999");
});

</script>
</div>