<?php

/**
 * Page filter form base class.
 *
 * @package    esqsites123
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePageFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'website_id'                   => new sfWidgetFormPropelChoice(array('model' => 'Website', 'add_empty' => true)),
      'template_type_id'             => new sfWidgetFormPropelChoice(array('model' => 'TemplateType', 'add_empty' => true)),
      'menu_type'                    => new sfWidgetFormFilterInput(),
      'page_content_display_type_id' => new sfWidgetFormPropelChoice(array('model' => 'PageContentDisplayType', 'add_empty' => true)),
      'rank'                         => new sfWidgetFormFilterInput(),
      'title'                        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'meta_title'                   => new sfWidgetFormFilterInput(),
      'meta_description'             => new sfWidgetFormFilterInput(),
      'meta_keywords'                => new sfWidgetFormFilterInput(),
      'meta_content'                 => new sfWidgetFormFilterInput(),
      'link_name'                    => new sfWidgetFormFilterInput(),
      'url'                          => new sfWidgetFormFilterInput(),
      'status'                       => new sfWidgetFormFilterInput(),
      'created_at'                   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'                   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'website_id'                   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Website', 'column' => 'id')),
      'template_type_id'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TemplateType', 'column' => 'id')),
      'menu_type'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'page_content_display_type_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'PageContentDisplayType', 'column' => 'id')),
      'rank'                         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'title'                        => new sfValidatorPass(array('required' => false)),
      'meta_title'                   => new sfValidatorPass(array('required' => false)),
      'meta_description'             => new sfValidatorPass(array('required' => false)),
      'meta_keywords'                => new sfValidatorPass(array('required' => false)),
      'meta_content'                 => new sfValidatorPass(array('required' => false)),
      'link_name'                    => new sfValidatorPass(array('required' => false)),
      'url'                          => new sfValidatorPass(array('required' => false)),
      'status'                       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'                   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'                   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('page_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Page';
  }

  public function getFields()
  {
    return array(
      'id'                           => 'Text',
      'website_id'                   => 'ForeignKey',
      'template_type_id'             => 'ForeignKey',
      'menu_type'                    => 'Number',
      'page_content_display_type_id' => 'ForeignKey',
      'rank'                         => 'Number',
      'title'                        => 'Text',
      'meta_title'                   => 'Text',
      'meta_description'             => 'Text',
      'meta_keywords'                => 'Text',
      'meta_content'                 => 'Text',
      'link_name'                    => 'Text',
      'url'                          => 'Text',
      'status'                       => 'Number',
      'created_at'                   => 'Date',
      'updated_at'                   => 'Date',
    );
  }
}
