<div class="sf_admin_form">
<?php echo form_tag_for($form, '@page') ?>
<?php echo $form->renderHiddenFields() ?>

<?php if ($form->hasGlobalErrors()): ?>
  <?php echo $form->renderGlobalErrors() ?>
<?php endif; ?>

<?php if($page -> isNew()): ?>

<fieldset>
  <legend>Page Type / Template</legend>

  <div style="float:left;width:450px;">

  <div class="sf_admin_row">
    <?php echo $form["page_content_display_type_id"] -> renderError(); ?>
    <?php echo $form["page_content_display_type_id"] -> renderLabel(); ?>
    <?php echo $form["page_content_display_type_id"] -> render(); ?>
    <span class="help"><?php echo $form["page_content_display_type_id"] -> renderHelp(); ?></span>
  </div>
  <div class="sf_admin_row">
    <?php echo $form["template_type_id"] -> renderError(); ?>
    <?php echo $form["template_type_id"] -> renderLabel(); ?>
    <?php echo $form["template_type_id"] -> render(); ?>
  </div>
    
  </div>

  <div>
    <?php include_component("pages", "contenttypes"); ?>
  </div>

</fieldset>

<?php endif; ?>

<fieldset>
  <legend>Title</legend>
  <div class="sf_admin_row">
    <?php echo $form["title"] -> renderError(); ?>
    <?php echo $form["title"] -> renderLabel("Page Title"); ?>
    <?php echo $form["title"] -> render(); ?>
    <span class="help"><?php echo $form["title"] -> renderHelp(); ?></span>
  </div>
</fieldset>

<?php if(!$page -> isMultiGroup()): ?>

<fieldset>
  <legend>Content (<?php echo $page -> getPageContentDisplayType(); ?>)</legend>

  <!--
  <div id="picture_instructions">
    <h2>Picture Instructions</h2>
    <div style="display:none;" class="content">
    <ul>
      <li>To place images into your page, click on the button, below, to get the "image properties" dialoge box.</li>
      <li>Click on "browse server". You can manage your photos in the "EsqSites123 - resource browser".</li>
      <li>Once you are in the resource browser, you will first need to upload your picture(s) to the webserver, so click "Browse" and select the picture you want to upload from your computer by clicking "open".</li>
      <li>Next, click on "Upload" in the resource browser to place your photo on the webserver. If you're using the FireFox web browser you may need to click on the folder icon in the upper left corner of the resource browser to refresh the files contents AFTER you've uploaded your picture.</li>
      <li>Next, once your photo appears in the resource browser, just click on the photo to return to the dialog box.</li>
      <li>Click "OK" and your picture appears in the editor! You can also change the size of the picture by dragging the edges of the photo.</li>
    </ul>
    </div>
  </div>
  -->
  <script>
    //set up picture instructions toggle
    $().ready(function(){
      $("#picture_instructions h2").click(function(){
        $("#picture_instructions content").slideToggle(500);
      })
    })
  </script>
  
  <div id="content_groups">
  <?php $i = 0;
  while(isset($form["group_".$i])): ?>
      <div>
      <?php $j = 0;
      while(isset($form["group_".$i]["entry_".$j])): ?>
      <table>
        <?php echo $form["group_".$i]["entry_".$j]; ?>
      </table>
      <?php
      $j++;
      endwhile; ?>
      </div>
  <?php
  $i++;
  endwhile; ?>
  </div>

</fieldset>

<?php endif; ?>

<fieldset>
  <legend>Navigation</legend>
  <p class="help">These fields affect how this page appears in your site's main menu.</p>

  <div class="sf_admin_row">
    <?php echo $form["url"] -> renderError(); ?>
    <?php echo $form["url"] -> renderLabel(); ?>
    <?php echo $form["url"] -> render(); ?>
    <span class="help"><?php echo $form["url"] -> renderHelp(); ?></span>
  </div>
  <div class="sf_admin_row">
    <?php echo $form["link_name"] -> renderError(); ?>
    <?php echo $form["link_name"] -> renderLabel(); ?>
    <?php echo $form["link_name"] -> render(); ?>
    <span class="help"><?php echo $form["link_name"] -> renderHelp(); ?></span>
  </div>
</fieldset>

<fieldset>
  <legend>SEO & Meta Settings</legend>
  <p class="help">These fields affect how search engines like Google interpret your site.</p>

  <div class="sf_admin_row">
    <?php echo $form["meta_title"] -> renderError(); ?>
    <?php echo $form["meta_title"] -> renderLabel(); ?>
    <?php echo $form["meta_title"] -> render(); ?>
    <span class="help"><?php echo $form["meta_title"] -> renderHelp(); ?></span>
  </div>
  <div class="sf_admin_row">
    <?php echo $form["meta_description"] -> renderError(); ?>
    <?php echo $form["meta_description"] -> renderLabel(); ?>
    <?php echo $form["meta_description"] -> render(); ?>
    <span class="help"><?php echo $form["meta_description"] -> renderHelp(); ?></span>
  </div>
  <div class="sf_admin_row">
    <?php echo $form["meta_keywords"] -> renderError(); ?>
    <?php echo $form["meta_keywords"] -> renderLabel(); ?>
    <?php echo $form["meta_keywords"] -> render(); ?>
    <span class="help"><?php echo $form["meta_keywords"] -> renderHelp(); ?></span>
  </div>
</fieldset>

<fieldset>
  <legend>Page Type</legend>
  <div class="sf_admin_row">
    <?php echo $form["template_type_id"] -> renderError(); ?>
    <?php echo $form["template_type_id"] -> renderLabel(); ?>
    <?php echo $form["template_type_id"] -> render(); ?>
  </div>
</fieldset>

<?php include_partial('pages/form_actions', array('page' => $page, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
</form>
</div>