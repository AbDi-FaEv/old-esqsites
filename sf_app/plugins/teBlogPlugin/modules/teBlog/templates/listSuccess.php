<?php use_helper('I18N', 'Date', 'teBlog') ?>

<?php if(sfConfig::get('app_teBlogPlugin_use_feeds', true) && isset($feed_url)): ?>
  <?php slot('auto_discovery_link_tag', auto_discovery_link_tag('rss', $feed_url, array('title' => $feed_title))); ?>
<?php endif; ?>

<?php include_partial("teBlog/header"); ?>

<?php if(isset($title)): ?>
  <h3><?php echo $title; ?></h3>
<?php endif; ?>

<?php if(count($posts)): ?>
  <?php include_partial("teBlog/list", array("posts" => $posts)); ?>
<?php else: ?>
  <p>Currently there is nothing posted.</p>
<?php endif; ?>

<?php include_partial("teBlog/pager", array("pager" => $posts)); ?>

<?php include_partial("teBlog/footer"); ?>