<?php

class ProcessSpamTask extends teBaseLoggerTask
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
    $this->name             = 'process-spam';
    $this->briefDescription = 'checks client message submissions for spam';
    $this->detailedDescription = <<<EOF
The [ProcessSpam|INFO] task does things.
Call it with:

  [php symfony ProcessSpam|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    $messages = ClientMessageQuery::create() -> filterByIsSpam(null) -> find();
    $this -> logBlock(sprintf("Found %s messages without spam status", count($messages)));

    if(count($messages))
    {
      $spam_api = esqContainer::getInstance() -> getSpamService() ->
        setSiteUrl("http://esqsites123.com") ->
        setApiHost(SpamCheckerApi::HOST_TYPEPAD);
      
      foreach($messages as $message)
      {
        $is_spam = $spam_api -> messageIsSpam($message);
        $message -> setIsSpam($is_spam) -> save();

        $this ->logSection($is_spam ? "spam" : "ham", $message -> getId(), null, $is_spam ? "ERROR" : "INFO");
      }
    }

    $this -> logBlock("Done.");
  }
}
