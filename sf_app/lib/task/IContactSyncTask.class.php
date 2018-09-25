<?php

class IContactSyncTask extends teBaseLoggerTask
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

    $this->namespace        = 'icontact';
    $this->name             = 'sync';
    $this->briefDescription = 'syncronizes esq data with icontact';
    $this->detailedDescription = <<<EOF
The [IContactSync|INFO] task does things.
Call it with:

  [php symfony IContactSync|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    $customers = CustomerQuery::create() -> filterByReal() -> filterByIcontactId(null) -> find();
    $this -> logBlock(sprintf("Found %s customers without iContact ID", count($customers)));

    if(count($customers))
    {
      $ic_api = esqContainer::getInstance() -> getMailingListService();
      foreach($customers as $customer)
      {
        $ic_records = $ic_api -> getContacts(array("email" => $customer -> getEmail()));
        if(!isset($ic_records[0]))
        {
          $this -> logSection("icontact-sync!", "Customer: ".$customer -> getId()." not found", null, "ERROR");
          continue;
        }

        $contact_id = $ic_records[0]["contactId"];
        $customer -> setIcontactId($contact_id) -> save();
        $this -> logSection("icontact-sync+", "Customer: ".$customer -> getId()." -> ".$contact_id);
      }
    }

    $this -> logBlock("Done", "INFO");
  }
}
