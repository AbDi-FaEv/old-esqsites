<?php

/**
 * WebsiteTemplate filter form.
 *
 * @package    esqsites123
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class WebsiteTemplateFormFilter extends BaseWebsiteTemplateFormFilter
{
  public function configure()
  {
    $this -> widgetSchema["category_id"] -> setOption("order_by", array("Name", "asc"));

    $status_choices = array("" => "") + WebsiteTemplate::getStates();
    $this -> widgetSchema["status"] = new sfWidgetFormSelect(array("choices" => $status_choices));
    $this -> validatorSchema["status"] = new sfValidatorChoice(array("required" => false, "choices" => array_keys(WebsiteTemplate::getStates()), "required" => false));

    $types = array("" => "") + WebsiteTemplate::getTypes();
    $this -> widgetSchema["type"] = new sfWidgetFormSelect(array("choices" => $types));
    $this -> validatorSchema["type"] = new sfValidatorChoice(array("required" => false, "choices" => array_keys(WebsiteTemplate::getTypes()), "required" => true));
  }
  
  public function getFields()
  {
    $fields = parent::getFields();
    $fields["status"] = "ForeignKey";
    $fields["type"] = "ForeignKey";
    return $fields;
  }
}
