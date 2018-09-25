<div id="sf_admin_container">
  <div id="sf_admin_content">

<h1>Bar Association Revenue Report</h1>

<?php include_partial("form", array("form" => $form)); ?>

<?php if($form -> isBound() && $form -> isValid()): ?>
<?php $plans = $form -> getPlans(); ?>

<?php foreach($form -> getAssociations() as $association): ?>

<h2><?php echo $association; ?></h2>

<?php if(isset($plans[$association -> getId()])): ?>
<table>
  <tr>
    <th>Month</th>
    <th>Package size</th>
    <th>Hosting $</th>
    <th>&nbsp;</th>
    <th># Active Packages</th>
    <th>&nbsp;</th>
    <th>Total Hosting $</th>
  </tr>
	  <?
    $total_hosting_revenue = 0;
	$total_setup_revenue = 0;
	$total_packages = 0;
	foreach($plans[$association -> getId()] as $month => $plan_collection): ?>
      <?php foreach($plan_collection as $plan): ?>
      <tr>
        <?php if($plan_collection -> isFirst()): ?>
        <th rowspan="<?php echo count($plan_collection); ?>"><?php echo date("M/Y", $month); ?></th>
        <?php endif; ?>
        <td><?php echo $plan; ?></td>
        <td align="right"><?php echo format_currency($plan -> getPrice(), 'USD'); ?></td>
        <td>x</td>
        <td width="147" align="center"><?php echo $plan -> getVirtualColumn("num_used"); ?></td>
        <td width="35">=</td>
        <td align="right"><?php echo format_currency($plan -> getVirtualColumn("num_used") * $plan -> getPrice(), 'USD'); ?></td>
        </tr>
	  <?
	  $total_hosting_revenue += $plan -> getVirtualColumn("num_used") * $plan -> getPrice();
	  $total_setup_revenue += $plan -> getVirtualColumn("num_used") * $plan -> getSetupPrice();
      $total_packages += $plan -> getVirtualColumn("num_used");
	endforeach; ?>
    <?php endforeach; ?>
    <tr>
      <th rowspan="2"></th>
      <th colspan="3" align="right">Total Revenue</th>
      <th align="center"><?php echo $total_packages; ?></th>
      <th></th>
      <th align="right"><?php echo format_currency($total_hosting_revenue, 'USD'); ?></th>
    </tr>
    <tr>
      <th colspan="3" align="right">Association Share<br />(5% of total revenue)</th>
      <th colspan="2"></th>
      <th align="right"><?php echo format_currency($total_hosting_revenue * 0.05, 'USD'); ?></th>
    </tr>
</table>
<?php else: ?>
  <p>No customers</p>
<?php endif; ?>
<?php endforeach; ?>

<?php endif; ?>
  
  </div>
</div>