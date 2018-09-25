<div class="sf_admin_form">
<?php echo form_tag_for($form, '@page') ?>
<?php echo $form->renderHiddenFields() ?>

<?php if ($form->hasGlobalErrors()): ?>
  <?php echo $form->renderGlobalErrors() ?>
<?php endif; ?>

<?php if($page -> isNew()) { ?>


<fieldset>
  <legend>Page Type / Template</legend>
  <div class="sf_admin_row">
    <?php echo $form["page_content_display_type_id"] -> renderError(); ?>
    <?php echo $form["page_content_display_type_id"] -> renderLabel(); ?>
    <?php echo $form["page_content_display_type_id"] -> render(); ?>
  </div>
  <div class="sf_admin_row">
    <?php echo $form["template_type_id"] -> renderError(); ?>
    <?php echo $form["template_type_id"] -> renderLabel(); ?>
    <?php echo $form["template_type_id"] -> render(); ?>
  </div>
</fieldset>

<?php } ?>


<fieldset>
  <legend>Title</legend>
  <div class="sf_admin_row">
    <?php echo $form["title"] -> renderError(); ?>
    <?php echo $form["title"] -> renderLabel("Page Title"); ?>
    <?php echo $form["title"] -> render(); ?>
  </div>
</fieldset>

<?php if(!$page -> isNew()): ?>

<fieldset>
  <legend>Content (<?php echo $page -> getPageContentDisplayType(); ?>)</legend>
  <?php $i = 0;
  while(isset($form["group_".$i])): ?>
      <div class="page_group">
      <?php $j = 0;
      while(isset($form["group_".$i]["entry_".$j])): ?>
        <?php echo $form["group_".$i]["entry_".$j]; ?>
      <?php
      $j++;
      endwhile; ?>
      </div>
  <?php
  $i++;
  endwhile; ?>
</fieldset>

<?php endif; ?>

<fieldset>
  <legend>Navigation</legend>

  <div class="sf_admin_row">
    <?php echo $form["url"] -> renderError(); ?>
    <?php echo $form["url"] -> renderLabel(); ?>
    <?php echo $form["url"] -> render(); ?>
  </div>
  <div class="sf_admin_row">
    <?php echo $form["link_name"] -> renderError(); ?>
    <?php echo $form["link_name"] -> renderLabel(); ?>
    <?php echo $form["link_name"] -> render(); ?>
  </div>
</fieldset>

<fieldset>
  <legend>SEO & Meta Settings</legend>

  <div class="sf_admin_row">
    <?php echo $form["meta_title"] -> renderError(); ?>
    <?php echo $form["meta_title"] -> renderLabel(); ?>
    <?php echo $form["meta_title"] -> render(); ?>
  </div>
  <div class="sf_admin_row">
    <label>Meta Description</label>
    <textarea></textarea>
  </div>
  <div class="sf_admin_row">
    <label>Meta Keywords</label>
    <textarea></textarea>
  </div>
</fieldset>

<?php include_partial('pages/form_actions', array('page' => $page, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
</form>
</div>