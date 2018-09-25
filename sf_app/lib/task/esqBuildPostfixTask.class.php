<?php

/**
 * configures postfix for email forwarding by generating a file and feeding it to postfix
 *
 * @author Richtermeister
 */
class esqBuildPostfixTask extends teBaseLoggerTask
{
  protected function configure()
  {
    $this->namespace = 'esq';
    $this->name = 'build-postfix';
    $this->briefDescription = 'Rebuilds a postfix file with all active domains/emails & restarts apache';

    //this is required to be able to access app config
    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name', 'front'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'prod'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
      new sfCommandOption('force', null, sfCommandOption::PARAMETER_NONE, 'force postfix reload')
    ));
  }

  /**
   * returns "active domains" as associative array
   * "active domains" are domains that are hosted by ESQ and have at least one active email forward setup
   *
   * @return array [id => name]
   */
  protected function getUserDomains()
  {
    $domains = DomainQuery::create()->
      filterByReal()-> //ensure we're hosting domain
      rightJoinEmailAccount()-> //ensure we're even forwarding email
      groupById()-> //remove duplicates from join
      find();

    if(count($domains))
    {
      $this->logSection('esq', sprintf("Found %s customer domains", count($domains)));
      return $domains -> toKeyValue('Id', 'Name');
    }
    else
    {
      $this -> logSection('esq', "No customer domains found");
      return null;
    }
  }

  /**
   * sets "pending activation" emails to "active"
   * removes "pending removal" emails
   */
  protected function updateEmails()
  {
    //activate emails
    EmailAccountQuery::create() -> 
      filterByStatus(EmailAccount::STATUS_PENDING_ACTIVATION) ->
      update(array('Status' => EmailAccount::STATUS_ACTIVE));

    //delete pending-deletion emails
    EmailAccountQuery::create() ->
      filterByStatus(EmailAccount::STATUS_PENDING_REMOVAL) ->
      delete();
  }

  /**
   * returns an associative array containing the emails that need forwarding
   * 
   * @return array [local => forward]
   */
  protected function getEmailForwards()
  {
    $email_forwards = EmailAccountQuery::create() -> filterByActive() -> find();
    if(count($email_forwards))
    {
      return $email_forwards -> toKeyValue('FullLocalAddress', 'ForwardingAddress');
    }
  }

  protected function execute($arguments = array(), $options = array())
  {
    $databaseManager = new sfDatabaseManager($this->configuration);

    $domains_file = sfConfig::get("app_postfix_domains_file");
    $emails_file =  sfConfig::get("app_postfix_emails_file");

    $this -> getFilesystem() -> touch(array($domains_file, $emails_file));

    if(file_exists($static_file = sfConfig::get("sf_config_dir")."/postfix.yml"))
    {
      $postfix = sfYaml::load($static_file);
    }

    $all_domains = array_merge($postfix["mydomains"], $this -> getUserDomains());
    $string = "";
    foreach($all_domains as $domain)
    {
      $string .= strtolower($domain)."\t"."OK".PHP_EOL;
    }
    $tmp_domains_file = sfConfig::get("sf_data_dir")."/postfix.mydomains.tmp";
    file_put_contents($tmp_domains_file, $string); //save temporary file

    if(!$options["force"] && (file_get_contents($domains_file) == file_get_contents($tmp_domains_file)))
    {
      $this -> logSection("esq", "No updates to POSTFIX mydomains file are required");
    }
    else
    {
      $backup_file = sfConfig::get("sf_data_dir").DIRECTORY_SEPARATOR."postfix-backups".DIRECTORY_SEPARATOR.strftime("%m-%d-%y-%H-%M-%S").".postfix.mydomains.bak";
      $this -> getFileSystem() -> copy($domains_file, $backup_file); //make a backup for nostalgia
      $this -> getFileSystem() -> copy($tmp_domains_file, $domains_file, array("override" => true)); //replace original

      //run postmap on the virtual file to refresh the email aliases
      $this -> getFileSystem() -> execute("/usr/sbin/postmap ".$domains_file);
    }
    $this -> getFilesystem() -> remove($tmp_domains_file);

    $this -> updateEmails(); //update email status

    $all_emails = array_merge($postfix["virtual"], $this -> getEmailForwards());
    $string = "";
    foreach($all_emails as $local => $forward)
    {
      $string .= strtolower($local)."\t".strtolower($forward).PHP_EOL;
    }
    $tmp_emails_file = sfConfig::get("sf_data_dir")."/postfix.emails.tmp";
    file_put_contents($tmp_emails_file, $string); //save temporary file

    if(file_get_contents($emails_file) == file_get_contents($tmp_emails_file))
    {
      $this -> logSection("esq", "No updates to POSTFIX emails (virtual) file are required");
    }
    else
    {
      $backup_file = sfConfig::get("sf_data_dir").DIRECTORY_SEPARATOR."postfix-backups".DIRECTORY_SEPARATOR.strftime("%m-%d-%y-%H-%M-%S").".postfix.emails.bak";
      $this -> getFileSystem() -> copy($emails_file, $backup_file); //make a backup for nostalgia
      $this -> getFileSystem() -> copy($tmp_emails_file, $emails_file, array("override" => true)); //replace original

      //run postmap on the mydomains file to refresh the domains
      $this -> getFilesystem() -> execute("/usr/sbin/postmap ".$emails_file);
    }
    $this -> getFilesystem() -> remove($tmp_emails_file);

    $this->logSection('esq', "Done");
  }
}