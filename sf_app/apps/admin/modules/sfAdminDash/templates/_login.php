<div class="logincontainer">&nbsp;
<div id="ctr" align="center">
  <div class="login">
    <div class="login-form">
      <form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
        <h1>Administration Login</h1>
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
          </div><br style="clear:both">
          <div class="inputlabel"><?php echo $form['remember']->renderLabel('Remember Me?') ?></div>
			<div>
            <?php echo $form['remember']->render(array('class' => 'inputcheck')); ?>
			</div>
            
		  <br style="clear:both">
          <input type="submit" name="submit" class="button clr" value="Login" />
        </div>
      </form>
    </div>
    <div class="login-text">
      <div class="ctr adminlogo">&nbsp;</div>
      <p>Welcome to <?php echo sfAdminDash::getProperty('site') ?></p>
      <p>Use a valid username and password to gain access to the administration console.</p>
    </div>

    <div class="clr"></div>
  </div>
</div>&nbsp;
</div>