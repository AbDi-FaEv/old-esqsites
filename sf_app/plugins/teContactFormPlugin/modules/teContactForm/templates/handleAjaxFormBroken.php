<?php if($sf_request -> isXmlHttpRequest()): ?>
  <?php include_partial("header"); ?>
<?php endif; ?>

<h2>Sorry, something is currently broken. Your request was not sent!</h2>
<p>Please contact us directly instead, or try again later.</p>

<?php include_partial("form", array("form" => $form)); ?>

<?php if($sf_request -> isXmlHttpRequest()): ?>
  <?php include_partial("footer"); ?>
<?php endif; ?>