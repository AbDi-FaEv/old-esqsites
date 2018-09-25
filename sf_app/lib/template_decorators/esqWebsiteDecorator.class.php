<?php
/**
 *
 * @author ${user}
 */
class esqWebsiteDecorator extends esqBaseDecorator
{
  protected $website;

  public function __construct(Website $website)
  {
    $this -> website = $website;
    
    parent::__construct($website);
  }

  public function __toString()
  {
    return (string) $this -> website;
  }

  public function getMainMenu()
  {
    $pages = PageQuery::create() ->
      filterByMenuType(Website::MENU_TYPE_MAIN) ->
      filterByWebsite($this -> website) ->
      filterByStatus(Page::STATUS_ACTIVE) ->
      orderByRank() ->
      find();
    
    return new esqMenuDecorator($pages);
  }

  public function getFooterMenu()
  {
    $pages = PageQuery::create() ->
      filterByMenuType(Website::MENU_TYPE_FOOTER) ->
      filterByWebsite($this -> website) ->
      filterByStatus(Page::STATUS_ACTIVE) ->
      orderByRank() ->
      find();

    return new esqMenuDecorator($pages);
  }
}
