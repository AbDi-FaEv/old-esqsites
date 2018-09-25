<?php use_helper("sfThumbnail"); ?>

<h1><strong>Step 3:</strong> Customize Your Website</h1>

<fieldset id="preview_info" class="span-13">
<?php echo $form -> renderFormTag(url_for("@preview_info")); ?>
<div class="form stacked">
  <div class="two-col">
    <div>
      <?php echo $form["first_name"] -> renderRow() ; ?>
    </div>
    <div>
      <?php echo $form["last_name"] -> renderRow() ; ?>
    </div>
  </div>
  <div class="two-col">
    <div>
      <?php echo $form["firm_name"] -> renderRow() ; ?>
    </div>
    <div>
      <?php echo $form["firm_type"] -> renderRow() ; ?>
    </div>
  </div>
  <div class="clear">
    <?php echo $form["email"] -> renderRow() ; ?>
  </div>
  <div>
    <?php echo $form["address"] -> renderRow() ; ?>
  </div>
  <div class="two-col">
    <div>
      <?php echo $form["city"] -> renderRow() ; ?>
    </div>
    <div class="two-col">
      <div>
        <?php echo $form["state"] -> renderRow() ; ?>
      </div>
      <div>
        <?php echo $form["zip"] -> renderRow() ; ?>
      </div>
    </div>
  </div>
  <div class="two-col clear">
    <div>
      <?php echo $form["phone"] -> renderRow() ; ?>
    </div>
    <div>
      <?php echo $form["fax"] -> renderRow() ; ?>
    </div>
  </div>
</div>

<input id="submit" name="submit" value="submit" type="image" src="<?php echo image_path("buttons/preview.jpg"); ?>" />
  
</form>
</fieldset>

<?php if(isset($template)): ?>
<div id="preview_template">
  <p><?php echo image_tag("bent_arrow"); ?> By filling in the form to the left you can can preview your sample website with your law firm name, email, etc. on each page.</p>
  <?php echo thumbnail_tag($template -> getImageUrl(), 350, 500, array("alt_title" => "EsqSites Template: ".$template)); ?>
</div>
<?php endif; ?>

<script>
$().ready(function(){
  $("#website_info_first_name").focus();
  $("#website_info_phone").add("#website_info_fax").mask("(999) 999-9999");
});
</script>