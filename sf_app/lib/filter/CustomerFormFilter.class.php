<?php

/**
 * Customer filter form.
 *
 * @package    esqsites123
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class CustomerFormFilter extends BaseCustomerFormFilter
{
  public function configure()
  {
  	$this -> widgetSchema["email"] = new esqWidgetFormFilterInput();
    $this -> widgetSchema["username"] = new esqWidgetFormFilterInput();
    $this -> widgetSchema["last_name"] = new esqWidgetFormFilterInput();
    $this -> widgetSchema["phone"] = new esqWidgetFormFilterInput();

  	$type_choices = array("" => "") + Customer::getTypes();
  	$status_choices = array("" => "") + Customer::getStates();
  	
  	$this -> widgetSchema["type"] = new sfWidgetFormSelect(array("choices" => $type_choices));
  	$this -> widgetSchema["status"] = new sfWidgetFormSelect(array("choices" => $status_choices));
  	
  	$this -> validatorSchema["type"] = new sfValidatorChoice(array("choices" => array_keys(Customer::getTypes()), "required" => false));
  	$this -> validatorSchema["status"] = new sfValidatorChoice(array("choices" => array_keys(Customer::getStates()), "required" => false));

    $this -> widgetSchema["coupon"] = new sfWidgetFormPropelChoice(array("model" => "Coupon", "add_empty" => true, "key_method" => "getCode", "order_by" => array("Code", "asc")));
    $this -> validatorSchema["coupon"] = new sfValidatorPass();
  }
  
  public function getFields()
  {
    $fields = parent::getFields();
    $fields["type"] = "ForeignKey";
    $fields["coupon"] = "Coupon";
    $fields["status"] = "ForeignKey";
    return $fields;
  }

  public function addCouponColumnCriteria(CustomerQuery $criteria, $field, $value)
  {
    $criteria -> useWebsiteQuery() ->
      useCouponToWebsiteLinkQuery() ->
      useCouponQuery() ->
      filterByCode($value) ->
      endUse() ->
      endUse() -> 
      endUse() -> groupById();
  }
}
