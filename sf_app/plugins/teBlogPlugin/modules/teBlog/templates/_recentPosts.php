<?php use_helper('teBlog', "Text") ?>

<div class="recent_blog_posts">

<?php foreach($posts as $post): ?>
<div class="blog_post<?php if($posts -> isLast()) echo "last"; elseif($posts -> isFirst()) echo "first"; ?>">
	<a href="<?php echo url_for("te_blog_post", $post); ?>"><h2><?php echo $post; ?></h2>
	<p><?php echo truncate_text(strip_tags($post -> getContent()), 100); ?></p>
	<div class="details">

    <?php echo __('Posted by %1% on %2%', array('%1%' => $post->getSolidAuthor(), '%2%' => $post->getPublishedAt(sfConfig::get("app_te_blog_date_format", "F jS - Y")))) ?>
  </div>
	<div class="more">More Info</div></a>
</div>
<?php endforeach; ?>
</div>