<?php

class AnalyticsForm extends BaseFormPropel
{
  public function setup()
  {
    $this -> setWidgets(array(
      "analytics_code" => new sfWidgetFormInput(),
      "apps_token" => new sfWidgetFormInput()
    ));
    
    $this -> setValidators(array(
      "analytics_code" => new esqValidatorGoogleAnalytics(array("required" => false), array("invalid" => "Sorry, this code seems invalid.")),
      "apps_token" => new sfValidatorString(array("required" => false))
    ));

    $this -> widgetSchema -> setHelp("analytics_code", "Format: UA-xxxxxx-x");
    $this -> widgetSchema -> setNameFormat("analytics[%s]");
  }
  
  public function getModelName()
  {
    return 'Website';
  }
}