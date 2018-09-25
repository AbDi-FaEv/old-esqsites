<?php

/**
 * Resource filter form base class.
 *
 * @package    esqsites123
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseResourceFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'category_id'  => new sfWidgetFormPropelChoice(array('model' => 'ResourceCategory', 'add_empty' => true)),
      'company_name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'image_url'    => new sfWidgetFormFilterInput(),
      'url'          => new sfWidgetFormFilterInput(),
      'url_title'    => new sfWidgetFormFilterInput(),
      'email'        => new sfWidgetFormFilterInput(),
      'description'  => new sfWidgetFormFilterInput(),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'category_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'ResourceCategory', 'column' => 'id')),
      'company_name' => new sfValidatorPass(array('required' => false)),
      'image_url'    => new sfValidatorPass(array('required' => false)),
      'url'          => new sfValidatorPass(array('required' => false)),
      'url_title'    => new sfValidatorPass(array('required' => false)),
      'email'        => new sfValidatorPass(array('required' => false)),
      'description'  => new sfValidatorPass(array('required' => false)),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('resource_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Resource';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Text',
      'category_id'  => 'ForeignKey',
      'company_name' => 'Text',
      'image_url'    => 'Text',
      'url'          => 'Text',
      'url_title'    => 'Text',
      'email'        => 'Text',
      'description'  => 'Text',
      'created_at'   => 'Date',
    );
  }
}
