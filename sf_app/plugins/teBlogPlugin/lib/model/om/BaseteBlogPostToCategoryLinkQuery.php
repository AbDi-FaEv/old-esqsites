<?php


/**
 * Base class that represents a query for the 'te_blog_posts_to_categories' table.
 *
 * 
 *
 * @method     teBlogPostToCategoryLinkQuery orderByPostId($order = Criteria::ASC) Order by the post_id column
 * @method     teBlogPostToCategoryLinkQuery orderByCategoryId($order = Criteria::ASC) Order by the category_id column
 *
 * @method     teBlogPostToCategoryLinkQuery groupByPostId() Group by the post_id column
 * @method     teBlogPostToCategoryLinkQuery groupByCategoryId() Group by the category_id column
 *
 * @method     teBlogPostToCategoryLinkQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     teBlogPostToCategoryLinkQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     teBlogPostToCategoryLinkQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     teBlogPostToCategoryLinkQuery leftJoinPost($relationAlias = null) Adds a LEFT JOIN clause to the query using the Post relation
 * @method     teBlogPostToCategoryLinkQuery rightJoinPost($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Post relation
 * @method     teBlogPostToCategoryLinkQuery innerJoinPost($relationAlias = null) Adds a INNER JOIN clause to the query using the Post relation
 *
 * @method     teBlogPostToCategoryLinkQuery leftJoinCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the Category relation
 * @method     teBlogPostToCategoryLinkQuery rightJoinCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Category relation
 * @method     teBlogPostToCategoryLinkQuery innerJoinCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the Category relation
 *
 * @method     teBlogPostToCategoryLink findOne(PropelPDO $con = null) Return the first teBlogPostToCategoryLink matching the query
 * @method     teBlogPostToCategoryLink findOneOrCreate(PropelPDO $con = null) Return the first teBlogPostToCategoryLink matching the query, or a new teBlogPostToCategoryLink object populated from the query conditions when no match is found
 *
 * @method     teBlogPostToCategoryLink findOneByPostId(int $post_id) Return the first teBlogPostToCategoryLink filtered by the post_id column
 * @method     teBlogPostToCategoryLink findOneByCategoryId(int $category_id) Return the first teBlogPostToCategoryLink filtered by the category_id column
 *
 * @method     array findByPostId(int $post_id) Return teBlogPostToCategoryLink objects filtered by the post_id column
 * @method     array findByCategoryId(int $category_id) Return teBlogPostToCategoryLink objects filtered by the category_id column
 *
 * @package    propel.generator.plugins.teBlogPlugin.lib.model.om
 */
abstract class BaseteBlogPostToCategoryLinkQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseteBlogPostToCategoryLinkQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'teBlogPostToCategoryLink', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new teBlogPostToCategoryLinkQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    teBlogPostToCategoryLinkQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof teBlogPostToCategoryLinkQuery) {
			return $criteria;
		}
		$query = new teBlogPostToCategoryLinkQuery();
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
	 * <code>
	 * $obj = $c->findPk(array(12, 34), $con);
	 * </code>
	 * @param     array[$post_id, $category_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    teBlogPostToCategoryLink|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = teBlogPostToCategoryLinkPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
	 * @return    teBlogPostToCategoryLinkQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(teBlogPostToCategoryLinkPeer::POST_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(teBlogPostToCategoryLinkPeer::CATEGORY_ID, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    teBlogPostToCategoryLinkQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(teBlogPostToCategoryLinkPeer::POST_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(teBlogPostToCategoryLinkPeer::CATEGORY_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}
		
		return $this;
	}

	/**
	 * Filter the query on the post_id column
	 * 
	 * @param     int|array $postId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostToCategoryLinkQuery The current query, for fluid interface
	 */
	public function filterByPostId($postId = null, $comparison = null)
	{
		if (is_array($postId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(teBlogPostToCategoryLinkPeer::POST_ID, $postId, $comparison);
	}

	/**
	 * Filter the query on the category_id column
	 * 
	 * @param     int|array $categoryId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostToCategoryLinkQuery The current query, for fluid interface
	 */
	public function filterByCategoryId($categoryId = null, $comparison = null)
	{
		if (is_array($categoryId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(teBlogPostToCategoryLinkPeer::CATEGORY_ID, $categoryId, $comparison);
	}

	/**
	 * Filter the query by a related teBlogPost object
	 *
	 * @param     teBlogPost $teBlogPost  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostToCategoryLinkQuery The current query, for fluid interface
	 */
	public function filterByPost($teBlogPost, $comparison = null)
	{
		return $this
			->addUsingAlias(teBlogPostToCategoryLinkPeer::POST_ID, $teBlogPost->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Post relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    teBlogPostToCategoryLinkQuery The current query, for fluid interface
	 */
	public function joinPost($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Post');
		
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
			$this->addJoinObject($join, 'Post');
		}
		
		return $this;
	}

	/**
	 * Use the Post relation teBlogPost object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    teBlogPostQuery A secondary query class using the current class as primary query
	 */
	public function usePostQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPost($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Post', 'teBlogPostQuery');
	}

	/**
	 * Filter the query by a related teBlogPostCategory object
	 *
	 * @param     teBlogPostCategory $teBlogPostCategory  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostToCategoryLinkQuery The current query, for fluid interface
	 */
	public function filterByCategory($teBlogPostCategory, $comparison = null)
	{
		return $this
			->addUsingAlias(teBlogPostToCategoryLinkPeer::CATEGORY_ID, $teBlogPostCategory->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Category relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    teBlogPostToCategoryLinkQuery The current query, for fluid interface
	 */
	public function joinCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Category');
		
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
			$this->addJoinObject($join, 'Category');
		}
		
		return $this;
	}

	/**
	 * Use the Category relation teBlogPostCategory object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    teBlogPostCategoryQuery A secondary query class using the current class as primary query
	 */
	public function useCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCategory($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Category', 'teBlogPostCategoryQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     teBlogPostToCategoryLink $teBlogPostToCategoryLink Object to remove from the list of results
	 *
	 * @return    teBlogPostToCategoryLinkQuery The current query, for fluid interface
	 */
	public function prune($teBlogPostToCategoryLink = null)
	{
		if ($teBlogPostToCategoryLink) {
			$this->addCond('pruneCond0', $this->getAliasedColName(teBlogPostToCategoryLinkPeer::POST_ID), $teBlogPostToCategoryLink->getPostId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(teBlogPostToCategoryLinkPeer::CATEGORY_ID), $teBlogPostToCategoryLink->getCategoryId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

} // BaseteBlogPostToCategoryLinkQuery
