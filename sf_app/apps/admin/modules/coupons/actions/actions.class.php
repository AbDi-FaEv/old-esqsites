<?php

require_once dirname(__FILE__).'/../lib/couponsGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/couponsGeneratorHelper.class.php';

/**
 * coupons actions.
 *
 * @package    esqsites123
 * @subpackage coupons
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class couponsActions extends autoCouponsActions
{
  public function executeShow()
  {
    $this -> coupon = $this -> getRoute() -> getObject();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $form = $this -> configuration -> getForm();

    $form -> bind($request -> getParameter($form->getName()));
    if ($form->isValid())
    {
      $form -> save();
      $this->getUser()->setFlash('notice', 'Coupon created.');
      $this -> redirect("coupon");
    }

    return parent::executeCreate($request);
  }
}
