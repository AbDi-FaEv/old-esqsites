<h1>Billing Information</h1>

<?php include_partial("global/flashes"); ?>

<div id="sidebar">
  <div class="messagebox note">
    <p>The following settings are for billing purposes only and are kept private for your security.</p>
    <p>This information will <strong>NOT</strong> appear on your website.</p>
  </div>
</div>

<div id="main_area">

<?php foreach($websites as $website): ?>

<fieldset>
  <legend>Payment Information for "<?php echo $website; ?>"</legend>

  <?php if(isset($subscriptions[$website -> getId()])): ?>
    <?php $subscription = $subscriptions[$website -> getId()]; ?>
    <?php if($subscription === false): //error ?>
      <p>We seem unable to locate your payment details. Please contact us directly to update your account.</p>
    <?php else: ?>
    <table>
      <tr>
        <th>Card First Name:</th>
        <td><?php echo $subscription -> getFirstName(); ?></td>
      </tr>
      <tr>
        <th>Card Last Name:</th>
        <td><?php echo $subscription -> getLastName(); ?></td>
      </tr>
      <tr>
        <th>Type of Card:</th>
        <td><?php echo $subscription -> getCardType(); ?>
        </td>
      </tr>
      <tr>
        <th>Card Number:</th>
        <td>ending in: <?php echo $subscription -> getCardLastFour(); ?></td>
      </tr>
      <tr>
        <th>Card Expiration Date:</th>
        <td><?php echo $subscription -> getExpirationDate(); ?></td>
      </tr>
    </table>
    <?php endif; ?>
  <?php else: ?>
      <p>This website has no payment information.</p>
  <?php endif; ?>

  <ul class="sf_admin_actions">
    <li class="sf_admin_action_edit"><?php echo link_to("Edit Settings", "edit_billing", $website); ?></li>
  </ul>

</fieldset>
<?php endforeach; ?>

<ul class="sf_admin_actions">
  <li class="sf_admin_action_list"><?php echo link_to("Back", "@homepage"); ?></li>
</ul>

</div>