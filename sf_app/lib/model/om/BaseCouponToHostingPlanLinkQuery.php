<?php


/**
 * Base class that represents a query for the 'esq_coupons_to_hosting_plans' table.
 *
 * 
 *
 * @method     CouponToHostingPlanLinkQuery orderByCouponId($order = Criteria::ASC) Order by the coupon_id column
 * @method     CouponToHostingPlanLinkQuery orderByHostingPlanId($order = Criteria::ASC) Order by the hosting_plan_id column
 *
 * @method     CouponToHostingPlanLinkQuery groupByCouponId() Group by the coupon_id column
 * @method     CouponToHostingPlanLinkQuery groupByHostingPlanId() Group by the hosting_plan_id column
 *
 * @method     CouponToHostingPlanLinkQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CouponToHostingPlanLinkQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CouponToHostingPlanLinkQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CouponToHostingPlanLinkQuery leftJoinCoupon($relationAlias = null) Adds a LEFT JOIN clause to the query using the Coupon relation
 * @method     CouponToHostingPlanLinkQuery rightJoinCoupon($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Coupon relation
 * @method     CouponToHostingPlanLinkQuery innerJoinCoupon($relationAlias = null) Adds a INNER JOIN clause to the query using the Coupon relation
 *
 * @method     CouponToHostingPlanLinkQuery leftJoinWebsiteAttribute($relationAlias = null) Adds a LEFT JOIN clause to the query using the WebsiteAttribute relation
 * @method     CouponToHostingPlanLinkQuery rightJoinWebsiteAttribute($relationAlias = null) Adds a RIGHT JOIN clause to the query using the WebsiteAttribute relation
 * @method     CouponToHostingPlanLinkQuery innerJoinWebsiteAttribute($relationAlias = null) Adds a INNER JOIN clause to the query using the WebsiteAttribute relation
 *
 * @method     CouponToHostingPlanLink findOne(PropelPDO $con = null) Return the first CouponToHostingPlanLink matching the query
 * @method     CouponToHostingPlanLink findOneOrCreate(PropelPDO $con = null) Return the first CouponToHostingPlanLink matching the query, or a new CouponToHostingPlanLink object populated from the query conditions when no match is found
 *
 * @method     CouponToHostingPlanLink findOneByCouponId(string $coupon_id) Return the first CouponToHostingPlanLink filtered by the coupon_id column
 * @method     CouponToHostingPlanLink findOneByHostingPlanId(string $hosting_plan_id) Return the first CouponToHostingPlanLink filtered by the hosting_plan_id column
 *
 * @method     array findByCouponId(string $coupon_id) Return CouponToHostingPlanLink objects filtered by the coupon_id column
 * @method     array findByHostingPlanId(string $hosting_plan_id) Return CouponToHostingPlanLink objects filtered by the hosting_plan_id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCouponToHostingPlanLinkQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseCouponToHostingPlanLinkQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'CouponToHostingPlanLink', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new CouponToHostingPlanLinkQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    CouponToHostingPlanLinkQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof CouponToHostingPlanLinkQuery) {
			return $criteria;
		}
		$query = new CouponToHostingPlanLinkQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key
	 * <code>
	 * $obj = $c->findPk(array(12, 34), $con);
	 * </code>
	 * @param     array[$coupon_id, $hosting_plan_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    CouponToHostingPlanLink|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = CouponToHostingPlanLinkPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			$criteria = $this->isKeepQuery() ? clone $this : $this;
			$stmt = $criteria
				->filterByPrimaryKey($key)
				->getSelectStatement($con);
			return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
		}
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{	
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    CouponToHostingPlanLinkQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(CouponToHostingPlanLinkPeer::COUPON_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(CouponToHostingPlanLinkPeer::HOSTING_PLAN_ID, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CouponToHostingPlanLinkQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(CouponToHostingPlanLinkPeer::COUPON_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(CouponToHostingPlanLinkPeer::HOSTING_PLAN_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}
		
		return $this;
	}

	/**
	 * Filter the query on the coupon_id column
	 * 
	 * @param     string $couponId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponToHostingPlanLinkQuery The current query, for fluid interface
	 */
	public function filterByCouponId($couponId = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($couponId)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $couponId)) {
				$couponId = str_replace('*', '%', $couponId);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CouponToHostingPlanLinkPeer::COUPON_ID, $couponId, $comparison);
	}

	/**
	 * Filter the query on the hosting_plan_id column
	 * 
	 * @param     string $hostingPlanId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponToHostingPlanLinkQuery The current query, for fluid interface
	 */
	public function filterByHostingPlanId($hostingPlanId = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($hostingPlanId)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $hostingPlanId)) {
				$hostingPlanId = str_replace('*', '%', $hostingPlanId);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CouponToHostingPlanLinkPeer::HOSTING_PLAN_ID, $hostingPlanId, $comparison);
	}

	/**
	 * Filter the query by a related Coupon object
	 *
	 * @param     Coupon $coupon  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponToHostingPlanLinkQuery The current query, for fluid interface
	 */
	public function filterByCoupon($coupon, $comparison = null)
	{
		return $this
			->addUsingAlias(CouponToHostingPlanLinkPeer::COUPON_ID, $coupon->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Coupon relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CouponToHostingPlanLinkQuery The current query, for fluid interface
	 */
	public function joinCoupon($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Coupon');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Coupon');
		}
		
		return $this;
	}

	/**
	 * Use the Coupon relation Coupon object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CouponQuery A secondary query class using the current class as primary query
	 */
	public function useCouponQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCoupon($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Coupon', 'CouponQuery');
	}

	/**
	 * Filter the query by a related WebsiteAttribute object
	 *
	 * @param     WebsiteAttribute $websiteAttribute  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponToHostingPlanLinkQuery The current query, for fluid interface
	 */
	public function filterByWebsiteAttribute($websiteAttribute, $comparison = null)
	{
		return $this
			->addUsingAlias(CouponToHostingPlanLinkPeer::HOSTING_PLAN_ID, $websiteAttribute->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the WebsiteAttribute relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CouponToHostingPlanLinkQuery The current query, for fluid interface
	 */
	public function joinWebsiteAttribute($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('WebsiteAttribute');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'WebsiteAttribute');
		}
		
		return $this;
	}

	/**
	 * Use the WebsiteAttribute relation WebsiteAttribute object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WebsiteAttributeQuery A secondary query class using the current class as primary query
	 */
	public function useWebsiteAttributeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinWebsiteAttribute($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'WebsiteAttribute', 'WebsiteAttributeQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     CouponToHostingPlanLink $couponToHostingPlanLink Object to remove from the list of results
	 *
	 * @return    CouponToHostingPlanLinkQuery The current query, for fluid interface
	 */
	public function prune($couponToHostingPlanLink = null)
	{
		if ($couponToHostingPlanLink) {
			$this->addCond('pruneCond0', $this->getAliasedColName(CouponToHostingPlanLinkPeer::COUPON_ID), $couponToHostingPlanLink->getCouponId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(CouponToHostingPlanLinkPeer::HOSTING_PLAN_ID), $couponToHostingPlanLink->getHostingPlanId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

} // BaseCouponToHostingPlanLinkQuery
