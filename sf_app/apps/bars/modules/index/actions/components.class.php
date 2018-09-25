<?php
/**
 *
 * @author Richtermeister
 */
class indexComponents extends sfComponents
{
  public function executeSignupChart()
  {
    $user = $this -> getUser();
    $bar = $user -> getProfile();

    $chart = new BarSignupChart($bar);

    $start_date = $user -> getAttribute("chart_start", $chart -> getStartDate());
    $end_date = $user -> getAttribute("chart_end", time());

    $this -> form = new DateRangeFilter(array("start" => $start_date, "end" => $end_date), array("start" => $chart -> getStartDate()));
  }
}