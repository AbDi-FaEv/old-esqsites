<?php

/**
 * TemplateCustomization form.
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Your name here
 */
class TemplateCustomizationForm extends BaseTemplateCustomizationForm
{
  public function configure()
  {
    $website_query = WebsiteQuery::create() -> useCustomerQuery() -> filterByReal() -> endUse();
    $this -> widgetSchema["website_id"] -> setOption("criteria", $website_query);

    unset($this["updated_at"], $this["created_at"]);
  }
}
