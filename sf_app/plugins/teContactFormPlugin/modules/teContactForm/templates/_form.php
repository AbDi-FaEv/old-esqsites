<?php use_stylesheet("/teFrontPlugin/css/forms.css"); //not sure if this should be in this plugin ?>

<?php echo $form -> renderFormTag(url_for("@te_contact_form"), array("id" => "te_contact_form")); ?>
<ul class="form">
  <?php echo $form; ?>
</ul>
<button type="submit" class="button positive">
  <?php echo image_tag("/teFrontPlugin/css/buttons/icons/tick.png"); ?> Submit
</button>
</form>


<?php if(sfConfig::get("app_teContactFormPlugin_use_ajax", true)): ?>
<?php use_javascript("/teFormPlugin/js/jquery.form.js"); ?>
<script type="text/javascript">
  $(document).ready(function() {
    $('#te_contact_form').ajaxForm({
      target: '#te_contact_form_container'
    });
  });
</script>
<?php endif; ?>