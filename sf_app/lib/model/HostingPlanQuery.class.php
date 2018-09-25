<?php
/**
 * placeholder
 *
 * @author Richtermeister
 */
class HostingPlanQuery extends WebsiteAttributeQuery
{
  public static function create($modelAlias = null, $criteria = null)
  {
      if ($criteria instanceof HostingPlanQuery) {
          return $criteria;
      }
      $query = new HostingPlanQuery();
      if (null !== $modelAlias) {
          $query->setModelAlias($modelAlias);
      }
      if ($criteria instanceof Criteria) {
          $query->mergeWith($criteria);
      }
      return $query;
  }

  public function filterByBarAssociation(BarAssociation $association)
  {
    return $this -> useWebsiteQuery("websites") -> 
        useCustomerQuery() ->
          filterByBarAssociation($association) ->
        endUse() ->
      endUse();
  }
}