<div id="te_blog_sidebar">
  <?php foreach(sfConfig::get('app_teBlogPlugin_sidebar', array('recent_posts', 'categories', 'tags', 'archive', 'feeds', 'blogroll')) as $widget): ?>

    <?php if($widget == 'feeds' && sfConfig::get('app_teBlogPlugin_use_feeds', true)): ?>
      <?php include_partial('teBlog/feed') ?>
    <?php elseif($widget == 'tags'): ?>
      <?php include_component('teBlog', 'tagCloud') ?>
    <?php elseif($widget == 'archive'): ?>
      <?php include_component('teBlog', 'archive') ?>
    <?php elseif($widget == 'recent_posts'): ?>
      <?php include_component('teBlog', 'recentPostList') ?>
    <?php elseif($widget == 'blogroll'): ?>
      <?php include_partial('teBlog/blogroll') ?>
    <?php elseif($widget == 'categories'): ?>
      <?php include_component('teBlog', 'categoryList') ?>
    <?php else: ?>
      <?php echo sfConfig::get('app_teBlog_'.$widget) ?>
    <?php endif; ?>
    
  <?php endforeach; ?>
</div>