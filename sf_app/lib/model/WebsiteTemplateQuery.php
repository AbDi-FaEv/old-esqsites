<?php

/**
 * allows querying website templates
 * 
 */
class WebsiteTemplateQuery extends BaseWebsiteTemplateQuery
{
  /**
   * adds custom column with usage to returned templates
   *
   * @return WebsiteTemplateQuery
   */
  public function withNumUsed()
  {
    return $this -> useWebsiteQuery('websites')->
        filterByStatus(Website::STATUS_ACTIVE)->
      endUse()->
      withColumn('COUNT(websites.ID)', "num_used")->
      groupById();
  }

  /**
   * orders templates by usage
   *
   * @param string $order
   * @return WebsiteTemplate
   */
  public function orderByNumUsed($order = Criteria::ASC)
  {
    return $this -> orderBy("num_used", $order);
  }

  /**
   * filters for public templates
   *
   * @return WebsiteTemplateQuery
   */
  public function filterByPublic()
  {
    return $this -> filterByType(WebsiteTemplate::TYPE_STANDARD) ->
      filterByStatus(WebsiteTemplate::STATUS_ACTIVE);
  }

  /**
   * filters for top templates
   *
   * @param int $limit
   * @return WebsiteTemplateQuery
   */
  public function filterByHeros($limit = 5)
  {
    $this -> filterByPublic() -> orderByRank();
    if($limit) $this -> setLimit(5);

    return $this;
  }
}