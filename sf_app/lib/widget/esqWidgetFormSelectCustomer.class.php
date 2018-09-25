<?php
/**
 * widget to select a customer
 *
 * @author Richtermeister
 */
class esqWidgetFormSelectCustomer extends sfWidgetFormPropelChoice
{
  public function __construct($options = array(), $attributes = array())
  {
    $customer_query = CustomerQuery::create() -> 
      filterByStatus(Customer::STATUS_ACTIVE) ->
      filterByType(Customer::TYPE_REGULAR) ->
      orderByLastName();

    $options = array_merge(array("model" => "Customer", "criteria" => $customer_query), $options);
    parent::__construct($options, $attributes);
  }
}