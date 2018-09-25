<?php if(!$sf_params -> get("in_checkout") && $sf_user -> hasCheckoutInProgress()): ?>
  <div id="checkout_return">
    <?php if($name = $sf_user -> getSalutation()): ?>
    <strong><?php echo $name; ?>,</strong>
    <?php endif; ?>
    <?php echo $name ? "y" : "Y"; ?>ou have a checkout in progress... <?php echo link_to("Return To Checkout", "@checkout_return"); ?>
  </div>
<?php endif; ?>