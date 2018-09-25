<?php
/**
 *
 * @author Richtermeister
 */
class teBlogTagForm extends TagForm
{
  public function configure()
  {
    $this -> useFields(array("name"));
  }
}