<div id="website_list">

<h2>Your Websites:</h2>

<?php foreach($websites as $website):?>
<a href="<?php echo url_for("website_select", $website); ?>">
<div class="website<?php if($website -> getId() == $sf_user -> getCurrentWebsiteId()): ?> current<?php endif; ?>">
  <?php echo thumbnail_tag($website -> getWebsiteTemplate() -> getImageUrl(), 60, 100); ?>
  <div class="name"><?php echo $website -> getFirmName(); ?></div>
  <div class="plan">(<?php echo $website -> getHostingPlan(); ?>)</div>
</div>
</a>
<?php endforeach; ?>

<?php if(false): ?>
<?php if(count($websites) == 1): ?>
  <p>Did you know, you can use ESQSites to manage more than one website.</p>
<?php endif; ?>

<?php echo link_to("Add Another Website", "website_new"); ?>
<?php endif; ?>

</div>