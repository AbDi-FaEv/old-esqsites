<div class="header">
  <table>
    <tr>
      <td><?php echo $title; ?> #<?php echo $key + 1; ?></td>
      <td align="right">
        <?php if($key != 0): ?>
          <?php echo link_to(image_tag("arrow_up"), "page_group_move", array("sf_subject" => $group, "direction" => "up")); ?>
        <?php endif; ?>
        <?php if($key + 1 != $total): ?>
          <?php echo link_to(image_tag("arrow_down"), "page_group_move", array("sf_subject" => $group, "direction" => "down")); ?>
        <?php endif; ?>
        <?php echo link_to(image_tag("pencil"), "page_group_edit", $group); ?>
        <?php echo link_to(image_tag("delete"), "page_group_delete", $group, "confirm=Delete? Are you sure? method=delete"); ?>
      </td>
    </tr>
  </table>
</div>