<table>
  <?php foreach($values as $key => $value): ?>
  <tr>
    <th align="left" valign="top"><?php echo ucwords(sfInflector::humanize($key)); ?>:</th>
    <td><?php echo $value; ?></td>
  </tr>
  <?php endforeach; ?>
</table>