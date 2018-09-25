<?php

class WebsiteUpgradeForm extends BaseFormPropel
{
  public function setup()
  {
    $this -> setWidgets(array(
      'website_attribute_id'        => new sfWidgetFormPropelChoice(array('model' => 'WebsiteAttribute', 'add_empty' => false)),
    ));
    
    $this -> setValidators(array(
      'website_attribute_id'        => new sfValidatorPropelChoice(array('model' => 'WebsiteAttribute', 'column' => 'id', 'required' => true))
    ));
    
    $this -> widgetSchema["website_attribute_id"] -> setOption("expanded", true);
  }
  
  public function getModelName()
  {
    return 'Website';
  }
    
}