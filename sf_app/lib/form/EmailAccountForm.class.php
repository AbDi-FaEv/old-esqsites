<?php

/**
 * EmailAccount form.
 *
 * @package    esqsites123
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class EmailAccountForm extends EmailAccountAdminForm
{
  /**
   * @todo  consider moving criteria into parent form. restrictions should hold for admins as well.
   */
  public function configure()
  {
    if(!$user = $this -> getOption("user"))
    {
      throw new sfException("You have to pass the current user object");
    }
    
    parent::configure();
    
    $this -> widgetSchema -> setLabel("domain_name_id", "Associated Domain");
    $this -> widgetSchema -> setLabel("local_address", "From Address");
    $this -> widgetSchema -> setHelp("local_address", "@domain.com");
    $this -> widgetSchema -> setHelp("forwarding_address", "(your physical email inbox that you check on a regular basis, i.e.: joesmith@yahoo.com)");    
    $this -> validatorSchema["forwarding_address"] -> setMessage("required", "Please enter a forwarding address");

    $domain_query = DomainQuery::create() ->
      keepQuery(true) ->
      useWebsiteQuery() ->
        filterByCustomerId($user -> getId()) ->
      endUse();

    if($domain_query -> count() > 1)
    {
      $this -> widgetSchema["domain_name_id"] -> setOption("criteria", $domain_query);
    }
    else
    {
      $domain = $domain_query -> findOne();
      $this -> object -> setDomain($domain);
      $this -> setDefault("domain_name_id", $domain -> getId());
      $this -> widgetSchema["domain_name_id"] = new sfWidgetFormInputHidden();
    }

    //enforce that domain actually belongs to user
    $this -> validatorSchema["domain_name_id"] = new sfValidatorPropelChoice(array("model" => "Domain", "criteria" => $domain_query));
    
    unset($this["customer_id"], $this["website_id"], $this["status"]);    
  }
}