<div id="sf_admin_container">
<div id="sf_admin_content" class="show">

<h1>Cancel <?php echo $customer -> getTypeString(); ?>: <?php echo $customer -> getFullName(); ?> <?php echo $customer -> getStatus() == Customer::STATUS_ACTIVE ? image_tag("lightbulb") : image_tag("lightbulb_off"); ?></h1>

<fieldset>
  <legend>Cancellation Summary</legend>

  <p>This customer has been with us for <?php echo distance_of_time_in_words($customer -> getCreatedAt('U'), time()); ?>.</p>
  <?php if($customer -> hasEsqDomains()): ?>
    <p>We are hosting the following domains:</p>
    <ul>
      <?php foreach($customer -> getEsqDomains() as $domain): ?>
      <li><?php echo $domain; ?></li>
      <?php endforeach; ?>
    </ul>
  <?php else: ?>
    <p>We are <strong>NOT</strong> hosting any domains for this customer.</p>
  <?php endif; ?>
</fieldset>

<fieldset>
  <legend>Please Confirm</legend>

  <p>
    Please confirm that you are really trying to cancel this customer.<br />
    This will effectively <strong>remove this customer from our billing system</strong>,
    and the only way to re-activate an account is by having the customer enter their billing information again.
  </p>

  <?php echo $form -> renderFormTag(url_for("customer_cancel", $customer)); ?>

  <table class="form">
    <?php echo $form -> renderUsing("table"); ?>
  </table>

  <ul class="sf_admin_actions">
    <li class="sf_admin_action_list"><?php echo link_to("Back", "customer_show", $customer); ?></li>
    <li class="sf_admin_action_delete"><input type="submit" value="Absolutely Positively Cancel" /></li>
  </ul>
  </form>

</fieldset>

</div>
</div>