<?php

/**
 * sfComment form.
 *
 * @package    sfPropelActAsCommentableBehaviorPlugin
 * @subpackage form
 * @author     Xavier Lacot <xavier@lacot.org>
 * @see        http://www.symfony-project.org/plugins/sfPropelActAsCommentableBehaviorPlugin
 */
class teBlogCommentForm extends BasesfCommentForm
{
	public function configure()
	{
		unset($this["commentable_model"], 
		$this["commentable_id"], 
		$this["comment_namespace"],
		$this["author_id"]);
		
		$status_choices = sfPropelModerationBehavior::getStatuses();
		unset($status_choices[-1]);
		
		$this -> widgetSchema["moderation_status"] = new sfWidgetFormSelect(array("choices" => $status_choices));
	}
}
