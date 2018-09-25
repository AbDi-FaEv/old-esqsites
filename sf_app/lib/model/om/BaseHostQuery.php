<?php


/**
 * Base class that represents a query for the 'esq_hosts' table.
 *
 * 
 *
 * @method     HostQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     HostQuery orderByInternalIp($order = Criteria::ASC) Order by the internal_ip column
 * @method     HostQuery orderByExternalIp($order = Criteria::ASC) Order by the external_ip column
 * @method     HostQuery orderByPort($order = Criteria::ASC) Order by the port column
 * @method     HostQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     HostQuery orderByGlobalDocumentRoot($order = Criteria::ASC) Order by the global_document_root column
 * @method     HostQuery orderBySaveMax($order = Criteria::ASC) Order by the save_max column
 * @method     HostQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     HostQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     HostQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     HostQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     HostQuery groupById() Group by the id column
 * @method     HostQuery groupByInternalIp() Group by the internal_ip column
 * @method     HostQuery groupByExternalIp() Group by the external_ip column
 * @method     HostQuery groupByPort() Group by the port column
 * @method     HostQuery groupByName() Group by the name column
 * @method     HostQuery groupByGlobalDocumentRoot() Group by the global_document_root column
 * @method     HostQuery groupBySaveMax() Group by the save_max column
 * @method     HostQuery groupByType() Group by the type column
 * @method     HostQuery groupByStatus() Group by the status column
 * @method     HostQuery groupByCreatedAt() Group by the created_at column
 * @method     HostQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     HostQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     HostQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     HostQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     HostQuery leftJoinWebsite($relationAlias = null) Adds a LEFT JOIN clause to the query using the Website relation
 * @method     HostQuery rightJoinWebsite($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Website relation
 * @method     HostQuery innerJoinWebsite($relationAlias = null) Adds a INNER JOIN clause to the query using the Website relation
 *
 * @method     Host findOne(PropelPDO $con = null) Return the first Host matching the query
 * @method     Host findOneOrCreate(PropelPDO $con = null) Return the first Host matching the query, or a new Host object populated from the query conditions when no match is found
 *
 * @method     Host findOneById(string $id) Return the first Host filtered by the id column
 * @method     Host findOneByInternalIp(string $internal_ip) Return the first Host filtered by the internal_ip column
 * @method     Host findOneByExternalIp(string $external_ip) Return the first Host filtered by the external_ip column
 * @method     Host findOneByPort(int $port) Return the first Host filtered by the port column
 * @method     Host findOneByName(string $name) Return the first Host filtered by the name column
 * @method     Host findOneByGlobalDocumentRoot(string $global_document_root) Return the first Host filtered by the global_document_root column
 * @method     Host findOneBySaveMax(int $save_max) Return the first Host filtered by the save_max column
 * @method     Host findOneByType(int $type) Return the first Host filtered by the type column
 * @method     Host findOneByStatus(int $status) Return the first Host filtered by the status column
 * @method     Host findOneByCreatedAt(string $created_at) Return the first Host filtered by the created_at column
 * @method     Host findOneByUpdatedAt(string $updated_at) Return the first Host filtered by the updated_at column
 *
 * @method     array findById(string $id) Return Host objects filtered by the id column
 * @method     array findByInternalIp(string $internal_ip) Return Host objects filtered by the internal_ip column
 * @method     array findByExternalIp(string $external_ip) Return Host objects filtered by the external_ip column
 * @method     array findByPort(int $port) Return Host objects filtered by the port column
 * @method     array findByName(string $name) Return Host objects filtered by the name column
 * @method     array findByGlobalDocumentRoot(string $global_document_root) Return Host objects filtered by the global_document_root column
 * @method     array findBySaveMax(int $save_max) Return Host objects filtered by the save_max column
 * @method     array findByType(int $type) Return Host objects filtered by the type column
 * @method     array findByStatus(int $status) Return Host objects filtered by the status column
 * @method     array findByCreatedAt(string $created_at) Return Host objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Host objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseHostQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseHostQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Host', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new HostQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    HostQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof HostQuery) {
			return $criteria;
		}
		$query = new HostQuery();
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
	 * @return    Host|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = HostPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    HostQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(HostPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    HostQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(HostPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     string $id The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    HostQuery The current query, for fluid interface
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
		return $this->addUsingAlias(HostPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the internal_ip column
	 * 
	 * @param     string $internalIp The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    HostQuery The current query, for fluid interface
	 */
	public function filterByInternalIp($internalIp = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($internalIp)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $internalIp)) {
				$internalIp = str_replace('*', '%', $internalIp);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(HostPeer::INTERNAL_IP, $internalIp, $comparison);
	}

	/**
	 * Filter the query on the external_ip column
	 * 
	 * @param     string $externalIp The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    HostQuery The current query, for fluid interface
	 */
	public function filterByExternalIp($externalIp = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($externalIp)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $externalIp)) {
				$externalIp = str_replace('*', '%', $externalIp);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(HostPeer::EXTERNAL_IP, $externalIp, $comparison);
	}

	/**
	 * Filter the query on the port column
	 * 
	 * @param     int|array $port The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    HostQuery The current query, for fluid interface
	 */
	public function filterByPort($port = null, $comparison = null)
	{
		if (is_array($port)) {
			$useMinMax = false;
			if (isset($port['min'])) {
				$this->addUsingAlias(HostPeer::PORT, $port['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($port['max'])) {
				$this->addUsingAlias(HostPeer::PORT, $port['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(HostPeer::PORT, $port, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    HostQuery The current query, for fluid interface
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
		return $this->addUsingAlias(HostPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the global_document_root column
	 * 
	 * @param     string $globalDocumentRoot The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    HostQuery The current query, for fluid interface
	 */
	public function filterByGlobalDocumentRoot($globalDocumentRoot = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($globalDocumentRoot)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $globalDocumentRoot)) {
				$globalDocumentRoot = str_replace('*', '%', $globalDocumentRoot);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(HostPeer::GLOBAL_DOCUMENT_ROOT, $globalDocumentRoot, $comparison);
	}

	/**
	 * Filter the query on the save_max column
	 * 
	 * @param     int|array $saveMax The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    HostQuery The current query, for fluid interface
	 */
	public function filterBySaveMax($saveMax = null, $comparison = null)
	{
		if (is_array($saveMax)) {
			$useMinMax = false;
			if (isset($saveMax['min'])) {
				$this->addUsingAlias(HostPeer::SAVE_MAX, $saveMax['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($saveMax['max'])) {
				$this->addUsingAlias(HostPeer::SAVE_MAX, $saveMax['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(HostPeer::SAVE_MAX, $saveMax, $comparison);
	}

	/**
	 * Filter the query on the type column
	 * 
	 * @param     int|array $type The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    HostQuery The current query, for fluid interface
	 */
	public function filterByType($type = null, $comparison = null)
	{
		if (is_array($type)) {
			$useMinMax = false;
			if (isset($type['min'])) {
				$this->addUsingAlias(HostPeer::TYPE, $type['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($type['max'])) {
				$this->addUsingAlias(HostPeer::TYPE, $type['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(HostPeer::TYPE, $type, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     int|array $status The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    HostQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (is_array($status)) {
			$useMinMax = false;
			if (isset($status['min'])) {
				$this->addUsingAlias(HostPeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($status['max'])) {
				$this->addUsingAlias(HostPeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(HostPeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    HostQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(HostPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(HostPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(HostPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    HostQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(HostPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(HostPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(HostPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related Website object
	 *
	 * @param     Website $website  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    HostQuery The current query, for fluid interface
	 */
	public function filterByWebsite($website, $comparison = null)
	{
		return $this
			->addUsingAlias(HostPeer::ID, $website->getHostId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Website relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    HostQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     Host $host Object to remove from the list of results
	 *
	 * @return    HostQuery The current query, for fluid interface
	 */
	public function prune($host = null)
	{
		if ($host) {
			$this->addUsingAlias(HostPeer::ID, $host->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	// timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     HostQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(HostPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     HostQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(HostPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     HostQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(HostPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     HostQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(HostPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     HostQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(HostPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     HostQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(HostPeer::CREATED_AT);
	}

} // BaseHostQuery
