<?php decorate_with("layout_wrapped"); ?>
<?php ini_set("memory_limit", "100M"); ?>

<h1>Image Customization</h1>

<?php include_partial("esqTemplateSelector/template_nav"); ?>

<?php include_partial("global/flashes"); ?>

<div id="custom_preview" class="rounded">
  <h2>Current Template</h2>
  <p>This is your current template.</p>
  <?php echo thumbnail_tag($template -> getImageUrl(), 200, 400); ?>
</div>

<?php if($images): ?>

<?php foreach($images as $reference => $image_list): ?>

<div id="image_selector_container" class="rounded">
<ul id="image_selector">
  <?php foreach($image_list as $key => $image_info): ?>
  <li <?php if($selected = (isset($customizations[$reference]) && ($key == $customizations[$reference] -> getContent()))) echo 'class="selected"'; ?>>
    <h2><?php echo $image_info["name"]; ?></h2>
    <div class="image_container">
      <div class="image">
        <?php echo link_to(thumbnail_tag($image_info["src"], 190, 400), "@customize?action=image&reference=".$reference."&file=".$key); ?>
      </div>
      <div class="select_button">
        <?php if($selected): ?>
          <span>Currently Selected</span>
        <?php else: ?>
          <?php echo link_to("Select", "@customize?action=image&reference=".$reference."&file=".$key); ?>
        <?php endif; ?>
      </div>
    </div>
  </li>
  <?php endforeach; ?>
</ul>
</div>

<?php endforeach; ?>

<?php else: ?>

  <p>The template you selected for your website does not support custom images.<br />
  If you would like to use this feature, please choose a different template.</p>
  
<?php endif; ?>

<br class="clear" />
<hr />
<ul class="sf_admin_actions">
  <li class="sf_admin_action_list"><?php echo link_to("Back", "@template_select"); ?></li>
</ul>


<style>
  .rounded {border: 1px solid #346F97;-moz-border-radius: 10px;padding:20px 20px 20px 20px;}
  #custom_preview {float:left;margin-right:20px;}
  #image_selector li.selected {border:3px solid #346F97;}
  .image            {height:150px;padding:5px;}
  .image_container  {background-color:white;border:1px solid #346F97;-moz-border-radius-bottomleft: 5px;-moz-border-radius-bottomright: 5px;}
  .select_button    {text-align:center;border-top:1px solid #aeaeae;padding:10px;}
  .jcarousel-list li {width:200px;height:auto;margin-right:20px;}
  #image_selector_container {float:left;padding:20px;background: #F0F6F9;border: 1px solid #346F97;}
</style>

<script language="JavaScript" type="text/javascript">
  $().ready( function() {
    $("#image_selector").jcarousel({wrap: "both", scroll: 6});
  });
</script>