<?php

function sized_image_tag($source, $options = array())
{
  if(file_exists($dimensions = sfConfig::get("sf_web_dir")."/".image_path($source)))
  {
    $dimensions = getimagesize($dimensions);
    $options["width"] = $dimensions[0];
    $options["height"] = $dimensions[1];
  }
  return image_tag($source, $options);
}