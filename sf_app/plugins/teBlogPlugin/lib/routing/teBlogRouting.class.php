<?php

/**
 *
 * @package    teBlog
 * @subpackage plugin
 * @author     Daniel Richter
 */
class teBlogRouting
{

  static public function addRoutesForAdmin(sfEvent $event)
  {
    $prefix = sfConfig::get("app_teBlogPlugin_route_prefix_admin", sfConfig::get("app_teBlogPlugin_route_prefix", "blog"));

    $event->getSubject()->prependRoute('te_blog_post_admin', new sfPropel15RouteCollection(array(
      'name'                 => 'te_blog_post_admin',
      'model'                => 'teBlogPost',
      'module'               => 'teBlogPostAdmin',
      'prefix_path'          => $prefix,
      'with_wildcard_routes' => true,
      'requirements'         => array(),
    )));

    $event->getSubject()->prependRoute('te_blog_tag_admin', new sfPropel15RouteCollection(array(
      'name'                 => 'te_blog_tag_admin',
      'model'                => 'Tag',
      'module'               => 'teBlogTagAdmin',
      'prefix_path'          => $prefix.'/tags',
      'with_wildcard_routes' => true,
      'requirements'         => array(),
    )));
    
    $event->getSubject()->prependRoute('te_blog_comment_admin', new sfPropel15RouteCollection(array(
      'name'                 => 'te_blog_comment_admin',
      'model'                => 'sfComment',
      'module'               => 'teBlogCommentAdmin',
      'prefix_path'          => $prefix.'/comments',
      'with_wildcard_routes' => true,
      'requirements'         => array(),
    )));
    
    $event->getSubject()->prependRoute('te_blog_post_category_admin', new sfPropel15RouteCollection(array(
      'name'                 => 'te_blog_post_category_admin',
      'model'                => 'teBlogPostCategory',
      'module'               => 'teBlogPostCategoryAdmin',
      'prefix_path'          => $prefix.'/categories',
      'with_wildcard_routes' => true,
      'requirements'         => array(),
    )));
  }
  
  static public function addRoutesForBlog(sfEvent $event)
  {
    $prefix = sfConfig::get("app_teBlogPlugin_route_prefix", "blog");
    
    //blog index with pagination
    $event->getSubject()->prependRoute('te_blog', 
	    	new sfPropel15Route("/".$prefix.'.:sf_format',
          array("module" => "teBlog", "action" => "index", "sf_format" => "html"),
          array("page" => "\d"), 
          array("model" => "teBlogPost", "type" => "list", "extra_parameters_as_query_string" => true)));
    
    if(sfConfig::get('app_teBlogPlugin_use_date_in_url', true))
    {
    	//blog post detail with date
      $event->getSubject()->prependRoute('te_blog_post', 
	    	new teBlogFrontRoute("/".$prefix.'/:published_at/:slug.:sf_format', array("module" => "teBlog", "action" => "show", "sf_format" => "html"), array("sf_format" => "(html|rss)"),
	    		array("model" => "teBlogPost", "type" => "object", "method" => "getObjectForRoute")));
    }
    else
    {
      //blog post detail without date
      $event->getSubject()->prependRoute('te_blog_post', 
	    	new teBlogFrontRoute("/".$prefix.'/:slug', array("module" => "teBlog", "action" => "show"), array("sf_format" => "(html|rss)"),
	    		array("model" => "teBlogPost", "type" => "object", "method" => "getObjectForRoute")));
    }

    //posts by author
    $author_class = sfConfig::get("app_teBlogPlugin_author_class", "sfGuardUser");
    $event->getSubject()->prependRoute('te_blog_author',
    	new sfPropel15Route("/".$prefix.'/author/:username.:sf_format',
          array("module" => "teBlog", "action" => "showByAuthor", "sf_format" => "html"),
          array("sf_format" => "(html|rss)"),
          array("model" => $author_class, "type" => "object", "extra_parameters_as_query_string" => true)));
    
    //posts by tag
    $event->getSubject()->prependRoute('te_blog_tag',
    	new sfRoute("/".$prefix.'/tag/:tag.:sf_format',
          array("module" => "teBlog", "action" => "showByTag", "sf_format" => "html"),
          array(),
          array("extra_parameters_as_query_string" => true)));
    
    //posts by year
    $event->getSubject()->prependRoute('te_blog_archive',
    	new sfRoute('/'.$prefix.'/archive/:year/:month', 
          array("module" => "teBlog", "action" => "showArchive", "sf_format" => "html"), //defaults
          array(), //requirements
          array("extra_parameters_as_query_string" => true))); //options

    //posts by category
    $event->getSubject()->prependRoute('te_blog_category', 
	    	new sfPropel15Route("/".$prefix.'/categories/:slug',
                array("module" => "teBlog", "action" => "showByCategory"), //defaults
                array("page" => "\d"),
	    		array("model" => "teBlogPostCategory", "type" => "object", "extra_parameters_as_query_string" => true))); //options

  	if(sfConfig::get("app_teBlogPlugin_use_feeds", true)) //no pagination in these routes, limited via config setting
  	{
      //comment feed
	    $event->getSubject()->prependRoute('te_blog_comment_feed', 
	    	new sfRoute("/".$prefix.'/comments.:sf_format', array("module" => "teBlog", "action" => "showCommentsFeed")));
  	}
  }
  
}