<ul style="float:right;" class="sf_admin_actions">
  <li class="sf_admin_action_list"><?php echo link_to("Back", "@homepage"); ?></li>
</ul>

<h1><?php echo $sf_user -> getProfile(); ?> Members</h1>

<?php if(count($members)): ?>
<table id="members" class="framed" width="100%">
  <thead>
  <tr>
    <th>&nbsp;</th>
    <th>Name</th>
    <th>Website(s)</th>
    <th>Signup Date</th>
  </tr>
  </thead>
  <tbody>
  <?php foreach($members as $member): ?>
  <tr class="<?php echo $members -> isEven() ? 'even' : 'odd'; ?>">
    <td><?php echo $member -> getStatus() == Customer::STATUS_ACTIVE ? image_tag("lightbulb", array("alt_title" => "Customer is active")) : image_tag("lightbulb_off", array("alt_title" => "Customer is inactive")); ?></td>
    <td><?php echo $member; ?></td>
    <td>
      <?php foreach($member -> getWebsites() as $website): ?>
        <?php echo $website -> getHostingPlan(); ?><br />
      <?php endforeach; ?>
    </td>
    <td><?php echo $member -> getCreatedAt('F jS, Y'); ?></td>
  </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php echo image_tag("lightbulb"); ?> = Active | <?php echo image_tag("lightbulb_off"); ?> = Inactive

<?php else: ?>
  <p>Currently none of your members are subscribing to our services.</p>
<?php endif; ?>

<hr class="clear" />
<ul class="sf_admin_actions">
  <li class="sf_admin_action_list"><?php echo link_to("Back", "@homepage"); ?></li>
</ul>