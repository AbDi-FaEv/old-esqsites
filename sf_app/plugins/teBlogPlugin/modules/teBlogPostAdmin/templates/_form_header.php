<div id="te_admin_bar">

<?php if(!$post -> isNew() && in_array("teAdminTheme", sfConfig::get("sf_enabled_modules"), array())): ?>
  <?php include_partial("teAdminTheme/recordHistory", array("record" => $post)); ?>
<?php if($sf_user -> hasCredential("te_blog_comment_moderate")): ?>

<div id="te_admin_comments">
  <h2>Comments awaiting moderation:</h2>
  <?php if($post -> getNbComments() > 0) { ?>
  <?php include_component("teBlogPostAdmin", "comments", array("post" => $post)); ?>
  <?php } else { ?>
      <p>There are no comments for this post.</p>
  <?php } ?>
</div>
<?php endif; ?>

<?php endif; ?>

</div>