<?php

class teWidgetFactory {

    public static function getDateWidget($options = array(), $attributes = array())
	{
		$base_options = array("empty_values" => array("month" => "MM", "day" => "DD", "year" => "YYYY"), "image" => "/teAdminThemePlugin/images/calendar.png");
		$options = array_merge($options, $base_options);
		
		return new sfWidgetFormJQueryDate($options, $attributes);
	}
}