<?php
/**
 *
 * @author Richtermeister
 */
class AddCouponForm extends sfForm
{
  public function setup()
  {
    if((!$customer = $this -> getOption("customer")) || !$customer instanceof Customer)
    {
      throw new sfException(__CLASS__." expects Customer instance.");
    }

    $this -> widgetSchema["code"] = new sfWidgetFormInput();
    $this -> validatorSchema["code"] = new esqValidatorSimpleCouponCode();

    $this -> widgetSchema["issue_discount"] = new sfWidgetFormInputCheckbox();
    $this -> validatorSchema["issue_discount"] = new sfValidatorBoolean(array("required" => false));
    $this -> setDefault("issue_discount", true);

    $this -> widgetSchema -> setHelp("issue_discount", "Whether to apply discount to next invoice in CheddarGetter.");

    $websites = $customer -> getWebsites();
    if(count($websites) == 1)
    {
      $this -> widgetSchema["website"] = new sfWidgetFormInputHidden();
      $this -> validatorSchema["website"] = new sfValidatorChoice(array("choices" => array($websites -> getFirst() -> getId())));
      $this -> setDefault("website", $websites -> getFirst() -> getId());
    }
    else
    {
      $website_choices = $websites -> toKeyValue("Id", "Title");
      $this -> widgetSchema["website"] = new sfWidgetFormChoice(array("choices" => $website_choices));
      $this -> validatorSchema["website"] = new sfValidatorChoice(array("choices" => array_keys($website_choices)));
    }

    $this -> widgetSchema -> setNameFormat("coupon[%s]");
  }
}