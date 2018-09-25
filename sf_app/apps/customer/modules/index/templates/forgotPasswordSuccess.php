<div class="logincontainer">&nbsp;
<div id="ctr" align="center">
  <div class="login">
    <div class="login-form">
      <form action="<?php echo url_for('forgot_password') ?>" method="post">
        <?php echo $form -> renderHiddenFields(); ?>
        <h1>Request Password</h1>

        <p>Please enter your username or email below, and we'll send your password to the email associated with your account.</p>

        <div class="form-block">&nbsp;

          <?php echo $form->renderGlobalErrors() ?>
          <div class="inputlabel"><?php echo $form['username']->renderLabel() ?>:</div>
          <div>
            <?php echo $form['username']->renderError() ?>
            <?php echo $form['username']->render(array('class' => 'inputbox')); ?>
          </div>

          <br class="clear" />
          <input type="submit" name="submit" class="button clr" value="Request Password" />

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