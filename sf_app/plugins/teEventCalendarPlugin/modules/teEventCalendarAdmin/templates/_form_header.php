<?php if(!$event -> isNew()): ?>
<div id="te_admin_bar">
  <?php include_partial("teAdminTheme/recordHistory", array("record" => $event)); ?>
</div>
<?php endif; ?>