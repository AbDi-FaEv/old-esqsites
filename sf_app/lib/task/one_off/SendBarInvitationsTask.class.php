<?php

class SendBarInvitationsTask extends teBaseLoggerTask
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
    $this->name             = 'send-bar-invitations';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [SendBarInvitations|INFO] task does things.
Call it with:

  [php symfony SendBarInvitations|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    //hackish, but neccessary
    $_SERVER["HTTP_HOST"] = "esqsites123.com";

    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    //need this for helpers and absolute urls to work
    sfContext::createInstance($this->configuration) -> getRequest() -> setRelativeUrlRoot(false);

    //trigger autoload
    $this -> getMailer();
    
    $bars = BarAssociationQuery::create() -> find();

    $loader = new sfTemplatingTemplateLoaderFilesystem(null, sfConfig::get("sf_lib_dir")."/task/email_templates");
    $templating = new sfTemplatingTemplateEngine($loader, array("php" => new sfTemplatingTemplateRendererPhp(false)));

    $file = sfConfig::get("sf_data_dir")."/bar_emails.xls";
    if(!is_readable($file))
    {
      throw new sfException(sprintf("file %s does not exist", $file));
    }

    $excel = PHPExcel_IOFactory::createReaderForFile($file) -> setReadDataOnly(true) -> load($file);
    $data = $excel -> getActiveSheet() -> toArray();

    //make key => value pairs
    foreach($data as $row)
    {
      $names[$row[0]] = $row[1];
    }

    $from = array("info@esqsites123.com" => "EsqSites");

    /**
     * @var $bar BarAssociation
     */
    foreach($bars as $bar)
    {
      if(!array_key_exists($bar -> getAbbreviation(), $names) || !$bar -> getPrimaryContactEmail()) continue;

      $params = array("bar" => $bar, "first_name" => $names[$bar -> getAbbreviation()]);

      $html_body = $templating -> render("bar_welcome.html", $params);
      $text_body = $templating -> render("bar_welcome.txt", $params);

      $to = $bar -> getPrimaryContactEmail();

      $mail = Swift_Message::newInstance("New Feature: Bar Association Dashboard", $html_body, "text/html") ->
        addPart($text_body, 'text/plain') -> 
        setFrom($from) ->
        setTo($to);
      
      if($this -> getMailer() -> send($mail))
      {
        $this -> logSection("email+", $bar);
      }
      else
      {
        $this -> logSection("email!", $bar, null, "ERROR");
      }
    }

    $this -> logBlock("Done", "INFO");
  }
}