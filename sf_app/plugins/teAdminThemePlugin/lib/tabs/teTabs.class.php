<?php
/**
 * Description of teTabs
 *
 * @author Richtermeister
 */
class teTabs implements Iterator
{
  const POSITION_LAST = "last";
  const POSITION_FIRST = "first";
  const POSTITION_AFTER = "after";

  protected $unique_id;
  protected $tabs;
  protected $count;
  protected $dispatcher;
  protected $formatter;
  protected $module;
  protected $initialized = false;

  public function __construct($unique_id, sfComponent $component)
  {
    $this -> unique_id = $unique_id;
    $this -> dispatcher = $component -> getContext() -> getEventDispatcher();
    $this -> formatter = array($this, "formatter");
    $this -> module = $component -> getRequest() -> getParameter("module");
  }

  public function __toString()
  {
    try
    {
      return $this -> render();
    }
    catch(Exception $e)
    {
      return "Exception: ".$e -> getMessage();
    }
  }

  public static function fromContext($unique_id, sfContext $context)
  {
    $class = __CLASS__;
    $tabs = new $class($unique_id, $context -> getActionStack() -> getFirstEntry() -> getActionInstance());
    if($file = $context ->getConfigCache() -> checkConfig('config/te_tabs.yml', true))
    {
      $config = include $file;
      if(isset($config[$unique_id]))
      {
        $tabs -> fromArray($config[$unique_id]);
      }
    }
    return $tabs;
  }

  public function initialize()
  {
    $this -> dispatcher -> notify(new sfEvent($this, "te_tabs.initialize"));
    $this -> initialized = true;
  }

  public function fromArray(array $input)
  {
    foreach($input as $route => $params)
    {
      $this -> addTab(new teTab($route, $params));
    }
  }

  public function getUniqueId()
  {
    return $this -> unique_id;
  }

  public function addTab(teTab $tab, $position = teTabs::POSITION_LAST, $pivot = null)
  {
    $this -> tabs[] = $tab;
  }
  
  public function getTabs()
  {
    return $this -> tabs;
  }

  public function setTabs(array $tabs)
  {
    $this -> tabs = $tabs;
  }


  public function rewind()
  {
    reset($this -> tabs);
    $this -> count = count($this -> tabs);
  }

  public function key()
  {
    return current($this -> tabs);
  }

  public function current()
  {
    return current($this -> tabs);
  }

  public function next()
  {
    next($this -> tabs);
    --$this -> count;
  }

  public function valid()
  {
    return $this -> count > 0;
  }

  public function render($attributes = null)
  {
    if(!$this -> initialized)
    {
      $this -> initialize();
    }
    return call_user_func($this -> formatter, $this);
  }

  public function setFormatter($callback)
  {
    $this -> formatter = $callback;
  }

  protected function formatter(teTabs $tabs)
  {
    $output = "";
    $output .= '<div class="ui-tabs !ui-widget ui-corner-all">';
    $output .= '<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix !ui-widget-header ui-corner-all">';
    foreach($tabs as $tab)
    {
      if($this -> module == $tab -> getModule())
      {
        $output .= '<li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active">';
      }
      else
      {
        $output .= '<li class="ui-state-default ui-corner-top">';
      }
      $output .= link_to($tab -> getLabel(), $tab -> getRoute()); //this is used within templates
      $output .= '</li>';
    }
    $output .= '</ul>';
    $output .= '</div>';
    return $output;
  }

}