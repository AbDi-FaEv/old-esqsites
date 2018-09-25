<?php

/**
 * WebsiteTemplate form.
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class WebsiteTemplateForm extends BaseWebsiteTemplateForm
{
  public function configure()
  {
    unset($this["rank"], $this["created_at"], $this["updated_at"]);

    $this -> widgetSchema["category_id"] -> setOption("order_by", array("Name", "asc"));

    $this -> widgetSchema["customer_id"] -> setOption("criteria", CustomerPeer::getActiveCriteria());
    $this -> widgetSchema["customer_id"] -> setOption("method", "getEmailName");

    $status_choices = WebsiteTemplate::getStates();
    $this -> widgetSchema["status"] = new sfWidgetFormSelect(array("choices" => $status_choices));
    $this -> validatorSchema["status"] = new sfValidatorChoice(array("choices" => array_keys($status_choices), "required" => true));

    $types = WebsiteTemplate::getTypes();
    $this -> widgetSchema["type"] = new sfWidgetFormSelect(array("choices" => $types));
    $this -> validatorSchema["type"] = new sfValidatorChoice(array("choices" => array_keys($types), "required" => true));
  }
}
