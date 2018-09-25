<?php
/**
 * Skeleton subclass for representing a row from the 'cg_notifications' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model.cg
 */
class CheddarGetterNotification extends BaseCheddarGetterNotification
{
  const TYPE_TRANSACTION = 'transaction';
  CONST TYPE_CANCELLATION = 'cancellation';

  const RESULT_APPROVED = 'approved';

  public function getAmount()
  {
    $content = unserialize($this -> getContent());
    return $content["transaction"]["amount"];
  }

  public function getInvoiceId()
  {
    $content = unserialize($this -> getContent());
    return $content["invoice"]["id"];
  }

  public function getInvoiceNumber()
  {
    $content = unserialize($this -> getContent());
    return $content["invoice"]["invoiceNumber"];
  }

} // CheddarGetterNotification
