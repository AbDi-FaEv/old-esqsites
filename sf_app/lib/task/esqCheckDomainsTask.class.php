<?php
/**
 *
 * @author Richtermeister
 */
class esqCheckDomainsTask extends teBaseLoggerTask
{
  protected function configure()
  {
    $this->namespace = 'esq';
    $this->name = 'check-domains';
    $this->briefDescription = '';

    //this is required to be able to access app config
    $this -> addArgument("application", sfCommandArgument::OPTIONAL, 'The application to load', 'admin');
  }

  protected function execute($arguments = array(), $options = array())
  {
    $databaseManager = new sfDatabaseManager($this->configuration);

    $c = new Criteria();
    $c -> add(DomainPeer::TYPE, Domain::TYPE_PURCHASED);
    $c -> add(DomainPeer::STATUS, Domain::STATUS_ACTIVE);
    $c -> addJoin(DomainPeer::WEBSITE_ID, WebsitePeer::ID);
    $c -> addJoin(WebsitePeer::CUSTOMER_ID, CustomerPeer::ID);
    $c -> add(CustomerPeer::STATUS, Customer::STATUS_ACTIVE);

    if($domains = DomainPeer::doSelect($c))
    {
      $this -> logSection("esq", sprintf("Found %s domains", count($domains)));

      $browser = new sfWebBrowser(array(), null, array("CONNECTTIMEOUT" => 10)); //10 seconds timeout

      foreach($domains as $domain)
      {
        $check = new DomainCheck();
        $check -> setDomainId($domain -> getId());

        try
        {
          $browser -> get("http://".$domain -> getName());
          $check -> setStatusCode($browser -> getResponseCode());
          $check -> setHost(strpos($browser -> getResponseText(), "symfony") ? DomainCheck::HOST_ESQ : DomainCheck::HOST_OTHER);
        }
        catch(Exception $e)
        {
          $check -> setStatusCode(500);
        }

        $check -> save();

        $this -> logSection("domain-check", $domain."\t".$check -> getStatusCode());
      }
    }
    else
    {
      $this -> logSection("esq", "No domains found");
    }
    

    $this->logSection('esq', "Done");
  }
}