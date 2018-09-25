<?php
/**
 * Description of teWidgetFormInputFileEditable
 *
 * @author Richtermeister
 */
class teWidgetFormInputFileEditable extends sfWidgetFormInputFileEditable
{
  protected function getFileAsTag($attributes)
  {
    if (!$this->getOption('is_image'))
    {
      return parent::getFileAsTag($attributes);
    }
    if($src = $this->getOption('file_src'))
    {
      use_helper("sfThumbnail");
      $width = isset($attributes["width"]) ? $attributes["width"] : 150;
      $height = isset($attributes["height"]) ? $attributes["height"] : 150;
      unset($attributes["width"], $attributes["height"]);
      $thumb = thumbnail_tag($src, $width, $height, array_merge(array('src' => $this->getOption('file_src')), $attributes));
      $tag = $this -> renderContentTag("a", $thumb, array("href" => $src, "target" => "_blank"));
      return $tag;
    }
  }
}