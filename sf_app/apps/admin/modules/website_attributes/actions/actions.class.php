<?php

require_once dirname(__FILE__).'/../lib/website_attributesGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/website_attributesGeneratorHelper.class.php';

/**
 * website_attributes actions.
 *
 * @package    esqsites123
 * @subpackage website_attributes
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class website_attributesActions extends autoWebsite_attributesActions
{
  public function executeShowWebsites()
  {
    $filters = array("website_attribute_id" => $this -> getRoute() -> getObject() -> getId(), "status" => Customer::STATUS_ACTIVE);
    $this->getUser()->setAttribute('websites.filters', $filters, 'admin_module');
    $this -> redirect("@website");
  }
}
