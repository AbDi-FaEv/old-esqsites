<div class="ui-tabs !ui-widget ui-corner-all">
  <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix !ui-widget-header ui-corner-all">
    <li class="ui-state-default ui-corner-top  <?php if($sf_params -> get("module") == "teUserAdmin") { ?>ui-tabs-selected ui-state-active<?php } ?> "><a href="<?php echo url_for("sf_guard_user"); ?>">Manage Users</a></li>
    <?php if($sf_user -> isSuperAdmin()): ?>
    <li class="ui-state-default ui-corner-top  <?php if($sf_params -> get("module") == "teGroupAdmin") { ?>ui-tabs-selected ui-state-active<?php } ?> "><a href="<?php echo url_for("sf_guard_group"); ?>">Manage Groups</a></li>
    <li class="ui-state-default ui-corner-top  <?php if($sf_params -> get("module") == "tePermissionAdmin") { ?>ui-tabs-selected ui-state-active<?php } ?> "><a href="<?php echo url_for("sf_guard_permission"); ?>">Manage Permissions</a></li>
    <?php endif; ?>
  </ul>
</div>