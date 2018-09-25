<div id="sf_admin_container">
<div id="sf_admin_content" class="show">

<h1>Add Coupon To <?php echo $customer -> getTypeString(); ?>: <?php echo $customer -> getFullName(); ?> <?php echo $customer -> getStatus() == Customer::STATUS_ACTIVE ? image_tag("lightbulb") : image_tag("lightbulb_off"); ?></h1>

<p>This screen allows you to add coupons to a customer, in case they forgot to enter their code during checkout.</p>

<?php echo $form -> renderFormTag(url_for("customer_addCoupon", $customer)); ?>
<fieldset>
  <legend>Coupon Info</legend>

  <table>
  <?php echo $form; ?>
  </table>

  <ul class="sf_admin_actions">
    <li class="sf_admin_action_list"><?php echo link_to("Back", "customer_show", $customer); ?></li>
    <li class="sf_admin_action_delete"><input type="submit" value="Apply Coupon" /></li>
  </ul>
</fieldset>
</form>
</div>
</div>