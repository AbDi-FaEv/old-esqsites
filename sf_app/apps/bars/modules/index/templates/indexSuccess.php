<?php use_helper("Number"); ?>

<div id="revenue_report" class="span-14 colborder append-1">
<h2>Hosting Revenue for <?php echo $sf_user; ?> <span class="note">/month</span></h2>

<p>Currently <?php echo $total > 0 ? $total : "none"; ?> of your members are subscribing to our services.</p>

<?php if($total > 0): ?>

<table class="revenue">
  <thead>
  <tr>
    <th>Package size</th>
    <th>Hosting Revenue</th>
    <th>&nbsp;</th>
    <th align="center"># Packages</th>
    <th>&nbsp;</th>
    <th>Total Hosting $</th>
  </tr>
  </thead>
	  <?
    $total_hosting_revenue = 0;
	$total_setup_revenue = 0;
	$total_packages = 0;
	foreach($plans as $plan): ?>
      <tr class="<?php echo $plans -> isOdd() ? "odd" : "even"; ?>">
        <td nowrap><?php echo $plan; ?></td>
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
    <tr class="totals">
      <td colspan="3" align="right"> = Total Revenue</td>
      <td align="center"><?php echo $total_packages; ?></td>
      <td></td>
      <td align="right"><?php echo format_currency($total_hosting_revenue, 'USD'); ?></td>
    </tr>
    <tr class="totals">
      <td colspan="5" align="right"> = <?php echo $sf_user; ?> Share (5% of total revenue)</td>
      <td align="right"><?php echo format_currency($total_hosting_revenue * 0.05, 'USD'); ?></td>
    </tr>
</table>
<?php endif; ?>
</div>

<div id="downloads" class="span-8 last">
  <?php include_partial("downloads"); ?>
</div>