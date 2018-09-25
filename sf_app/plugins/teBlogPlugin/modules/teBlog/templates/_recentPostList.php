<h2><?php echo __('Latest posts') ?></h2>
<ul id="recent_post_list">
<?php foreach($posts as $post): ?>
  <?php $classes = te_blog_get_list_classes($posts, array("te_blog_post")); ?>
  <li class="<?php echo implode(" ", $classes); ?>">
    <div class="title"><?php echo link_to($post, "te_blog_post", $post) ?></div>
    <div class="author"><?php echo $post -> getSolidAuthor(); ?></div>
    <div class="date">&nbsp;|&nbsp; <?php echo $post -> getPublishedAt(sfConfig::get("app_teBlogPlugin_date_format", "F jS, Y")); ?></div>
  </li>
<?php endforeach; ?>
</ul>
