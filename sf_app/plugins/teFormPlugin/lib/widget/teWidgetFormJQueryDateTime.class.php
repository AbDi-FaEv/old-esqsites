<?php
/**
 * Description of teWidgetFormJQueryDateTime
 *
 * @author Richtermeister
 */
class teWidgetFormJQueryDateTime extends sfWidgetFormDateTime
{
  protected function configure($options = array(), $attributes = array())
  {
    parent::configure($options, $attributes);
    $this->addOption('format', '%date% - %time%');
  }

  protected function getDateWidget($attributes = array())
  {
    return new teWidgetFormJQueryDate($this->getOptionsFor('date'), $this->getAttributesFor('date', $attributes));
  }

  protected function getTimeWidget($attributes = array())
  {
    return new teWidgetFormJQueryTime($this->getOptionsFor('time'), $this->getAttributesFor('time', $attributes));
  }

  function render($name, $value = null, $attributes = array(), $errors = array())
  {
    if(null == $value)
    {
      $value = array("date" => null, "time" => null);
    }
    elseif(!is_array($value))
    {
      //convert value to array
    }

    $date = $this->getDateWidget($attributes)->render($name."[date]", $value["date"]);

    if (!$this->getOption('with_time'))
    {
      return $date;
    }

    return strtr($this->getOption('format'), array(
      '%date%' => $date,
      '%time%' => $this->getTimeWidget($attributes)->render($name."[time]", $value["time"]), //this is the difference to the parent method
    ));
  }

  /**
   * Gets the stylesheet paths associated with the widget.
   *
   * @return array An array of stylesheet paths
   */
  public function getStylesheets()
  {
    return array_unique(array_merge($this->getDateWidget()->getStylesheets(), $this->getTimeWidget()->getStylesheets()));
  }

  /**
   * Gets the JavaScript paths associated with the widget.
   *
   * @return array An array of JavaScript paths
   */
  public function getJavascripts()
  {
    return array_unique(array_merge($this->getDateWidget()->getJavaScripts(), $this->getTimeWidget()->getJavaScripts()));
  }
}