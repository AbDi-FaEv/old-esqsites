<?php

/**
 * teBlogPostCategory filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseteBlogPostCategoryFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'                         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'                         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'slug'                               => new sfWidgetFormFilterInput(),
      'te_blog_post_to_category_link_list' => new sfWidgetFormPropelChoice(array('model' => 'teBlogPost', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'                               => new sfValidatorPass(array('required' => false)),
      'created_at'                         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'                         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'slug'                               => new sfValidatorPass(array('required' => false)),
      'te_blog_post_to_category_link_list' => new sfValidatorPropelChoice(array('model' => 'teBlogPost', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('te_blog_post_category_filters[%s]');

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

    $criteria->addJoin(teBlogPostToCategoryLinkPeer::CATEGORY_ID, teBlogPostCategoryPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(teBlogPostToCategoryLinkPeer::POST_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(teBlogPostToCategoryLinkPeer::POST_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'teBlogPostCategory';
  }

  public function getFields()
  {
    return array(
      'name'                               => 'Text',
      'id'                                 => 'Number',
      'created_at'                         => 'Date',
      'updated_at'                         => 'Date',
      'slug'                               => 'Text',
      'te_blog_post_to_category_link_list' => 'ManyKey',
    );
  }
}
