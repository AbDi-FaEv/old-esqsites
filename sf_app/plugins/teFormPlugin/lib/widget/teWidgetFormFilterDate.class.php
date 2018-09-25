<?php
/**
 * Description of teWidgetFormFilterDate
 *
 * @author Richtermeister
 */
class teWidgetFormFilterDate extends sfWidgetFormFilterDate
{
  public function __construct($options = array(), $attributes = array())
  {
    $options["from_date"] = new teWidgetFormJqueryDate();
    $options["to_date"] = new teWidgetFormJqueryDate();

    $options["filter_template"] = '<div class="te_date_range_filter">%date_range%<br />%empty_checkbox% %empty_label%</div>';
    $options["template"] = '%from_date% <label class="to">to</label> %to_date%';

    parent::__construct($options, $attributes);
  }
}