<?php if(file_exists(sfConfig::get("sf_web_dir")."/images/pagetypes/".$pagetype -> getId().".jpg")): ?>
<?php echo image_tag("pagetypes/".$pagetype -> getId().".jpg"); ?>
<?php else: ?>
<p>- No Image -</p>
<?php endif; ?>