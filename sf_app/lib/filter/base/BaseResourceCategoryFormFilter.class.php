<?php

/**
 * ResourceCategory filter form base class.
 *
 * @package    esqsites123
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseResourceCategoryFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'url'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name' => new sfValidatorPass(array('required' => false)),
      'url'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('resource_category_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ResourceCategory';
  }

  public function getFields()
  {
    return array(
      'id'   => 'Text',
      'name' => 'Text',
      'url'  => 'Text',
    );
  }
}
