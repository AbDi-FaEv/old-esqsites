<?php
/**
 *
 * @author Richtermeister
 */
class teContactFormComponents extends sfComponents
{
  public function executeForm()
  {
    $this -> form = new teSimpleContactForm();
  }
}