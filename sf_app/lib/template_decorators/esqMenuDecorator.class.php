<?php
/**
 *
 * Richtermeister
 */
class esqMenuDecorator extends PropelObjectCollection
{
  public function __construct(PropelObjectCollection $pages)
  {
    $this -> setModel($pages -> getModel());
    $this -> setData($pages -> getData());
  }

  public function __toString()
  {
    $return = '<ul class="menu">';
    foreach($this as $page)
    {
      $options = array();
      if($this -> isFirst())
      {
        $options["class"] = "first";
      }
      elseif($this -> isLast())
      {
        $options["class"] = "last";
      }
      
      //this is for future versions
      if(false && sfConfig::get("sf_debug")) //disabled for now, causes relative assets to fail
      {
        $return .= '<li>'.link_to($page -> getLinkName(), "@cms_page?url=".$page -> getSlug(), $options).'</li>';
      }
      else
      {
        $return .= '<li><a href="'.$page -> getSlug().'">'.$page -> getLinkName().'</a></li>';
      }
    }
    $return .= '</ul>';

    return $return;
  }
}