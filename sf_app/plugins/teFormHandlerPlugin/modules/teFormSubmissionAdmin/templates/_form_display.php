<table>
<?php foreach($form as $fieldname => $field): ?>
  <?php if(!$field -> isHidden()):?>
  <tr>
    <th><?php echo $field -> renderLabelName(); ?></th>
    <td><?php echo (is_array($field -> getValue()) ? implode(", ",$field -> getValue()): $field -> getValue()); ?></td>
  </tr>
  <?php endif;?>
<?php endforeach; ?>
</table>