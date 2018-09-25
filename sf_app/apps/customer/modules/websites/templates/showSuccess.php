<h1>Website Information</h1>

<?php include_partial("global/flashes"); ?>

<fieldset>
  <legend>Website Information</legend>
  
  <div class="help">The following fields are <strong>public information</strong>. They will appear on each page of your website.</div> 
  <table>
    <tr>
      <th>Firm Name:</th>
      <td><?php echo $website -> getFirmName(); ?></td>
    </tr>
    <tr>
      <th>Firm Type:</th>
      <td><?php echo $website -> getFirmTypeString(); ?></td>
    </tr>
    <tr>
      <th>Email:</th>
      <td><?php echo $website -> getEmail(); ?></td>
    </tr>
    <tr>
      <th>Address:</th>
      <td><?php echo $website -> getAddress(); ?></td>
    </tr>
    <tr>
      <th>City:</th>
      <td><?php echo $website -> getCity(); ?></td>
    </tr>
    <tr>
      <th>State:</th>
      <td><?php echo $website -> getState(); ?></td>
    </tr>
    <tr>
      <th>Zip:</th>
      <td><?php echo $website -> getZip(); ?></td>
    </tr>
    <tr>
      <th>Phone:</th>
      <td><?php echo format_phone($website -> getPhone()); ?></td>
    </tr>
    <tr>
      <th>Fax:</th>
      <td><?php echo format_phone($website -> getFax()); ?></td>
    </tr>
  </table>
  
</fieldset>

<fieldset>
  <legend>Meta Information</legend>
  <table>
    <tr>
      <th>Meta Description:</th>
      <td><?php echo $website -> getMetaDescription() ? $website -> getMetaDescription() : "-"; ?></td>
    </tr>
    <tr>
      <th>Meta Keywords:</th>
      <td><?php echo $website -> getMetaKeywords() ? $website -> getMetaKeywords() : "-"; ?></td>
    </tr>
  </table>
</fieldset>

<ul class="sf_admin_actions">
  <li class="sf_admin_action_edit"><?php echo link_to("Edit Info", "websites/edit"); ?></li>
</ul>

<br class="clear" />