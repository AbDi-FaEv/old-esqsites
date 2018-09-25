<?php

use_helper("Text");

/**
 * Truncates +text+ to the length of +length+ and replaces the last three characters with the +truncate_string+
 * if the +text+ is longer than +length+. Also makes sure not to split words.
 */
function truncate_words($text, $length = 30, $truncate_string = "&hellip;", $truncate_lastspace = false)
{
  $string = substr($text, 0, $length);
  if((strlen($text) > $length) && $last_space = strrpos($string, " "))
  {
    $length = $last_space < $length ? $last_space + strlen($truncate_string) : $length;
  }
  return truncate_text($text, $length, $truncate_string, $truncate_lastspace);
}