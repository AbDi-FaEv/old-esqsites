<?php


/**
 * Base class that represents a query for the 'te_blog_post_category' table.
 *
 * 
 *
 * @method     teBlogPostCategoryQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     teBlogPostCategoryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     teBlogPostCategoryQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     teBlogPostCategoryQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     teBlogPostCategoryQuery orderBySlug($order = Criteria::ASC) Order by the slug column
 *
 * @method     teBlogPostCategoryQuery groupByName() Group by the name column
 * @method     teBlogPostCategoryQuery groupById() Group by the id column
 * @method     teBlogPostCategoryQuery groupByCreatedAt() Group by the created_at column
 * @method     teBlogPostCategoryQuery groupByUpdatedAt() Group by the updated_at column
 * @method     teBlogPostCategoryQuery groupBySlug() Group by the slug column
 *
 * @method     teBlogPostCategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     teBlogPostCategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     teBlogPostCategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     teBlogPostCategoryQuery leftJointeBlogPostToCategoryLink($relationAlias = null) Adds a LEFT JOIN clause to the query using the teBlogPostToCategoryLink relation
 * @method     teBlogPostCategoryQuery rightJointeBlogPostToCategoryLink($relationAlias = null) Adds a RIGHT JOIN clause to the query using the teBlogPostToCategoryLink relation
 * @method     teBlogPostCategoryQuery innerJointeBlogPostToCategoryLink($relationAlias = null) Adds a INNER JOIN clause to the query using the teBlogPostToCategoryLink relation
 *
 * @method     teBlogPostCategory findOne(PropelPDO $con = null) Return the first teBlogPostCategory matching the query
 * @method     teBlogPostCategory findOneOrCreate(PropelPDO $con = null) Return the first teBlogPostCategory matching the query, or a new teBlogPostCategory object populated from the query conditions when no match is found
 *
 * @method     teBlogPostCategory findOneByName(string $name) Return the first teBlogPostCategory filtered by the name column
 * @method     teBlogPostCategory findOneById(int $id) Return the first teBlogPostCategory filtered by the id column
 * @method     teBlogPostCategory findOneByCreatedAt(string $created_at) Return the first teBlogPostCategory filtered by the created_at column
 * @method     teBlogPostCategory findOneByUpdatedAt(string $updated_at) Return the first teBlogPostCategory filtered by the updated_at column
 * @method     teBlogPostCategory findOneBySlug(string $slug) Return the first teBlogPostCategory filtered by the slug column
 *
 * @method     array findByName(string $name) Return teBlogPostCategory objects filtered by the name column
 * @method     array findById(int $id) Return teBlogPostCategory objects filtered by the id column
 * @method     array findByCreatedAt(string $created_at) Return teBlogPostCategory objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return teBlogPostCategory objects filtered by the updated_at column
 * @method     array findBySlug(string $slug) Return teBlogPostCategory objects filtered by the slug column
 *
 * @package    propel.generator.plugins.teBlogPlugin.lib.model.om
 */
abstract class BaseteBlogPostCategoryQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseteBlogPostCategoryQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'teBlogPostCategory', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new teBlogPostCategoryQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    teBlogPostCategoryQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof teBlogPostCategoryQuery) {
			return $criteria;
		}
		$query = new teBlogPostCategoryQuery();
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
	 * @return    teBlogPostCategory|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = teBlogPostCategoryPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    teBlogPostCategoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(teBlogPostCategoryPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    teBlogPostCategoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(teBlogPostCategoryPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostCategoryQuery The current query, for fluid interface
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
		return $this->addUsingAlias(teBlogPostCategoryPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostCategoryQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(teBlogPostCategoryPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostCategoryQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(teBlogPostCategoryPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(teBlogPostCategoryPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(teBlogPostCategoryPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostCategoryQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(teBlogPostCategoryPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(teBlogPostCategoryPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(teBlogPostCategoryPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query on the slug column
	 * 
	 * @param     string $slug The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostCategoryQuery The current query, for fluid interface
	 */
	public function filterBySlug($slug = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($slug)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $slug)) {
				$slug = str_replace('*', '%', $slug);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(teBlogPostCategoryPeer::SLUG, $slug, $comparison);
	}

	/**
	 * Filter the query by a related teBlogPostToCategoryLink object
	 *
	 * @param     teBlogPostToCategoryLink $teBlogPostToCategoryLink  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostCategoryQuery The current query, for fluid interface
	 */
	public function filterByteBlogPostToCategoryLink($teBlogPostToCategoryLink, $comparison = null)
	{
		return $this
			->addUsingAlias(teBlogPostCategoryPeer::ID, $teBlogPostToCategoryLink->getCategoryId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the teBlogPostToCategoryLink relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    teBlogPostCategoryQuery The current query, for fluid interface
	 */
	public function jointeBlogPostToCategoryLink($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('teBlogPostToCategoryLink');
		
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
			$this->addJoinObject($join, 'teBlogPostToCategoryLink');
		}
		
		return $this;
	}

	/**
	 * Use the teBlogPostToCategoryLink relation teBlogPostToCategoryLink object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    teBlogPostToCategoryLinkQuery A secondary query class using the current class as primary query
	 */
	public function useteBlogPostToCategoryLinkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->jointeBlogPostToCategoryLink($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'teBlogPostToCategoryLink', 'teBlogPostToCategoryLinkQuery');
	}

	/**
	 * Filter the query by a related teBlogPost object
	 * using the te_blog_posts_to_categories table as cross reference
	 *
	 * @param     teBlogPost $teBlogPost the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostCategoryQuery The current query, for fluid interface
	 */
	public function filterByPost($teBlogPost, $comparison = Criteria::EQUAL)
	{
		return $this
			->useteBlogPostToCategoryLinkQuery()
				->filterByPost($teBlogPost, $comparison)
			->endUse();
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param     teBlogPostCategory $teBlogPostCategory Object to remove from the list of results
	 *
	 * @return    teBlogPostCategoryQuery The current query, for fluid interface
	 */
	public function prune($teBlogPostCategory = null)
	{
		if ($teBlogPostCategory) {
			$this->addUsingAlias(teBlogPostCategoryPeer::ID, $teBlogPostCategory->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	// timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     teBlogPostCategoryQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(teBlogPostCategoryPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     teBlogPostCategoryQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(teBlogPostCategoryPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     teBlogPostCategoryQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(teBlogPostCategoryPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     teBlogPostCategoryQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(teBlogPostCategoryPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     teBlogPostCategoryQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(teBlogPostCategoryPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     teBlogPostCategoryQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(teBlogPostCategoryPeer::CREATED_AT);
	}

	// sluggable behavior
	
	/**
	 * Find one object based on its slug
	 * 
	 * @param     string $slug The value to use as filter.
	 * @param     PropelPDO $con The optional connection object
	 *
	 * @return    teBlogPostCategory the result, formatted by the current formatter
	 */
	public function findOneBySlug($slug, $con = null)
	{
		return $this->filterBySlug($slug)->findOne($con);
	}

} // BaseteBlogPostCategoryQuery
