<?php

require_once dirname(__FILE__).'/../lib/BarAssociationPromoPageAdminGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/BarAssociationPromoPageAdminGeneratorHelper.class.php';

/**
 * BarAssociationPromoPageAdmin actions.
 *
 * @package    esqsites123
 * @subpackage BarAssociationPromoPageAdmin
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class BarAssociationPromoPageAdminActions extends autoBarAssociationPromoPageAdminActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this -> redirect("bar_association_admin");
  }
}
