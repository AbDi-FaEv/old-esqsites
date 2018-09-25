<h2><?php echo isset($title) ? $title : "History"; ?></h2>
<table>
  <tr>
    <th>Created:</th>
    <td><?php echo $record -> getCreatedAt(); ?></td>
  </tr>
  <tr>
    <th>By:</th>
    <td>
      <?php if(method_exists($record, 'getCreator')): ?>
        <?php echo ($user = $record -> getCreator()) ? $user : "-"; ?>
      <?php else: ?>
        <?php echo ($user = $record -> getSfGuardUserRelatedByCreatedBy()) ? $user : "-"; ?>
      <?php endif; ?>
    </td>
  </tr>
  <tr>
    <th>Last Update:</th>
    <td><?php echo $record -> getUpdatedAt(); ?></td>
  </tr>
  <tr>
    <th>By:</th>
    <td>
      <?php if(method_exists($record, 'getUpdater')): ?>
        <?php echo ($user = $record -> getUpdater()) ? $user : "-"; ?>
      <?php else: ?>
        <?php echo ($user = $record -> getSfGuardUserRelatedByUpdatedBy()) ? $user : "-"; ?>
      <?php endif; ?>
    </td>
  </tr>
</table>