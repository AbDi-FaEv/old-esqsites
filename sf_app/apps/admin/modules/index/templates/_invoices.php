<h2>Outstanding Invoices:</h2>

<?php if($invoices): ?>
<p>There are <?php echo count($invoices); ?> outstanding invoices for <?php echo $invoices -> countCustomers(); ?> customers.</p>
<?php echo link_to("View Invoices", "customers/showInvoices", "class=button"); ?>

<?php elseif(isset($error)): ?>
  <?php echo $error; ?>
<?php endif; ?>