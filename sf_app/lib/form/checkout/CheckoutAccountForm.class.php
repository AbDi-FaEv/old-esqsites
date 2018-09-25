<?php
/**
 * Description of CheckoutAccountForm
 *
 * @author Richtermeister
 */
class CheckoutAccountForm extends BaseForm
{
  public function setup()
  {
    $this -> widgetSchema["username"] = new sfWidgetFormInputText();
    $this -> widgetSchema["password"] = new sfWidgetFormInputPassword();

    $this -> widgetSchema -> setHelp("password", "at least 6 characters");

    $this -> validatorSchema["username"] = new sfValidatorRegex(
      array("pattern" => '/^([a-z]|[A-Z]|[0-9]|_)*$/'),
      array("invalid" => "Username may only contain characters: a-z, 0-9 and underscores (no spaces)"));
    $this -> validatorSchema["password"] = new esqValidatorPassword();

    $customer_criteria = CustomerQuery::create() -> filterByType(Customer::TYPE_SHOPPING, Criteria::NOT_EQUAL);

    $this->validatorSchema->setPostValidator(
      new esqValidatorPropelUnique(
        array('criteria' => $customer_criteria, 'model' => 'Customer', 'column' => array('username')),
        array("invalid" => "This username is already in use. Please choose a different one."))
    );

    $this -> widgetSchema -> setNameFormat("account[%s]");
  }
}