<?php
/**
 *
 * @author Richtermeister
 */
class tePagerRenderer extends teBaseRenderer
{
  protected $pager;
  protected $context;
  protected $options = array(
      "with_first_last" => true,
      "limit"           => 8,
      "previous"        => '&laquo; Previous',
      "next"            => 'Next &raquo;',
      "first"           => '&laquo; First',
      "last"            => 'Last &raquo;'
      );
  protected $attributes = array("class" => "te_pagination");

  /**
   * @param PropelModelPager $pager
   * @param sfContext $context
   */
  public function __construct(PropelModelPager $pager, sfContext $context, array $options = array(), array $attributes = array())
  {
    $this -> pager      = $pager;
    $this -> context    = $context;
    $this -> options    = array_merge($this -> options, $options);
    $this -> attributes = array_merge($this -> attributes, $attributes);
  }

  /**
   * factory
   *
   * @param PropelModelPager $pager
   * @param sfContext $context
   * @return tePagerRenderer
   */
  public static function create(PropelModelPager $pager, sfContext $context, array $options = array(), array $attributes = array())
  {
    return new self($pager, $context, $options, $attributes);
  }

  /**
   *
   * @return string the pagination html
   */
  public function render()
  {
    $limit = $this -> getOption("limit");

    if(!$this -> pager -> haveToPaginate()) return '';
    if($limit) $limit = min($limit, $this -> pager -> getLastPage()); //ensure limit is always less than total

    $routes = $this -> context -> getRouting() -> getRoutes();
    $this -> current_route = $routes[$this -> context -> getRouting() -> getCurrentRouteName()];

    $return = ''; //starting point

    //render start & back links
    if($this -> pager -> getPage() != 1)
    {
      if($this -> getOption("with_first_last"))
      {
        $return .= $this -> wrap(link_to(__($this -> getOption("first")), $this -> getUrl(1)), 'li');
      }
      $return .= $this -> wrap(link_to(__($this -> getOption("previous")), $this -> getUrl($this -> pager->getPreviousPage())), 'li');
    }

    //render middle range
    if(!$limit || ($this -> pager -> getLastPage() <= $limit))
    {
      $return .= $this -> getLinkRange(1, $this -> pager -> getLastPage());
    }
    else
    {
      //figure out starts & end points
      $margin = floor($limit / 2);
      $start  = $this -> pager -> getPage() > $margin ? $this -> pager -> getPage() - $margin : 1;
      $end    = ($start + $limit) < $this -> pager -> getLastPage() ? $start + $limit : $this -> pager -> getLastPage();
      if($end == $this -> pager -> getLastPage()) $start = $end - $limit;

      if($start > 1)
      {
        $return .= $this -> wrap(link_to('...', $this -> getUrl(ceil($start/2))), 'li');
      }

      $return .= $this -> getLinkRange($start, $end);

      if($end < $this -> pager -> getLastPage())
      {
        $return .= $this -> wrap(link_to('...', $this -> getUrl($end + floor(($this -> pager -> getLastPage() - $end) / 2))), 'li');
        $return .= $this -> getLinkRange($this -> pager -> getLastPage(), $this -> pager -> getLastPage());
      }
    }

    //render next link
    if($this -> pager -> getPage() != $this -> pager -> getLastPage())
    {
      $return .= $this -> wrap(link_to(__($this -> getOption("next")), $this -> getUrl($this -> pager->getNextPage())), 'li');
      if($this -> getOption("with_first_last"))
      {
        $return .= $this -> wrap(link_to(__($this -> getOption("last")), $this -> getUrl($this -> pager->getLastPage())), 'li');
      }
    }

    return $this -> wrap($return, 'ul', $this -> attributes);
  }

  protected function getUrl($page)
  {
    $url = $this -> context -> getRouting() -> generate(
      $this -> context -> getRouting() -> getCurrentRouteName(), 
      array_merge($this -> current_route -> getParameters(), $this -> context -> getRequest() -> getGetParameters(), array("page" => $page)));
    return $url;
  }

  protected function getNumberLinkContent($number)
  {
    return $number;
  }

  protected function getLinkRange($start, $end)
  {
    $current_class = $this -> getOption("current_class", "current");
    $return = '';
    for($i = $start;$i <= $end;$i++)
    {
      $classes = $this -> pager -> getPage() == $i ? array("class" => $current_class) : array();
      $return .= $this -> wrap(link_to($this -> getNumberLinkContent($i), $this -> getUrl($i)), 'li', $classes);
    }
    return $return;
  }

  public function limit($limit)
  {
    $this -> setOption("limit", $limit);
    return $this;
  }
}