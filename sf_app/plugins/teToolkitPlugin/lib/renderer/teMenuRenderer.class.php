<?php
/**
 * adds frequently used menu decorations to nested set renderer
 *
 * @author Richtermeister
 */
class teMenuRenderer extends teNestedSetRenderer
{

  public static function create($nodes, array $options = array(), array $attributes = array(), teNodeRendererInterface $node_renderer = null)
  {
    return new self($nodes, $options, $attributes, $node_renderer);
  }

  protected function getNodeAttributes($node)
  {
    if($node -> getPrimaryKey() == $this -> getOption("selected"))
    {
      return array("class" => $this -> getOption("selected_class", "selected"));
    }

    return parent::getNodeAttributes($node);
  }

  /**
   * @see teBaseRenderer
   * @return string
   */
  public function renderInside()
  {
    $inside = parent::renderInside();
    return $this -> prepend.$inside.$this -> append;
  }

}
