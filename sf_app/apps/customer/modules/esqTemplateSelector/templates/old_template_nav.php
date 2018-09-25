<?php $template = $sf_user->getCurrentWebsite()->getTemplate(); ?>
<ul>
  <li><?php echo link_to("Select Template", "template_select"); ?></li>
  <?php if($template->hasThemes()): ?>
    <li><?php echo link_to("Select Color", "@customize?action=theme"); ?></li>
  <?php endif; ?>
  <?php if(false && $template->hasCustomizableImages()): ?>
    <li><?php echo link_to("Customize Images", "@customize?action=image"); ?></li>
  <?php endif; ?>
</ul>