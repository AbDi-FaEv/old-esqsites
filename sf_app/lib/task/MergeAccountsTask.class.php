<?php

class MergeAccountsTask extends sfBaseTask
{
  protected function configure()
  {
    $this->addArguments(array(
      new sfCommandArgument('main_account', sfCommandArgument::REQUIRED, 'master account'),
      new sfCommandArgument('merge_account', sfCommandArgument::REQUIRED, 'account to merge'),
    ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name', 'front'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'prod'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
      // add your own options here
    ));

    $this->namespace        = 'esq';
    $this->name             = 'merge-accounts';
    $this->briefDescription = 'merges two accounts into one';
    $this->detailedDescription = <<<EOF
The [MergeAccounts|INFO] task does things.
Call it with:

  [php symfony MergeAccounts|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    $master = CustomerQuery::create() -> findPk($arguments["main_account"]);
    $slave = CustomerQuery::create() -> findPk($arguments["merge_account"]);

    if(!$master || !$slave)
    {
      throw new sfException("One or more of the accounts provided wasn't found.");
    }

    $websites = $slave -> getWebsites();
    $this -> logBlock(sprintf("%s websites to be transferred", count($websites)));

    foreach($websites as $website)
    {
      $website -> setCustomer($master) -> save();
      $this -> logSection("merge", sprintf("%s into %s", $slave -> getId(), $master -> getId()));
    }

    //move comments
    sfCommentQuery::create()->filterByCommentableId($slave->getId())->update(array("CommentableId" => $master->getId()));

    $slave -> setStatus(Customer::STATUS_CANCELLED) -> save();
  }
}
