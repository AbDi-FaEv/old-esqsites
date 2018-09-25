<?php
/**
 *
 * @author Richtermeister
 */
class AdminCustomerFormFilter extends CustomerFormFilter
{
  public function configure()
  {
    parent::configure();

    $this -> widgetSchema["keyword"] = new sfWidgetFormInput();
    $this -> widgetSchema -> setHelp("keyword", "Last Name, Username, Email or Domain");
    $this -> validatorSchema["keyword"] = new sfValidatorString(array("required" => false, "trim" => true));
    
    $group_choices = array("all" => "All Customers", "active" => "Active Customers", "cancelled" => "Canceled Customers", "shoppers" => "Shopper List");
    $this -> widgetSchema["group"] = new sfWidgetFormChoice(array("choices" => $group_choices, "label" => "Type"));
    $this -> validatorSchema["group"] = new sfValidatorChoice(array("choices" => array_keys($group_choices)));

  }

  public function addKeywordColumnCriteria(CustomerQuery $query, $field, $value)
  {
    if((false === strpos($value, "@")) && preg_match("/\.(com|net|org)/", $value)) //not an email and looks like web
    {
      //filter by domain name
      $query -> useWebsiteQuery() ->
          useDomainQuery() ->
            filterByDirtyName($value) ->
          endUse() ->
        endUse();
    }
    else
    {
      $query -> filterByKeyword($value);
    }
  }

  public function addGroupColumnCriteria(CustomerQuery $query, $field, $value)
  {
    switch($value)
    {
      case "all":
        $query -> filterByType(Customer::TYPE_SHOPPING, Criteria::NOT_EQUAL);
      break;
      case "active":
        $query -> filterByReal();
      break;
      case "cancelled":
        $query -> filterByType(Customer::TYPE_REGULAR) -> filterByStatus(Customer::STATUS_CANCELLED);
      break;
      case "shoppers":
        $query -> filterByShoppers();
      break;
    }
  }

}