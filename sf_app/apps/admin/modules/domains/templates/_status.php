<?php if($domain -> getExpirationDate('U') < time()): ?>
  <?php echo image_tag("error"); ?>
<?php endif; ?>