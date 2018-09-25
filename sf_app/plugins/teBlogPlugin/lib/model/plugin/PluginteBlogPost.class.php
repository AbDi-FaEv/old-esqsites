<?php

/**
 * Subclass for representing a row from the 'sf_blog_post' table.
 *
 * 
 *
 * @package plugins.teBlogPlugin.lib.model
 */ 
class PluginteBlogPost extends BaseteBlogPost
{ 
  public function getSolidAuthor()
  {
  	if(!$author = $this -> getAuthor())
  	{
      $author = "anonymous";
  	}
  	return $author;
  }
  
  public function getCategories($criteria = null, PropelPDO $con = null)
  {
    return parent::getCategorys($criteria, $con);
  }

    public function getPreview()
  {
    return $this -> getExtract() ? $this -> getExtract() : strip_tags($this -> getContent());
  }

  public function allowComments()
  {
    if ($this->getAllowComments())
    {
      $validity = sfConfig::get('app_teBlog_comment_disable_after', 0);
      if ($validity == 0 || $this->getPublishedSinceDays() < $validity)
      {
        return true;
      }
    }

    return false;
  }

}