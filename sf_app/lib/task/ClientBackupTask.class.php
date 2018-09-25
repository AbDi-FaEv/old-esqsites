<?php

class ClientBackupTask extends sfBaseTask
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
    $this->name             = 'client-backup';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [ClientBackup|INFO] task does things.
Call it with:

  [php symfony ClientBackup|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    $backup_dir = sfConfig::get("sf_data_dir")."/client_backups";
    $this -> getFilesystem() -> mkdirs($backup_dir);

    $websites = WebsiteQuery::create() -> useCustomerQuery() -> filterByReal(true) -> endUse() -> find();
    $this -> logSection("backup", count($websites)." websites found");
    
    foreach($websites as $website)
    {
      /** @var $website Website */
      $this -> logSection("backup", "backing up: ".$website." (".$website -> getId().")");
      if(!$website -> directoryExists())
      {
        $this -> logSection("backup", "no directory found -> skipping", null, "ERROR");
        continue;
      }

      $backup_path = $backup_dir.DIRECTORY_SEPARATOR.$website -> getId().".zip";
      if(file_exists($backup_path))
      {
        $this -> getFileSystem() -> remove($backup_path);
      }
      $this -> getFilesystem() -> touch($backup_path);

      $zip = new teZipArchive();
      if(true !== $zip -> open($backup_path, ZipArchive::CREATE))
      {
        throw new sfException(sprintf("Couldn't create zip archive %s", $backup_path));
      }

      $zip -> addDirectory($website -> getFilesPath());
      $zip -> close();

      //$cmd = sprintf("du -sh %s", $website -> getFilesPath());
      //$size = $this -> getFilesystem() -> execute($cmd);
      //$this -> logSection("backup", "usage: ".$size);
    }

    $this -> logBlock("Done.", "INFO");
  }
}