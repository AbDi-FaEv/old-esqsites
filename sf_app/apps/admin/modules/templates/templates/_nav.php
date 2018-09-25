<div class="ui-tabs !ui-widget ui-corner-all">
  <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix !ui-widget-header ui-corner-all">
    <li class="ui-state-default ui-corner-top  <?php if($sf_params -> get("module") == "templates") { ?>ui-tabs-selected ui-state-active<?php } ?> "><a href="<?php echo url_for("website_template"); ?>">Templates</a></li>
    <li class="ui-state-default ui-corner-top  <?php if($sf_params -> get("module") == "template_categories") { ?>ui-tabs-selected ui-state-active<?php } ?> "><a href="<?php echo url_for("template_category"); ?>">Categories</a></li>
  </ul>
</div>