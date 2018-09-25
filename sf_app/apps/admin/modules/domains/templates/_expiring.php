<h2>Expiring Domains:</h2>
<?php if(count($domains)): ?>
<table width="100%">
  <tr class="header">
    <th>Domain:</th>
    <th>Registered:</th>
    <th>Expires:</th>
  </tr>
  <?php foreach($domains as $domain): ?>
    <tr>
      <td><?php echo link_to($domain, "domain_show", $domain); ?></td>
      <td><?php echo $domain -> getCreatedAt("m/d/Y"); ?></td>
      <td><?php echo $domain -> getExpirationDate("m/d/Y"); ?></td>
    </tr>
  <?php endforeach; ?>
</table>
<?php else: ?>
  <p>There are no expiring domains within the next month.</p>
<?php endif; ?>