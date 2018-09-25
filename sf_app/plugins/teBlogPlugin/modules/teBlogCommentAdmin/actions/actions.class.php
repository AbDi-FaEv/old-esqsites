<?php

require_once dirname(__FILE__).'/../lib/teBlogCommentAdminGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/teBlogCommentAdminGeneratorHelper.class.php';

/**
 * teBlogCommentAdmin actions.
 *
 * @package    tpr
 * @subpackage teBlogCommentAdmin
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class teBlogCommentAdminActions extends autoteBlogCommentAdminActions
{
	public function preExecute()
	{
		sfPropelModerationBehavior::disable(); //can't see all comments otherwise
		parent::preExecute();
	}
	
	public function executeApprove()
	{
		$comment = $this -> getRoute() -> getObject();
		$comment -> setModerationStatus(sfPropelModerationBehavior::TAGGED_SAFE);
		$comment -> save();
		if($this -> getRequestParameter("referer") == "post")
    {
		  $this -> redirect("teBlogPostAdmin/edit?id=".$comment -> getCommentableId());
    }
    
    $this -> redirect("te_blog_comment_admin");
	}
	
	public function executeRefuse()
	{
		$comment = $this -> getRoute() -> getObject();
		$comment -> setModerationStatus(sfPropelModerationBehavior::TAGGED_UNSAFE);
		$comment -> save();
		
    if($this -> getRequestParameter("referer") == "post")
    {
		  $this -> redirect("teBlogPostAdmin/edit?id=".$comment -> getCommentableId());
    }
    
    $this -> redirect("te_blog_comment_admin");
	}
  
  public function executeBatchApprove(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');
    $comments = sfCommentPeer::retrieveByPks($ids);
    
    foreach($comments as $comment)
    {
      $comment -> setModerationStatus(sfPropelModerationBehavior::TAGGED_SAFE);
      $comment -> save();
    }
    
    $this -> getUser() -> setFlash("notice", "The selected comments have been accepted.");
    $this -> redirect("te_blog_comment_admin"); //generate route in the future
  }
  
  public function executeBatchRefuse(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');
    $comments = sfCommentPeer::retrieveByPks($ids);
    
    foreach($comments as $comment)
    {
      $comment -> setModerationStatus(sfPropelModerationBehavior::TAGGED_UNSAFE);
      $comment -> save();
    }
    
    $this -> getUser() -> setFlash("notice", "The selected comments have been refused.");
    $this -> redirect("te_blog_comment_admin"); //generate route in the future
  }
}
