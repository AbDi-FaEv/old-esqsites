<?php
/**
 * Skeleton subclass for performing query and update operations on the 'esq_template_customizations' table.
 *
 * @package    propel.generator.lib.model
 */
class TemplateCustomizationQuery extends BaseTemplateCustomizationQuery
{
  public function filterByOptionalTemplate(WebsiteTemplate $template)
  {
    return $this ->filterByWebsiteTemplate($template) ->
      orWhere(TemplateCustomizationPeer::TEMPLATE_ID.' IS NULL');
  }
}