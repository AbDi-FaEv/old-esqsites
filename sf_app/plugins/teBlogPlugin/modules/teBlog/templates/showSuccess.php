<?php use_helper('I18N', 'teBlog') ?>

<?php if(sfConfig::get('app_teBlogPlugin_use_feeds', true) && sfConfig::get("app_teBlogPlugin_comment_enabled")): ?>
  <?php slot('auto_discovery_link_tag', auto_discovery_link_tag('rss', url_for("te_blog_post", $post, array("sf_format" => "rss")), array('title' => __('Comments on post "%1%" from %2%', array('%1%' => $post->getTitle(), '%2%' => sfConfig::get('app_te_blog_title', 'How is life on earth?')))))) ?>
<?php endif; ?>

<?php include_partial("teBlog/header"); ?>

<div class="te_blog">

  <div class="post">
    <h1><?php echo $post; ?></h1>

    <div class="content">
      <?php echo $post->getContent(ESC_RAW)?>
    </div>

    <?php include_partial("teBlog/byline", array("post" => $post, 'bio' => true)); ?>
  </div>

  <?php if(sfConfig::get("app_teBlogPlugin_comment_enabled")): ?>
  <div class="comments" id="comments">

    <?php if($nb_comments = $post -> getNbComments()): ?>
    <div id="te_blog_comments_sofar"><?php echo format_number_choice('[1]One comment so far|(1,+Inf]%1% comments so far', array('%1%' => $nb_comments), $nb_comments) ?></div>
    <?php endif; ?>

    
    <div id="te_blog_comment_list">
      <?php include_component("sfComment", "commentList", array("object" => $post)); ?>
      <?php include_component('sfComment', 'commentForm', array('object' => $post)); ?>
    </div>

  </div>
  <?php endif; ?>

</div>

<?php include_partial("teBlog/footer"); ?>