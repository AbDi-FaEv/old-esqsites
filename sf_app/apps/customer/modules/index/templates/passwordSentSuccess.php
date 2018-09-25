<div class="logincontainer">&nbsp;
<div id="ctr" align="center">
  <div class="login">
    <div class="login-form">
      <form action="<?php echo url_for('forgot_password') ?>" method="post">
        <?php echo $form -> renderHiddenFields(); ?>
        <h1>Request Password</h1>

        <div class="form-block">&nbsp;

          <p>Password email sent. Please check your inbox.</p>

        </div>
      </form>
    </div>
    <div class="login-text">
      <div class="ctr adminlogo">&nbsp;</div>
      <p>Welcome to the new <?php echo sfAdminDash::getProperty('site') ?></p>
      <p>Use your username and password to gain access to your administration console.</p>
    </div>

    <div class="clr"></div>
  </div>
</div>&nbsp;
</div>