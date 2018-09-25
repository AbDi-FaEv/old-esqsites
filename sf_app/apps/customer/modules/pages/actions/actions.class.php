<?php

require_once dirname(__FILE__).'/../lib/pagesGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/pagesGeneratorHelper.class.php';

/**
 * pages actions.
 *
 * @package    esqsites123
 * @subpackage pages
 * @author     Richtermeister
 */
class pagesActions extends autoPagesActions
{
  /**
   * displays all pages of the current website
   * 
   * @param sfWebRequest $request
   */
  public function executeIndex(sfWebRequest $request)
  {
    $this -> website = $this -> getUser() -> getCurrentWebsite();
  }

  /**
   * displays a page
   *
   * @param sfWebRequest $request
   */
  public function executeShow(sfWebRequest $request)
  {
    $this -> page = $this -> getRoute() -> getPage();
    $this -> forward404Unless($this -> page -> getWebsiteId() == $this -> getUser() -> getCurrentWebsite() -> getId()); //check ownership
  }

  /**
   * handles movement of pages
   * 
   * @param sfWebRequest $request
   */
  public function executeMove(sfWebRequest $request)
  {
    $dir = $request -> getParameter("direction");
    $page = $this -> getRoute() -> getObject();
    $page -> move($dir);

    $this -> redirect("@page");
  }


  /**
   * handles toggling page status between active and inactive
   */
  public function executeToggleStatus()
  {
    $page = $this -> getRoute() -> getPage();
    $this -> forward404Unless($page -> getWebsiteId() == $this -> getUser() -> getCurrentWebsite() -> getId()); //check ownership

    if($this -> getUser() -> getCurrentWebsite() -> togglePageStatus($page))
    {
      $this -> getUser() -> setFlash("notice", "Page Status Updated Successfully.");
    }
    else
    {
      $website = $this -> getUser() -> getCurrentWebsite();
      $max_pages = $website -> getHostingPlan() -> getNumPages();

      if(!$this -> getUser() -> hasAccessToPageType($page -> getPageContentDisplayType()))
      {
        $this -> getUser() -> setFlash("error", "This page is not supported by your current hosting plan. Please upgrade your plan.");
      }
      elseif($website -> getNumActivePages() >= $max_pages)
      {
        $this -> getUser() -> setFlash("error", sprintf("Cannot activate webpage, you already have the maximum (%s) allowed active web pages", $max_pages));
      }
      else
      {
        $this -> getUser() -> setFlash("error", "Sorry, this page could not be activated.");
      }
    }

    $this -> redirect("@page");
  }

  /**
   * overrides parent to customize flash message and redirect
   * 
   * @param sfWebRequest $request
   * @param sfForm $form
   */
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $new = $form->getObject()->isNew();
      $notice = $new ? 'The page was created successfully.' : 'The page was updated successfully.';

      $page = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $page)));

      $this->getUser()->setFlash('notice', $notice);

      if($page -> isMultiGroup())
      {
        $this -> redirect("page_show", $page);
      }
      elseif($new)
      {
        $this -> redirect("page_edit", $page);
      }
      else
      {
        $this -> redirect("@page");
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The page has not been saved due to some errors.', false);
    }
  }

}
