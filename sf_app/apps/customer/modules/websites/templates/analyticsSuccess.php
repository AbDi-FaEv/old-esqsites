<h1>Visitor Tracking</h1>

<div class="span-16 colborder">

<?php echo $form -> renderFormTag(url_for("@google_tools")); ?>
<?php echo $form -> renderGlobalErrors(); ?>
<?php echo $form -> renderHiddenFields(); ?>

<fieldset>
<legend>Google Analytics Code</legend>
  <table>
    <?php echo $form["analytics_code"] -> renderRow(); ?>
  </table>
</fieldset>

<fieldset>
<legend>Google App Verification</legend>
  <table>
    <?php echo $form["apps_token"] -> renderRow(); ?>
  </table>
</fieldset>

<ul class="sf_admin_actions">
  <li class="sf_admin_action_list"><?php echo link_to("Back", "@homepage"); ?></li>
  <li class="sf_admin_action_save"><input type="submit" value="Update Settings"></li>
</ul>
</form>

</form>

</div>
<div class="span-5 last">
  <?php echo image_tag("analytics_logo.gif"); ?>
  <p>ESQSites123.com enables you to use Google Analytics on your account to track visitors to your site.</p>
  <p>To activate your tracking, you first have to create a Google Analytics account.</p>
  <p><?php echo link_to("Click here for instructions!", "/wiki/tools/google", array("class" => "tick", "popup" => array("popup", "width=500,height=400,scrollbars=true"))); ?></p>
</div>

<br class="clear" />