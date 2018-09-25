<?php

/**
 * Page form base class.
 *
 * @method Page getObject() Returns the current form's model object
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePageForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                           => new sfWidgetFormInputHidden(),
      'website_id'                   => new sfWidgetFormPropelChoice(array('model' => 'Website', 'add_empty' => true)),
      'template_type_id'             => new sfWidgetFormPropelChoice(array('model' => 'TemplateType', 'add_empty' => true)),
      'menu_type'                    => new sfWidgetFormInputText(),
      'page_content_display_type_id' => new sfWidgetFormPropelChoice(array('model' => 'PageContentDisplayType', 'add_empty' => false)),
      'rank'                         => new sfWidgetFormInputText(),
      'title'                        => new sfWidgetFormInputText(),
      'meta_title'                   => new sfWidgetFormInputText(),
      'meta_description'             => new sfWidgetFormInputText(),
      'meta_keywords'                => new sfWidgetFormInputText(),
      'meta_content'                 => new sfWidgetFormInputText(),
      'link_name'                    => new sfWidgetFormInputText(),
      'url'                          => new sfWidgetFormInputText(),
      'status'                       => new sfWidgetFormInputText(),
      'created_at'                   => new sfWidgetFormDateTime(),
      'updated_at'                   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                           => new sfValidatorPropelChoice(array('model' => 'Page', 'column' => 'id', 'required' => false)),
      'website_id'                   => new sfValidatorPropelChoice(array('model' => 'Website', 'column' => 'id', 'required' => false)),
      'template_type_id'             => new sfValidatorPropelChoice(array('model' => 'TemplateType', 'column' => 'id', 'required' => false)),
      'menu_type'                    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'page_content_display_type_id' => new sfValidatorPropelChoice(array('model' => 'PageContentDisplayType', 'column' => 'id')),
      'rank'                         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'title'                        => new sfValidatorString(array('max_length' => 255)),
      'meta_title'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'meta_description'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'meta_keywords'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'meta_content'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'link_name'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'url'                          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'status'                       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'created_at'                   => new sfValidatorDateTime(array('required' => false)),
      'updated_at'                   => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'Page', 'column' => array('url', 'website_id'))),
        new sfValidatorPropelUnique(array('model' => 'Page', 'column' => array('link_name', 'website_id'))),
        new sfValidatorPropelUnique(array('model' => 'Page', 'column' => array('title', 'website_id'))),
      ))
    );

    $this->widgetSchema->setNameFormat('page[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Page';
  }


}
