<?php
/**
 *
 * @author Richtermeister
 */
abstract class teBaseRenderer extends teHtmlWrapper
{
  protected $node_renderer = null;
  protected $options = array();
  protected $prepend;
  protected $append;

  /**
   * returns this renderer in string representation
   * also catches internal exceptions and returns them as string as well (__toString must not return anything but a string)
   *
   * @return string
   */
  public function __toString()
  {
    try
    {
      $string = $this -> render();
    }
    catch(Exception $e)
    {
      return $e -> getMessage();
    }

    return $string;
  }

  protected function getOption($option, $default = null)
  {
    return isset($this -> options[$option]) ? $this -> options[$option] : $default;
  }

  protected function setOption($option, $value)
  {
    $this -> options[$option] = $value;
    return $this;
  }

  public function setNodeRenderer(teNodeRendererInterface $renderer)
  {
    $this -> node_renderer = $renderer;
    return $this;
  }

  protected function renderNode($node)
  {
    return null === $this -> node_renderer ? (string) $node : $this -> node_renderer -> render($node);
  }

  /**
   * adds content for an element to prepend as first element
   *
   * @param string $prepend
   */
  public function prepend($content = null, $element = 'li', $attributes = array())
  {
    $this -> prepend = false !== $content ? ($this -> wrap($content, $element, $attributes).$this -> prepend) : null;
    return $this;
  }

  /**
   * adds content for an element to append as last element
   *
   * @param string $append
   */
  public function append($content = null, $element = 'li', $attributes = array())
  {
    $this -> append = false !== $content ? ($this -> append.$this -> wrap($content, $element, $attributes)) : null;
    return $this;
  }

  abstract public function render();
}