<?php

/**
 * extends parent to add up/down (ordering) functionality
 *
 * @author Richtermeister
 */
class teWidgetFormSelectDoubleList extends sfWidgetFormSelectDoubleList
{
  protected function configure($options = array(), $attributes = array())
  {
    parent::configure($options, $attributes);

    $this->addOption('up', '<img src="/teFormPlugin/images/up.png" alt="up" />');
    $this->addOption('down', '<img src="/teFormPlugin/images/down.png" alt="down" />');

    $this->setOption('template', <<<EOF
<div class="%class%">
  <div style="float: left">
    <div class="double_list_label">%label_associated%</div>
    %associated%
  </div>
  <div style="float: left; margin-top: 2em">
    %left%
    <br />
    %right%
    <br />
    %up%
    <br />
    %down%
  </div>
  <div style="float: left">
    <div class="double_list_label">%label_unassociated%</div>
    %unassociated%
  </div>
  <br style="clear: both" />
  <script type="text/javascript">
    $().ready(function(){
      $("#%id%").multiSelect("#unassociated_%id%", {trigger: "#%id%-unassociate", moveUp: "#%id%-up", moveDown: "#%id%-down"});
      $("#unassociated_%id%").multiSelect("#%id%", {trigger: "#%id%-associate"});
    });
  </script>
</div>
EOF
);
  }

  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $string = parent::render($name, $value, $attributes, $errors);
    $id = $this->generateId($name);
    
    return strtr($string, array(
      '%left%'  => sprintf('<a href="#" id="%s-associate">%s</a>', $id, $this->getOption('associate')),
      '%right%' => sprintf('<a href="#" id="%s-unassociate">%s</a>', $id, $this->getOption('unassociate')),
      '%up%'    => sprintf('<a href="#" id="%s-up">%s</a>', $id, $this->getOption('up')),
      '%down%'  => sprintf('<a href="#" id="%s-down">%s</a>', $id, $this->getOption('down')),
    ));
  }

  public function getJavascripts()
  {
    return array('/teFormPlugin/js/jquery.multiselects.js');
  }
}