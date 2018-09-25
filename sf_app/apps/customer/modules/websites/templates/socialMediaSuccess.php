<h1>Social Media</h1>

<div class="span-16 colborder">

<?php echo $form -> renderFormTag(url_for("@social_media")); ?>
<?php echo $form -> renderGlobalErrors(); ?>

<?php if($form -> isCSRFProtected()): ?>
  <?php echo $form[$form -> getCSRFFieldName()] -> render(); ?>
<?php endif; ?>

<fieldset>
<legend class="no-bg"><?php echo link_to(image_tag("facebook"), "http://www.facebook.com", array("target" => "_blank")); ?></legend>
  <table>
    <?php echo $form["facebook"] -> renderRow(); ?>
  </table>
</fieldset>

<fieldset>
<legend class="no-bg"><?php echo link_to(image_tag("twitter"), "http://www.twitter.com", array("target" => "_blank")); ?></legend>
  <table>
    <?php echo $form["twitter"] -> renderRow(); ?>
  </table>
</fieldset>

<fieldset>
<legend class="no-bg"><?php echo link_to(image_tag("linked_in.jpg"), "http://www.linkedin.com", array("target" => "_blank")); ?></legend>
  <table>
    <?php echo $form["linked_in"] -> renderRow(); ?>
  </table>
</fieldset>

<fieldset>
<legend class="no-bg"><?php echo link_to(image_tag("avvo.jpg"), "http://www.avvo.com", array("target" => "_blank")); ?></legend>
  <table>
    <?php echo $form["avvo"] -> renderRow(); ?>
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

<p>Social Media allow you to reach out to a wide audience.</p>
<p>To add social media links to your website, you first have to have accounts with the social networks you wish to support.</p>

</div>

<br class="clear" />