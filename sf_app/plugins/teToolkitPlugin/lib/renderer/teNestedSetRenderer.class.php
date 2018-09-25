<?php
/**
 * renders a nested set entity into a ul/li list
 *
 * @author Richtermeister
 */
class teNestedSetRenderer extends teBaseRenderer
{
  protected $nodes;
  protected $level = 0;
  protected $roots = array();
  protected $options = array(
    "template" => "ul",
    "inner_template" => "li"
  );
  protected $attributes = array();
  protected $children;

  public function __construct($nodes, array $options = array(), array $attributes = array(), teNodeRendererInterface $node_renderer = null)
  {
    $this -> nodes = $nodes;
    $this -> options = array_merge($this -> options, $options);
    $this -> attributes = array_merge($this -> attributes, $attributes);
    $this -> node_renderer = $node_renderer;

    $this -> buildHierarchy();
  }

  public static function create($nodes, array $options = array(), array $attributes = array(), teNodeRendererInterface $node_renderer = null)
  {
    return new self($nodes, $options, $attributes, $node_renderer);
  }

  protected function buildHierarchy()
  {
    $parents = array();
    foreach($this -> nodes as $node)
    {
      $parents[$node -> getTreeLevel()] = $node -> getPrimaryKey();
      if(isset($parents[$node -> getTreeLevel() - 1]))
      {
        $this -> children[$parents[$node -> getTreeLevel() - 1]][] = $node;
      }
      else //this is a root
      {
        $this -> roots[] = $node;
      }
    }
  }

  public function render()
  {
    if(count($this -> roots))
    {
      return $this -> wrap($this -> renderInside(), "ul", $this -> attributes);
    }

    return ""; //got nothing to render
  }

  public function renderInside()
  {
    if(count($this -> roots) > 1)
    {
      $start = $this -> roots;
    }
    else
    {
      $start = $this -> getOption("with_root", false) ? $this -> nodes[0] : $this -> children[$this -> nodes[0] -> getPrimaryKey()];
    }
    return $this -> renderChildren($start);
  }

  public function getNodeChildren($node)
  {
    return isset($this -> children[$node -> getPrimaryKey()]) ? $this -> children[$node -> getPrimaryKey()] : null;
  }

  public function renderChildren($children, $parent = null)
  {
    $this -> level ++; //going one level deeper
    $output = '';

    foreach($children as $child)
    {
      $node_content   = $this -> renderNode($child);
      $grand_children = $grand_children = $this -> getNodeChildren($child);
      $level_ok       = (!$levels = $this -> getOption("levels")) || ($this -> level < $levels) || in_array($child -> getPrimaryKey(), $this -> getOption("open", array()));

      if($grand_children && $level_ok)
      {
        $node_content .= $this -> wrap($this -> renderChildren($grand_children, $child), "ul", $this -> getChildrenAttributes($child));
      }

      $output .= $this -> wrap($node_content, "li", $this -> getNodeAttributes($child));
    }
    $this -> level --; //going back up
    
    return $output;
  }

  protected function getNodeAttributes($node)
  {
    return array();
  }

  protected function getChildrenAttributes($node)
  {
    return array();
  }

  protected function getRootAttributes($node)
  {
    return array();
  }

  public function getNodes()
  {
    return $this -> nodes;
  }

}