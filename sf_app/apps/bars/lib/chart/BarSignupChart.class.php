<?php
/**
 *
 * @author Richtermeister
 */
class BarSignupChart
{
  protected $bar;
  protected static $path_adjusted = false;
  protected $start_date;
  protected $end_date;

  public function __construct(BarAssociation $bar, $start_date = null, $end_date = null)
  {
    if(!self::$path_adjusted)
    {
      $path = sfConfig::get("sf_lib_dir")."/vendor/openflash/php5-ofc-library/lib";
      set_include_path(get_include_path().PATH_SEPARATOR.$path);
      self::$path_adjusted = true;
    }
    
    $this -> bar        = $bar;
    $this -> start_date = $start_date;
    $this -> end_date   = $end_date;
  }

  public function getStartDate()
  {
    $bar = $this -> bar;
    
    $potential_first_dates[] = $bar -> getCreatedAt('U');
    $potential_first_dates[] = $bar -> getAffinityStartDate('U');
    if($customer = $bar -> getFirstCustomer())
    {
      $potential_first_dates[] = $customer -> getCreatedAt('U');
    }
    $first_date = min($potential_first_dates);
    return $first_date;
  }

  public function getJson()
  {
    $bar = $this -> bar;
    $interval = 60 * 60 * 24 * 7;
    $date_format = "M jS, Y";

    $first_date = $this -> start_date ? $this -> start_date : $this -> getStartDate();
    $last_date  = $this -> end_date ? $this -> end_date : time();

    $signups = $bar -> getCustomerSignupDates();

    $data = array();
    for($i = $first_date; $i < $last_date + $interval; $i += $interval)
    {
      $counter = 0;
      foreach($signups as $date)
      {
        if(($date >= $i) && ($date <= ($i + $interval)))
        {
          $counter++;
        }
      }
      $data[$i] = $counter;
    }

    $title = "Signups: ".date($date_format, $first_date)." - ".date($date_format, $last_date);
    $title = new OFC_Elements_Title($title);
    $line = new OFC_Charts_Line();
    $line->set_values(array_values($data));
    $line->set_halo_size( 1 );
    $line->set_colour('#4792BF');
    $line->set_width(3);
    $line->set_dot_size(5);

    $y = new OFC_Elements_Axis_Y();
    $max = max($data);
    $y->set_range(0, $max + ceil($max / 2));
    $y -> set_stroke(0);

    $labels = array_fill(0, count($data), "");

    $mid_date = $first_date + (($last_date - $first_date) / 2);
    $labels[floor(count($data)/2)] = date($date_format, $mid_date);
    $labels[0] = date($date_format, $first_date);
    $labels[count($labels) - 1] = date($date_format, $last_date);

    $x = new OFC_Elements_Axis_X();
    $x -> set_stroke(1);
    $x -> set_range(0, count($data));
    $x -> set_labels_from_array($labels);
    $x -> set_tick_height(0);
    $x -> set_grid_colour("#FFFFFF");

    $chart = new OFC_Chart();
    $chart -> set_bg_colour("#FFFFFF");
    $chart->set_title( $title );
    $chart->add_element( $line );
    $chart->set_y_axis( $y );
    $chart->set_x_axis( $x );

    return $chart->toPrettyString();
  }
}