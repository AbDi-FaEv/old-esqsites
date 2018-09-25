<h2><?php echo __('Feeds') ?></h2>
<ul>
  <li><?php echo link_to(__('Posts (RSS)'), '@te_blog?sf_format=rss') ?></li>
  <?php if(sfConfig::get("app_teBlogPlugin_show_comments", true)): ?>
    <li><?php echo link_to(__('Comments (RSS)'), 'te_blog_comment_feed', array("sf_format" => "rss")) ?></li>
  <?php endif; ?>
</ul>