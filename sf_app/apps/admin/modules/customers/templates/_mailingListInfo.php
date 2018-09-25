<?php if(isset($exception)): ?>
  <p>Error talking to iContact: <?php echo $exception -> getMessage(); ?></p>
<?php else: ?>
<fieldset>
  <legend>iContact Info</legend>
  <table width="100%">
    <tr>
      <th>List:</th>
      <th>Subscribed Since:</th>
      <th>Status:</th>
    </tr>
  <?php foreach($subscriptions as $subscription): ?>
    <tr>
      <td><?php echo $lists[$subscription["listId"]]["name"]; ?></td>
      <td><?php echo $subscription["addDate"]; ?></td>
      <td><?php echo $subscription["status"]; ?></td>
    </tr>
  <?php endforeach; ?>
  </table>
</fieldset>
<?php endif; ?>