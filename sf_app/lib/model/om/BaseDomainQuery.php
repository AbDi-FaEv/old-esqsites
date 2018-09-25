<?php


/**
 * Base class that represents a query for the 'esq_domain_names' table.
 *
 * 
 *
 * @method     DomainQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     DomainQuery orderByWebsiteId($order = Criteria::ASC) Order by the website_id column
 * @method     DomainQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     DomainQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     DomainQuery orderByRegistrationType($order = Criteria::ASC) Order by the registration_type column
 * @method     DomainQuery orderByIsAutoRenew($order = Criteria::ASC) Order by the is_auto_renew column
 * @method     DomainQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     DomainQuery orderByExpirationDate($order = Criteria::ASC) Order by the expiration_date column
 * @method     DomainQuery orderByLastRenewalDate($order = Criteria::ASC) Order by the last_renewal_date column
 * @method     DomainQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     DomainQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     DomainQuery groupById() Group by the id column
 * @method     DomainQuery groupByWebsiteId() Group by the website_id column
 * @method     DomainQuery groupByName() Group by the name column
 * @method     DomainQuery groupByType() Group by the type column
 * @method     DomainQuery groupByRegistrationType() Group by the registration_type column
 * @method     DomainQuery groupByIsAutoRenew() Group by the is_auto_renew column
 * @method     DomainQuery groupByStatus() Group by the status column
 * @method     DomainQuery groupByExpirationDate() Group by the expiration_date column
 * @method     DomainQuery groupByLastRenewalDate() Group by the last_renewal_date column
 * @method     DomainQuery groupByCreatedAt() Group by the created_at column
 * @method     DomainQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     DomainQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     DomainQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     DomainQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     DomainQuery leftJoinWebsite($relationAlias = null) Adds a LEFT JOIN clause to the query using the Website relation
 * @method     DomainQuery rightJoinWebsite($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Website relation
 * @method     DomainQuery innerJoinWebsite($relationAlias = null) Adds a INNER JOIN clause to the query using the Website relation
 *
 * @method     DomainQuery leftJoinWebsiteRelatedByPrimaryDomainId($relationAlias = null) Adds a LEFT JOIN clause to the query using the WebsiteRelatedByPrimaryDomainId relation
 * @method     DomainQuery rightJoinWebsiteRelatedByPrimaryDomainId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the WebsiteRelatedByPrimaryDomainId relation
 * @method     DomainQuery innerJoinWebsiteRelatedByPrimaryDomainId($relationAlias = null) Adds a INNER JOIN clause to the query using the WebsiteRelatedByPrimaryDomainId relation
 *
 * @method     DomainQuery leftJoinDomainCheck($relationAlias = null) Adds a LEFT JOIN clause to the query using the DomainCheck relation
 * @method     DomainQuery rightJoinDomainCheck($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DomainCheck relation
 * @method     DomainQuery innerJoinDomainCheck($relationAlias = null) Adds a INNER JOIN clause to the query using the DomainCheck relation
 *
 * @method     DomainQuery leftJoinEmailAccount($relationAlias = null) Adds a LEFT JOIN clause to the query using the EmailAccount relation
 * @method     DomainQuery rightJoinEmailAccount($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EmailAccount relation
 * @method     DomainQuery innerJoinEmailAccount($relationAlias = null) Adds a INNER JOIN clause to the query using the EmailAccount relation
 *
 * @method     Domain findOne(PropelPDO $con = null) Return the first Domain matching the query
 * @method     Domain findOneOrCreate(PropelPDO $con = null) Return the first Domain matching the query, or a new Domain object populated from the query conditions when no match is found
 *
 * @method     Domain findOneById(string $id) Return the first Domain filtered by the id column
 * @method     Domain findOneByWebsiteId(string $website_id) Return the first Domain filtered by the website_id column
 * @method     Domain findOneByName(string $name) Return the first Domain filtered by the name column
 * @method     Domain findOneByType(string $type) Return the first Domain filtered by the type column
 * @method     Domain findOneByRegistrationType(string $registration_type) Return the first Domain filtered by the registration_type column
 * @method     Domain findOneByIsAutoRenew(boolean $is_auto_renew) Return the first Domain filtered by the is_auto_renew column
 * @method     Domain findOneByStatus(int $status) Return the first Domain filtered by the status column
 * @method     Domain findOneByExpirationDate(string $expiration_date) Return the first Domain filtered by the expiration_date column
 * @method     Domain findOneByLastRenewalDate(string $last_renewal_date) Return the first Domain filtered by the last_renewal_date column
 * @method     Domain findOneByCreatedAt(string $created_at) Return the first Domain filtered by the created_at column
 * @method     Domain findOneByUpdatedAt(string $updated_at) Return the first Domain filtered by the updated_at column
 *
 * @method     array findById(string $id) Return Domain objects filtered by the id column
 * @method     array findByWebsiteId(string $website_id) Return Domain objects filtered by the website_id column
 * @method     array findByName(string $name) Return Domain objects filtered by the name column
 * @method     array findByType(string $type) Return Domain objects filtered by the type column
 * @method     array findByRegistrationType(string $registration_type) Return Domain objects filtered by the registration_type column
 * @method     array findByIsAutoRenew(boolean $is_auto_renew) Return Domain objects filtered by the is_auto_renew column
 * @method     array findByStatus(int $status) Return Domain objects filtered by the status column
 * @method     array findByExpirationDate(string $expiration_date) Return Domain objects filtered by the expiration_date column
 * @method     array findByLastRenewalDate(string $last_renewal_date) Return Domain objects filtered by the last_renewal_date column
 * @method     array findByCreatedAt(string $created_at) Return Domain objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Domain objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseDomainQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseDomainQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Domain', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new DomainQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    DomainQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof DomainQuery) {
			return $criteria;
		}
		$query = new DomainQuery();
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
	 * @return    Domain|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = DomainPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(DomainPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(DomainPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     string $id The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainQuery The current query, for fluid interface
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
		return $this->addUsingAlias(DomainPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the website_id column
	 * 
	 * @param     string $websiteId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainQuery The current query, for fluid interface
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
		return $this->addUsingAlias(DomainPeer::WEBSITE_ID, $websiteId, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($name)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $name)) {
				$name = str_replace('*', '%', $name);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(DomainPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the type column
	 * 
	 * @param     string $type The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function filterByType($type = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($type)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $type)) {
				$type = str_replace('*', '%', $type);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(DomainPeer::TYPE, $type, $comparison);
	}

	/**
	 * Filter the query on the registration_type column
	 * 
	 * @param     string $registrationType The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function filterByRegistrationType($registrationType = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($registrationType)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $registrationType)) {
				$registrationType = str_replace('*', '%', $registrationType);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(DomainPeer::REGISTRATION_TYPE, $registrationType, $comparison);
	}

	/**
	 * Filter the query on the is_auto_renew column
	 * 
	 * @param     boolean|string $isAutoRenew The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function filterByIsAutoRenew($isAutoRenew = null, $comparison = null)
	{
		if (is_string($isAutoRenew)) {
			$is_auto_renew = in_array(strtolower($isAutoRenew), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(DomainPeer::IS_AUTO_RENEW, $isAutoRenew, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     int|array $status The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (is_array($status)) {
			$useMinMax = false;
			if (isset($status['min'])) {
				$this->addUsingAlias(DomainPeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($status['max'])) {
				$this->addUsingAlias(DomainPeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(DomainPeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the expiration_date column
	 * 
	 * @param     string|array $expirationDate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function filterByExpirationDate($expirationDate = null, $comparison = null)
	{
		if (is_array($expirationDate)) {
			$useMinMax = false;
			if (isset($expirationDate['min'])) {
				$this->addUsingAlias(DomainPeer::EXPIRATION_DATE, $expirationDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($expirationDate['max'])) {
				$this->addUsingAlias(DomainPeer::EXPIRATION_DATE, $expirationDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(DomainPeer::EXPIRATION_DATE, $expirationDate, $comparison);
	}

	/**
	 * Filter the query on the last_renewal_date column
	 * 
	 * @param     string|array $lastRenewalDate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function filterByLastRenewalDate($lastRenewalDate = null, $comparison = null)
	{
		if (is_array($lastRenewalDate)) {
			$useMinMax = false;
			if (isset($lastRenewalDate['min'])) {
				$this->addUsingAlias(DomainPeer::LAST_RENEWAL_DATE, $lastRenewalDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($lastRenewalDate['max'])) {
				$this->addUsingAlias(DomainPeer::LAST_RENEWAL_DATE, $lastRenewalDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(DomainPeer::LAST_RENEWAL_DATE, $lastRenewalDate, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(DomainPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(DomainPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(DomainPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(DomainPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(DomainPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(DomainPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related Website object
	 *
	 * @param     Website $website  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function filterByWebsite($website, $comparison = null)
	{
		return $this
			->addUsingAlias(DomainPeer::WEBSITE_ID, $website->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Website relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function joinWebsite($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function useWebsiteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinWebsite($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Website', 'WebsiteQuery');
	}

	/**
	 * Filter the query by a related Website object
	 *
	 * @param     Website $website  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function filterByWebsiteRelatedByPrimaryDomainId($website, $comparison = null)
	{
		return $this
			->addUsingAlias(DomainPeer::ID, $website->getPrimaryDomainId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the WebsiteRelatedByPrimaryDomainId relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function joinWebsiteRelatedByPrimaryDomainId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('WebsiteRelatedByPrimaryDomainId');
		
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
			$this->addJoinObject($join, 'WebsiteRelatedByPrimaryDomainId');
		}
		
		return $this;
	}

	/**
	 * Use the WebsiteRelatedByPrimaryDomainId relation Website object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WebsiteQuery A secondary query class using the current class as primary query
	 */
	public function useWebsiteRelatedByPrimaryDomainIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinWebsiteRelatedByPrimaryDomainId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'WebsiteRelatedByPrimaryDomainId', 'WebsiteQuery');
	}

	/**
	 * Filter the query by a related DomainCheck object
	 *
	 * @param     DomainCheck $domainCheck  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function filterByDomainCheck($domainCheck, $comparison = null)
	{
		return $this
			->addUsingAlias(DomainPeer::ID, $domainCheck->getDomainId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the DomainCheck relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function joinDomainCheck($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('DomainCheck');
		
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
			$this->addJoinObject($join, 'DomainCheck');
		}
		
		return $this;
	}

	/**
	 * Use the DomainCheck relation DomainCheck object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DomainCheckQuery A secondary query class using the current class as primary query
	 */
	public function useDomainCheckQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinDomainCheck($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'DomainCheck', 'DomainCheckQuery');
	}

	/**
	 * Filter the query by a related EmailAccount object
	 *
	 * @param     EmailAccount $emailAccount  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function filterByEmailAccount($emailAccount, $comparison = null)
	{
		return $this
			->addUsingAlias(DomainPeer::ID, $emailAccount->getDomainNameId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the EmailAccount relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function joinEmailAccount($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('EmailAccount');
		
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
			$this->addJoinObject($join, 'EmailAccount');
		}
		
		return $this;
	}

	/**
	 * Use the EmailAccount relation EmailAccount object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EmailAccountQuery A secondary query class using the current class as primary query
	 */
	public function useEmailAccountQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinEmailAccount($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'EmailAccount', 'EmailAccountQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Domain $domain Object to remove from the list of results
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function prune($domain = null)
	{
		if ($domain) {
			$this->addUsingAlias(DomainPeer::ID, $domain->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	// timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     DomainQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(DomainPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     DomainQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(DomainPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     DomainQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(DomainPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     DomainQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(DomainPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     DomainQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(DomainPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     DomainQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(DomainPeer::CREATED_AT);
	}

} // BaseDomainQuery
