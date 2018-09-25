<div id="sf_admin_container">
<div id="sf_admin_content" class="show">

<h1>Domain: "<?php echo $domain -> getName(); ?>"</h1>

<fieldset>
  <legend>General Info</legend>
  <table>
    <tr>
      <th>Name:</th>
      <td><?php echo $domain -> getName(); ?></td>
    </tr>
    <tr>
      <th>Type:</th>
      <td><?php echo $domain -> getTypeString(); ?></td>
    </tr>
    <tr>
      <th>Registration:</th>
      <td><?php echo $domain -> getRegistrationTypeString(); ?></td>
    </tr>
    <tr>
      <th>Created:</th>
      <td><?php echo $domain -> getCreatedAt(); ?></td>
    </tr>
  </table>
</fieldset>

<fieldset>
  <legend>Associated Website</legend>
  <?php echo link_to($domain -> getWebsite(), "website_show", $domain -> getWebsite()); ?>
</fieldset>

<fieldset>
  <legend>Associated Customer</legend>
  <?php echo link_to($domain -> getWebsite() -> getCustomer(), "customer_show", $domain -> getWebsite() -> getCustomer()); ?>
</fieldset>

<ul class="sf_admin_actions">
  <li class="sf_admin_action_list"><?php echo link_to("Back", "@domain"); ?></li>
  <li class="sf_admin_action_edit"><?php echo link_to("Edit", "domain_edit", $domain); ?></li>
</ul>
<br class="clear" />

</div>
</div>