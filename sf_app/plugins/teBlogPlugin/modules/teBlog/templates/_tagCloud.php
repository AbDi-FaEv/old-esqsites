<?php if($tags): ?>
<?php use_helper("Tags"); ?>

<h2><?php echo __('Tags') ?></h2>
<?php echo tag_cloud($tags, 'teBlog/showByTag?tag=%s'); ?>
<?php endif; ?>