<?php

/**
 * Description of AccountCancellationFormclass
 *
 * @author Richtermeister
 */
class AccountCancellationForm extends sfForm
{
  protected $customer;

  public function __construct(Customer $customer, $defaults = array(), $options = array(), $CSRFSecret = null)
  {
    $this -> customer = $customer;
    parent::__construct($defaults, $options, $CSRFSecret);
  }
  
  public function setup()
  {
    $this -> widgetSchema -> setFormFormatterName("list");
    $this -> widgetSchema -> setNameFormat("cancellation[%s]");

    $websites = $this -> customer -> getWebsites();
    if(count($websites) > 1)
    {
      foreach($websites as $website)
      {
        $website_ids[$website -> getId()] = $website -> getFirmName();
      }
      $this -> widgetSchema["websites"] = new sfWidgetFormChoice(array("choices" => $website_ids, "expanded" => true, "multiple" => true));
      $this -> validatorSchema["websites"] = new sfValidatorChoice(array("choices" => array_keys($website_ids), "multiple" => true));
    }

    $domain_future_choices = array("cancel" => "Cancel", "transfer" => "Tranfer");
    $this -> widgetSchema["domain_future"] = new sfWidgetFormChoice(array("choices" => $domain_future_choices, "expanded" => true));
    $this -> validatorSchema["domain_future"] = new sfValidatorChoice(array("choices" => array_keys($domain_future_choices)));

    $this -> widgetSchema["reason"] = new sfWidgetFormTextarea(array("label" => "What is your reason for leaving?"));
    $this -> validatorSchema["reason"] = new sfValidatorString(array("required" => false));

    $this -> widgetSchema["competitor"] = new sfWidgetFormTextarea(array("label" => "If you are moving your site to another hosting company, what host are you moving to?"));
    $this -> validatorSchema["competitor"] = new sfValidatorString(array("required" => false));

    $this -> widgetSchema["accept_terms"] = new sfWidgetFormInputCheckbox(array("label" => "Click here if you have read and accept these terms"));
    $this -> validatorSchema["accept_terms"] = new sfValidatorBoolean();

  }
}