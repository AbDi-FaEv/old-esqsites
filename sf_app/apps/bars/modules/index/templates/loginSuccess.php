<?php decorate_with("layout_login"); ?>
<div class="logincontainer">&nbsp;
<div id="ctr" align="center">
  <div class="login">
    <div class="login-form">
      <form action="<?php echo url_for('@login') ?>" method="post">
        <h1>Bar Association Login</h1>
        <div class="form-block">&nbsp;
          <?php echo $form->renderGlobalErrors() ?>
          <div class="inputlabel"><?php echo $form['username']->renderLabel() ?>:</div>
          <div>
            <?php echo $form['username']->renderError() ?>
            <?php echo $form['username']->render(array('class' => 'inputbox')); ?>
          </div><br style="clear:both">
          <div class="inputlabel"><?php echo $form['password']->renderLabel() ?>:</div>
          <div>
            <?php echo $form['password']->renderError() ?>
            <?php echo $form['password']->render(array('class' => 'inputbox')); ?>
          </div>
          
          <?php if(isset($form["remember"])): ?>
          <br style="clear:both">
          <div class="inputlabel"><?php echo $form['remember']->renderLabel('Remember Me?') ?></div>
			<div>
            <?php echo $form['remember']->render(array('class' => 'inputcheck')); ?>
			</div>
          <?php endif; ?>

          
          <br class="clear" />
          <input type="submit" name="submit" class="button clr" value="Login" />
          
          <br class="clear" /><br />
          <?php echo link_to("Forgot Password?", "forgot_password"); ?>
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