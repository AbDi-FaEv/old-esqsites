<div class="ui-tabs !ui-widget ui-corner-all">

	<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix !ui-widget-header ui-corner-all">
		<li class="ui-state-default ui-corner-top  <?php if($sf_params -> get("module") == "teBlogPostAdmin") { ?>ui-tabs-selected ui-state-active<?php } ?> "><a href="<?php echo url_for("te_blog_post_admin"); ?>">Manage Blog Posts</a></li>
		<?php if($sf_user -> hasCredential(array("te_blog_comment_list", "te_blog_comment_moderate"), false)): ?>
        <li class="ui-state-default ui-corner-top  <?php if($sf_params -> get("module") == "teBlogCommentAdmin") { ?>ui-tabs-selected ui-state-active<?php } ?>"><a href="<?php echo url_for("te_blog_comment_admin"); ?>">Manage Blog Comments</a></li>
        <?php endif; ?>
        <?php if($sf_user -> hasCredential("te_blog_post_category_crud")): ?>
		<li class="ui-state-default ui-corner-top  <?php if($sf_params -> get("module") == "teBlogPostCategoryAdmin") { ?>ui-tabs-selected ui-state-active<?php } ?>"><a href="<?php echo url_for("te_blog_post_category_admin"); ?>">Manage Categories</a></li>
        <?php endif; ?>
        <li class="ui-state-default ui-corner-top  <?php if($sf_params -> get("module") == "teBlogTagAdmin") { ?>ui-tabs-selected ui-state-active<?php } ?>"><a href="<?php echo url_for("te_blog_tag_admin"); ?>">Manage Tags</a></li>
	</ul>

</div>