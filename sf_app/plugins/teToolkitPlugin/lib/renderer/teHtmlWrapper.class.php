<?php
/**
 * Helper class to assist in html wrapping,
 * useful for building complex tag structures with attributes in a structured way
 *
 * @author Richtermeister
 */
class teHtmlWrapper
{
  /**
   * Wraps a string in a tag, optionally applying attributes
   * 
   * @param string $what the string to be wrapped
   * @param string $with_what the tag to wrap $what with
   * @param array $attributes a hash of attributes to be applied to the tag
   * @return string
   */
  public function wrap($what, $with_what, $attributes = array())
  {
    return sprintf("<%s%s>\n%s</%s>\n", $with_what, $this -> attributesToHtml($attributes), (string) $what, $with_what);
  }

  /**
   * Converts an array of attributes to its HTML representation.
   *
   * @param  array  $attributes An array of attributes
   * @return string The HTML representation of the HTML attribute array.
   */
  public function attributesToHtml($attributes)
  {
    return implode('', array_map(array($this, 'attributesToHtmlCallback'), array_keys($attributes), array_values($attributes)));
  }

  /**
   * Prepares an attribute key and value for HTML representation.
   *
   * It removes empty attributes, except for the value one.
   *
   * @param  string $k  The attribute key
   * @param  string $v  The attribute value
   * @return string The HTML representation of the HTML key attribute pair.
   */
  protected function attributesToHtmlCallback($k, $v)
  {
    return false === $v || is_null($v) || ('' === $v && 'value' != $k) ? '' : sprintf(' %s="%s"', $k, $v); //no escaping?
  }
}