<?php

/**
 * TemplateCategory form.
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TemplateCategoryForm extends BaseTemplateCategoryForm
{
  public function configure()
  {
    unset($this["created_at"], $this["updated_at"]);
  }
}
