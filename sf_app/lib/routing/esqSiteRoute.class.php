<?php
/**
 * Description of esqSiteRoute
 *
 * @author Richtermeister
 */
class esqSiteRoute extends sfRoute
{
  protected $website;

  public function matchesUrl($url, $context = array())
  {
    if(false === $parameters = parent::matchesUrl($url, $context))
    {
      return false;
    }
    
    $host = $context["host"];
    if(substr($host, 0, 4) == "www.")
    {
      $host = substr($host, 4); //we're currently storing domains without www
    }

    if($domain = DomainQuery::create() -> useWebsiteQuery() -> filterByType(Website::TYPE_PURCHASED) -> endUse() -> findOneByName($host)) //try to find by host
    {
      $this -> website = $domain -> getWebsite();
    }
    elseif(preg_match("/[\d\w]{1}\/[\d\w]{1}\/[\d\w]{1}\/[\d\w]{32}/", $context["prefix"], $matches)) //try to find by directory
    {
      $path = $matches[0];
      $this -> website = WebsiteQuery::create() -> findOneByPath($path);
    }
    else //last attempt - try to find by session, in case we're in preview mode
    {
      //yes, I'll go to hell for this, but once we fix relative paths in templates, this can be removed..
      session_name("esq_front");
      session_start();
      if(isset($_SESSION["symfony/user/sfUser/attributes"]["symfony/user/sfUser/attributes"]["website_id"]))
      {
        $this -> website = WebsiteQuery::create() -> findPk($_SESSION["symfony/user/sfUser/attributes"]["symfony/user/sfUser/attributes"]["website_id"]);
        $parameters["preview"] = true;
      }
    }

    return $this -> website ? array_merge(array("website_id" => $this -> website -> getId()), $parameters) : false;
  }

  public function getWebsite()
  {
    return $this -> website;
  }

  public function getRequestedPage()
  {
    $url = ($dot_position = strpos($this -> parameters["absolute_url"], ".")) ? substr($this -> parameters["absolute_url"], 0, $dot_position) : $this -> parameters["absolute_url"];

    if($url == "")
    {
      return $this -> website -> getHomepage();
    }

    if(!$page = PageQuery::create() -> filterByWebsite($this -> website) -> filterByUrl($url) -> filterByStatus(Page::STATUS_ACTIVE) -> findOne())
    {
      throw new sfError404Exception(sprintf('Unable to find the page with the url "%s".', $this->parameters['absolute_url']));
    }
    
    return $page;
  }

  public function setWebsite(Website $website)
  {
    $this -> website = $website;
  }
}