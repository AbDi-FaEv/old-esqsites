<div id="sf_admin_container">
  <div id="dashboard">
    <?php include_component('sfAdminDash', 'dash') ?>
  </div>
  <div id="dashboard_sidebar">
    <?php if($sf_user -> hasCredential("login_history")): ?>
      <?php include_component("teAdminTheme", "loginHistory"); ?>
    <?php endif; ?>
  </div>
  <div class="clr">&nbsp;</div>
</div>