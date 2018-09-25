<?php

class CreatePageForm extends PageAdminForm 
{
  public function configure()
  {
    parent::configure();
    unset($this["status"], $this["customer_id"], $this["website_id"]);
  }
  
}