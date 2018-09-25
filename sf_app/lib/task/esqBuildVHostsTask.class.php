<?php
/**
 * Description of esqRefreshVirtualHostsTask
 *
 * @author Richtermeister
 */
class esqRefreshVirtualHostsTask extends teBaseLoggerTask
{
  protected function configure()
  {
    $this->namespace = 'esq';
    $this->name = 'build-vhosts';
    $this->briefDescription = 'Rebuilds a vhost file with all active domains & restarts apache';

    //this is required to be able to access app config
    $this -> addArgument("application", sfCommandArgument::OPTIONAL, 'The application to load', 'admin');

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name', 'front'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'prod'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
      new sfCommandOption('force', null, sfCommandOption::PARAMETER_NONE, 'force vhost reload'),
      new sfCommandOption('no-restart', null, sfCommandOption::PARAMETER_NONE, 'Do not restart Apache after vhost file is built', null)
    ));
  }

  protected function execute($arguments = array(), $options = array())
  {
    $databaseManager = new sfDatabaseManager($this->configuration);

    $vhost_file = sfConfig::get("app_customer_vhost_file");
    if(!$vhost_file) //no point in going on if we don't know where to put the file
    {
      throw new sfException("You have to configure the location to the customer vhost file.");
    }
    else
    {
      $this -> getFileSystem() -> touch($vhost_file);
    }

    $c = new Criteria();

    $c -> addJoin(DomainPeer::WEBSITE_ID, WebsitePeer::ID);
    $c -> addJoin(CustomerPeer::ID, WebsitePeer::CUSTOMER_ID);
    $c -> addJoin(HostPeer::ID, WebsitePeer::HOST_ID);

    $c -> add(DomainPeer::TYPE, Domain::TYPE_PURCHASED);
    $c -> add(WebsitePeer::TYPE, Website::TYPE_PURCHASED);
    $c -> add(CustomerPeer::STATUS, Customer::STATUS_SUSPENDED, Criteria::NOT_EQUAL);
   //  $c -> add(CustomerPeer::STATUS, Customer::STATUS_ACTIVE, Criteria::EQUAL);

    if($domains = DomainPeer::doSelect($c))
    {
      $this -> logSection('esq', sprintf('Found %s active domains', count($domains)));
      foreach($domains as $key => $domain)
      {
        $this -> logSection('vhost+', $domain -> getName());
        
        $website = $domain -> getWebsite();
        $host = $website -> getHost();
        $vhosts[] = <<<EOF
<VirtualHost {$host -> getInternalIp()}:{$host -> getPort()}>
  DocumentRoot {$host -> getGlobalDocumentRoot()}/{$website -> getPath()}/htdocs
  ServerName {$domain -> getName()}
  ServerAlias www.{$domain -> getName()}
  <Directory "{$host -> getGlobalDocumentRoot()}/{$website -> getPath()}/htdocs">
    allow from all
    RewriteEngine On
    AllowOverride All
    Options +FollowSymlinks
    Options +Indexes
  </Directory>
  SSLEngine off
  RewriteEngine On
</VirtualHost>
EOF;
      } //end loop

      $tmp_file = sfConfig::get("sf_data_dir").DIRECTORY_SEPARATOR."vhosts.tmp.conf"; //temporary file
      
      $content = implode(PHP_EOL, $vhosts);
      file_put_contents($tmp_file, $content);
      $this -> logSection('esq', sprintf('%s domains written to %s', count($domains), $tmp_file));

      //compare temp with original
      if(!$options["force"] && (file_get_contents($vhost_file) == file_get_contents($tmp_file)))
      {
        $this -> logSection('esq', 'No updates to customer vhost file are required.');
      }
      else
      {
        $backup_file = sfConfig::get("sf_data_dir").DIRECTORY_SEPARATOR."vhost-backups".DIRECTORY_SEPARATOR.strftime("%m-%d-%y-%H-%M-%S").".httpd.custom.bak";
        $this -> getFileSystem() -> copy($vhost_file, $backup_file); //make a backup for nostalgia
        $this -> getFileSystem() -> copy($tmp_file, $vhost_file, array("override" => true)); //replace original

        //restart apache
        if(!$options["no-restart"])
        {
          $this -> logSection('esq', "Restarting Apache.");
          $this -> getFileSystem() -> execute("/usr/sbin/apachectl -k graceful");
        }
      }
      $this -> getFileSystem() -> remove($tmp_file); //either way, temp file goes away


    }
    else
    {
      $this -> logSection('esq', "No active domains found.");
    }
    
    $this->logSection('esq', "Done");
  }
}
