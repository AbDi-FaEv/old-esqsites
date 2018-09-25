<?php use_helper("Number"); ?>
<div id="sf_admin_container">
  <div id="sf_admin_content">

<h1>Monthly Revenue By Month & Bar Association</h1>

<?php echo $form -> renderFormTag(url_for("@revenue")); ?>
  <?php echo $form["month"] -> render(); ?>
  <?php if(isset($form["year"])): ?>
    <?php echo $form["year"]; ?>
  <?php endif; ?>
  <?php echo $form["bar_association_id"] -> render(); ?>
  <input type="submit" value="GO">
</form>

<?php if(count($plans)): ?>

<br /><br />

<table>
  <tr class="header">
    <th>Package size</th>
    <th>Hosting $</th>
    <th>&nbsp;</th>
    <th class="align-center"># Active Packages</th>
    <th>&nbsp;</th>
    <th>Total Hosting $</th>
  </tr>
	  <?
    $total_hosting_revenue = 0;
	$total_packages = 0;
	foreach($plans as $plan): ?>
      <tr>
        <td><?php echo $plan; ?></td>
        <td align="right"><?php echo format_currency($plan -> getPrice(), '$'); ?></td>
        <td>x</td>
        <td width="147" align="center"><?php echo $plan -> getVirtualColumn("num_used"); ?></td>
        <td width="35">=</td>
        <td align="right"><?php echo format_currency($plan -> getVirtualColumn("num_used") * $plan -> getPrice(), '$'); ?></td>
        </tr>
	  <?
	  $total_hosting_revenue += $plan -> getVirtualColumn("num_used") * $plan -> getPrice();
      $total_packages += $plan -> getVirtualColumn("num_used");
	endforeach; ?>
    <tr class="header">
      <th colspan="3" align="right">Total Revenue</th>
      <th class="align-center"><?php echo $total_packages; ?></th>
      <th></th>
      <th class="align-right"><?php echo format_currency($total_hosting_revenue, '$'); ?></th>
    </tr>
    <?php if($form -> isValid() && $form -> getValue("code")): ?>
    <tr class="header">
      <th colspan="3" align="right">Association Share<br />(5% of total revenue)</th>
      <th colspan="2"></th>
      <th align="right"><?php echo format_currency($total_hosting_revenue * 0.05, '$'); ?></th>
    </tr>
    <?php endif; ?>
</table>

<p>*this does not take into account discounts on monthly charges, i.e. free 3 month hosting</p>
<?php else: ?>
  <br /><br />
  <p>No plans match your search settings.</p>
<?php endif; ?>

 </div>
</div>