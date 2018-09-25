<?php

/**
 * teFormSubmission filter form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
class teFormSubmissionFormFilter extends BaseteFormSubmissionFormFilter
{
  public function configure()
  {
    $this -> widgetSchema["form_type"] = new sfWidgetFormPropelChoice(array("model" => "teFormSubmission","add_empty" => "--All--", "criteria" => teFormSubmissionQuery::create() -> groupByFormType(),"method" => 'getFormType',"key_method" => "getFormType"));
  }
}
