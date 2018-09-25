<?php

/**
 * Website filter form.
 *
 * @package    esqsites123
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class WebsiteFormFilter extends BaseWebsiteFormFilter
{
  public function configure()
  {
  	$status_choices = array("" => "") + Website::getStates();
  	$this -> widgetSchema["status"] = new sfWidgetFormSelect(array("choices" => $status_choices));
  	$this -> validatorSchema["status"] = new sfValidatorChoice(array("choices" => array_keys(Website::getStates()), "required" => false));
    //$this -> widgetSchema["template_id"] -> setOption("criteria", WebsiteTemplateQuery::create() -> filterByStatus(WebsiteTemplate::STATUS_ACTIVE));
    $this -> widgetSchema["template_id"] -> setOption("order_by", array("Reference", "asc"));

    $this -> widgetSchema["customer_id"] = new esqWidgetFormSelectCustomer(array("add_empty" => true));
  }
  
  //a little hackish?
  public function getFields()
  {
    $fields = parent::getFields();
    $fields["status"] = "ForeignKey";
    return $fields;
  }
  
}
