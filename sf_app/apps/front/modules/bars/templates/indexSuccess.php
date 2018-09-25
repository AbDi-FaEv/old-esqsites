<h1>Bar Associations</h1>

<table>
<?php foreach($associations as $association): ?>
  <tr><td><?php echo link_to($association, "bar_association", $association); ?></td></tr>
<?php endforeach; ?>
</table>