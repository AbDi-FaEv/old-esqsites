<?php

/**
 * TemplateCustomization filter form base class.
 *
 * @package    esqsites123
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseTemplateCustomizationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'website_id'   => new sfWidgetFormPropelChoice(array('model' => 'Website', 'add_empty' => true)),
      'template_id'  => new sfWidgetFormPropelChoice(array('model' => 'WebsiteTemplate', 'add_empty' => true)),
      'type'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'content'      => new sfWidgetFormFilterInput(),
      'reference'    => new sfWidgetFormFilterInput(),
      'related_file' => new sfWidgetFormFilterInput(),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'website_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Website', 'column' => 'id')),
      'template_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'WebsiteTemplate', 'column' => 'id')),
      'type'         => new sfValidatorPass(array('required' => false)),
      'content'      => new sfValidatorPass(array('required' => false)),
      'reference'    => new sfValidatorPass(array('required' => false)),
      'related_file' => new sfValidatorPass(array('required' => false)),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('template_customization_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TemplateCustomization';
  }

  public function getFields()
  {
    return array(
      'website_id'   => 'ForeignKey',
      'template_id'  => 'ForeignKey',
      'type'         => 'Text',
      'content'      => 'Text',
      'reference'    => 'Text',
      'related_file' => 'Text',
      'id'           => 'Number',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
