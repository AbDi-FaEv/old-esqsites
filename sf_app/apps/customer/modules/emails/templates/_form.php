<?php echo form_tag_for($form, '@email_account') ?>

<?php echo $form -> renderGlobalErrors(); ?>

<fieldset>
  <div class="sf_admin_row">
    <?php echo $form["local_address"] -> renderError(); ?>
    <?php echo $form["local_address"] -> renderLabel(); ?>
    <?php if(isset($form["domain_name_id"]) && (!$form["domain_name_id"] -> isHidden())): ?>
      <?php echo $form["local_address"] -> render(); ?> @ <?php echo $form["domain_name_id"] -> render(); ?>
    <?php else: ?>
      <?php echo $form["local_address"] -> render(); ?> @ <?php echo $email_account -> getDomain(); ?>
    <?php endif; ?>
    <!--
    <div class="help">(email address you want mail sent to, i.e.: name@DeronCastro.com) </div>\
    -->
  </div>
  <div class="sf_admin_row">
    <?php echo $form["forwarding_address"] -> renderError(); ?>
    <?php echo $form["forwarding_address"] -> renderLabel(); ?>
    <?php echo $form["forwarding_address"] -> render(); ?>
    <div class="help">(your physical email inbox that you check on a regular basis, i.e.: joesmith@yahoo.com)</div>
  </div>
</fieldset>

<?php echo $form -> renderHiddenFields(); ?>

<?php include_partial('emails/form_actions', array('email_account' => $email_account, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
<!--
<ul class="sf_admin_actions">
  <li class="sf_admin_action_list"><?php echo link_to("Back", "emails/index"); ?></li>
  <li class="sf_admin_action_save"><input type="submit" value="Update Account" /></li>
</ul>
-->
</form>

<br class="clear" />