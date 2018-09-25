<?php
/**
 *
 * @author Richtermeister
 */
class ResendEmailForm extends sfForm
{
  protected $customer;

  public function __construct(Customer $customer, $options = array())
  {
    $this -> customer = $customer;
    parent::__construct(array("email" => $customer -> getEmail()), $options);
  }

  public function setup()
  {
    $this -> setWidgets(array("email" => new sfWidgetFormInput(array("label" => "To which address?"))));
    $this -> setValidators(array("email" => new sfValidatorEmail()));

    $websites = $this -> customer -> getWebsites();
    $website_criteria = WebsiteQuery::create() -> filterByCustomer($this -> customer);

    if(count($websites) > 1)
    {
      $this -> widgetSchema["website"] = new sfWidgetFormPropelChoice(array("model" => "Website", "criteria" => $website_criteria));
    }
    else
    {
      $this -> widgetSchema["website"] = new sfWidgetFormInputHidden(array("default" => $websites -> getFirst() -> getId()));
    }
    $this -> validatorSchema["website"] = new sfValidatorPropelChoice(array("model" => "Website", "criteria" => $website_criteria));

    $this -> widgetSchema -> setNameFormat("email[%s]");
  }
}