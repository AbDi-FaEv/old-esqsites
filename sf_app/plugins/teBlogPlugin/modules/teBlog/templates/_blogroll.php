<?php if($blogs = sfConfig::get('app_teBlogPlugin_blogroll')): ?>
<h2><?php echo __('Blogroll') ?></h2>
<ul>
  <?php foreach($blogs as $blog): ?>
  <li><?php echo link_to($blog['title'], $blog['url']) ?></li>
  <?php endforeach; ?>
</ul>
<?php endif; ?>