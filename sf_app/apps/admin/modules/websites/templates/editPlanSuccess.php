<div id="sf_admin_container">
<div id="sf_admin_content" class="show">

<h1>Upgrade / Downgrade Website "<?php echo $website; ?>"</h1>

<h3>Current Plan: <?php echo $website -> getWebsiteAttribute(); ?></h3>

<?php echo $form -> renderFormTag("websites/editPlan?id=".$website -> getId()); ?>

<div id="update_plans" class="boxed">
<div class="header">Available Plans:</div>
<?php echo $form["website_attribute_id"] -> render(); ?>
</div>

<ul class="sf_admin_actions">
  <li class="sf_admin_action_back"><?php echo link_to("Back", "website_show", $website); ?></li>
  <li><input type="submit" value="Update Account"></li>
</ul>

</form>



<br class="clear" />

</div>
</div>