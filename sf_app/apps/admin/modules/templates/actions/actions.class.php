<?php

require_once dirname(__FILE__).'/../lib/templatesGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/templatesGeneratorHelper.class.php';

/**
 * templates actions.
 *
 * @package    esqsites123
 * @subpackage templates
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class templatesActions extends autoTemplatesActions
{
  public function executeShowWebsites()
  {
    $filters = array("template_id" => $this -> getRoute() -> getObject() -> getId(), "status" => Website::STATUS_ACTIVE);
    $this->getUser()->setAttribute('websites.filters', $filters, 'admin_module');
    $this -> redirect("@website");
  }
}
