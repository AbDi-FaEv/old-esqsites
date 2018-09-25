<?php

/**
 * PageContentDisplayType filter form base class.
 *
 * @package    esqsites123
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePageContentDisplayTypeFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'rank'        => new sfWidgetFormFilterInput(),
      'name'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'notes'       => new sfWidgetFormFilterInput(),
      'description' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'rank'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'name'        => new sfValidatorPass(array('required' => false)),
      'notes'       => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('page_content_display_type_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PageContentDisplayType';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Text',
      'rank'        => 'Number',
      'name'        => 'Text',
      'notes'       => 'Text',
      'description' => 'Text',
    );
  }
}
