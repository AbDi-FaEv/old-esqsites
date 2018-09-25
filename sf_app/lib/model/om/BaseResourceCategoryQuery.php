<?php


/**
 * Base class that represents a query for the 'esq_resource_categories' table.
 *
 * 
 *
 * @method     ResourceCategoryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ResourceCategoryQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ResourceCategoryQuery orderByUrl($order = Criteria::ASC) Order by the url column
 *
 * @method     ResourceCategoryQuery groupById() Group by the id column
 * @method     ResourceCategoryQuery groupByName() Group by the name column
 * @method     ResourceCategoryQuery groupByUrl() Group by the url column
 *
 * @method     ResourceCategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ResourceCategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ResourceCategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ResourceCategoryQuery leftJoinResource($relationAlias = null) Adds a LEFT JOIN clause to the query using the Resource relation
 * @method     ResourceCategoryQuery rightJoinResource($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Resource relation
 * @method     ResourceCategoryQuery innerJoinResource($relationAlias = null) Adds a INNER JOIN clause to the query using the Resource relation
 *
 * @method     ResourceCategory findOne(PropelPDO $con = null) Return the first ResourceCategory matching the query
 * @method     ResourceCategory findOneOrCreate(PropelPDO $con = null) Return the first ResourceCategory matching the query, or a new ResourceCategory object populated from the query conditions when no match is found
 *
 * @method     ResourceCategory findOneById(string $id) Return the first ResourceCategory filtered by the id column
 * @method     ResourceCategory findOneByName(string $name) Return the first ResourceCategory filtered by the name column
 * @method     ResourceCategory findOneByUrl(string $url) Return the first ResourceCategory filtered by the url column
 *
 * @method     array findById(string $id) Return ResourceCategory objects filtered by the id column
 * @method     array findByName(string $name) Return ResourceCategory objects filtered by the name column
 * @method     array findByUrl(string $url) Return ResourceCategory objects filtered by the url column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseResourceCategoryQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseResourceCategoryQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'ResourceCategory', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ResourceCategoryQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ResourceCategoryQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ResourceCategoryQuery) {
			return $criteria;
		}
		$query = new ResourceCategoryQuery();
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
	 * @return    ResourceCategory|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ResourceCategoryPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ResourceCategoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ResourceCategoryPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ResourceCategoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ResourceCategoryPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     string $id The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ResourceCategoryQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ResourceCategoryPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ResourceCategoryQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ResourceCategoryPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the url column
	 * 
	 * @param     string $url The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ResourceCategoryQuery The current query, for fluid interface
	 */
	public function filterByUrl($url = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($url)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $url)) {
				$url = str_replace('*', '%', $url);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ResourceCategoryPeer::URL, $url, $comparison);
	}

	/**
	 * Filter the query by a related Resource object
	 *
	 * @param     Resource $resource  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ResourceCategoryQuery The current query, for fluid interface
	 */
	public function filterByResource($resource, $comparison = null)
	{
		return $this
			->addUsingAlias(ResourceCategoryPeer::ID, $resource->getCategoryId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Resource relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ResourceCategoryQuery The current query, for fluid interface
	 */
	public function joinResource($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Resource');
		
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
			$this->addJoinObject($join, 'Resource');
		}
		
		return $this;
	}

	/**
	 * Use the Resource relation Resource object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ResourceQuery A secondary query class using the current class as primary query
	 */
	public function useResourceQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinResource($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Resource', 'ResourceQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ResourceCategory $resourceCategory Object to remove from the list of results
	 *
	 * @return    ResourceCategoryQuery The current query, for fluid interface
	 */
	public function prune($resourceCategory = null)
	{
		if ($resourceCategory) {
			$this->addUsingAlias(ResourceCategoryPeer::ID, $resourceCategory->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseResourceCategoryQuery
