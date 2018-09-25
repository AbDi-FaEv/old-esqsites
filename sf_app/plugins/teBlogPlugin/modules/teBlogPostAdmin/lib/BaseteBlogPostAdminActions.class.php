<?php

require_once dirname(__FILE__).'/../lib/teBlogPostAdminGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/teBlogPostAdminGeneratorHelper.class.php';

/**
 * teBlogPostAdmin actions.
 *
 * @package    tpr
 * @subpackage teBlogPostAdmin
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class BaseteBlogPostAdminActions extends autoteBlogPostAdminActions
{

    public function executeEdit(sfWebRequest $request)
    {
      parent::executeEdit($request);
      $user = $this -> getUser();
      if(!$user -> hasCredential(array(array("te_blog_post_crud", "te_blog_post_publish"))) && $user -> hasCredential("te_blog_post_crud_own"))
      {
        $access_ids = $user -> hasCredential("te_blog_post_access_anonymous") ? array(null, $user -> getId()) : array($user -> getId());
        if(!in_array($this -> post -> getAuthorId(), $access_ids))
        {
          $this -> forward(sfConfig::get("sf_secure_module"), sfConfig::get("sf_secure_action"));
        }
      }
    }

    public function buildCriteria()
    {
      $criteria = parent::buildCriteria();
      $user = $this -> getUser();
      if(!$user -> hasCredential(array(array("te_blog_post_crud", "te_blog_post_publish"))) && $user -> hasCredential("te_blog_post_crud_own"))
      {
        $criteria -> add(teBlogPostPeer::AUTHOR_ID, $user -> getId());
        if($user -> hasCredential("te_blog_post_access_anonymous"))
        {
          $c2 = $criteria -> getNewCriterion(teBlogPostPeer::AUTHOR_ID, null, Criteria::ISNULL);
          $criteria -> addOr($c2);
        }
      }
      return $criteria;
    }
	
	public function executeBatchPublish(sfWebRequest $request)
	{
		$ids = $request->getParameter('ids');
		$posts = teBlogPostPeer::retrieveByPks($ids);
		
		foreach($posts as $post)
		{
			$post -> setIsPublished(true);
			$post -> save();
		}
		
		$this -> getUser() -> setFlash("notice", "The selected posts have been published successfully.");
		$this -> redirect("te_blog_post_admin");
	}
	
	public function executeBatchUnpublish(sfWebRequest $request)
	{
		$ids = $request->getParameter('ids');
		$posts = teBlogPostPeer::retrieveByPks($ids);
		
		foreach($posts as $post)
		{
			$post -> setIsPublished(false);
			$post -> save();
		}
		
		$this -> getUser() -> setFlash("notice", "The selected posts have been un-published successfully.");
		$this -> redirect("te_blog_post_admin");
	}
  
  
}
