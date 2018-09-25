<?php use_helper("sfThumbnail", "Number"); ?>
<div id="order_summary">

<h3>Order Summary:</h3>

<table>
  <tr>
    <th>Hosting Plan</th>
    <td><?php echo $website -> getHostingPlan(); ?></td>
  </tr>
  <tr>
    <th>Template</th>
    <td>
      <?php echo thumbnail_tag($website -> getWebsiteTemplate() -> getImageUrl(), 100, 200, array("alt_title" => "EsqSites Template: ".$website -> getWebsiteTemplate())); ?>
      <div class="caption">Theme: <?php echo $website -> getWebsiteTemplate() -> getTitle(); ?></div>
    </td>
  </tr>
  <?php if($cart -> getDomainType() == Domain::REGISTRATION_TYPE_ESQ): ?>
  <tr>
    <th>Domain Name</th>
    <td><?php echo format_currency($cart -> getDomainTotal(), '$'); ?></td>
  </tr>
  <?php endif; ?>
  <tr>
    <th>Monthly Hosting</th>
    <td><?php echo format_currency($website -> getHostingPlan() -> getPrice(), '$'); ?></td>
  </tr>
  <tr>
    <th>One-Time Setup</th>
    <td><?php echo format_currency($website -> getHostingPlan() -> getSetupPrice(), '$'); ?></td>
  </tr>
  <?php if($discount = $cart -> getDiscountTotal()): ?>
  <tr>
    <th>Discount</th>
    <td><?php echo format_currency($discount, '$'); ?> implement this</td>
  </tr>
  <?php endif; ?>
  <tr class="total">
    <th>Order Total</th>
    <td><?php echo format_currency($cart -> getGrandTotal(), '$'); ?></td>
  </tr>
</table>

</div>