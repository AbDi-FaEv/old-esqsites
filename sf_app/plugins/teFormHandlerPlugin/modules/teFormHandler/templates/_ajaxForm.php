<?php if(is_string($form)) $form = new $form(); ?>
<?php use_javascript("/teFormPlugin/js/jquery.form.js"); ?>

<div id="<?php echo $form -> getName(); ?>_container">
  <?php echo $form -> renderFormTag(url_for("@te_form_handler?form=".get_class($form)), array("id" => $form -> getName() . "_form")); ?>
    <?php include_stylesheets_for_form($form); ?>
    <?php include_javascripts_for_form($form); ?>
    <ul class="form">
      <?php echo $form; ?>
    </ul>
    <input type="submit" value="<?php echo __("Submit"); ?>" />
  </form>
</div>

<?php if(sfConfig::get("app_teFormHandlerPlugin_use_ajax", true)): ?>
<script>
  $().ready(function(){
    $("#<?php echo $form -> getName(); ?>_form").ajaxForm({ target: '#<?php echo $form -> getName(); ?>_container' });
  });
</script>
<?php endif; ?>