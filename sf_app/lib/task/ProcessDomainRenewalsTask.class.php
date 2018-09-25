<?php

class ProcessDomainRenewalsTask extends teBaseLoggerTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name', 'front'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'prod'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
      // add your own options here
    ));

    $this->namespace        = 'esq';
    $this->name             = 'process-domain-renewals';
    $this->briefDescription = 'Issues charges for domain renewals & updates renewal dates';
    $this->detailedDescription = <<<EOF
The [ProcessDomainRenewals|INFO] issues charges for domain renewals to CG and updates the renewal dates in our database.
It does NOT automatically renew the domain in RCOM (yet). This needs to be done manually.

Call it with:

  [php symfony ProcessDomainRenewals|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    $cutoff_date = strtotime("+2 month");

    $domains = DomainQuery::create() ->
      filterByDueForRenewal($cutoff_date) ->
      orderByExpirationDate() ->
      find();

    $this -> logBlock("Found ".count($domains)." domains due for renewal on or before ".date("m/d/Y", $cutoff_date), "INFO");
    if(!count($domains)) return; //done here

    //get CG api
    $api = esqContainer::getInstance() -> getSubscriptionService();

    foreach($domains as $domain)
    {
      $website = $domain -> getWebsite();

      try
      {
        $description = sprintf("%s (expiration: %s)", strtoupper($domain), $domain -> getExpirationDate("m/d/Y"));
        $code = "Domain Renewal";

        //issue charge
        $api -> addCustomCharge($website, sfConfig::get("app_domain_price"), $description, $code);

        $domain -> triggerRenewal() -> save();
        $this -> logSection("renewal+", $description);
      }
      catch(CheddarGetter_Response_Exception $e)
      {
        $this -> logSection("renewal!", $domain." couldn't be charged (".$e -> getMessage().")", null, "ERROR");
      }
    }

    $this -> logBlock("Done", "INFO");
  }
}