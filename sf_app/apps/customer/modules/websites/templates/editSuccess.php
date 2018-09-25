<?php if($form -> isNew()): ?>
  <h1>Add New Website</h1>
<?php else: ?>
  <h1>Edit Website Information</h1>
<?php endif; ?>

<?php echo $form -> renderFormTag($form -> isNew() ? url_for("website_new") : url_for("website_edit", $form -> getObject())); ?>
<?php echo $form -> renderHiddenFields(); ?>
<?php echo $form -> renderGlobalErrors(); ?>

<fieldset>
  <legend>Website Information</legend>
  
  <div class="help">The following fields will appear on each page of your website.</div>
  
  <table class="lines">
    <?php echo $form["firm_name"] -> renderRow(); ?>
    <?php echo $form["firm_type"] -> renderRow(); ?>
    <?php echo $form["email"] -> renderRow(); ?>
    <?php echo $form["address"] -> renderRow(); ?>
    <?php echo $form["city"] -> renderRow(); ?>
    <?php echo $form["state"] -> renderRow(); ?>
    <?php echo $form["zip"] -> renderRow(); ?>
    <?php echo $form["phone"] -> renderRow(); ?>
    <?php echo $form["fax"] -> renderRow(); ?>
  </table>
  
</fieldset>

<fieldset>
  <legend>Meta Information</legend>

  <div class="help">"Meta Information" is information that search engines and other non-human visitors of your site use to categorize and describe your website.</div>

  <table class="lines">
    <?php echo $form["meta_description"] -> renderRow(); ?>
    <?php echo $form["meta_keywords"] -> renderRow(); ?>
  </table>

</fieldset>

<ul class="sf_admin_actions">
  <li class="sf_admin_action_list"><?php echo link_to("Back", "websites/show"); ?></li>
  <li class="sf_admin_action_save"><input type="submit" value="<?php echo $form -> isNew() ? "Create Website" : "Update Info"; ?>"></li>
</ul>
</form>

<br class="clear" />

<script>
$().ready(function(){
  $("#website_phone").add("#website_fax").mask("(999) 999-9999");
});

</script>