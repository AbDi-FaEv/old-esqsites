<?php

/*
 * This file is part of the teBlog package.
 * (c) 2004-2006 Francois Zaninotto <francois.zaninotto@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Blog frontend actions
 *
 * @package    teBlog
 * @subpackage plugin
 * @author     Daniel Richter
 * @version    SVN: $Id$
 */
class BaseteBlogComponents extends sfComponents
{
  
  public function executeRecentPosts()
  {
    $query = teBlogPostFrontQuery::create() -> orderByPublishedAt('desc');
    
    if(isset($this -> category))
    {
      $query -> filterByCategory($this -> category);
    }
    
    if(!$limit = $this -> limit)
    {
      $limit = sfConfig::get('app_teBlogPlugin_recent_post_limit', 5);
    }
    
    $this -> posts = $query -> limit($limit) -> find();
  }
  
  public function executeCategoryList()
  {
  	$this -> categories = teBlogPostCategoryQuery::create() -> find();
  }
  
  public function executeRecentPostList()
  {
    if(!$limit = $this -> limit)
    {
      $limit = sfConfig::get('app_teBlogPlugin_recent_post_limit', 5);
    }

    $this -> posts = teBlogPostFrontQuery::create() -> orderByPublishedAt('desc') -> limit($limit) -> find();
  }

  public function executeArchive()
  {
    $this -> archive_entries = teBlogPostPeer::getArchiveEntries();
  }
  
  public function executeTagCloud()
  {
    $query = teBlogPostFrontQuery::create() -> addJoin(teBlogPostPeer::ID, TaggingPeer::TAGGABLE_ID);
    $this -> tags = TagPeer::getPopulars($query, array("model" => "teBlogPost"));
  }
  
  public function executeCommentForm()
  {
  	$this -> form = new teBlogCommentForm();
  }

  public function executeSidebar()
  {
  }
}