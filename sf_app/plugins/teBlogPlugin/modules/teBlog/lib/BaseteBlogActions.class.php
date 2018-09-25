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
class BaseteBlogActions extends sfActions
{
  public function preExecute()
  {
    $this -> getResponse()->setTitle(sfConfig::get('app_teBlogPlugin_title'));
  }

  /**
   * displays a feed of the most recent posts
   * 
   * @param sfWebRequest $request
   */
  public function executeShowPostFeed(sfWebRequest $request)
  {
  	$this -> context -> getConfiguration() -> loadHelpers(array('I18N'));

    //create feed
    $feed = sfFeedPeer::newInstance($request -> getRequestFormat());
    $feed -> setTitle(sfConfig::get("app_teBlogPlugin_title"));
    $feed -> setLink($this -> generateUrl("te_blog", array(), true));
    $feed -> setAuthorName(sfConfig::get("app_teBlogPlugin_author"));

    //add feed items
    $posts = teBlogPostFrontQuery::create() ->
      orderByPublishedAt('desc') ->
      limit(sfConfig::get('app_teBlogPlugin_feed_count', 10)) ->
      find();

    if(count($posts))
    {
      $feed_items = $this -> convertPostsToFeedItems($posts);
      $feed -> setItems($feed_items);
    }
    
    return $this -> renderText($feed -> asXml());
  }

  public function executeShowByAuthor(sfWebRequest $request)
  {
    $this -> author = $this -> getRoute() -> getObject();

    $per_page = sfConfig::get("app_teBlogPlugin_posts_per_page", 5);
    $page = $this -> getRequestParameter("page", 1);

    $this -> posts = teBlogPostFrontQuery::create() -> paginate($page, $per_page);

    $this -> setTemplate("list");
  }
 
  /**
   * displays the main blog post list (or forwards to the corresponding feed)
   *
   * @param sfWebRequest $request
   */
  public function executeIndex(sfWebRequest $request)
  {
    if($request -> getRequestFormat() == "rss")
    {
      $this -> forward($this -> getModuleName(), "showPostFeed");
    }

    $per_page = sfConfig::get("app_teBlogPlugin_posts_per_page", 5);
    $page = $this -> getRequestParameter("page", 1);

    $this -> posts = teBlogPostFrontQuery::create() ->
      orderByPublishedAt('desc') ->
      paginate($page, $per_page);

    $this -> feed_title = 'Posts from '.sfConfig::get('app_teBlogPlugin_title');
    $this -> feed_url = $this -> generateUrl('te_blog', array("sf_format" => "rss"));

    $this -> setTemplate("list");
  }
  
  protected function convertPostsToFeedItems($posts)
  {
  	foreach($posts as $post)
  	{
      $item = new sfFeedItem();
      $item->setTitle($post -> getTitle());
      $item->setLink($this -> generateUrl("te_blog_post", $post, true));
      //$item->setAuthorName("blah!");
      //$item->setAuthorEmail("blah@blah.com");
      $item->setPubdate($post -> getPublishedAt('U'));
      $item->setUniqueId($post -> getSlug());
      $item->setDescription($post -> getExtract());
      $items[] = $item;
  	}
  	return $items;
  }

  public function executeShowByTag(sfWebRequest $request)
  {
    $tag = $request -> getParameter("tag");
    $this -> forward404Unless(TagQuery::create() -> findOneByName($tag));

    $per_page = sfConfig::get("app_teBlogPlugin_posts_per_page", 5);
    $page = $this -> getRequestParameter("page", 1);
    
    $tag_criteria = TagPeer::getTaggedWithCriteria("teBlogPost", $tag);
    $query = teBlogPostFrontQuery::create(null, $tag_criteria);

    //populate template
    $this -> posts = $query -> paginate($page, $per_page);
    $this -> feed_url = $this -> generateUrl("te_blog_tag", array("tag" => $tag, "sf_format" => "rss"));
    $this -> feed_title = 'Posts tagged "'.$tag.'" from '.sfConfig::get('app_teBlogPlugin_title');
    $this -> title = 'Posts tagged "'.$tag.'"';
    
    $this -> setTemplate('list');
  }
  
  public function executeShowByCategory()
  {
    $this -> category = $this -> getRoute() -> getteBlogPostCategory();
    
    $per_page = sfConfig::get("app_teBlogPlugin_posts_per_page", 5);
    $page = $this -> getRequestParameter("page", 1);
    
    $this -> posts = teBlogPostFrontQuery::create() -> filterByCategory($this -> category) -> paginate($page, $per_page);
    $this -> title = 'Posts in Category "'.$this -> category.'"';
    $this -> setTemplate("list");
  }
     
  public function executeShow()
  {
    $this -> post = $this -> getRoute() -> getteBlogPost();
    $this -> getResponse() -> setTitle($this -> post -> getTitle());
  }

  public function executeShowArchive(sfWebRequest $request)
  {
    $year = $this -> getRequestParameter("year");
    $month = $this -> getRequestParameter("month");

    $start = mktime(0, 0, 0, $month, 1, $year);
    $end = mktime(0, 0, 0, $month + 1, 1, $year);

    $per_page = sfConfig::get("app_teBlogPlugin_posts_per_page", 5);
    $page = $this -> getRequestParameter("page", 1);

    $this -> posts = $query = teBlogPostFrontQuery::create() ->
      filterByPublishedAt(array("min" => $start, "max" => $end)) ->
      orderByPublishedAt() ->
      paginate($page, $per_page);

    $this -> title = 'Posts in '.date("F", mktime(0, 0, 0, $request -> getParameter("month"), 1)).' '.$request -> getParameter("year");
    $this -> setTemplate("list");
  }

}