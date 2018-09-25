<?php use_helper("Number"); ?>
<div id="sf_admin_container">
  <div id="sf_admin_content">

<?php if($invoices): ?>
<h1><?php echo count($invoices); ?> Outstanding Invoices for <?php echo $invoices -> countCustomers(); ?> Customers:</h1>

<ul id="invoices">
<?php foreach($invoices -> getCustomers('esc_raw') as $customer): ?>
<?php $customer_invoices = $invoices -> getInvoicesForCustomer($customer); ?>
<li>
  <div class="customer">
    <?php echo link_to($customer, "customer_show", $customer); ?> <?php include_partial("status", array("customer" => $customer)); ?> (<?php echo count($customer_invoices); ?> invoices)
    <span class="amount"><?php echo format_currency($invoices -> getTotalAmountForCustomer($customer), "$"); ?>
  </div>

<?php foreach($customer_invoices as $invoice): ?>
  <div class="invoice">
    <div class="header">
      Invoice #<?php echo $invoice -> invoiceNumber; ?> &ndash; due: <?php echo date("m/d/y", (string) $invoice -> invoiceDateDue); ?>
      <span class="amount"><?php echo format_currency($invoice -> invoiceAmount, "$"); ?></span>
    </div>
    <ul class="line_items">
    <?php foreach($invoice -> getLineItems() as $line_item): ?>
      <li>
        <span class="description"><?php echo $line_item -> lineItemQuantity; ?> x <?php echo $line_item -> lineItemDescription; ?></span>
        <span class="amount"><?php echo format_currency($line_item -> lineItemTotalAmount, "$"); ?></span>
      </li>
    <?php endforeach; ?>
    </ul>
  </div>
<?php endforeach; ?>
</li>
<?php endforeach; ?>
</ul>

<?php elseif(isset($error)): ?>
  <?php echo $error; ?>
<?php endif; ?>

  </div>
</div>
<style>
  #invoices             {margin:0px;padding:0px;}
  #invoices li          {margin-bottom:15px;list-style-type:none;}
  #invoices .customer a {font-size:1.3em;}
  #invoices .customer {border-bottom:3px double black;}
  #invoices .customer .amount {font-weight:bold;font-size:1.4em;}
  #invoices .invoice   {margin-left:15px;}
  #invoices .header     {padding:2px;border:none;}
  #invoices .line_items {margin:2px;margin-left:10px;}
  #invoices .line_items li {list-style-type:none;}
  #invoices {width:600px;}
  #invoices .amount {float:right;}

</style>