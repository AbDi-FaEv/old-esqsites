<?php if($domains): ?>
<ul class="domain_names">
  <?php foreach($domains as $domain): ?>
    <li><a href="#"><?php echo $domain; ?></a></li>
  <?php endforeach; ?>
</ul>

<script language="JavaScript" type="text/javascript">
  var available_domains = <?php echo json_encode($domains); ?>
</script>

<?php else: ?>

<script language="JavaScript" type="text/javascript">
  var available_domains = [];
</script>

<?php endif; ?>