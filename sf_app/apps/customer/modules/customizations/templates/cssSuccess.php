<?php decorate_with("layout_wrapped"); ?>

<h1>CSS Customization</h1>

<?php include_partial("esqTemplateSelector/template_nav"); ?>

<?php echo $form -> renderFormTag(url_for("@customize?action=css")); ?>
  <?php echo $form -> renderHiddenFields(true); ?>

  <?php echo $form["content"] -> renderError(); ?>
  <?php echo $form["content"] -> render(); ?>
  <hr />

  <ul class="sf_admin_actions">
    <li class="sf_admin_action_list"><?php echo link_to("Back", "template_select"); ?></li>
    <li class="sf_admin_action_save"><input type="submit" value="Apply This CSS Customization" /></li>
  </ul>

</form>