<?php

class CreateAppDirsTask extends sfBaseTask
{
  protected function configure()
  {

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name', 'front'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'prod'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
      // add your own options here
    ));

    $this->namespace        = 'esq';
    $this->name             = 'create-app-dirs';
    $this->briefDescription = 'creates directories/symlinks that the app needs to function';
    $this->detailedDescription = <<<EOF
The [CreateAppDirs|INFO] task does things.
Call it with:

  [php symfony CreateAppDirs|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    $fs = $this ->getFilesystem();

    $templates_dir = sfConfig::get("app_templates_dir");
    $preview_dir = sfConfig::get("sf_web_dir").DIRECTORY_SEPARATOR."preview";
    
    if(!file_exists($preview_dir.DIRECTORY_SEPARATOR."templates"))
    {
      $fs -> symlink($templates_dir, $preview_dir.DIRECTORY_SEPARATOR."templates");
    }

    $this -> logBlock("Done", "INFO");
  }
}
