<h1>Edit Billing Information</h1>

<?php echo $form -> renderFormTag(url_for("edit_billing", $website), array("method" => $website -> getCgId() ? "put" : "post")); ?>
<?php echo $form -> renderHiddenFields(); ?>

<fieldset>
  <legend>Payment Information for "<?php echo $website; ?>"</legend>

  <?php if(!$website -> getCgId()): ?>
    <p>So far no payment information is associated with this website, but you can change that by filling in the form below.</p>
  <?php endif; ?>

  <table>
    <?php echo $form; ?>
  </table>

</fieldset>

<ul class="sf_admin_actions">
  <li class="sf_admin_action_list"><?php echo link_to("Back", "account/showBilling"); ?></li>
  <li class="sf_admin_action_save"><input type="submit" value="Update Settings" /></li>
</ul>