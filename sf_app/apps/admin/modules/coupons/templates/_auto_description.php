<?php if(!$form -> isNew()): ?>
<?php $coupon = $form -> getObject(); ?>
<div class="sf_admin_form_row sf_admin_text">
<div>
  <label for="coupon_setup">Auto Description</label>
  <div class="content"><?php echo $coupon -> getAutoDescription(); ?></div>
  <div class="help"><br>auto-generated from parameters. will be shown on client receipt</div>
</div>
</div>
<?php endif; ?>