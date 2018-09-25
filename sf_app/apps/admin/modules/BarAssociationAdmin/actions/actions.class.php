<?php

require_once dirname(__FILE__).'/../lib/BarAssociationAdminGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/BarAssociationAdminGeneratorHelper.class.php';

/**
 * BarAssociationAdmin actions.
 *
 * @package    esqsites123
 * @subpackage BarAssociationAdmin
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class BarAssociationAdminActions extends autoBarAssociationAdminActions
{

  public function executeExport()
  {
    $associations = BarAssociationQuery::create() -> find();

    foreach($associations -> toArray() as $row)
    {
      $data[0] = array_keys($row);
      $data[] = array_values($row);
    }

    $excel = new PHPExcel();
    $sheet = $excel -> getActiveSheet() -> fromArray($data);

    $this -> getResponse() -> setContentType("application/vnd.ms-excel");
    
    $writer = PHPExcel_IOFactory::createWriter($excel, "Excel2007");
    $writer -> save('php://output');

    return sfView::NONE;
  }

  public function executeEditProfile()
  {
    $association = $this -> getRoute() -> getBarAssociation();
    if($page = $association -> getBarAssociationPromoPage())
    {
      $this -> redirect("bar_association_promo_page_admin_edit", $page);
    }
    else
    {
      $this -> redirect("bar_association_promo_page_admin_new", array("bar_association_id" => $association -> getId()));
    }
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'Bar Association created successfully.' : 'Bar Association updated successfully.';

      $bar_association = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $bar_association)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@bar_association_admin_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect('bar_association_admin');
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
}
