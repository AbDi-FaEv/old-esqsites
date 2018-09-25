<?php


/**
 * Base class that represents a query for the 'sf_comment' table.
 *
 * 
 *
 * @method     sfCommentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     sfCommentQuery orderByCommentableModel($order = Criteria::ASC) Order by the commentable_model column
 * @method     sfCommentQuery orderByCommentableId($order = Criteria::ASC) Order by the commentable_id column
 * @method     sfCommentQuery orderByCommentNamespace($order = Criteria::ASC) Order by the comment_namespace column
 * @method     sfCommentQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     sfCommentQuery orderByText($order = Criteria::ASC) Order by the text column
 * @method     sfCommentQuery orderByAuthorId($order = Criteria::ASC) Order by the author_id column
 * @method     sfCommentQuery orderByAuthorName($order = Criteria::ASC) Order by the author_name column
 * @method     sfCommentQuery orderByAuthorEmail($order = Criteria::ASC) Order by the author_email column
 * @method     sfCommentQuery orderByAuthorWebsite($order = Criteria::ASC) Order by the author_website column
 * @method     sfCommentQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method     sfCommentQuery groupById() Group by the id column
 * @method     sfCommentQuery groupByCommentableModel() Group by the commentable_model column
 * @method     sfCommentQuery groupByCommentableId() Group by the commentable_id column
 * @method     sfCommentQuery groupByCommentNamespace() Group by the comment_namespace column
 * @method     sfCommentQuery groupByTitle() Group by the title column
 * @method     sfCommentQuery groupByText() Group by the text column
 * @method     sfCommentQuery groupByAuthorId() Group by the author_id column
 * @method     sfCommentQuery groupByAuthorName() Group by the author_name column
 * @method     sfCommentQuery groupByAuthorEmail() Group by the author_email column
 * @method     sfCommentQuery groupByAuthorWebsite() Group by the author_website column
 * @method     sfCommentQuery groupByCreatedAt() Group by the created_at column
 *
 * @method     sfCommentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     sfCommentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     sfCommentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     sfCommentQuery leftJoinAuthor($relationAlias = null) Adds a LEFT JOIN clause to the query using the Author relation
 * @method     sfCommentQuery rightJoinAuthor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Author relation
 * @method     sfCommentQuery innerJoinAuthor($relationAlias = null) Adds a INNER JOIN clause to the query using the Author relation
 *
 * @method     sfComment findOne(PropelPDO $con = null) Return the first sfComment matching the query
 * @method     sfComment findOneOrCreate(PropelPDO $con = null) Return the first sfComment matching the query, or a new sfComment object populated from the query conditions when no match is found
 *
 * @method     sfComment findOneById(int $id) Return the first sfComment filtered by the id column
 * @method     sfComment findOneByCommentableModel(string $commentable_model) Return the first sfComment filtered by the commentable_model column
 * @method     sfComment findOneByCommentableId(string $commentable_id) Return the first sfComment filtered by the commentable_id column
 * @method     sfComment findOneByCommentNamespace(string $comment_namespace) Return the first sfComment filtered by the comment_namespace column
 * @method     sfComment findOneByTitle(string $title) Return the first sfComment filtered by the title column
 * @method     sfComment findOneByText(string $text) Return the first sfComment filtered by the text column
 * @method     sfComment findOneByAuthorId(int $author_id) Return the first sfComment filtered by the author_id column
 * @method     sfComment findOneByAuthorName(string $author_name) Return the first sfComment filtered by the author_name column
 * @method     sfComment findOneByAuthorEmail(string $author_email) Return the first sfComment filtered by the author_email column
 * @method     sfComment findOneByAuthorWebsite(string $author_website) Return the first sfComment filtered by the author_website column
 * @method     sfComment findOneByCreatedAt(string $created_at) Return the first sfComment filtered by the created_at column
 *
 * @method     array findById(int $id) Return sfComment objects filtered by the id column
 * @method     array findByCommentableModel(string $commentable_model) Return sfComment objects filtered by the commentable_model column
 * @method     array findByCommentableId(string $commentable_id) Return sfComment objects filtered by the commentable_id column
 * @method     array findByCommentNamespace(string $comment_namespace) Return sfComment objects filtered by the comment_namespace column
 * @method     array findByTitle(string $title) Return sfComment objects filtered by the title column
 * @method     array findByText(string $text) Return sfComment objects filtered by the text column
 * @method     array findByAuthorId(int $author_id) Return sfComment objects filtered by the author_id column
 * @method     array findByAuthorName(string $author_name) Return sfComment objects filtered by the author_name column
 * @method     array findByAuthorEmail(string $author_email) Return sfComment objects filtered by the author_email column
 * @method     array findByAuthorWebsite(string $author_website) Return sfComment objects filtered by the author_website column
 * @method     array findByCreatedAt(string $created_at) Return sfComment objects filtered by the created_at column
 *
 * @package    propel.generator.plugins.sfPropelActAsCommentableBehaviorPlugin.lib.model.om
 */
abstract class BasesfCommentQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasesfCommentQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'sfComment', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new sfCommentQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    sfCommentQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof sfCommentQuery) {
			return $criteria;
		}
		$query = new sfCommentQuery();
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
	 * @return    sfComment|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = sfCommentPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    sfCommentQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(sfCommentPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    sfCommentQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(sfCommentPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfCommentQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(sfCommentPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the commentable_model column
	 * 
	 * @param     string $commentableModel The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfCommentQuery The current query, for fluid interface
	 */
	public function filterByCommentableModel($commentableModel = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($commentableModel)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $commentableModel)) {
				$commentableModel = str_replace('*', '%', $commentableModel);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(sfCommentPeer::COMMENTABLE_MODEL, $commentableModel, $comparison);
	}

	/**
	 * Filter the query on the commentable_id column
	 * 
	 * @param     string $commentableId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfCommentQuery The current query, for fluid interface
	 */
	public function filterByCommentableId($commentableId = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($commentableId)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $commentableId)) {
				$commentableId = str_replace('*', '%', $commentableId);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(sfCommentPeer::COMMENTABLE_ID, $commentableId, $comparison);
	}

	/**
	 * Filter the query on the comment_namespace column
	 * 
	 * @param     string $commentNamespace The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfCommentQuery The current query, for fluid interface
	 */
	public function filterByCommentNamespace($commentNamespace = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($commentNamespace)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $commentNamespace)) {
				$commentNamespace = str_replace('*', '%', $commentNamespace);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(sfCommentPeer::COMMENT_NAMESPACE, $commentNamespace, $comparison);
	}

	/**
	 * Filter the query on the title column
	 * 
	 * @param     string $title The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfCommentQuery The current query, for fluid interface
	 */
	public function filterByTitle($title = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($title)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $title)) {
				$title = str_replace('*', '%', $title);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(sfCommentPeer::TITLE, $title, $comparison);
	}

	/**
	 * Filter the query on the text column
	 * 
	 * @param     string $text The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfCommentQuery The current query, for fluid interface
	 */
	public function filterByText($text = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($text)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $text)) {
				$text = str_replace('*', '%', $text);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(sfCommentPeer::TEXT, $text, $comparison);
	}

	/**
	 * Filter the query on the author_id column
	 * 
	 * @param     int|array $authorId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfCommentQuery The current query, for fluid interface
	 */
	public function filterByAuthorId($authorId = null, $comparison = null)
	{
		if (is_array($authorId)) {
			$useMinMax = false;
			if (isset($authorId['min'])) {
				$this->addUsingAlias(sfCommentPeer::AUTHOR_ID, $authorId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($authorId['max'])) {
				$this->addUsingAlias(sfCommentPeer::AUTHOR_ID, $authorId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(sfCommentPeer::AUTHOR_ID, $authorId, $comparison);
	}

	/**
	 * Filter the query on the author_name column
	 * 
	 * @param     string $authorName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfCommentQuery The current query, for fluid interface
	 */
	public function filterByAuthorName($authorName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($authorName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $authorName)) {
				$authorName = str_replace('*', '%', $authorName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(sfCommentPeer::AUTHOR_NAME, $authorName, $comparison);
	}

	/**
	 * Filter the query on the author_email column
	 * 
	 * @param     string $authorEmail The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfCommentQuery The current query, for fluid interface
	 */
	public function filterByAuthorEmail($authorEmail = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($authorEmail)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $authorEmail)) {
				$authorEmail = str_replace('*', '%', $authorEmail);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(sfCommentPeer::AUTHOR_EMAIL, $authorEmail, $comparison);
	}

	/**
	 * Filter the query on the author_website column
	 * 
	 * @param     string $authorWebsite The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfCommentQuery The current query, for fluid interface
	 */
	public function filterByAuthorWebsite($authorWebsite = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($authorWebsite)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $authorWebsite)) {
				$authorWebsite = str_replace('*', '%', $authorWebsite);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(sfCommentPeer::AUTHOR_WEBSITE, $authorWebsite, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfCommentQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(sfCommentPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(sfCommentPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(sfCommentPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query by a related sfGuardUser object
	 *
	 * @param     sfGuardUser $sfGuardUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfCommentQuery The current query, for fluid interface
	 */
	public function filterByAuthor($sfGuardUser, $comparison = null)
	{
		return $this
			->addUsingAlias(sfCommentPeer::AUTHOR_ID, $sfGuardUser->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Author relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfCommentQuery The current query, for fluid interface
	 */
	public function joinAuthor($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Author');
		
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
			$this->addJoinObject($join, 'Author');
		}
		
		return $this;
	}

	/**
	 * Use the Author relation sfGuardUser object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserQuery A secondary query class using the current class as primary query
	 */
	public function useAuthorQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinAuthor($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Author', 'sfGuardUserQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     sfComment $sfComment Object to remove from the list of results
	 *
	 * @return    sfCommentQuery The current query, for fluid interface
	 */
	public function prune($sfComment = null)
	{
		if ($sfComment) {
			$this->addUsingAlias(sfCommentPeer::ID, $sfComment->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BasesfCommentQuery
