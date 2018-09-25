<?php if($quote): ?>
<div class="quote">
  <span class="quote_mark">&ldquo;</span><?php echo $quote -> getContent(); ?><span class="quote_mark">&rdquo;</span>
  <div class="source">- <?php echo $quote -> getSource(); ?>
    <?php if($quote -> getCompany()): ?>
    <br /><?php echo $quote -> getCompany(); ?>
    <?php endif; ?>
    <br /><?php echo $quote -> getLocation(); ?></div>
</div>
<?php endif; ?>