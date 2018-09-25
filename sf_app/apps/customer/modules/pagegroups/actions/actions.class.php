<?php

require_once dirname(__FILE__).'/../lib/pagegroupsGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/pagegroupsGeneratorHelper.class.php';

/**
 * pagegroups actions.
 *
 * @package    esqsites123
 * @subpackage pagegroups
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class pagegroupsActions extends autoPagegroupsActions
{
  public function executeIndex(sfWebRequest $request)
  {
    //listing not allowed
    $this -> redirect("@page");
  }

  public function executeMove(sfWebRequest $request)
  {
    $dir = $request -> getParameter("direction");
    $this -> forward404Unless(in_array($dir, array("down", "up"))); //simple validation

    $group = $this -> getRoute() -> getPageGroup();
    $method = "move".ucfirst($dir);
    $group -> $method();

    $this -> redirect("@page_show?id=".$group -> getPageId());
  }



  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

    $object = $this->getRoute()->getObject();
    $object -> delete();

    $this->getUser()->setFlash('notice', 'The item was deleted successfully.');

    $this->redirect('@page_show?id='.$object -> getPage() -> getId());
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'Entry was created successfully.' : 'Entry was updated successfully.';

      $page_group = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $page_group)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@page_group_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'page_show', 'id' => $page_group -> getPageId()));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }

}
