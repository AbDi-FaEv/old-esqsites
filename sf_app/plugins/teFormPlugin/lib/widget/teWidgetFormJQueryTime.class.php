<?php
/**
 * Description of teWidgetFormJQueryTime
 *
 * @author Richtermeister
 */
class teWidgetFormJQueryTime extends sfWidgetFormInput
{
  protected function configure($options = array(), $attributes = array())
  {
    $this->addOption('options', "{}");
    $this->addOption('start_hour', 0);
    $this->addOption('end_hour', 23);
    $this->addOption("format", "%I:%M %p");

    parent::configure($options, $attributes);
  }

  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $prefix = $this->generateId($name);

    $image = '';
    if (false !== $this->getOption('image'))
    {
      $image = sprintf(', buttonImage: "%s", buttonImageOnly: true', $this->getOption('image'));
    }

    if($value)
    {
      $value = strftime($this -> getOption("format"), strtotime($value));
    }

    return parent::render($name, $value, $attributes, $errors).
           sprintf(<<<EOF
<script type="text/javascript">

  jQuery(document).ready(function(){
    $("#%s").clockpick(jQuery.extend({
    starthour : %s,
    endhour : %s,
    showminutes : true,
    useBgiframe : false
    }, %s));
  });

</script>
EOF
      ,
      $this -> generateId($name),
      $this -> getOption("start_hour"),
      $this -> getOption("end_hour"),
      $this -> getOption("options")
    );
  }

  public function getStylesheets()
  {
    return array("/teFormPlugin/css/jquery.clockpick.css" => "all");
  }

  public function getJavascripts()
  {
    return array("/teFormPlugin/js/jquery.clockpick.js");
  }
}