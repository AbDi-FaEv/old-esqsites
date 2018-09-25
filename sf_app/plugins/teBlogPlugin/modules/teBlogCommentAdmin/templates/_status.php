<?php switch($sf_comment -> getModerationStatus())
{
  case sfPropelModerationBehavior::TAGGED_SAFE:
  	$class = "safe";
    $status = "Checked";
    break;
  case sfPropelModerationBehavior::NOT_CHECKED:
  	$class = "unchecked";
    $status = "Unchecked";
    break;
  case sfPropelModerationBehavior::AUTO_TAGGED_UNSAFE:
    $class = "auto_spam";
    $status = "Auto Spam";
    break;
  case sfPropelModerationBehavior::TAGGED_UNSAFE:
    $class = "spam";
    $status = "Spam";
}
?>
<span class="comment_status <?php echo $class;?>"><?php echo $status; ?></span>