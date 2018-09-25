<div id="sf_admin_container">
<div id="sf_admin_content" class="show">

<h1>Website: <?php echo $website; ?></h1>

<?php include_partial("index/flashes"); ?>

<fieldset>
  <legend>General Info</legend>
  <table>
    <tr>
      <th>Firm:</th><td><?php echo $website -> getFirmName(); ?>
        <?php if($type = $website -> getFirmType()) { ?> 
        (<?php echo $website -> getFirmType(); ?>)
        <?php } ?>
      </td>
    </tr>
    <tr>
      <th>Address:</th><td><?php echo $website -> getAddress(); ?><br /><?php echo $website -> getCity(); ?>, <?php echo $website -> getState(); ?> <?php echo $website -> getZip(); ?></td>
    </tr>
    <tr>
      <th>Email:</th><td><?php echo $website -> getEmail() ? mail_to($website -> getEmail()) : "-"; ?></td>
    </tr>
    <tr>
      <th>Phone:</th><td><?php echo format_phone($website -> getPhone()); ?></td>
    </tr>
    <tr>
      <th>Fax:</th><td><?php echo format_phone($website -> getFax()); ?></td>
    </tr>
  </table>
</fieldset>

<fieldset>
  <legend>Associated Customer</legend>
  <?php echo link_to($website -> getCustomer(), "customer_show", $website -> getCustomer()); ?>
</fieldset>

<fieldset>
  <legend>Template</legend>
  <?php if($template = $website -> getWebsiteTemplate()): ?>
    <?php echo thumbnail_tag($template -> getImageUrl(), 60, 100); ?>
    <p><?php echo $template -> getReference(); ?> <?php echo $template -> getTitle(); ?></p>
  <?php endif; ?>
</fieldset>

<fieldset>
  <legend>Invoices & Billing</legend>
  <p>Last Billing Date: <?php echo $website -> getLastBillingDate("m/d/Y"); ?></p>
</fieldset>

<fieldset>
  <legend>Host & Location</legend>
  <p>Host: <?php echo $website -> getHost(); ?></p>

  <?php if($website -> directoryExists()): ?>
    <p>Full Path: <a href="<?php echo $website -> getFullPath(); ?>" target="_blank"><?php echo $website -> getFullPath(); ?></a></p>
  <?php else: ?>
    <p>No directory found <span class="quiet">(looking for: <?php echo $website -> getAbsolutePath(); ?>)</span>.
    <br /><?php echo link_to("Create Directory", "website_createDirectory", $website, array("post" => true)); ?></p>
  <?php endif; ?>

  <?php if($sf_user -> isSuperAdmin()): ?>
    <ul class="sf_admin_actions">
      <li class="sf_admin_action_delete"><?php echo link_to("Reset Pages", "website_resetPages", $website, array("confirm" => "This will DELETE existing pages! Are you sure?", "post" => true)); ?></li>
    </ul>
  <?php endif; ?>
</fieldset>

<?php include_partial("websites/domains", array("website" => $website)); ?>

<ul class="sf_admin_actions">
  <li class="sf_admin_action_edit"><?php echo link_to("Edit", "website_edit", $website); ?></li>
</ul>

<br class="clear" />

</div>
</div>