<?php

class GenerateBarPasswordsTask extends sfBaseTask
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
      new sfCommandOption('force-reset', null, sfCommandOption::PARAMETER_NONE, 'whether to force reset'),
    ));

    $this->namespace        = 'esq';
    $this->name             = 'generate-bar-passwords';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [GenerateBarPasswords|INFO] task does things.
Call it with:

  [php symfony GenerateBarPasswords|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    $query = BarAssociationQuery::create();
    if(!$options["force-reset"])
    {
      $query -> filterByPassword(null, Criteria::ISNULL);
    }

    $bars = $query -> find();
    $this -> logBlock(sprintf("Generating passwords for %s bars", count($bars)), "INFO");
    foreach($bars as $bar)
    {
      $bar -> regeneratePassword() -> save();
      $this -> logSection("password+", sprintf("%s %s", $bar, $bar -> getPassword()));
    }

    $this -> logBlock("Done.", "INFO");
  }
}
