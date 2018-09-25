<div id="pagetypes">
  <?php foreach($types as $type): ?>
  <div class="pagetype" id="pagetype_<?php echo $type -> getId(); ?>">
    <?php echo image_tag("pagetypes/".$type -> getId().".jpg", array("alt" => $type -> getName())); ?>
    <div class="name"><?php echo $type -> getName(); ?></div>
    <p><?php echo $type -> getDescription(); ?></p>
    <?php if(!$sf_user -> hasAccessToPageType($type)): ?>
      <p class="conflict">
        Please note: This page type is not included in your current hosting plan.
        <br />You can still add it now and start editing it, but in order to activate it on your website, you'll need to <a href="">upgrade your hosting plan here</a>.
      </p>
    <?php endif; ?>
    <br class="clear" />
  </div>
  <?php endforeach; ?>
</div>

<script>
$().ready(function(){
  show_pagetype();
  $("#page_page_content_display_type_id").change(show_pagetype);
});

function show_pagetype()
{
  $(".pagetype").hide();
  var id = $("#page_page_content_display_type_id").val();
  $("#pagetype_"+id).show();
}
</script>