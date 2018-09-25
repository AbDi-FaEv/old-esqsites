<?php
/**
 * Description of componentsclass
 *
 * @author Richtermeister
 */
class accountComponents extends sfComponents
{
  public function executeNextInvoice()
  {
    $website = $this -> getUser() -> getCurrentWebsite();
    if(!$website -> getCgId())
    {
      return; //no CG profile
    }

    try
    {
      $cg = esqContainer::getInstance() -> getService("cg.api");
      $response = $cg -> getCustomer($website -> getId());
      $this -> invoice = new CheddarGetterInvoice($response -> getCustomerInvoice());
    }
    catch(CheddarGetter_Response_Exception $e)
    {
      //customer not found or other error
    }
  }
}