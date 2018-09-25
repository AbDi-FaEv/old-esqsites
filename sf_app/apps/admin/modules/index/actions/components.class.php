<?php

class indexComponents extends sfComponents 
{
  public function executeInvoices()
  {
    try
    {
      $this -> invoices = ModernBillApi::getOutstandingInvoices();
    }
    catch(Exception $e)
    {
      $this -> invoices = false;
      $this -> error = $e -> getMessage();
    }
  }

  public function executeCodeUpdates()
  {
    $options = array("adapter" => "sfCurlAdapter", "adapter_options" => array("ssl_verify_host" => false, "ssl_verify" => false));

    try
    {
      $this -> feed = sfFeedPeer::createFromWeb('https://teneleven.beanstalkapp.com/esq/activity/atom/f7510b0fcad3d73d3087542c6338c7cfa3a3c8ed', $options);
      $this -> feed -> keepOnlyItems(5);
    }
    catch(Exception $e)
    {
      $this -> feed = false;
    }
  }

}
