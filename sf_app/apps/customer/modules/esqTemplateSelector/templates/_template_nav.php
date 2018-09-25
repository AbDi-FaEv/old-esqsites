<?php $template = $sf_user->getCurrentWebsite()->getTemplate(); ?>
<div class="pretty-button">
    <?php echo link_to('back to gallery', "template_select"); ?>
</div>
<?php if($template->hasThemes()): ?>
    <div class="pretty-button">
        <?php echo link_to("select color", "@customize?action=theme"); ?>
    </div>
<?php endif; ?>
<?php if(false && $template->hasCustomizableImages()): ?>
    <?php echo link_to("Customize Images", "@customize?action=image"); ?>
<?php endif; ?>