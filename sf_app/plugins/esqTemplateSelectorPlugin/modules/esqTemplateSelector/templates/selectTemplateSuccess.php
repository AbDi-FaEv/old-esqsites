<?php use_helper("Image", "sfThumbnail"); ?>

<?php include_partial("header"); ?>

<div id="esq_template_selector_container" class="span-6 colborder">

  <?php echo $sf_data -> getRaw("category_widget") -> render("category", $sf_params -> get("category")); ?>

  <div id="template_container">
    <ul id="templates">
    <?php $selected_slide = 1; ?>
    <?php foreach($templates as $key => $template): ?>
      <li>
        <?php echo link_to(thumbnail_tag($template -> getImageUrl(), 65, 100, array("alt_title" => "EsqSites Template: ".$template)), $route_name."?id=".$template -> getId(), array("rel" => $template -> getId())); ?>
        <?php if($template -> getId() == $selected_template_id) $selected_slide = $key; ?>
      </li>
    <?php endforeach; ?>
    </ul>
  </div>

</div>
<div class="span-15 last">

<div id="slideshow">
<?php foreach($templates as $template): ?>
  <?php echo sized_image_tag(thumbnail_path($template -> getImageUrl(), 650, 800), array("alt_title" => "EsqSites Template: ".$template))."\n"; ?>
<?php endforeach; ?>
</div>

<br class="clear" />

</div>

<form action="<?php echo url_for($route_name); ?>" method="post">
  <input type="hidden" name="sf_method" value="put">
  <input type="hidden" id="website_template_id" name="website[template_id]" value="<?php echo $selected_template_id; ?>">
  <?php include_partial("buttons"); ?>
</form>
<br class="clear" />
<hr />


<br class="clear" />

<script language="JavaScript" type="text/javascript">

function handle_gallery_load()
{
  $("#category").change(function(){
    var url = "<?php echo url_for($route_name."?category="); ?>"+$(this).val();
    $("#esq_template_selector_container").parent().load(url, null, handle_gallery_load);
  });

  <?php if(count($templates) > 1): ?>

  $("#templates a").click(function()
  {
    $("#website_template_id").val(this.rel);
  });

  $('#slideshow').cycle({
      fx:     'fade',
      speed:  'slow',
      pager:  '#templates',
      timeout: 0,
      startingSlide: <?php echo $selected_slide; ?>,
      pagerAnchorBuilder: function(idx, slide) {
        // return selector string for existing anchor
        return '#templates li:eq(' + idx + ') a';
      }
  });

  <?php else: ?>
    $("#templates a").click(function(){
      return false;
    })
  <?php endif; ?>
}

$().ready( function(){

  handle_gallery_load();
  
});
</script>