<?php

function image_filetype_tag($filename, $options = null, $image_dir = "filetypes", $default_image = "Default.png")
{
	$extension = rmFile::extractExtension($filename);
	
	$image_url = $image_dir.DIRECTORY_SEPARATOR.strtoupper($extension).".png";
	$image_path = sfConfig::get("sf_web_dir").DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR.$image_url;
	return (file_exists($image_path)) ? image_tag($image_url, $options) : image_tag($image_dir.DIRECTORY_SEPARATOR.$default_image, $options);
}