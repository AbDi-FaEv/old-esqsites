<?php if($num_comments > 0) { ?>
<h2>Comments Awaiting Moderation:</h2>
<p>There are <?php echo $num_comments; ?> comments awaiting moderation.</p>
<?php echo link_to("Moderate Comments", "te_blog_comment_admin_collection", array("action" => "filter"), array("method" => "post", "query_string" => "sf_comment_filters[moderation_status]=".sfPropelModerationBehavior::NOT_CHECKED)); ?>
<?php } ?>