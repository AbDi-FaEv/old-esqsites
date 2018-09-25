<?php

/**
 * WebsiteAttribute form.
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class WebsiteAttributeForm extends BaseWebsiteAttributeForm
{
  public function configure()
  {
    unset($this["rank"], $this["created_at"], $this["updated_at"]);
    
    $status_choices = WebsiteAttribute::getStates();
    $this -> widgetSchema["status"] = new sfWidgetFormSelect(array("choices" => $status_choices));
    $this -> validatorSchema["status"] = new sfValidatorChoice(array("choices" => array_keys($status_choices), "required" => true));
  }
}
