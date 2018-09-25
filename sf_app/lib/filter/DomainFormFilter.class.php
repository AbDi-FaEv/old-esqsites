<?php

/**
 * Domain filter form.
 *
 * @package    esqsites123
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class DomainFormFilter extends BaseDomainFormFilter
{
  public function configure()
  {
  	$status_choices = array("" => "All", Domain::STATUS_ACTIVE => "Active Only");
  	$this -> widgetSchema["status"] = new sfWidgetFormSelect(array("choices" => $status_choices));
  	$this -> validatorSchema["status"] = new sfValidatorChoice(array("choices" => array_keys(Domain::getStates()), "required" => false));

    $type_choices = Domain::getTypes();
    $this -> widgetSchema["type"] = new sfWidgetFormSelect(array("choices" => array("" => "") + $type_choices));
    $this -> validatorSchema["type"] = new sfValidatorChoice(array("choices" => array_keys($type_choices), "required" => false));

  	$registration_type_choices = array("" => "") + Domain::getRegistrationTypes();
  	$this -> widgetSchema["registration_type"] = new sfWidgetFormSelect(array("choices" => $registration_type_choices));
  	$this -> validatorSchema["registration_type"] = new sfValidatorChoice(array("choices" => array_keys(Domain::getRegistrationTypes()), "required" => false));
  }

  public function addStatusColumnCriteria(DomainQuery $query, $field, $value)
  {
    if($value == Domain::STATUS_ACTIVE)
    {
      $query -> useWebsiteQuery() ->
          useCustomerQuery() ->
            filterByReal() ->
          endUse() ->
        endUse();
    }
  }
  
  public function getFields()
  {
    $fields = parent::getFields();
    $fields["registration_type"] = "ForeignKey";
    $fields["status"] = "ForeignKey";
    $fields["type"] = "ForeignKey";
    return $fields;
  }
}
