<?php use_helper("Text"); ?>
<?php foreach($comments as $comment) { ?>
<div>
	<h3><?php echo $comment -> getAuthorName(); ?> (<?php echo $comment -> getAuthorEmail(); ?>)</h3>
	<div class="content"><?php echo truncate_text(nl2br(strip_tags($comment -> getText())), 200); ?></div>
	<div class="date"><?php echo $comment -> getCreatedAt(); ?></div>
	<div class="moderation_tools">
	
	<?php switch($comment -> getModerationStatus()) {
	  case sfPropelModerationBehavior::TAGGED_SAFE:?>
	    <p>Safe</p>
<?php	    break;
	  case sfPropelModerationBehavior::NOT_CHECKED: ?>
	    <p>Not yet checked</p>
	    <ul class="sf_admin_actions">
        <li class="sf_admin_action_edit"><?php echo link_to("Edit", "te_blog_comment_admin_edit", $comment); ?></li>
        <li class="sf_admin_action_save"><?php echo link_to("Approve", "teBlogCommentAdmin/approve?id=".$comment -> getId()."&referer=post", "confirm=Approve - Are You Sure?"); ?></li>
        <li class="sf_admin_action_delete"><?php echo link_to("Spam", "teBlogCommentAdmin/refuse?id=".$comment -> getId()."&referer=post", "confirm=Mark As Spam - Are You Sure?"); ?></li>
		  </ul>
<?php	    break;
	  case sfPropelModerationBehavior::AUTO_TAGGED_UNSAFE: ?>
	    <p>Aut-Spam</p>
<?php	    break;
	  case sfPropelModerationBehavior::TAGGED_UNSAFE: ?>
	    <p>Spam</p>
<?php } ?>
	</div>
</div>
<?php } ?>