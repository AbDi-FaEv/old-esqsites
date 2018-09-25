<?php

/**
 * Website form.
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class WebsiteAdminForm extends WebsiteForm
{
  public function configure()
  {
  	parent::configure();

    $this -> useFields(array("firm_name", "customer_id", "status", "template_id", "website_attribute_id", "last_billing_date"));
    $this -> widgetSchema["last_billing_date"] = new sfWidgetFormJQueryDate();

    if($this -> isNew())
    {
      unset($this["status"]);
    }
    else
    {
      unset($this["customer_id"]); //once associated, can't be moved (otherwise canceled customers don't show up here)
    }
  }
}