<?php

require_once dirname(__FILE__).'/../../../../../plugins/esqTemplateSelectorPlugin/modules/esqTemplateSelector/lib/BaseesqTemplateSelectorActions.class.php';

/**
 * esqTemplateSelector actions.
 * 
 * @package    esqTemplateSelectorPlugin
 * @subpackage esqTemplateSelector
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12534 2008-11-01 13:38:27Z Kris.Wallsmith $
 */
class esqTemplateSelectorActions extends BaseesqTemplateSelectorActions
{
  public function preExecute()
  {
    $this -> getUser() -> hasCheckoutInProgress(true);
    $this -> getRequest() -> setParameter("in_checkout", true);
    CheckoutSteps::getInstance($this -> getUser()) -> setCurrent(CheckoutSteps::STEP_GALLERY);
  }
  
  protected function handleTemplateSelection($id)
  {
    $website = $this -> getUser() -> getTemporaryWebsite();
    $website -> setTemplateId($id);
    $website -> save();

    $this -> getUser() -> setFlash("notice", "Template Selected");
    $this -> redirect("@plans");
  }

  protected function getRouteName()
  {
    return "@gallery";
  }

  protected function getWebsite()
  {
    $website = $this -> getUser() -> getTemporaryWebsite();
    return $website;
  }

  protected function getSelectedTemplateId()
  {
    if($id = $this -> getRequest() -> getParameter("id")) //todo: verify this template is publicly accessible
    {
      return $id;
    }
    if($this -> getUser() -> hasTemporaryWebsite())
    {
      return $this -> getUser() -> getTemporaryWebsite() -> getTemplateId();
    }
  }
}
