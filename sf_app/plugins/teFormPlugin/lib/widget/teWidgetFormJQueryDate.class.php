<?php
/**
 * Description of teWidgetFormJQueryDate
 *
 * @author Richtermeister
 */
class teWidgetFormJQueryDate extends sfWidgetFormInput
{
  protected function configure($options = array(), $attributes = array())
  {
    $this->addOption('config', "{changeYear: true, changeMonth: true}");
    $this->addOption('image', false);
    parent::configure($options, $attributes);
  }

  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    return parent::render($name, $value, $attributes, $errors).sprintf(<<<EOF
<script type="text/javascript">
  jQuery(document).ready(function(){
    $("#%s").datepicker(%s);
  });
</script>
EOF
,
  $this -> generateId($name),
  $this -> getOption("config")
);
  }
}