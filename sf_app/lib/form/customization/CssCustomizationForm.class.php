<?php

/**
 * allows customizing the css of a website
 *
 * @author Richtermeister
 */
class CssCustomizationForm extends TemplateCustomizationForm
{
  public function configure()
  {
    $this -> setWidget("content", new sfWidgetFormTextarea());
    $this -> setValidator("content", new sfValidatorString(array('required' => false)));

    $this -> useFields(array("content"));
  }
}