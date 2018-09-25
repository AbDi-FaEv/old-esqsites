<?php

/**
 * service class to tie iContact api into the system
 *
 * @author Richtermeister
 */
class iContactService extends Icontact
{
  const LIST_ID_ESQ = 33536;

  /**
   * adds a customer to iContact
   * 
   * @param Customer $customer
   * @return iContactService
   */
  public function addCustomer(Customer $customer)
  {
    $contact_id = $this -> AddContact(array(
		'firstName' => $customer -> getFirstName(),
		'lastName'  => $customer -> getLastName(),
        'phone'     => $customer -> getPhone(),
		'email'     => $customer -> getEmail()
	));

    $customer ->setIcontactId($contact_id) -> save();

    $this -> SubscribeContactToList($contact_id, self::LIST_ID_ESQ);

    return $this; //fluent
  }
}