<?php


/**
 * Base class that represents a query for the 'esq_coupon_usage' table.
 *
 * 
 *
 * @method     CouponUsageQuery orderByWebsiteId($order = Criteria::ASC) Order by the website_id column
 * @method     CouponUsageQuery orderByCouponCode($order = Criteria::ASC) Order by the coupon_code column
 * @method     CouponUsageQuery orderByCouponDescription($order = Criteria::ASC) Order by the coupon_description column
 * @method     CouponUsageQuery orderByCouponRawDump($order = Criteria::ASC) Order by the coupon_raw_dump column
 * @method     CouponUsageQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     CouponUsageQuery orderById($order = Criteria::ASC) Order by the id column
 *
 * @method     CouponUsageQuery groupByWebsiteId() Group by the website_id column
 * @method     CouponUsageQuery groupByCouponCode() Group by the coupon_code column
 * @method     CouponUsageQuery groupByCouponDescription() Group by the coupon_description column
 * @method     CouponUsageQuery groupByCouponRawDump() Group by the coupon_raw_dump column
 * @method     CouponUsageQuery groupByCreatedAt() Group by the created_at column
 * @method     CouponUsageQuery groupById() Group by the id column
 *
 * @method     CouponUsageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CouponUsageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CouponUsageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CouponUsageQuery leftJoinWebsite($relationAlias = null) Adds a LEFT JOIN clause to the query using the Website relation
 * @method     CouponUsageQuery rightJoinWebsite($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Website relation
 * @method     CouponUsageQuery innerJoinWebsite($relationAlias = null) Adds a INNER JOIN clause to the query using the Website relation
 *
 * @method     CouponUsageQuery leftJoinCoupon($relationAlias = null) Adds a LEFT JOIN clause to the query using the Coupon relation
 * @method     CouponUsageQuery rightJoinCoupon($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Coupon relation
 * @method     CouponUsageQuery innerJoinCoupon($relationAlias = null) Adds a INNER JOIN clause to the query using the Coupon relation
 *
 * @method     CouponUsage findOne(PropelPDO $con = null) Return the first CouponUsage matching the query
 * @method     CouponUsage findOneOrCreate(PropelPDO $con = null) Return the first CouponUsage matching the query, or a new CouponUsage object populated from the query conditions when no match is found
 *
 * @method     CouponUsage findOneByWebsiteId(string $website_id) Return the first CouponUsage filtered by the website_id column
 * @method     CouponUsage findOneByCouponCode(string $coupon_code) Return the first CouponUsage filtered by the coupon_code column
 * @method     CouponUsage findOneByCouponDescription(string $coupon_description) Return the first CouponUsage filtered by the coupon_description column
 * @method     CouponUsage findOneByCouponRawDump(string $coupon_raw_dump) Return the first CouponUsage filtered by the coupon_raw_dump column
 * @method     CouponUsage findOneByCreatedAt(string $created_at) Return the first CouponUsage filtered by the created_at column
 * @method     CouponUsage findOneById(int $id) Return the first CouponUsage filtered by the id column
 *
 * @method     array findByWebsiteId(string $website_id) Return CouponUsage objects filtered by the website_id column
 * @method     array findByCouponCode(string $coupon_code) Return CouponUsage objects filtered by the coupon_code column
 * @method     array findByCouponDescription(string $coupon_description) Return CouponUsage objects filtered by the coupon_description column
 * @method     array findByCouponRawDump(string $coupon_raw_dump) Return CouponUsage objects filtered by the coupon_raw_dump column
 * @method     array findByCreatedAt(string $created_at) Return CouponUsage objects filtered by the created_at column
 * @method     array findById(int $id) Return CouponUsage objects filtered by the id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCouponUsageQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseCouponUsageQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'CouponUsage', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new CouponUsageQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    CouponUsageQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof CouponUsageQuery) {
			return $criteria;
		}
		$query = new CouponUsageQuery();
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
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    CouponUsage|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = CouponUsagePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * $objs = $c->findPks(array(12, 56, 832), $con);
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
	 * @return    CouponUsageQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(CouponUsagePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CouponUsageQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(CouponUsagePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the website_id column
	 * 
	 * @param     string $websiteId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponUsageQuery The current query, for fluid interface
	 */
	public function filterByWebsiteId($websiteId = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($websiteId)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $websiteId)) {
				$websiteId = str_replace('*', '%', $websiteId);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CouponUsagePeer::WEBSITE_ID, $websiteId, $comparison);
	}

	/**
	 * Filter the query on the coupon_code column
	 * 
	 * @param     string $couponCode The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponUsageQuery The current query, for fluid interface
	 */
	public function filterByCouponCode($couponCode = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($couponCode)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $couponCode)) {
				$couponCode = str_replace('*', '%', $couponCode);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CouponUsagePeer::COUPON_CODE, $couponCode, $comparison);
	}

	/**
	 * Filter the query on the coupon_description column
	 * 
	 * @param     string $couponDescription The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponUsageQuery The current query, for fluid interface
	 */
	public function filterByCouponDescription($couponDescription = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($couponDescription)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $couponDescription)) {
				$couponDescription = str_replace('*', '%', $couponDescription);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CouponUsagePeer::COUPON_DESCRIPTION, $couponDescription, $comparison);
	}

	/**
	 * Filter the query on the coupon_raw_dump column
	 * 
	 * @param     string $couponRawDump The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponUsageQuery The current query, for fluid interface
	 */
	public function filterByCouponRawDump($couponRawDump = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($couponRawDump)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $couponRawDump)) {
				$couponRawDump = str_replace('*', '%', $couponRawDump);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CouponUsagePeer::COUPON_RAW_DUMP, $couponRawDump, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponUsageQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(CouponUsagePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(CouponUsagePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CouponUsagePeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponUsageQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(CouponUsagePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query by a related Website object
	 *
	 * @param     Website $website  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponUsageQuery The current query, for fluid interface
	 */
	public function filterByWebsite($website, $comparison = null)
	{
		return $this
			->addUsingAlias(CouponUsagePeer::WEBSITE_ID, $website->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Website relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CouponUsageQuery The current query, for fluid interface
	 */
	public function joinWebsite($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Website');
		
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
			$this->addJoinObject($join, 'Website');
		}
		
		return $this;
	}

	/**
	 * Use the Website relation Website object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WebsiteQuery A secondary query class using the current class as primary query
	 */
	public function useWebsiteQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinWebsite($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Website', 'WebsiteQuery');
	}

	/**
	 * Filter the query by a related Coupon object
	 *
	 * @param     Coupon $coupon  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponUsageQuery The current query, for fluid interface
	 */
	public function filterByCoupon($coupon, $comparison = null)
	{
		return $this
			->addUsingAlias(CouponUsagePeer::COUPON_CODE, $coupon->getCode(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Coupon relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CouponUsageQuery The current query, for fluid interface
	 */
	public function joinCoupon($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function useCouponQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinCoupon($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Coupon', 'CouponQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     CouponUsage $couponUsage Object to remove from the list of results
	 *
	 * @return    CouponUsageQuery The current query, for fluid interface
	 */
	public function prune($couponUsage = null)
	{
		if ($couponUsage) {
			$this->addUsingAlias(CouponUsagePeer::ID, $couponUsage->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseCouponUsageQuery
