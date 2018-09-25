<?php

/**
 * teBlogPostCategory form base class.
 *
 * @method teBlogPostCategory getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseteBlogPostCategoryForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                               => new sfWidgetFormInputText(),
      'id'                                 => new sfWidgetFormInputHidden(),
      'created_at'                         => new sfWidgetFormDateTime(),
      'updated_at'                         => new sfWidgetFormDateTime(),
      'slug'                               => new sfWidgetFormInputText(),
      'te_blog_post_to_category_link_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'teBlogPost')),
    ));

    $this->setValidators(array(
      'name'                               => new sfValidatorString(array('max_length' => 255)),
      'id'                                 => new sfValidatorPropelChoice(array('model' => 'teBlogPostCategory', 'column' => 'id', 'required' => false)),
      'created_at'                         => new sfValidatorDateTime(array('required' => false)),
      'updated_at'                         => new sfValidatorDateTime(array('required' => false)),
      'slug'                               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'te_blog_post_to_category_link_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'teBlogPost', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'teBlogPostCategory', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('te_blog_post_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'teBlogPostCategory';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['te_blog_post_to_category_link_list']))
    {
      $values = array();
      foreach ($this->object->getteBlogPostToCategoryLinks() as $obj)
      {
        $values[] = $obj->getPostId();
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
    $c->add(teBlogPostToCategoryLinkPeer::CATEGORY_ID, $this->object->getPrimaryKey());
    teBlogPostToCategoryLinkPeer::doDelete($c, $con);

    $values = $this->getValue('te_blog_post_to_category_link_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new teBlogPostToCategoryLink();
        $obj->setCategoryId($this->object->getPrimaryKey());
        $obj->setPostId($value);
        $obj->save();
      }
    }
  }

}
