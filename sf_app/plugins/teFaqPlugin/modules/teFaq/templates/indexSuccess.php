<?php include_partial("teFaq/header"); ?>

<?php if(count($faqs)): ?>
  <?php include_partial("teFaq/list", array("faqs" => $faqs)); ?>
<?php else: ?>
  <p>No FAQ's are currently listed.</p>
<?php endif; ?>

<?php include_partial("teFaq/footer"); ?>