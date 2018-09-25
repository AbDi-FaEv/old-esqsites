<?php
/**
 *
 * @author Richtermeister
 */
class QuarterlyRevenueForm extends sfForm
{
  public function setup()
  { 
    $months = range(1, 12);
    foreach($months as $month)
    {
      if($month == 1)
      {
        $month_choices["Q1"] = "-- First Quarter --";
      }
      if($month == 4)
      {
        $month_choices["Q2"] = "-- Second Quarter --";
      }
      if($month == 7)
      {
        $month_choices["Q3"] = "-- Third Quarter --";
      }
      if($month == 10)
      {
        $month_choices["Q4"] = "-- Fourth Quarter --";
      }
      $month_choices[$month] = date("F", mktime(0, 0, 0, $month, 1, date("Y")));
    }

    $years = range(date("Y"), date("Y") - 5); //query for a more realistic year
    $years = array_combine($years, $years);

    $this -> setWidgets(array(
      "month" => new sfWidgetFormChoice(array("choices" => array("" => "== Month/Quarter ==") + $month_choices)),
      "year" => new sfWidgetFormChoice(array("choices" => array("" => "== Year ==") + $years)),
      "bar_association_id" => new sfWidgetFormPropelChoice(array("model" => "BarAssociation", "add_empty" => "== Any Bar Association ==", "order_by" => array("Name", "asc")))
    ));

    $this -> setValidators(array(
      "month" => new sfValidatorChoice(array("choices" => array_keys($month_choices)), array("required" => "Please select a month or a quarter")),
      "year" => new sfValidatorChoice(array("choices" => array_keys($years)), array("required" => "Please select a year")),
      "bar_association_id" => new sfValidatorPropelChoice(array("model" => "BarAssociation", "required" => false))
    ));

    if($this -> getDefaults() == array())
    {
      $this -> setDefaults(array("month" => date('n'), "year" => date("Y")));
    }
    $this -> widgetSchema -> setNameFormat("report[%s]");
  }

  public function isQuarterly()
  {
    return substr($this -> getValue("month"), 0, 1) == "Q";
  }

  public function getDates()
  {
    $quarter = (int) substr($this -> getValue("month"), 1);
    $month = 1 + (($quarter - 1) * 3);
    for($i = $month; $i < ($month + 3);  $i++)
    {
      $start = strtotime($i."/1/".$this -> getValue("year"));
      $end = $this -> monthToDate($i);
      $dates[$start] = $end;
    }
    return $dates;
  }

  protected function monthToDate($month)
  {
    return strtotime($month."/".cal_days_in_month(CAL_GREGORIAN, $month, $this -> getValue("year"))."/".$this -> getValue("year"));
  }

  public function getAssociations()
  {
    if($id = $this -> getValue("bar_association_id"))
    {
      return BarAssociationQuery::create() -> filterById($id) -> find();
    }
    return BarAssociationQuery::create() -> find();
  }

  public function getPlans()
  {
    Propel::disableInstancePooling();

    $plans = array();
    foreach($this -> getAssociations() as $association)
    {
      if($this -> isQuarterly())
      {
        foreach($this -> getDates() as $start => $end)
        {
          $results = HostingPlanQuery::create() ->
            withNumUsed() ->
            filterByBarAssociation($association) ->
            useWebsiteQuery("websites") ->
              useCustomerQuery() ->
                filterByCreatedAt(array("max" => $end)) ->
              endUse() ->
            endUse() ->
            orderByRank() ->
            find();
          if(count($results))
          {
            $plans[$association -> getId()][$start] = $results;
          }
        }
      }
      else
      {
        $results = HostingPlanQuery::create() ->
          withNumUsed() ->
          filterByBarAssociation($association) ->
          useWebsiteQuery("websites") ->
            useCustomerQuery() ->
              filterByCreatedAt(array("max" => $date = $this -> monthToDate($this -> getValue("month")))) ->
            endUse() ->
          endUse() ->
          orderByRank() ->
          find();
        if(count($results))
        {
          $plans[$association -> getId()][$date] = $results;
        }
      }
    }

    Propel::enableInstancePooling();
    return $plans;
  }
}