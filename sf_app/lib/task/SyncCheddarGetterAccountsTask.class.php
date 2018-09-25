<?php

class SyncCheddarGetterAccountsTask extends teBaseLoggerTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name', 'front'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
      // add your own options here
    ));

    $this->namespace        = 'esq';
    $this->name             = 'sync-cg';
    $this->briefDescription = 'ensures that CG accounts contain same info as ESQ system';
    $this->detailedDescription = <<<EOF
The [SyncCheddarGetterAccounts|INFO] task syncronizes account info between CG and ESQ.
Call it with:

  [php symfony SyncCheddarGetterAccounts|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    $websites = WebsiteQuery::create() ->
      useCustomerQuery() ->
        filterByReal() ->
      endUse() ->
      filterByHasCgAccount() ->
      filterByStatus(Website::STATUS_ACTIVE) ->
      find();

    $this -> logBlock(sprintf("Found %s websites with CG accounts", count($websites)), "INFO");

    $subscription_service = esqContainer::getInstance() -> getSubscriptionService();

    $counter = 0;

    foreach($websites as $website)
    {
      try
      {
        if($subscription_service -> syncronizeWebsite($website))
        {
          $counter++;
          $this -> logSection("cg-sync", $website." (".$website -> getId().")");
        }
      }
      catch(CheddarGetter_Response_Exception $e)
      {
        $this -> logSection("cg-sync", $website -> getId()." ".$e -> getMessage(), null, "ERROR");
      }
    }

    $this -> logBlock(sprintf("Done. %s accounts syncronized.", $counter), "INFO");
  }
}