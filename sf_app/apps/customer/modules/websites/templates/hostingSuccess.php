<h1>Hosting Plans</h1>

<table>
  <tr>
    <th></th>
    <?php foreach($plans as $plan): ?>
    <th><?php echo $plan -> getDescription(); ?></th>
    <?php endforeach; ?>
  </tr>
  <tr>
    <th>Setup</th>
    <?php foreach($plans as $plan): ?>
    <td><?php echo $plan -> getSetupPrice(); ?></td>
    <?php endforeach; ?>
  </tr>
  <tr>
    <th>Monthly</th>
    <?php foreach($plans as $plan): ?>
    <td><?php echo $plan -> getPrice(); ?></td>
    <?php endforeach; ?>
  </tr>
</table>