<?php

require_once dirname(__FILE__).'/../lib/websitesGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/websitesGeneratorHelper.class.php';

/**
 * websites actions.
 *
 * @package    esqsites123
 * @subpackage websites
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class websitesActions extends autoWebsitesActions
{
  public function executeShow()
  {
    $this -> website = $this -> getRoute() -> getWebsite();
  }

  protected function buildQuery()
  {
    return parent::buildQuery() -> filterByType(Website::TYPE_PURCHASED);
  }
  
  public function executeEditPlan()
  {
    $this -> website = $this -> getRoute() -> getWebsite();
    $this -> plans = WebsiteAttributePeer::doSelect(new Criteria);
    $this -> form = new WebsiteUpgradeForm($this -> website);
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {

      $notice = $form->getObject()->isNew() ? 'Website successfully created.' : 'The website was updated successfully.';

      if($new = $form -> isNew())
      {
        $form -> getObject() -> 
          setStatus(Website::STATUS_ACTIVE) ->
          setType(Website::TYPE_PURCHASED);
      }
      $website = $form->save();

      if($new)
      {
        $website -> resetPages();
        $website -> createDirectories();
      }

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $website)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@website_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect('customer_show', $website -> getCustomer());
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The website has not been saved due to some errors.', false);
    }
  }

  public function executeCreateDirectory(sfWebRequest $request)
  {
    $website = $this -> getRoute() -> getObject();

    try
    {
      $website -> createDirectories();
      $this -> getUser() -> setFlash("notice", sprintf("Successfully created directory %s", $website -> getAbsolutePath()));
    }
    catch(sfException $e)
    {
      if(sfConfig::get("sf_debug"))
      {
        throw $e;
      }
      $this -> getUser() -> setFlash("error", "Couldn't create directories. Please refer to the log files.");
    }
    $this -> redirect($this -> generateUrl("website_show", $website));
  }

  public function executeResetPages(sfWebRequest $request)
  {
    $website = $this -> getRoute() -> getWebsite();
    try
    {
      $website -> resetPages();
      $this -> getUser() -> setFlash("notice", "Pages successfully reset.");
    }
    catch(sfException $e)
    {
      if(sfConfig::get("sf_debug"))
      {
        throw $e;
      }
      $this -> getUser() -> setFlash("error", "Couldn't reset pages. Please refer to the log files.");
    }
    $this -> redirect($this -> generateUrl("website_show", $website));
  }
}
