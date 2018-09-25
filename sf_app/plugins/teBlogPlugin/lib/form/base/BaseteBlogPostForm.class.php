<?php

/**
 * teBlogPost form base class.
 *
 * @method teBlogPost getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseteBlogPostForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'author_id'                          => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'title'                              => new sfWidgetFormInputText(),
      'extract'                            => new sfWidgetFormTextarea(),
      'content'                            => new sfWidgetFormTextarea(),
      'is_published'                       => new sfWidgetFormInputCheckbox(),
      'allow_comments'                     => new sfWidgetFormInputCheckbox(),
      'published_at'                       => new sfWidgetFormDateTime(),
      'created_by'                         => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'updated_by'                         => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'id'                                 => new sfWidgetFormInputHidden(),
      'created_at'                         => new sfWidgetFormDateTime(),
      'updated_at'                         => new sfWidgetFormDateTime(),
      'slug'                               => new sfWidgetFormInputText(),
      'te_blog_post_to_category_link_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'teBlogPostCategory')),
    ));

    $this->setValidators(array(
      'author_id'                          => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'title'                              => new sfValidatorString(array('max_length' => 255)),
      'extract'                            => new sfValidatorString(array('required' => false)),
      'content'                            => new sfValidatorString(array('required' => false)),
      'is_published'                       => new sfValidatorBoolean(array('required' => false)),
      'allow_comments'                     => new sfValidatorBoolean(array('required' => false)),
      'published_at'                       => new sfValidatorDateTime(),
      'created_by'                         => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'updated_by'                         => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'id'                                 => new sfValidatorPropelChoice(array('model' => 'teBlogPost', 'column' => 'id', 'required' => false)),
      'created_at'                         => new sfValidatorDateTime(array('required' => false)),
      'updated_at'                         => new sfValidatorDateTime(array('required' => false)),
      'slug'                               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'te_blog_post_to_category_link_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'teBlogPostCategory', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'teBlogPost', 'column' => array('slug', 'published_at'))),
        new sfValidatorPropelUnique(array('model' => 'teBlogPost', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('te_blog_post[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'teBlogPost';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['te_blog_post_to_category_link_list']))
    {
      $values = array();
      foreach ($this->object->getteBlogPostToCategoryLinks() as $obj)
      {
        $values[] = $obj->getCategoryId();
      }

      $this->setDefault('te_blog_post_to_category_link_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveteBlogPostToCategoryLinkList($con);
  }

  public function saveteBlogPostToCategoryLinkList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['te_blog_post_to_category_link_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(teBlogPostToCategoryLinkPeer::POST_ID, $this->object->getPrimaryKey());
    teBlogPostToCategoryLinkPeer::doDelete($c, $con);

    $values = $this->getValue('te_blog_post_to_category_link_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new teBlogPostToCategoryLink();
        $obj->setPostId($this->object->getPrimaryKey());
        $obj->setCategoryId($value);
        $obj->save();
      }
    }
  }

}
