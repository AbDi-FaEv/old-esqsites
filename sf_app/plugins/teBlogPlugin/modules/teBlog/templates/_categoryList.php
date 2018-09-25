<?php if(count($categories)): ?>
<h2><?php echo __('Categories') ?></h2>
<ul>
<?php foreach($categories as $category): ?>
  <li><?php echo link_to($category -> getName()." (".$category -> getNumPosts().")", "te_blog_category", $category); ?></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>