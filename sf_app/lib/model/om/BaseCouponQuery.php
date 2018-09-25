<?php


/**
 * Base class that represents a query for the 'esq_coupons' table.
 *
 * 
 *
 * @method     CouponQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     CouponQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     CouponQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     CouponQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     CouponQuery orderBySetup($order = Criteria::ASC) Order by the setup column
 * @method     CouponQuery orderByCurrentUsage($order = Criteria::ASC) Order by the current_usage column
 * @method     CouponQuery orderByMaxUsage($order = Criteria::ASC) Order by the max_usage column
 * @method     CouponQuery orderByBarAssociationId($order = Criteria::ASC) Order by the bar_association_id column
 * @method     CouponQuery orderByActivationDate($order = Criteria::ASC) Order by the activation_date column
 * @method     CouponQuery orderByExpirationDate($order = Criteria::ASC) Order by the expiration_date column
 * @method     CouponQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     CouponQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     CouponQuery groupById() Group by the id column
 * @method     CouponQuery groupByCode() Group by the code column
 * @method     CouponQuery groupByStatus() Group by the status column
 * @method     CouponQuery groupByDescription() Group by the description column
 * @method     CouponQuery groupBySetup() Group by the setup column
 * @method     CouponQuery groupByCurrentUsage() Group by the current_usage column
 * @method     CouponQuery groupByMaxUsage() Group by the max_usage column
 * @method     CouponQuery groupByBarAssociationId() Group by the bar_association_id column
 * @method     CouponQuery groupByActivationDate() Group by the activation_date column
 * @method     CouponQuery groupByExpirationDate() Group by the expiration_date column
 * @method     CouponQuery groupByCreatedAt() Group by the created_at column
 * @method     CouponQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     CouponQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CouponQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CouponQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CouponQuery leftJoinBarAssociation($relationAlias = null) Adds a LEFT JOIN clause to the query using the BarAssociation relation
 * @method     CouponQuery rightJoinBarAssociation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BarAssociation relation
 * @method     CouponQuery innerJoinBarAssociation($relationAlias = null) Adds a INNER JOIN clause to the query using the BarAssociation relation
 *
 * @method     CouponQuery leftJoinCouponToHostingPlanLink($relationAlias = null) Adds a LEFT JOIN clause to the query using the CouponToHostingPlanLink relation
 * @method     CouponQuery rightJoinCouponToHostingPlanLink($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CouponToHostingPlanLink relation
 * @method     CouponQuery innerJoinCouponToHostingPlanLink($relationAlias = null) Adds a INNER JOIN clause to the query using the CouponToHostingPlanLink relation
 *
 * @method     CouponQuery leftJoinCouponUsage($relationAlias = null) Adds a LEFT JOIN clause to the query using the CouponUsage relation
 * @method     CouponQuery rightJoinCouponUsage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CouponUsage relation
 * @method     CouponQuery innerJoinCouponUsage($relationAlias = null) Adds a INNER JOIN clause to the query using the CouponUsage relation
 *
 * @method     Coupon findOne(PropelPDO $con = null) Return the first Coupon matching the query
 * @method     Coupon findOneOrCreate(PropelPDO $con = null) Return the first Coupon matching the query, or a new Coupon object populated from the query conditions when no match is found
 *
 * @method     Coupon findOneById(string $id) Return the first Coupon filtered by the id column
 * @method     Coupon findOneByCode(string $code) Return the first Coupon filtered by the code column
 * @method     Coupon findOneByStatus(int $status) Return the first Coupon filtered by the status column
 * @method     Coupon findOneByDescription(string $description) Return the first Coupon filtered by the description column
 * @method     Coupon findOneBySetup(double $setup) Return the first Coupon filtered by the setup column
 * @method     Coupon findOneByCurrentUsage(int $current_usage) Return the first Coupon filtered by the current_usage column
 * @method     Coupon findOneByMaxUsage(int $max_usage) Return the first Coupon filtered by the max_usage column
 * @method     Coupon findOneByBarAssociationId(int $bar_association_id) Return the first Coupon filtered by the bar_association_id column
 * @method     Coupon findOneByActivationDate(string $activation_date) Return the first Coupon filtered by the activation_date column
 * @method     Coupon findOneByExpirationDate(string $expiration_date) Return the first Coupon filtered by the expiration_date column
 * @method     Coupon findOneByCreatedAt(string $created_at) Return the first Coupon filtered by the created_at column
 * @method     Coupon findOneByUpdatedAt(string $updated_at) Return the first Coupon filtered by the updated_at column
 *
 * @method     array findById(string $id) Return Coupon objects filtered by the id column
 * @method     array findByCode(string $code) Return Coupon objects filtered by the code column
 * @method     array findByStatus(int $status) Return Coupon objects filtered by the status column
 * @method     array findByDescription(string $description) Return Coupon objects filtered by the description column
 * @method     array findBySetup(double $setup) Return Coupon objects filtered by the setup column
 * @method     array findByCurrentUsage(int $current_usage) Return Coupon objects filtered by the current_usage column
 * @method     array findByMaxUsage(int $max_usage) Return Coupon objects filtered by the max_usage column
 * @method     array findByBarAssociationId(int $bar_association_id) Return Coupon objects filtered by the bar_association_id column
 * @method     array findByActivationDate(string $activation_date) Return Coupon objects filtered by the activation_date column
 * @method     array findByExpirationDate(string $expiration_date) Return Coupon objects filtered by the expiration_date column
 * @method     array findByCreatedAt(string $created_at) Return Coupon objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Coupon objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCouponQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseCouponQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Coupon', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new CouponQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    CouponQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof CouponQuery) {
			return $criteria;
		}
		$query = new CouponQuery();
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
	 * @return    Coupon|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = CouponPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    CouponQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(CouponPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CouponQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(CouponPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     string $id The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($id)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $id)) {
				$id = str_replace('*', '%', $id);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CouponPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the code column
	 * 
	 * @param     string $code The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponQuery The current query, for fluid interface
	 */
	public function filterByCode($code = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($code)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $code)) {
				$code = str_replace('*', '%', $code);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CouponPeer::CODE, $code, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     int|array $status The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (is_array($status)) {
			$useMinMax = false;
			if (isset($status['min'])) {
				$this->addUsingAlias(CouponPeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($status['max'])) {
				$this->addUsingAlias(CouponPeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CouponPeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the description column
	 * 
	 * @param     string $description The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponQuery The current query, for fluid interface
	 */
	public function filterByDescription($description = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($description)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $description)) {
				$description = str_replace('*', '%', $description);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CouponPeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query on the setup column
	 * 
	 * @param     double|array $setup The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponQuery The current query, for fluid interface
	 */
	public function filterBySetup($setup = null, $comparison = null)
	{
		if (is_array($setup)) {
			$useMinMax = false;
			if (isset($setup['min'])) {
				$this->addUsingAlias(CouponPeer::SETUP, $setup['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($setup['max'])) {
				$this->addUsingAlias(CouponPeer::SETUP, $setup['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CouponPeer::SETUP, $setup, $comparison);
	}

	/**
	 * Filter the query on the current_usage column
	 * 
	 * @param     int|array $currentUsage The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponQuery The current query, for fluid interface
	 */
	public function filterByCurrentUsage($currentUsage = null, $comparison = null)
	{
		if (is_array($currentUsage)) {
			$useMinMax = false;
			if (isset($currentUsage['min'])) {
				$this->addUsingAlias(CouponPeer::CURRENT_USAGE, $currentUsage['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($currentUsage['max'])) {
				$this->addUsingAlias(CouponPeer::CURRENT_USAGE, $currentUsage['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CouponPeer::CURRENT_USAGE, $currentUsage, $comparison);
	}

	/**
	 * Filter the query on the max_usage column
	 * 
	 * @param     int|array $maxUsage The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponQuery The current query, for fluid interface
	 */
	public function filterByMaxUsage($maxUsage = null, $comparison = null)
	{
		if (is_array($maxUsage)) {
			$useMinMax = false;
			if (isset($maxUsage['min'])) {
				$this->addUsingAlias(CouponPeer::MAX_USAGE, $maxUsage['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($maxUsage['max'])) {
				$this->addUsingAlias(CouponPeer::MAX_USAGE, $maxUsage['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CouponPeer::MAX_USAGE, $maxUsage, $comparison);
	}

	/**
	 * Filter the query on the bar_association_id column
	 * 
	 * @param     int|array $barAssociationId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponQuery The current query, for fluid interface
	 */
	public function filterByBarAssociationId($barAssociationId = null, $comparison = null)
	{
		if (is_array($barAssociationId)) {
			$useMinMax = false;
			if (isset($barAssociationId['min'])) {
				$this->addUsingAlias(CouponPeer::BAR_ASSOCIATION_ID, $barAssociationId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($barAssociationId['max'])) {
				$this->addUsingAlias(CouponPeer::BAR_ASSOCIATION_ID, $barAssociationId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CouponPeer::BAR_ASSOCIATION_ID, $barAssociationId, $comparison);
	}

	/**
	 * Filter the query on the activation_date column
	 * 
	 * @param     string|array $activationDate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponQuery The current query, for fluid interface
	 */
	public function filterByActivationDate($activationDate = null, $comparison = null)
	{
		if (is_array($activationDate)) {
			$useMinMax = false;
			if (isset($activationDate['min'])) {
				$this->addUsingAlias(CouponPeer::ACTIVATION_DATE, $activationDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($activationDate['max'])) {
				$this->addUsingAlias(CouponPeer::ACTIVATION_DATE, $activationDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CouponPeer::ACTIVATION_DATE, $activationDate, $comparison);
	}

	/**
	 * Filter the query on the expiration_date column
	 * 
	 * @param     string|array $expirationDate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponQuery The current query, for fluid interface
	 */
	public function filterByExpirationDate($expirationDate = null, $comparison = null)
	{
		if (is_array($expirationDate)) {
			$useMinMax = false;
			if (isset($expirationDate['min'])) {
				$this->addUsingAlias(CouponPeer::EXPIRATION_DATE, $expirationDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($expirationDate['max'])) {
				$this->addUsingAlias(CouponPeer::EXPIRATION_DATE, $expirationDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CouponPeer::EXPIRATION_DATE, $expirationDate, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(CouponPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(CouponPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CouponPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(CouponPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(CouponPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CouponPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related BarAssociation object
	 *
	 * @param     BarAssociation $barAssociation  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponQuery The current query, for fluid interface
	 */
	public function filterByBarAssociation($barAssociation, $comparison = null)
	{
		return $this
			->addUsingAlias(CouponPeer::BAR_ASSOCIATION_ID, $barAssociation->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the BarAssociation relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CouponQuery The current query, for fluid interface
	 */
	public function joinBarAssociation($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('BarAssociation');
		
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
			$this->addJoinObject($join, 'BarAssociation');
		}
		
		return $this;
	}

	/**
	 * Use the BarAssociation relation BarAssociation object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    BarAssociationQuery A secondary query class using the current class as primary query
	 */
	public function useBarAssociationQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinBarAssociation($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'BarAssociation', 'BarAssociationQuery');
	}

	/**
	 * Filter the query by a related CouponToHostingPlanLink object
	 *
	 * @param     CouponToHostingPlanLink $couponToHostingPlanLink  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponQuery The current query, for fluid interface
	 */
	public function filterByCouponToHostingPlanLink($couponToHostingPlanLink, $comparison = null)
	{
		return $this
			->addUsingAlias(CouponPeer::ID, $couponToHostingPlanLink->getCouponId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the CouponToHostingPlanLink relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CouponQuery The current query, for fluid interface
	 */
	public function joinCouponToHostingPlanLink($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('CouponToHostingPlanLink');
		
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
			$this->addJoinObject($join, 'CouponToHostingPlanLink');
		}
		
		return $this;
	}

	/**
	 * Use the CouponToHostingPlanLink relation CouponToHostingPlanLink object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CouponToHostingPlanLinkQuery A secondary query class using the current class as primary query
	 */
	public function useCouponToHostingPlanLinkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCouponToHostingPlanLink($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'CouponToHostingPlanLink', 'CouponToHostingPlanLinkQuery');
	}

	/**
	 * Filter the query by a related CouponUsage object
	 *
	 * @param     CouponUsage $couponUsage  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponQuery The current query, for fluid interface
	 */
	public function filterByCouponUsage($couponUsage, $comparison = null)
	{
		return $this
			->addUsingAlias(CouponPeer::CODE, $couponUsage->getCouponCode(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the CouponUsage relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CouponQuery The current query, for fluid interface
	 */
	public function joinCouponUsage($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('CouponUsage');
		
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
			$this->addJoinObject($join, 'CouponUsage');
		}
		
		return $this;
	}

	/**
	 * Use the CouponUsage relation CouponUsage object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CouponUsageQuery A secondary query class using the current class as primary query
	 */
	public function useCouponUsageQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinCouponUsage($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'CouponUsage', 'CouponUsageQuery');
	}

	/**
	 * Filter the query by a related WebsiteAttribute object
	 * using the esq_coupons_to_hosting_plans table as cross reference
	 *
	 * @param     WebsiteAttribute $websiteAttribute the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponQuery The current query, for fluid interface
	 */
	public function filterByWebsiteAttribute($websiteAttribute, $comparison = Criteria::EQUAL)
	{
		return $this
			->useCouponToHostingPlanLinkQuery()
				->filterByWebsiteAttribute($websiteAttribute, $comparison)
			->endUse();
	}
	
	/**
	 * Filter the query by a related Website object
	 * using the esq_coupon_usage table as cross reference
	 *
	 * @param     Website $website the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CouponQuery The current query, for fluid interface
	 */
	public function filterByWebsite($website, $comparison = Criteria::EQUAL)
	{
		return $this
			->useCouponUsageQuery()
				->filterByWebsite($website, $comparison)
			->endUse();
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param     Coupon $coupon Object to remove from the list of results
	 *
	 * @return    CouponQuery The current query, for fluid interface
	 */
	public function prune($coupon = null)
	{
		if ($coupon) {
			$this->addUsingAlias(CouponPeer::ID, $coupon->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	// timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     CouponQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(CouponPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     CouponQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(CouponPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     CouponQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(CouponPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     CouponQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(CouponPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     CouponQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(CouponPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     CouponQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(CouponPeer::CREATED_AT);
	}

} // BaseCouponQuery
