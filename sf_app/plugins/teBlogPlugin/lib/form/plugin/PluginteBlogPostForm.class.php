<?php

/**
 * teBlogPost form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class PluginteBlogPostForm extends BaseteBlogPostForm
{
  protected function getUser()
  {
    if(($user = $this -> getOption("user")) && !$user instanceof sfUser)
    {
      throw new InvalidArgumentException("Expecting sfUser");
    }
    return $user;
  }

  public function configure()
  {
  	unset($this["created_at"], $this["updated_at"], $this["created_by"], $this["updated_by"]);

    $user = $this -> getUser();

    if($user && $this -> isNew())
    {
      $this -> setDefault("author_id", $user -> getId());
    }

    if(!$user || !$user -> hasCredential("te_blog_post_publish"))
    {
      unset($this["is_published"]);
    }

    if(!$user  || !$user -> hasCredential("te_blog_post_assign"))
    {
      $c = new Criteria();
      $c -> add(sfGuardUserPeer::ID, $user -> getId());
      $this -> widgetSchema["author_id"] -> setOption("criteria", $c);
    }

    if($user && $user -> hasCredential("te_blog_post_access_anonymous"))
    {
      $this -> widgetSchema["author_id"] -> setOption("add_empty", " - Anonymous");
    }
    else
    {
      $this -> widgetSchema["author_id"] -> setOption("add_empty", false);
    }
    
    //tags
  	$this -> widgetSchema["tags"] = new sfWidgetFormInputTags(array('taggable_object' => $this->getObject(), 'enable_autocomplete' => true));
  	$this -> validatorSchema["tags"] = new sfValidatorTags(array('taggable_object' => $this->getObject(), "required" => false));

  	$this -> validatorSchema["title"] -> setMessage("required", "Please enter a title");
  	$this -> widgetSchema["content"] = new sfWidgetFormFCKEditor();
  	$this -> widgetSchema["published_at"] = new sfWidgetFormJQueryDate();
    //$this -> widgetSchema["published_at"] -> setOption("can_be_empty", false);

    $this -> widgetSchema["te_blog_post_to_category_link_list"] -> setOption("expanded", true);
    if(teBlogPostCategoryQuery::create() -> count())
    {
      //unset($this["te_blog_post_to_category_link_list"]); //breaks, investigate why
    }
    
    $this -> setDefault("published_at", time());
  }
  
}