<h2>Your Next Invoice</h2>

<table>
  <tr>
    <td>Invoice:</td>
    <td>#<?php echo $invoice -> getNumber(); ?></td>
  </tr>
  <tr>
    <td>Scheduled For:</td>
    <td><?php echo $invoice -> getDueDate(); ?> <!--(in <?php echo distance_of_time_in_words($invoice -> getDueDate('U')); ?>)--></td>
  </tr>
  <tr>
    <td>Amount:</td>
    <td><?php echo format_currency($invoice -> getTotal(), '$'); ?></td>
  </tr>
</table>
<?php //print_r($invoice); ?>
<table>
<?php foreach($invoice -> getCharges() as $code => $charge): ?>
  <?php if($charge["quantity"] == 0) continue; ?>
  <tr>
    <td><?php echo $code; ?></td>
    <td><?php echo format_currency($charge["quantity"] * $charge["eachAmount"], '$'); ?></td>
  </tr>
  <?php if($charge["description"]): ?>
  <tr>
    <td></td>
    <td><?php echo $charge["description"]; ?></td>
  </tr>
  <?php endif; ?>
<?php endforeach; ?>
</table>