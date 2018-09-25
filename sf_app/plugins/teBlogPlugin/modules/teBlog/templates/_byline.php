<div class="byline">
  Posted by <?php echo $post -> getSolidAuthor(); ?>
  in <?php echo te_blog_get_category_links($post -> getCategories()); ?>
  on <?php echo $post->getPublishedAt(sfConfig::get("app_te_blog_date_format", "F jS, Y")); ?>
  
  <?php echo($post -> getAuthor() && isset($bio) && $bio ? '<div class="biography">'.$post -> getAuthor() -> getBiography().'</div>': '');?>
  <?php if($tags = $post->getTags()): ?>
  <div class="te_blog_tags">
    <?php echo __('Tags: %1%', array('%1%' => te_blog_get_tag_links(array_keys($tags)))) ?>
  </div>
  <?php endif; ?>
  <?php if (sfConfig::get("app_teBlogPlugin_comment_enabled")): ?>
  - <?php echo link_to(format_number_choice('[0]no comments|[1]one comment|(1,+Inf]%1% comments', array('%1%' => $post->getNbComments()), $post->getNbComments()), "te_blog_post", $post); ?>
  <?php endif; ?>
</div>