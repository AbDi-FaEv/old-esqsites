<?php


/**
 * Base class that represents a query for the 'esq_page_groups' table.
 *
 * 
 *
 * @method     PageGroupQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PageGroupQuery orderByPageId($order = Criteria::ASC) Order by the page_id column
 * @method     PageGroupQuery orderByRank($order = Criteria::ASC) Order by the rank column
 * @method     PageGroupQuery orderByData($order = Criteria::ASC) Order by the data column
 * @method     PageGroupQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     PageGroupQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     PageGroupQuery groupById() Group by the id column
 * @method     PageGroupQuery groupByPageId() Group by the page_id column
 * @method     PageGroupQuery groupByRank() Group by the rank column
 * @method     PageGroupQuery groupByData() Group by the data column
 * @method     PageGroupQuery groupByCreatedAt() Group by the created_at column
 * @method     PageGroupQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     PageGroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PageGroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PageGroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PageGroupQuery leftJoinPage($relationAlias = null) Adds a LEFT JOIN clause to the query using the Page relation
 * @method     PageGroupQuery rightJoinPage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Page relation
 * @method     PageGroupQuery innerJoinPage($relationAlias = null) Adds a INNER JOIN clause to the query using the Page relation
 *
 * @method     PageGroupQuery leftJoinPageEntry($relationAlias = null) Adds a LEFT JOIN clause to the query using the PageEntry relation
 * @method     PageGroupQuery rightJoinPageEntry($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PageEntry relation
 * @method     PageGroupQuery innerJoinPageEntry($relationAlias = null) Adds a INNER JOIN clause to the query using the PageEntry relation
 *
 * @method     PageGroup findOne(PropelPDO $con = null) Return the first PageGroup matching the query
 * @method     PageGroup findOneOrCreate(PropelPDO $con = null) Return the first PageGroup matching the query, or a new PageGroup object populated from the query conditions when no match is found
 *
 * @method     PageGroup findOneById(string $id) Return the first PageGroup filtered by the id column
 * @method     PageGroup findOneByPageId(string $page_id) Return the first PageGroup filtered by the page_id column
 * @method     PageGroup findOneByRank(int $rank) Return the first PageGroup filtered by the rank column
 * @method     PageGroup findOneByData(string $data) Return the first PageGroup filtered by the data column
 * @method     PageGroup findOneByCreatedAt(string $created_at) Return the first PageGroup filtered by the created_at column
 * @method     PageGroup findOneByUpdatedAt(string $updated_at) Return the first PageGroup filtered by the updated_at column
 *
 * @method     array findById(string $id) Return PageGroup objects filtered by the id column
 * @method     array findByPageId(string $page_id) Return PageGroup objects filtered by the page_id column
 * @method     array findByRank(int $rank) Return PageGroup objects filtered by the rank column
 * @method     array findByData(string $data) Return PageGroup objects filtered by the data column
 * @method     array findByCreatedAt(string $created_at) Return PageGroup objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return PageGroup objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BasePageGroupQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasePageGroupQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'PageGroup', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PageGroupQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PageGroupQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PageGroupQuery) {
			return $criteria;
		}
		$query = new PageGroupQuery();
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
	 * @return    PageGroup|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = PageGroupPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    PageGroupQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PageGroupPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PageGroupQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PageGroupPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     string $id The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PageGroupQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PageGroupPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the page_id column
	 * 
	 * @param     string $pageId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PageGroupQuery The current query, for fluid interface
	 */
	public function filterByPageId($pageId = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($pageId)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $pageId)) {
				$pageId = str_replace('*', '%', $pageId);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PageGroupPeer::PAGE_ID, $pageId, $comparison);
	}

	/**
	 * Filter the query on the rank column
	 * 
	 * @param     int|array $rank The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PageGroupQuery The current query, for fluid interface
	 */
	public function filterByRank($rank = null, $comparison = null)
	{
		if (is_array($rank)) {
			$useMinMax = false;
			if (isset($rank['min'])) {
				$this->addUsingAlias(PageGroupPeer::RANK, $rank['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($rank['max'])) {
				$this->addUsingAlias(PageGroupPeer::RANK, $rank['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PageGroupPeer::RANK, $rank, $comparison);
	}

	/**
	 * Filter the query on the data column
	 * 
	 * @param     string $data The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PageGroupQuery The current query, for fluid interface
	 */
	public function filterByData($data = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($data)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $data)) {
				$data = str_replace('*', '%', $data);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PageGroupPeer::DATA, $data, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PageGroupQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(PageGroupPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(PageGroupPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PageGroupPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PageGroupQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(PageGroupPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(PageGroupPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PageGroupPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related Page object
	 *
	 * @param     Page $page  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PageGroupQuery The current query, for fluid interface
	 */
	public function filterByPage($page, $comparison = null)
	{
		return $this
			->addUsingAlias(PageGroupPeer::PAGE_ID, $page->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Page relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PageGroupQuery The current query, for fluid interface
	 */
	public function joinPage($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Page');
		
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
			$this->addJoinObject($join, 'Page');
		}
		
		return $this;
	}

	/**
	 * Use the Page relation Page object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PageQuery A secondary query class using the current class as primary query
	 */
	public function usePageQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinPage($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Page', 'PageQuery');
	}

	/**
	 * Filter the query by a related PageEntry object
	 *
	 * @param     PageEntry $pageEntry  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PageGroupQuery The current query, for fluid interface
	 */
	public function filterByPageEntry($pageEntry, $comparison = null)
	{
		return $this
			->addUsingAlias(PageGroupPeer::ID, $pageEntry->getGroupId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the PageEntry relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PageGroupQuery The current query, for fluid interface
	 */
	public function joinPageEntry($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PageEntry');
		
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
			$this->addJoinObject($join, 'PageEntry');
		}
		
		return $this;
	}

	/**
	 * Use the PageEntry relation PageEntry object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PageEntryQuery A secondary query class using the current class as primary query
	 */
	public function usePageEntryQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinPageEntry($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PageEntry', 'PageEntryQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     PageGroup $pageGroup Object to remove from the list of results
	 *
	 * @return    PageGroupQuery The current query, for fluid interface
	 */
	public function prune($pageGroup = null)
	{
		if ($pageGroup) {
			$this->addUsingAlias(PageGroupPeer::ID, $pageGroup->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	// sortable behavior
	
	/**
	 * Returns the objects in a certain list, from the list scope
	 *
	 * @param     int $scope		Scope to determine which objects node to return
	 *
	 * @return    PageGroupQuery The current query, for fuid interface
	 */
	public function inList($scope = null)
	{
		return $this->addUsingAlias(PageGroupPeer::SCOPE_COL, $scope, Criteria::EQUAL);
	}
	
	/**
	 * Returns a list of objects
	 *
	 * @param      int $scope		Scope to determine which list to return
	 * @param      PropelPDO $con	Connection to use.
	 *
	 * @return     mixed the list of results, formatted by the current formatter
	 */
	public function findList($scope = null, $con = null)
	{
		return $this
			->inList($scope)
			->orderByRank()
			->find($con);
	}
	
	/**
	 * Get the highest rank
	 * 
	 * @param      int $scope		Scope to determine which suite to consider
	 * @param     PropelPDO optional connection
	 *
	 * @return    integer highest position
	 */
	public function getMaxRank($scope = null, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(PageGroupPeer::DATABASE_NAME);
		}
		// shift the objects with a position lower than the one of object
		$this->addSelectColumn('MAX(' . PageGroupPeer::RANK_COL . ')');
		$this->add(PageGroupPeer::SCOPE_COL, $scope, Criteria::EQUAL);
		$stmt = $this->getSelectStatement($con);
		
		return $stmt->fetchColumn();
	}
	
	/**
	 * Reorder a set of sortable objects based on a list of id/position
	 * Beware that there is no check made on the positions passed
	 * So incoherent positions will result in an incoherent list
	 *
	 * @param     array     $order id => rank pairs
	 * @param     PropelPDO $con   optional connection
	 *
	 * @return    boolean true if the reordering took place, false if a database problem prevented it
	 */
	public function reorder(array $order, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(PageGroupPeer::DATABASE_NAME);
		}
		
		$con->beginTransaction();
		try {
			$ids = array_keys($order);
			$objects = $this->findPks($ids, $con);
			foreach ($objects as $object) {
				$pk = $object->getPrimaryKey();
				if ($object->getRank() != $order[$pk]) {
					$object->setRank($order[$pk]);
					$object->save($con);
				}
			}
			$con->commit();
	
			return true;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	// timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     PageGroupQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(PageGroupPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     PageGroupQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(PageGroupPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     PageGroupQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(PageGroupPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     PageGroupQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(PageGroupPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     PageGroupQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(PageGroupPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     PageGroupQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(PageGroupPeer::CREATED_AT);
	}

} // BasePageGroupQuery
