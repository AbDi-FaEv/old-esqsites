<?php

class ActivateWebsitesTask extends sfBaseTask
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
    $this->name             = 'activate-websites';
    $this->briefDescription = 'ensures that websites of paying customers are active';
    $this->detailedDescription = <<<EOF
The [ActivateWebsites|INFO] task does things.
Call it with:

  [php symfony ActivateWebsites|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    $websites = WebsiteQuery::create() ->
      filterByHasCgAccount() ->
      useCustomerQuery() ->
        filterByReal() ->
      endUse() ->
      filterByStatus(Website::STATUS_ACTIVE, Criteria::NOT_EQUAL) ->
      find();

    foreach($websites as $website)
    {
      $this -> logSection("activate", $website);
      $website -> activate();
    }

    $this -> logBlock("Done", "INFO");
  }
}
