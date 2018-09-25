<?php

require_once dirname(__FILE__).'/../lib/domainsGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/domainsGeneratorHelper.class.php';

/**
 * domains actions.
 *
 * @package    esqsites123
 * @subpackage domains
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class domainsActions extends autoDomainsActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this -> domains = $this -> getUser() -> getCurrentWebsite() -> getDomains();
  }

  public function executeEdit(sfWebRequest $request)
  {
    parent::executeEdit($request);
    $this -> enforceAccess($this -> domain);
  }
  
  protected function enforceAccess(Domain $domain)
  {
    if($domain -> getRegistrationType() == Domain::REGISTRATION_TYPE_ESQ)
    {
      //can't edit an email that was bought through ESQ
      $this -> getUser() -> setFlash("error", sprintf("The domain \"%s\" has been bought for you by ESQSites and cannot be edited.", $domain));
      $this -> redirect("domain");
    }

    //enforce ownership
    $this -> forward404Unless($domain -> getWebsite() -> getCustomerId() == $this -> getUser() -> getId());
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this -> enforceAccess($this -> getRoute() -> getObject());

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

    $this->getRoute()->getObject()->delete();

    $this->getUser()->setFlash('notice', sprintf('The email "%s" was deleted successfully.', $this -> getRoute() -> getObject()));

    $this->redirect('@domain');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      $domain = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $domain)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@domain_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'domain'));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
}
