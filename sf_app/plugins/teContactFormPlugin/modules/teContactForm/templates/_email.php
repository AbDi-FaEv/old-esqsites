<table>
  <?php foreach($form_values as $key => $value): ?>
  <tr>
    <th><?php echo ucwords(sfInflector::humanize($key)); ?>:</th>
    <td><?php echo nl2br($value); ?></td>
  </tr>
  <?php endforeach; ?>
</table>