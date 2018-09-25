<?php
/**
 * Renders a nested set as input widget
 *
 * @author Richtermeister
 */
class teWidgetFormNestedSetTree extends sfWidgetForm
{
  public function __construct($options = array(), $attributes = array())
  {
    $this -> addRequiredOption('nodes');
    $this -> addOption('multiple', true);
    $this -> addOption("config", '{animated: "fast", collapsed: true}');
    $this -> addOption("disabled");

    parent::__construct($options, $attributes);
  }

  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $node_renderer = new teChoiceNodeRenderer($name, $value, $this -> getOption("multiple"), $this -> getOption("disabled"));
    $attributes["id"] = $tree_id = $this -> generateId($name)."_tree";
    $renderer = new teNestedSetRenderer($this -> getOption("nodes"), array(), $attributes, $node_renderer);

    return sprintf(<<<EOF
%s
<script type="text/javascript">
  jQuery(document).ready(function(){
    jQuery('#%s').treeview(%s);
  });
</script>
EOF
,
  $renderer -> render(),
  $tree_id,
  $this -> getOption("config"));
  }
}