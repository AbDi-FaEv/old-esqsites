<?php

class teBlogCommentAdminComponents extends sfComponents 
{
	
    public function executeCommentQueue()
    {
    	sfPropelModerationBehavior::disable();
    	
    	$c = new Criteria();
    	$c -> add(sfCommentPeer::COMMENTABLE_MODEL, 'teBlogPost');
    	$c -> add(sfCommentPeer::MODERATION_STATUS, sfPropelModerationBehavior::NOT_CHECKED);
    	$this -> num_comments = sfCommentPeer::doCount($c);
    	
    	sfPropelModerationBehavior::enable();
    }
}