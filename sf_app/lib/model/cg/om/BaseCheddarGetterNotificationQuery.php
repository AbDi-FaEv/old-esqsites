<?php


/**
 * Base class that represents a query for the 'cg_notifications' table.
 *
 * 
 *
 * @method     CheddarGetterNotificationQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method     CheddarGetterNotificationQuery orderByWebsiteId($order = Criteria::ASC) Order by the website_id column
 * @method     CheddarGetterNotificationQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     CheddarGetterNotificationQuery orderByResult($order = Criteria::ASC) Order by the result column
 * @method     CheddarGetterNotificationQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     CheddarGetterNotificationQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     CheddarGetterNotificationQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     CheddarGetterNotificationQuery groupByContent() Group by the content column
 * @method     CheddarGetterNotificationQuery groupByWebsiteId() Group by the website_id column
 * @method     CheddarGetterNotificationQuery groupByType() Group by the type column
 * @method     CheddarGetterNotificationQuery groupByResult() Group by the result column
 * @method     CheddarGetterNotificationQuery groupById() Group by the id column
 * @method     CheddarGetterNotificationQuery groupByCreatedAt() Group by the created_at column
 * @method     CheddarGetterNotificationQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     CheddarGetterNotificationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CheddarGetterNotificationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CheddarGetterNotificationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CheddarGetterNotificationQuery leftJoinWebsite($relationAlias = null) Adds a LEFT JOIN clause to the query using the Website relation
 * @method     CheddarGetterNotificationQuery rightJoinWebsite($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Website relation
 * @method     CheddarGetterNotificationQuery innerJoinWebsite($relationAlias = null) Adds a INNER JOIN clause to the query using the Website relation
 *
 * @method     CheddarGetterNotification findOne(PropelPDO $con = null) Return the first CheddarGetterNotification matching the query
 * @method     CheddarGetterNotification findOneOrCreate(PropelPDO $con = null) Return the first CheddarGetterNotification matching the query, or a new CheddarGetterNotification object populated from the query conditions when no match is found
 *
 * @method     CheddarGetterNotification findOneByContent(string $content) Return the first CheddarGetterNotification filtered by the content column
 * @method     CheddarGetterNotification findOneByWebsiteId(string $website_id) Return the first CheddarGetterNotification filtered by the website_id column
 * @method     CheddarGetterNotification findOneByType(string $type) Return the first CheddarGetterNotification filtered by the type column
 * @method     CheddarGetterNotification findOneByResult(string $result) Return the first CheddarGetterNotification filtered by the result column
 * @method     CheddarGetterNotification findOneById(int $id) Return the first CheddarGetterNotification filtered by the id column
 * @method     CheddarGetterNotification findOneByCreatedAt(string $created_at) Return the first CheddarGetterNotification filtered by the created_at column
 * @method     CheddarGetterNotification findOneByUpdatedAt(string $updated_at) Return the first CheddarGetterNotification filtered by the updated_at column
 *
 * @method     array findByContent(string $content) Return CheddarGetterNotification objects filtered by the content column
 * @method     array findByWebsiteId(string $website_id) Return CheddarGetterNotification objects filtered by the website_id column
 * @method     array findByType(string $type) Return CheddarGetterNotification objects filtered by the type column
 * @method     array findByResult(string $result) Return CheddarGetterNotification objects filtered by the result column
 * @method     array findById(int $id) Return CheddarGetterNotification objects filtered by the id column
 * @method     array findByCreatedAt(string $created_at) Return CheddarGetterNotification objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return CheddarGetterNotification objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.cg.om
 */
abstract class BaseCheddarGetterNotificationQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseCheddarGetterNotificationQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'CheddarGetterNotification', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new CheddarGetterNotificationQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    CheddarGetterNotificationQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof CheddarGetterNotificationQuery) {
			return $criteria;
		}
		$query = new CheddarGetterNotificationQuery();
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
	 * @return    CheddarGetterNotification|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = CheddarGetterNotificationPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    CheddarGetterNotificationQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(CheddarGetterNotificationPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CheddarGetterNotificationQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(CheddarGetterNotificationPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the content column
	 * 
	 * @param     string $content The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CheddarGetterNotificationQuery The current query, for fluid interface
	 */
	public function filterByContent($content = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($content)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $content)) {
				$content = str_replace('*', '%', $content);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CheddarGetterNotificationPeer::CONTENT, $content, $comparison);
	}

	/**
	 * Filter the query on the website_id column
	 * 
	 * @param     string $websiteId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CheddarGetterNotificationQuery The current query, for fluid interface
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
		return $this->addUsingAlias(CheddarGetterNotificationPeer::WEBSITE_ID, $websiteId, $comparison);
	}

	/**
	 * Filter the query on the type column
	 * 
	 * @param     string $type The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CheddarGetterNotificationQuery The current query, for fluid interface
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
		return $this->addUsingAlias(CheddarGetterNotificationPeer::TYPE, $type, $comparison);
	}

	/**
	 * Filter the query on the result column
	 * 
	 * @param     string $result The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CheddarGetterNotificationQuery The current query, for fluid interface
	 */
	public function filterByResult($result = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($result)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $result)) {
				$result = str_replace('*', '%', $result);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CheddarGetterNotificationPeer::RESULT, $result, $comparison);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CheddarGetterNotificationQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(CheddarGetterNotificationPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CheddarGetterNotificationQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(CheddarGetterNotificationPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(CheddarGetterNotificationPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CheddarGetterNotificationPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CheddarGetterNotificationQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(CheddarGetterNotificationPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(CheddarGetterNotificationPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CheddarGetterNotificationPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related Website object
	 *
	 * @param     Website $website  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CheddarGetterNotificationQuery The current query, for fluid interface
	 */
	public function filterByWebsite($website, $comparison = null)
	{
		return $this
			->addUsingAlias(CheddarGetterNotificationPeer::WEBSITE_ID, $website->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Website relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CheddarGetterNotificationQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     CheddarGetterNotification $cheddarGetterNotification Object to remove from the list of results
	 *
	 * @return    CheddarGetterNotificationQuery The current query, for fluid interface
	 */
	public function prune($cheddarGetterNotification = null)
	{
		if ($cheddarGetterNotification) {
			$this->addUsingAlias(CheddarGetterNotificationPeer::ID, $cheddarGetterNotification->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	// timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     CheddarGetterNotificationQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(CheddarGetterNotificationPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     CheddarGetterNotificationQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(CheddarGetterNotificationPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     CheddarGetterNotificationQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(CheddarGetterNotificationPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     CheddarGetterNotificationQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(CheddarGetterNotificationPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     CheddarGetterNotificationQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(CheddarGetterNotificationPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     CheddarGetterNotificationQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(CheddarGetterNotificationPeer::CREATED_AT);
	}

} // BaseCheddarGetterNotificationQuery
