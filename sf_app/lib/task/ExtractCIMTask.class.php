<?php

class ExtractCIMTask extends teBaseLoggerTask
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
    $this->name             = 'extract-cim';
    $this->briefDescription = 'extracts CIM ID\'s from Authorize.net';
    $this->detailedDescription = <<<EOF
The [ExtractCIM|INFO] task does things.
Call it with:

  [php symfony ExtractCIM|INFO]
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
      filterByCimPaymentProfileId(null) ->
      find();

    $this -> logBlock(sprintf("Found %s websites without CIM payment profile id", count($websites)));

    foreach($websites as $website)
    {
      $cg_account           = $website -> getCgAccount();
      $cg_customer_info     = $cg_account -> getCustomer();
      $cg_subscription_info = $cg_account -> getCustomerSubscription();

      $website -> setCimCustomerProfileId($cg_customer_info["gatewayToken"]);
      $website -> setCimPaymentProfileId($cg_subscription_info["gatewayToken"]);
      $website -> save();

      $this -> logSection("cim-update", $website);
    }

    $this -> logSection("Done", "INFO");
  }
}