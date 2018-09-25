<?php


/**
 * Base class that represents a query for the 'esq_email_accounts' table.
 *
 * 
 *
 * @method     EmailAccountQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     EmailAccountQuery orderByWebsiteId($order = Criteria::ASC) Order by the website_id column
 * @method     EmailAccountQuery orderByDomainNameId($order = Criteria::ASC) Order by the domain_name_id column
 * @method     EmailAccountQuery orderByLocalAddress($order = Criteria::ASC) Order by the local_address column
 * @method     EmailAccountQuery orderByForwardingAddress($order = Criteria::ASC) Order by the forwarding_address column
 * @method     EmailAccountQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     EmailAccountQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     EmailAccountQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     EmailAccountQuery groupById() Group by the id column
 * @method     EmailAccountQuery groupByWebsiteId() Group by the website_id column
 * @method     EmailAccountQuery groupByDomainNameId() Group by the domain_name_id column
 * @method     EmailAccountQuery groupByLocalAddress() Group by the local_address column
 * @method     EmailAccountQuery groupByForwardingAddress() Group by the forwarding_address column
 * @method     EmailAccountQuery groupByStatus() Group by the status column
 * @method     EmailAccountQuery groupByCreatedAt() Group by the created_at column
 * @method     EmailAccountQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     EmailAccountQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     EmailAccountQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     EmailAccountQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     EmailAccountQuery leftJoinWebsite($relationAlias = null) Adds a LEFT JOIN clause to the query using the Website relation
 * @method     EmailAccountQuery rightJoinWebsite($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Website relation
 * @method     EmailAccountQuery innerJoinWebsite($relationAlias = null) Adds a INNER JOIN clause to the query using the Website relation
 *
 * @method     EmailAccountQuery leftJoinDomain($relationAlias = null) Adds a LEFT JOIN clause to the query using the Domain relation
 * @method     EmailAccountQuery rightJoinDomain($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Domain relation
 * @method     EmailAccountQuery innerJoinDomain($relationAlias = null) Adds a INNER JOIN clause to the query using the Domain relation
 *
 * @method     EmailAccount findOne(PropelPDO $con = null) Return the first EmailAccount matching the query
 * @method     EmailAccount findOneOrCreate(PropelPDO $con = null) Return the first EmailAccount matching the query, or a new EmailAccount object populated from the query conditions when no match is found
 *
 * @method     EmailAccount findOneById(string $id) Return the first EmailAccount filtered by the id column
 * @method     EmailAccount findOneByWebsiteId(string $website_id) Return the first EmailAccount filtered by the website_id column
 * @method     EmailAccount findOneByDomainNameId(string $domain_name_id) Return the first EmailAccount filtered by the domain_name_id column
 * @method     EmailAccount findOneByLocalAddress(string $local_address) Return the first EmailAccount filtered by the local_address column
 * @method     EmailAccount findOneByForwardingAddress(string $forwarding_address) Return the first EmailAccount filtered by the forwarding_address column
 * @method     EmailAccount findOneByStatus(int $status) Return the first EmailAccount filtered by the status column
 * @method     EmailAccount findOneByCreatedAt(string $created_at) Return the first EmailAccount filtered by the created_at column
 * @method     EmailAccount findOneByUpdatedAt(string $updated_at) Return the first EmailAccount filtered by the updated_at column
 *
 * @method     array findById(string $id) Return EmailAccount objects filtered by the id column
 * @method     array findByWebsiteId(string $website_id) Return EmailAccount objects filtered by the website_id column
 * @method     array findByDomainNameId(string $domain_name_id) Return EmailAccount objects filtered by the domain_name_id column
 * @method     array findByLocalAddress(string $local_address) Return EmailAccount objects filtered by the local_address column
 * @method     array findByForwardingAddress(string $forwarding_address) Return EmailAccount objects filtered by the forwarding_address column
 * @method     array findByStatus(int $status) Return EmailAccount objects filtered by the status column
 * @method     array findByCreatedAt(string $created_at) Return EmailAccount objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return EmailAccount objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseEmailAccountQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseEmailAccountQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'EmailAccount', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new EmailAccountQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    EmailAccountQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof EmailAccountQuery) {
			return $criteria;
		}
		$query = new EmailAccountQuery();
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
	 * @return    EmailAccount|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = EmailAccountPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    EmailAccountQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(EmailAccountPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    EmailAccountQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(EmailAccountPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     string $id The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EmailAccountQuery The current query, for fluid interface
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
		return $this->addUsingAlias(EmailAccountPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the website_id column
	 * 
	 * @param     string $websiteId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EmailAccountQuery The current query, for fluid interface
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
		return $this->addUsingAlias(EmailAccountPeer::WEBSITE_ID, $websiteId, $comparison);
	}

	/**
	 * Filter the query on the domain_name_id column
	 * 
	 * @param     string $domainNameId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EmailAccountQuery The current query, for fluid interface
	 */
	public function filterByDomainNameId($domainNameId = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($domainNameId)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $domainNameId)) {
				$domainNameId = str_replace('*', '%', $domainNameId);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EmailAccountPeer::DOMAIN_NAME_ID, $domainNameId, $comparison);
	}

	/**
	 * Filter the query on the local_address column
	 * 
	 * @param     string $localAddress The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EmailAccountQuery The current query, for fluid interface
	 */
	public function filterByLocalAddress($localAddress = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($localAddress)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $localAddress)) {
				$localAddress = str_replace('*', '%', $localAddress);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EmailAccountPeer::LOCAL_ADDRESS, $localAddress, $comparison);
	}

	/**
	 * Filter the query on the forwarding_address column
	 * 
	 * @param     string $forwardingAddress The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EmailAccountQuery The current query, for fluid interface
	 */
	public function filterByForwardingAddress($forwardingAddress = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($forwardingAddress)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $forwardingAddress)) {
				$forwardingAddress = str_replace('*', '%', $forwardingAddress);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EmailAccountPeer::FORWARDING_ADDRESS, $forwardingAddress, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     int|array $status The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EmailAccountQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (is_array($status)) {
			$useMinMax = false;
			if (isset($status['min'])) {
				$this->addUsingAlias(EmailAccountPeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($status['max'])) {
				$this->addUsingAlias(EmailAccountPeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EmailAccountPeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EmailAccountQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(EmailAccountPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(EmailAccountPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EmailAccountPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EmailAccountQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(EmailAccountPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(EmailAccountPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EmailAccountPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related Website object
	 *
	 * @param     Website $website  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EmailAccountQuery The current query, for fluid interface
	 */
	public function filterByWebsite($website, $comparison = null)
	{
		return $this
			->addUsingAlias(EmailAccountPeer::WEBSITE_ID, $website->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Website relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EmailAccountQuery The current query, for fluid interface
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
	 * Filter the query by a related Domain object
	 *
	 * @param     Domain $domain  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EmailAccountQuery The current query, for fluid interface
	 */
	public function filterByDomain($domain, $comparison = null)
	{
		return $this
			->addUsingAlias(EmailAccountPeer::DOMAIN_NAME_ID, $domain->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Domain relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EmailAccountQuery The current query, for fluid interface
	 */
	public function joinDomain($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Domain');
		
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
			$this->addJoinObject($join, 'Domain');
		}
		
		return $this;
	}

	/**
	 * Use the Domain relation Domain object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DomainQuery A secondary query class using the current class as primary query
	 */
	public function useDomainQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinDomain($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Domain', 'DomainQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     EmailAccount $emailAccount Object to remove from the list of results
	 *
	 * @return    EmailAccountQuery The current query, for fluid interface
	 */
	public function prune($emailAccount = null)
	{
		if ($emailAccount) {
			$this->addUsingAlias(EmailAccountPeer::ID, $emailAccount->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	// timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     EmailAccountQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(EmailAccountPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     EmailAccountQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(EmailAccountPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     EmailAccountQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(EmailAccountPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     EmailAccountQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(EmailAccountPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     EmailAccountQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(EmailAccountPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     EmailAccountQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(EmailAccountPeer::CREATED_AT);
	}

} // BaseEmailAccountQuery
