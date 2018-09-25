<?php

class SendClientMessageRemindersTask extends sfBaseTask
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
    $this->name             = 'send-client-message-reminders';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [SendClientMessageReminders|INFO] task does things.
Call it with:

  [php symfony SendClientMessageReminders|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    $customers = CustomerQuery::create() ->
      filterByReal() ->
      filterByHasNewClientMessages() ->
      find();

    $this -> logBlock("Found ".count($customers)." customers that need notification.", "INFO");

    $mailer = $this -> getMailer();

    foreach($customers as $customer)
    {
      $this -> logSection("notify", $customer);
      $this -> getMailer() -> send(new ClientMessageNotificationEmail($customer));
    }

    $this -> logBlock("Done.", "INFO");
  }
}
