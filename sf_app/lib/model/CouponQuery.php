<?php


/**
 * Skeleton subclass for performing query and update operations on the 'esq_coupons' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.1-dev on:
 *
 * 05/06/10 00:32:14
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class CouponQuery extends BaseCouponQuery
{
  public function filterByHostingPlan($plan)
  {
    return $this -> filterByWebsiteAttribute($plan);
  }

  public function withNumUsed()
  {
    return $this -> useCouponUsageQuery(null, Criteria::LEFT_JOIN) ->
      useWebsiteQuery('websites', Criteria::LEFT_JOIN)->
        filterByStatus(Website::STATUS_ACTIVE)->
        useCustomerQuery() ->
          filterByReal() ->
        endUse() ->
      endUse()->
      endUse()->
      withColumn("COUNT(websites.ID)", "num_used")->
      groupById();
  }
} // CouponQuery