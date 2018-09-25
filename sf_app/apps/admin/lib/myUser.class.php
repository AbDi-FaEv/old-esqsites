<?php

class myUser extends teGuardUser
{
  public function rememberCustomer(Customer $customer)
  {
    $customers = $this -> getAttribute("recent_customers", array());
    $customers[$customer -> getId()] = time();
    $this -> setAttribute("recent_customers", $customers);
  }

  public function getRecentCustomers()
  {
    $customer_views = $this -> getAttribute("recent_customers", array());
    $customers = CustomerQuery::create() -> findPks(array_keys($customer_views));
    foreach($customers as $customer)
    {
      $customer -> setVirtualColumn("last_viewed", $customer_views[$customer -> getId()]);
    }
    return $customers;
  }

  public function forgetCustomers()
  {
    $this -> setAttribute("recent_customers", null);
  }
}
