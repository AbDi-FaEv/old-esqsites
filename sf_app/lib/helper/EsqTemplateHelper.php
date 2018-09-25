<?php

function break_by_delimiter($string, $delimiter = "|")
{
  return str_replace($delimiter, "<br />", $string);
}

function strip_delimiter($string, $delimiter = "|")
{
  return str_replace($delimiter, " ", $string);
}

function format_filesize($file)
{
  if(!is_readable($file))
  {
    return "N/A";
  }

  $size = filesize($file);
  $sizes = Array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB');
  $ext = $sizes[0];

  for ($i=1; (($i < count($sizes)) && ($size >= 1024)); $i++)
  {
    $size = $size / 1024;
    $ext  = $sizes[$i];
  }

  return round($size, 0).$ext;
}