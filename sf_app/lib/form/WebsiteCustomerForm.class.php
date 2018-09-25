<?php
/**
 * Description of WebsiteCustomerForm
 *
 * @author Richtermeister
 */
class WebsiteCustomerForm extends WebsiteForm
{
  public function configure()
  {
    parent::configure();
    
    $this -> useFields(array(
        "firm_name",
        "firm_type",
        "email",
        "address",
        "city",
        "state",
        "zip",
        "phone",
        "fax",
        "meta_description",
        "meta_keywords"));
  }
}