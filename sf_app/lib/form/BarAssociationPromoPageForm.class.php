<?php

/**
 * BarAssociationPromoPage form.
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Your name here
 */
class BarAssociationPromoPageForm extends BaseBarAssociationPromoPageForm
{
  public function configure()
  {
    $this -> useFields(array("title", "content"));

    $this -> widgetSchema["content"] = new sfWidgetFormFCKEditor();
  }
}
