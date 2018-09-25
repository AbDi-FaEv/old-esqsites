<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DomainForm
 *
 * @author Richtermeister
 */
class DomainForm extends DomainAdminForm
{
  public function configure()
  {
    parent::configure();
    $this -> useFields(array("name"));
  }
}