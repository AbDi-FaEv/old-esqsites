<?php

/**
 * sfModeratedContent filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BasesfModeratedContentFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'object_id'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'object_model'      => new sfWidgetFormFilterInput(),
      'user_name'         => new sfWidgetFormFilterInput(),
      'user_email'        => new sfWidgetFormFilterInput(),
      'title'             => new sfWidgetFormFilterInput(),
      'content'           => new sfWidgetFormFilterInput(),
      'url'               => new sfWidgetFormFilterInput(),
      'status'            => new sfWidgetFormFilterInput(),
      'comment'           => new sfWidgetFormFilterInput(),
      'moderated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'object_updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'object_id'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'object_model'      => new sfValidatorPass(array('required' => false)),
      'user_name'         => new sfValidatorPass(array('required' => false)),
      'user_email'        => new sfValidatorPass(array('required' => false)),
      'title'             => new sfValidatorPass(array('required' => false)),
      'content'           => new sfValidatorPass(array('required' => false)),
      'url'               => new sfValidatorPass(array('required' => false)),
      'status'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'comment'           => new sfValidatorPass(array('required' => false)),
      'moderated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'object_updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('sf_moderated_content_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfModeratedContent';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'object_id'         => 'Number',
      'object_model'      => 'Text',
      'user_name'         => 'Text',
      'user_email'        => 'Text',
      'title'             => 'Text',
      'content'           => 'Text',
      'url'               => 'Text',
      'status'            => 'Number',
      'comment'           => 'Text',
      'moderated_at'      => 'Date',
      'object_updated_at' => 'Date',
    );
  }
}
