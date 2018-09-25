<?php

/**
 * teBlogPostAdmin actions.
 *
 * @package    tpr
 * @subpackage teBlogPostAdmin
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class BaseteBlogPostAdminComponents extends sfComponents
{
	public function executeComments()
	{
		//consider refactoring
		$c = new Criteria();
		$c -> add(sfCommentPeer::COMMENTABLE_MODEL, 'teBlogPost');
		$c -> add(sfCommentPeer::MODERATION_STATUS, sfPropelModerationBehavior::NOT_CHECKED);
		$c -> add(sfCommentPeer::COMMENTABLE_ID, $this -> post -> getId());
		$c -> addDescendingOrderByColumn(sfCommentPeer::CREATED_AT);
		$this -> comments = sfCommentPeer::doSelect($c);
	}
}
