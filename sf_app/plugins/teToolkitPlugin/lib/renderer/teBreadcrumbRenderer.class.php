<?php
/**
 *
 * @author Richtermeister
 */
class teBreadcrumbRenderer extends teBaseRenderer
{
  protected $crumbs;
  protected $options = array("separator" => "&raquo;");

  public function  __construct($crumbs, $options = array(), $attributes = array(), teNodeRendererInterface $node_renderer = null)
  {
    $this -> crumbs = $crumbs;
    $this -> node_renderer = $node_renderer;
  }

  public static function create($crumbs, $options = array(), $attributes = array(), teNodeRendererInterface $node_renderer = null)
  {
    return new self($crumbs, $options, $attributes, $node_renderer);
  }

  /**
   * @see teBaseRenderer
   * @return string
   */
  public function render()
  {
    $crumbs = array();
    $separator = $this -> getOption("separator") ? $this -> wrap($this -> getOption("separator"), 'li') : '';

    if($this -> prepend)
    {
      $crumbs[] = $this -> wrap((string)$this -> prepend, 'li');
    }
    foreach($this -> crumbs as $crumb)
    {
      $crumbs[] = $this -> wrap($this -> renderNode($crumb), 'li');
    }
    if($this -> append)
    {
      $crumbs[] = $this -> wrap((string)$this -> append, 'li');
    }

    return $this -> wrap(implode($separator, $crumbs), 'ul');
  }
}