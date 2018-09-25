<?php

/**
 * sfBlogPostCategory form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class teBlogPostCategoryForm extends BaseteBlogPostCategoryForm
{
  public function configure()
  {
  	unset($this["created_at"], $this["updated_at"], $this["te_blog_post_to_category_link_list"]);
  	$this -> validatorSchema["name"] -> setMessage("required", "Please enter a name for this category");
  }
}

