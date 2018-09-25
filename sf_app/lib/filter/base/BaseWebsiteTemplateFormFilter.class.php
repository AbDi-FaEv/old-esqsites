<?php

/**
 * WebsiteTemplate filter form base class.
 *
 * @package    esqsites123
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseWebsiteTemplateFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'type'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'reference'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'category_id' => new sfWidgetFormPropelChoice(array('model' => 'TemplateCategory', 'add_empty' => true)),
      'title'       => new sfWidgetFormFilterInput(),
      'description' => new sfWidgetFormFilterInput(),
      'customer_id' => new sfWidgetFormPropelChoice(array('model' => 'Customer', 'add_empty' => true)),
      'status'      => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'rank'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'type'        => new sfValidatorPass(array('required' => false)),
      'reference'   => new sfValidatorPass(array('required' => false)),
      'category_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TemplateCategory', 'column' => 'id')),
      'title'       => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
      'customer_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Customer', 'column' => 'id')),
      'status'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'rank'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('website_template_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'WebsiteTemplate';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Text',
      'type'        => 'Text',
      'reference'   => 'Text',
      'category_id' => 'ForeignKey',
      'title'       => 'Text',
      'description' => 'Text',
      'customer_id' => 'ForeignKey',
      'status'      => 'Number',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
      'rank'        => 'Number',
    );
  }
}
