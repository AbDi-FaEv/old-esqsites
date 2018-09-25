<?php use_helper("Number"); ?>

<div id="revenue_report">

<ul style="float:right;" class="sf_admin_actions">
  <li class="sf_admin_action_list"><?php echo link_to("Back", "@homepage"); ?></li>
</ul>
  
<h2>Hosting Revenue for <?php echo $sf_user; ?> <span class="note">/month</span></h2>

<p>Currently <?php echo $total > 0 ? $total : "none"; ?> of your members are subscribing to our services.</p>

<div id="revenue_levels">
  <h3>Revenue Sharing Levels:</h3>

  <?php if($customers_needed = $sf_user -> getProfile() -> getNumCustomersToNextRevenueLevel()): ?>
  <h4 id="customers_needed">You only need <em><?php echo $customers_needed; ?></em> signup<?php if($customers_needed > 1) echo 's'; ?>  to reach the next revenue level!</h4>
  <?php endif; ?>
  
  <table>
    <tr class="header">
      <th>&nbsp;</th>
      <th>Members</th>
      <th>Revenue Share</th>
      <th>Level</th>
    </tr>
    <?php $revenue_level = $association -> getRevenueLevel(); ?>
    <?php foreach($levels as $key => $level): ?>
    <tr class="odd current">
      <td>
        <?php if($revenue_level == $level): ?>
          <?php echo image_tag("arrow_right", array("alt_title" => "You are here!")); ?>
        <?php endif; ?>
      </td>
      <td><?php echo $level["min"]; ?><?php echo $level["max"] ? " - ".$level["max"] : "+"; ?></td>
      <td><?php echo $level["share"]; ?>%</td>
      <td>(<?php echo $level["name"]; ?>)</td>
    </tr>
    <?php endforeach; ?>
  </table>
  <p class="note">Your revenue share is determined by the number of <em>active</em> ESQ customers that signed up using your referral code "<?php echo $sf_user -> getProfile() -> getReferralCode(); ?>".</p>
</div>

<?php if($total > 0): ?>

<table class="revenue">
  <thead>
  <tr>
    <th>Package size</th>
    <th>Hosting Revenue</th>
    <th>&nbsp;</th>
    <th class="align-center"># Packages</th>
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
        <td width="147" class="align-center"><?php echo $plan -> getVirtualColumn("num_used"); ?></td>
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
      <?php $revenue_level = $association -> getRevenueLevel(); ?>
      <td colspan="5" align="right"> = <?php echo $sf_user; ?> Share (<?php echo $revenue_level["share"]; ?>% of total revenue)</td>
      <td align="right"><?php echo format_currency($total_hosting_revenue * ($revenue_level["share"] / 100), 'USD'); ?></td>
    </tr>
</table>
<?php endif; ?>

<hr class="clear" />
<ul class="sf_admin_actions">
  <li class="sf_admin_action_list"><?php echo link_to("Back", "@homepage"); ?></li>
</ul>

</div>