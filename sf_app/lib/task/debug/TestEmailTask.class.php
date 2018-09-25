<?php
/**
 * used to send individual emails for test purposes
 *
 * @author Richtermeister
 */
class TestEmailTask extends sfBaseTask
{
  protected function configure()
  {
    $this->namespace = 'esq';
    $this->name = 'test-email';
    $this->briefDescription = 'tests emails';

    $this -> addArguments(array(
      new sfCommandArgument('email', sfCommandArgument::REQUIRED, 'the email to send'),
      new sfCommandArgument('recipient', sfCommandArgument::REQUIRED, 'the recipient'),
    ));

    //this is required to be able to access app config
    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_OPTIONAL, 'the application to load', 'front'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_OPTIONAL, 'the environment to load', 'prod')
    ));
  }

  protected function execute($arguments = array(), $options = array())
  {
    $this -> logBlock("environment: ".sfConfig::get("sf_environment"), "COMMENT");

    $databaseManager = new sfDatabaseManager($this->configuration);
    $this -> getMailer(); //autoloader bug

    $class = $arguments["email"];
    if(!class_exists($class))
    {
      throw new sfException(sprintf("the email %s does not exist", $class));
    }

    $this -> logSection("email", sprintf("Sending %s to %s", $arguments["email"], $arguments["recipient"]));
    
    switch($class)
    {
      case "CaseSubmissionEmail":
        $case = ClientMessageQuery::create() -> lastCreatedFirst() -> findOne();
        $email = new CaseSubmissionEmail($case, ClientMessage::SEND_TYPE_MESSAGE_STORE);
      break;
      case "PasswordEmail":
        $customer = CustomerQuery::create() -> filterByStatus(Customer::STATUS_ACTIVE) -> filterByType(Customer::TYPE_REGULAR) -> lastCreatedFirst() -> findOne();
        $email = new PasswordEmail($customer);
      break;
      case "WelcomeEmail":
        $website = WebsiteQuery::create() -> filterByStatus(Website::STATUS_ACTIVE) -> filterByType(Website::TYPE_PURCHASED) -> lastCreatedFirst() -> findOne();
        $email = new WelcomeEmail($website);
      break;
      case "AdminSignupNotificationEmail":
        $website = WebsiteQuery::create() -> filterByStatus(Website::STATUS_ACTIVE) -> filterByType(Website::TYPE_PURCHASED) -> lastCreatedFirst() -> findOne();
        $email = new AdminSignupNotificationEmail($website);
      break;
    }

    $email -> setTo($arguments["recipient"]);
    $this -> getMailer() -> send($email);
    
    $this -> logBlock("Done", "INFO_LARGE");
  }
}