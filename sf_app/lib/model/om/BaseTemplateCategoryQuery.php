<?php


/**
 * Base class that represents a query for the 'esq_template_categories' table.
 *
 * 
 *
 * @method     TemplateCategoryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     TemplateCategoryQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     TemplateCategoryQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     TemplateCategoryQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     TemplateCategoryQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     TemplateCategoryQuery groupById() Group by the id column
 * @method     TemplateCategoryQuery groupByName() Group by the name column
 * @method     TemplateCategoryQuery groupByDescription() Group by the description column
 * @method     TemplateCategoryQuery groupByCreatedAt() Group by the created_at column
 * @method     TemplateCategoryQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     TemplateCategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     TemplateCategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     TemplateCategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     TemplateCategoryQuery leftJoinWebsiteTemplate($relationAlias = null) Adds a LEFT JOIN clause to the query using the WebsiteTemplate relation
 * @method     TemplateCategoryQuery rightJoinWebsiteTemplate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the WebsiteTemplate relation
 * @method     TemplateCategoryQuery innerJoinWebsiteTemplate($relationAlias = null) Adds a INNER JOIN clause to the query using the WebsiteTemplate relation
 *
 * @method     TemplateCategory findOne(PropelPDO $con = null) Return the first TemplateCategory matching the query
 * @method     TemplateCategory findOneOrCreate(PropelPDO $con = null) Return the first TemplateCategory matching the query, or a new TemplateCategory object populated from the query conditions when no match is found
 *
 * @method     TemplateCategory findOneById(string $id) Return the first TemplateCategory filtered by the id column
 * @method     TemplateCategory findOneByName(string $name) Return the first TemplateCategory filtered by the name column
 * @method     TemplateCategory findOneByDescription(string $description) Return the first TemplateCategory filtered by the description column
 * @method     TemplateCategory findOneByCreatedAt(string $created_at) Return the first TemplateCategory filtered by the created_at column
 * @method     TemplateCategory findOneByUpdatedAt(string $updated_at) Return the first TemplateCategory filtered by the updated_at column
 *
 * @method     array findById(string $id) Return TemplateCategory objects filtered by the id column
 * @method     array findByName(string $name) Return TemplateCategory objects filtered by the name column
 * @method     array findByDescription(string $description) Return TemplateCategory objects filtered by the description column
 * @method     array findByCreatedAt(string $created_at) Return TemplateCategory objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return TemplateCategory objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTemplateCategoryQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseTemplateCategoryQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'TemplateCategory', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new TemplateCategoryQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    TemplateCategoryQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof TemplateCategoryQuery) {
			return $criteria;
		}
		$query = new TemplateCategoryQuery();
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
	 * @return    TemplateCategory|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = TemplateCategoryPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    TemplateCategoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(TemplateCategoryPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    TemplateCategoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(TemplateCategoryPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     string $id The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateCategoryQuery The current query, for fluid interface
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
		return $this->addUsingAlias(TemplateCategoryPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateCategoryQuery The current query, for fluid interface
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
		return $this->addUsingAlias(TemplateCategoryPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the description column
	 * 
	 * @param     string $description The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateCategoryQuery The current query, for fluid interface
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
		return $this->addUsingAlias(TemplateCategoryPeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateCategoryQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(TemplateCategoryPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(TemplateCategoryPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TemplateCategoryPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateCategoryQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(TemplateCategoryPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(TemplateCategoryPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TemplateCategoryPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related WebsiteTemplate object
	 *
	 * @param     WebsiteTemplate $websiteTemplate  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateCategoryQuery The current query, for fluid interface
	 */
	public function filterByWebsiteTemplate($websiteTemplate, $comparison = null)
	{
		return $this
			->addUsingAlias(TemplateCategoryPeer::ID, $websiteTemplate->getCategoryId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the WebsiteTemplate relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TemplateCategoryQuery The current query, for fluid interface
	 */
	public function joinWebsiteTemplate($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('WebsiteTemplate');
		
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
			$this->addJoinObject($join, 'WebsiteTemplate');
		}
		
		return $this;
	}

	/**
	 * Use the WebsiteTemplate relation WebsiteTemplate object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WebsiteTemplateQuery A secondary query class using the current class as primary query
	 */
	public function useWebsiteTemplateQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinWebsiteTemplate($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'WebsiteTemplate', 'WebsiteTemplateQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     TemplateCategory $templateCategory Object to remove from the list of results
	 *
	 * @return    TemplateCategoryQuery The current query, for fluid interface
	 */
	public function prune($templateCategory = null)
	{
		if ($templateCategory) {
			$this->addUsingAlias(TemplateCategoryPeer::ID, $templateCategory->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	// timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     TemplateCategoryQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(TemplateCategoryPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     TemplateCategoryQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(TemplateCategoryPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     TemplateCategoryQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(TemplateCategoryPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     TemplateCategoryQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(TemplateCategoryPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     TemplateCategoryQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(TemplateCategoryPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     TemplateCategoryQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(TemplateCategoryPeer::CREATED_AT);
	}

} // BaseTemplateCategoryQuery
