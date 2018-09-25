<?php

class esqPruneShoppersTask extends teBaseLoggerTask
{
  /**
   * @see sfTask
   */
  protected function configure()
  {

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name', 'front'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'prod'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
      // add your own options here
    ));
    
    $this->namespace = 'esq';
    $this->name = 'prune-shoppers';
    $this->briefDescription = 'Removes shoppers that have become customers';

  }

  /**
   * @see sfTask
   */
  protected function execute($arguments = array(), $options = array())
  {
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    //delete all unsuable shopping records
//    $this -> logSection("prune", "Deleting shoppers without contact info older than 1 week");
//    $query = CustomerQuery::create() -> filterByUseless() -> filterByCreatedAt(array("max" => strtotime("1 week ago")));
    //$query -> find() -> delete(); //this is waiting for the propel iterator - too many records
    
    $customers = CustomerQuery::create() -> filterByReal() -> find();
    $this->logSection('esq', sprintf('Found %s active customers', count($customers)));

    $total_shoppers = 0;
    foreach($customers as $customer)
    {
      $shoppers_criteria = CustomerQuery::create() -> filterByEmail($customer -> getEmail()) -> filterByType(Customer::TYPE_SHOPPING);
      $shoppers_count_criteria = clone $shoppers_criteria;

      $num_shoppers = $shoppers_count_criteria -> count();
      $total_shoppers += $num_shoppers;

      if($num_shoppers > 0)
      {
        if(!$options["dry-run"])
        {
          foreach($shoppers_criteria -> find() as $shopper)
          {
            //move comments from shoppers to real customers
            $count = sfCommentQuery::create() -> filterByCommentableId($shopper -> getId()) -> update(array('CommentableId' => $customer -> getId()));
            $this -> logSection("esq", sprintf("%s comments moved", $count));
          }
          
          //remove shoppers
          $shoppers_criteria -> delete();
        }
        $this->logSection('esq', sprintf('%s: removed %s shopping accounts', $customer -> getEmail(), $num_shoppers));
      }
    }
    $dry = $options["dry-run"] ? " - dry-run" : "";
    $this->logSection('esq', sprintf('Done. Removed %s shoppers total'.$dry, $total_shoppers));
  }

}
