<?php

class AddPaymentPageTask extends teBaseLoggerTask
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
      new sfCommandOption('page', null, sfCommandOption::PARAMETER_REQUIRED, 'The id of the page to copy')
    ));

    $this->namespace        = 'esq';
    $this->name             = 'add-payment-page';
    $this->briefDescription = 'ensures every website has a payment page';
    $this->detailedDescription = <<<EOF
The [AddPaymentPage|INFO] task does things.
Call it with:

  [php symfony AddPaymentPage|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    $websites = WebsiteQuery::create() -> useCustomerQuery() -> filterByReal() -> endUse() -> find();
    $this -> logBlock(sprintf("starting with %s websites", count($websites)), "INFO");

    if($options["page"])
    {
      $payment_page_prototype = PageQuery::create() -> findPk($options["page"]);
    }
    else
    {
      $prototype_website = WebsitePeer::retrievePreviewWebsite();
      $payment_page_prototype = $prototype_website -> getPages(PageQuery::create() -> filterByPageContentDisplayTypeId(Page::DISPLAY_TYPE_PAYMENT)) -> getFirst();
    }

    if(!$payment_page_prototype || ($payment_page_prototype -> getPageContentDisplayTypeId() != Page::DISPLAY_TYPE_PAYMENT))
    {
      throw new sfException("No valid payment page prototype found");
    }

    foreach($websites as $website)
    {
      //see if payment page is present
      if(!$website -> countPages(PageQuery::create() -> filterByPageContentDisplayTypeId(Page::DISPLAY_TYPE_PAYMENT)))
      {
        $this -> logSection("payment page+", "website: ".$website." (".$website -> getId().")");

        $page = $payment_page_prototype -> copy(true); //deep copy
        $page -> setWebsite($website) ->
          setMenuType(Page::MENU_TYPE_MAIN) ->
          setStatus(Page::STATUS_INACTIVE) ->
          save();
      }
      else
      {
        $this -> logSection("payment page!", "website: ".$website." (".$website -> getId().") already has payment page");
      }
    }

    $this -> logBlock("Done", "INFO");
  }
}
