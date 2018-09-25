<?php if(($customers = $customers = $sf_user -> getRecentCustomers()) && count($customers)): ?>
<div id="recent_customers">
  <h2>Recently Viewed Customers: <?php echo link_to("clear list", "@customer_forgetRecent", array("id" => "forget_customers", "method" => "POST")); ?></h2>
  <table>
  <?php foreach($customers as $customer): ?>
    <tr>
      <td><?php echo link_to($customer, "customer_show", $customer); ?></td>
      <td align="right"><?php echo time_ago_in_words($customer -> getVirtualColumn("last_viewed"), true); ?> ago</td>
    </tr>
  <?php endforeach; ?>
  </table>
</div>

<script>
  $().ready(function(){
    $("#sf_admin_bar").prepend($("#recent_customers").remove());
  });
</script>
<?php endif; ?>