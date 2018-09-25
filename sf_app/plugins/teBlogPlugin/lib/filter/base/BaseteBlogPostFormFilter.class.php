<?php

/**
 * teBlogPost filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseteBlogPostFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'author_id'                          => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'title'                              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'extract'                            => new sfWidgetFormFilterInput(),
      'content'                            => new sfWidgetFormFilterInput(),
      'is_published'                       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'allow_comments'                     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'published_at'                       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'                         => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'updated_by'                         => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'created_at'                         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'                         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'slug'                               => new sfWidgetFormFilterInput(),
      'te_blog_post_to_category_link_list' => new sfWidgetFormPropelChoice(array('model' => 'teBlogPostCategory', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'author_id'                          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'title'                              => new sfValidatorPass(array('required' => false)),
      'extract'                            => new sfValidatorPass(array('required' => false)),
      'content'                            => new sfValidatorPass(array('required' => false)),
      'is_published'                       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'allow_comments'                     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'published_at'                       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'                         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'updated_by'                         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'created_at'                         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'                         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'slug'                               => new sfValidatorPass(array('required' => false)),
      'te_blog_post_to_category_link_list' => new sfValidatorPropelChoice(array('model' => 'teBlogPostCategory', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('te_blog_post_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addteBlogPostToCategoryLinkListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(teBlogPostToCategoryLinkPeer::POST_ID, teBlogPostPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(teBlogPostToCategoryLinkPeer::CATEGORY_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(teBlogPostToCategoryLinkPeer::CATEGORY_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'teBlogPost';
  }

  public function getFields()
  {
    return array(
      'author_id'                          => 'ForeignKey',
      'title'                              => 'Text',
      'extract'                            => 'Text',
      'content'                            => 'Text',
      'is_published'                       => 'Boolean',
      'allow_comments'                     => 'Boolean',
      'published_at'                       => 'Date',
      'created_by'                         => 'ForeignKey',
      'updated_by'                         => 'ForeignKey',
      'id'                                 => 'Number',
      'created_at'                         => 'Date',
      'updated_at'                         => 'Date',
      'slug'                               => 'Text',
      'te_blog_post_to_category_link_list' => 'ManyKey',
    );
  }
}
