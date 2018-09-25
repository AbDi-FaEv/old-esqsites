<?php
/**
 *
 * @author Richtermeister
 */
class ForgotPasswordForm extends sfForm
{
  public function setup()
  {
    $this -> widgetSchema["username"] = new sfWidgetFormInput();
    $this -> validatorSchema["username"] = new sfValidatorCallback(array("callback" => array($this, "validateUsername")));

    $this -> widgetSchema -> setNameFormat("password-request[%s]");
  }

  public function validateUsername(sfValidatorCallback $validator, $value, $arguments)
  {
    $query = CustomerQuery::create() ->
      filterByType(array(Customer::TYPE_REGULAR, Customer::TYPE_TEST)) ->
      where("Customer.Username = ?", $value) ->
      orWhere("Customer.Email = ?", $value);

    $select_query = clone $query;

    if($query -> count() != 1)
    {
      throw new sfValidatorError($validator, "invalid");
    }

    $customer = $select_query -> findOne();
    return $customer;
  }
}