<div id="sf_admin_container">
  <div id="sf_admin_content">

    <h1>CheddarGetter Log</h1>

    <p>Showing most recent 100 log events received from CG.<br />No guarantee for log events missed due to potential downtime.</p>

    <table>
      <tr>
        <th>Time</th>
        <th>Type</th>
        <th>Result</th>
        <th>Customer</th>
      </tr>
      <?php foreach($logs as $log): ?>
      <tr>
        <td><?php echo $log -> getCreatedAt("m/d/Y H:i:s"); ?></td>
        <td><?php echo $log -> getType(); ?></td>
        <td><?php echo $log -> getResult(); ?></td>
        <td><?php echo link_to($log -> getWebsite() -> getCustomer(), "customer_show", $log -> getWebsite() -> getCustomer()); ?></td>
      </tr>
      <?php endforeach; ?>
    </table>

  </div>
</div>

