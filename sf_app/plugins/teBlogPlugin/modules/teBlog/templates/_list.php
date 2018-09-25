<div class="te_blog">
<?php foreach($posts as $post): ?>
  <?php $classes = te_blog_get_list_classes($posts, array("te_blog_post")); ?>
  <div class="<?php echo implode(" ", $classes); ?>">
    <h3><?php echo link_to($post, "te_blog_post", $post) ?></h3>
    <div class="content">
      <?php if($post -> getExtract()): ?>
        <?php echo $post -> getExtract(); ?>
      <?php else: ?>
        <?php echo truncate_text($post->getPreview(), 300); ?>
      <?php endif; ?>
    </div>
    <?php include_partial("teBlog/byline", array("post" => $post)); ?>
    <?php //include_partial("teBlog/social", array("post" => $post)); ?>
  </div>
<?php endforeach; ?>
</div>