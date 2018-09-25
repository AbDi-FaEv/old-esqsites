<ul style="float:right;" class="sf_admin_actions">
  <li class="sf_admin_action_list"><?php echo link_to("Back", "@homepage"); ?></li>
</ul>

<h1>Update Account Settings</h1>

<?php echo $form -> renderFormTag(url_for("@account")); ?>
<?php echo $form ->renderHiddenFields(true); ?>
<fieldset>
<legend>Login Information</legend>
<table>
  <tr>
    <th>
      <label>Username</label>
    </th>
    <td>
      <?php echo $bar -> getAbbreviation(); ?>
    </td>
  </tr>
  <?php echo $form["password"] -> renderRow(); ?>
  <?php echo $form["password_repeat"] -> renderRow(); ?>
</table>
</fieldset>

<fieldset>
<legend>Association Logo</legend>
<?php if($bar -> hasLogo()): ?>
  <div class="caption">Logo on file for your association:</div>
  <?php echo link_to(thumbnail_tag($bar -> getLogoUrl(), 300, 200, array("id" => "bar_logo")), $bar -> getLogoUrl(), array("target" => "_blank")); ?>
<?php else: ?>
  <p>We currently don't have a logo for you.</p>
<?php endif; ?>
  <hr />
  <?php echo $form["logo"] -> renderLabel("Upload New Logo"); ?> <?php echo $form["logo"] -> render(); ?>
  <p class="help">Uploaded logo will not show up immediately.</p>
</fieldset>

<ul class="sf_admin_actions">
  <li class="sf_admin_action_list"><?php echo link_to("Back", "@homepage"); ?></li>
  <li class="sf_admin_action_save"><input type="submit" value="Update Account Info" /></li>
</ul>
</form>