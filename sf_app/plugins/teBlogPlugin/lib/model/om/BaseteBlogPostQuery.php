<?php


/**
 * Base class that represents a query for the 'te_blog_post' table.
 *
 * 
 *
 * @method     teBlogPostQuery orderByAuthorId($order = Criteria::ASC) Order by the author_id column
 * @method     teBlogPostQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     teBlogPostQuery orderByExtract($order = Criteria::ASC) Order by the extract column
 * @method     teBlogPostQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method     teBlogPostQuery orderByIsPublished($order = Criteria::ASC) Order by the is_published column
 * @method     teBlogPostQuery orderByAllowComments($order = Criteria::ASC) Order by the allow_comments column
 * @method     teBlogPostQuery orderByPublishedAt($order = Criteria::ASC) Order by the published_at column
 * @method     teBlogPostQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     teBlogPostQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 * @method     teBlogPostQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     teBlogPostQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     teBlogPostQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     teBlogPostQuery orderBySlug($order = Criteria::ASC) Order by the slug column
 *
 * @method     teBlogPostQuery groupByAuthorId() Group by the author_id column
 * @method     teBlogPostQuery groupByTitle() Group by the title column
 * @method     teBlogPostQuery groupByExtract() Group by the extract column
 * @method     teBlogPostQuery groupByContent() Group by the content column
 * @method     teBlogPostQuery groupByIsPublished() Group by the is_published column
 * @method     teBlogPostQuery groupByAllowComments() Group by the allow_comments column
 * @method     teBlogPostQuery groupByPublishedAt() Group by the published_at column
 * @method     teBlogPostQuery groupByCreatedBy() Group by the created_by column
 * @method     teBlogPostQuery groupByUpdatedBy() Group by the updated_by column
 * @method     teBlogPostQuery groupById() Group by the id column
 * @method     teBlogPostQuery groupByCreatedAt() Group by the created_at column
 * @method     teBlogPostQuery groupByUpdatedAt() Group by the updated_at column
 * @method     teBlogPostQuery groupBySlug() Group by the slug column
 *
 * @method     teBlogPostQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     teBlogPostQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     teBlogPostQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     teBlogPostQuery leftJoinAuthor($relationAlias = null) Adds a LEFT JOIN clause to the query using the Author relation
 * @method     teBlogPostQuery rightJoinAuthor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Author relation
 * @method     teBlogPostQuery innerJoinAuthor($relationAlias = null) Adds a INNER JOIN clause to the query using the Author relation
 *
 * @method     teBlogPostQuery leftJoinCreator($relationAlias = null) Adds a LEFT JOIN clause to the query using the Creator relation
 * @method     teBlogPostQuery rightJoinCreator($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Creator relation
 * @method     teBlogPostQuery innerJoinCreator($relationAlias = null) Adds a INNER JOIN clause to the query using the Creator relation
 *
 * @method     teBlogPostQuery leftJoinUpdater($relationAlias = null) Adds a LEFT JOIN clause to the query using the Updater relation
 * @method     teBlogPostQuery rightJoinUpdater($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Updater relation
 * @method     teBlogPostQuery innerJoinUpdater($relationAlias = null) Adds a INNER JOIN clause to the query using the Updater relation
 *
 * @method     teBlogPostQuery leftJointeBlogPostToCategoryLink($relationAlias = null) Adds a LEFT JOIN clause to the query using the teBlogPostToCategoryLink relation
 * @method     teBlogPostQuery rightJointeBlogPostToCategoryLink($relationAlias = null) Adds a RIGHT JOIN clause to the query using the teBlogPostToCategoryLink relation
 * @method     teBlogPostQuery innerJointeBlogPostToCategoryLink($relationAlias = null) Adds a INNER JOIN clause to the query using the teBlogPostToCategoryLink relation
 *
 * @method     teBlogPost findOne(PropelPDO $con = null) Return the first teBlogPost matching the query
 * @method     teBlogPost findOneOrCreate(PropelPDO $con = null) Return the first teBlogPost matching the query, or a new teBlogPost object populated from the query conditions when no match is found
 *
 * @method     teBlogPost findOneByAuthorId(int $author_id) Return the first teBlogPost filtered by the author_id column
 * @method     teBlogPost findOneByTitle(string $title) Return the first teBlogPost filtered by the title column
 * @method     teBlogPost findOneByExtract(string $extract) Return the first teBlogPost filtered by the extract column
 * @method     teBlogPost findOneByContent(string $content) Return the first teBlogPost filtered by the content column
 * @method     teBlogPost findOneByIsPublished(boolean $is_published) Return the first teBlogPost filtered by the is_published column
 * @method     teBlogPost findOneByAllowComments(boolean $allow_comments) Return the first teBlogPost filtered by the allow_comments column
 * @method     teBlogPost findOneByPublishedAt(string $published_at) Return the first teBlogPost filtered by the published_at column
 * @method     teBlogPost findOneByCreatedBy(int $created_by) Return the first teBlogPost filtered by the created_by column
 * @method     teBlogPost findOneByUpdatedBy(int $updated_by) Return the first teBlogPost filtered by the updated_by column
 * @method     teBlogPost findOneById(int $id) Return the first teBlogPost filtered by the id column
 * @method     teBlogPost findOneByCreatedAt(string $created_at) Return the first teBlogPost filtered by the created_at column
 * @method     teBlogPost findOneByUpdatedAt(string $updated_at) Return the first teBlogPost filtered by the updated_at column
 * @method     teBlogPost findOneBySlug(string $slug) Return the first teBlogPost filtered by the slug column
 *
 * @method     array findByAuthorId(int $author_id) Return teBlogPost objects filtered by the author_id column
 * @method     array findByTitle(string $title) Return teBlogPost objects filtered by the title column
 * @method     array findByExtract(string $extract) Return teBlogPost objects filtered by the extract column
 * @method     array findByContent(string $content) Return teBlogPost objects filtered by the content column
 * @method     array findByIsPublished(boolean $is_published) Return teBlogPost objects filtered by the is_published column
 * @method     array findByAllowComments(boolean $allow_comments) Return teBlogPost objects filtered by the allow_comments column
 * @method     array findByPublishedAt(string $published_at) Return teBlogPost objects filtered by the published_at column
 * @method     array findByCreatedBy(int $created_by) Return teBlogPost objects filtered by the created_by column
 * @method     array findByUpdatedBy(int $updated_by) Return teBlogPost objects filtered by the updated_by column
 * @method     array findById(int $id) Return teBlogPost objects filtered by the id column
 * @method     array findByCreatedAt(string $created_at) Return teBlogPost objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return teBlogPost objects filtered by the updated_at column
 * @method     array findBySlug(string $slug) Return teBlogPost objects filtered by the slug column
 *
 * @package    propel.generator.plugins.teBlogPlugin.lib.model.om
 */
abstract class BaseteBlogPostQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseteBlogPostQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'teBlogPost', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new teBlogPostQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    teBlogPostQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof teBlogPostQuery) {
			return $criteria;
		}
		$query = new teBlogPostQuery();
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
	 * @return    teBlogPost|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = teBlogPostPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    teBlogPostQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(teBlogPostPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    teBlogPostQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(teBlogPostPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the author_id column
	 * 
	 * @param     int|array $authorId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostQuery The current query, for fluid interface
	 */
	public function filterByAuthorId($authorId = null, $comparison = null)
	{
		if (is_array($authorId)) {
			$useMinMax = false;
			if (isset($authorId['min'])) {
				$this->addUsingAlias(teBlogPostPeer::AUTHOR_ID, $authorId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($authorId['max'])) {
				$this->addUsingAlias(teBlogPostPeer::AUTHOR_ID, $authorId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(teBlogPostPeer::AUTHOR_ID, $authorId, $comparison);
	}

	/**
	 * Filter the query on the title column
	 * 
	 * @param     string $title The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostQuery The current query, for fluid interface
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
		return $this->addUsingAlias(teBlogPostPeer::TITLE, $title, $comparison);
	}

	/**
	 * Filter the query on the extract column
	 * 
	 * @param     string $extract The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostQuery The current query, for fluid interface
	 */
	public function filterByExtract($extract = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($extract)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $extract)) {
				$extract = str_replace('*', '%', $extract);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(teBlogPostPeer::EXTRACT, $extract, $comparison);
	}

	/**
	 * Filter the query on the content column
	 * 
	 * @param     string $content The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostQuery The current query, for fluid interface
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
		return $this->addUsingAlias(teBlogPostPeer::CONTENT, $content, $comparison);
	}

	/**
	 * Filter the query on the is_published column
	 * 
	 * @param     boolean|string $isPublished The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostQuery The current query, for fluid interface
	 */
	public function filterByIsPublished($isPublished = null, $comparison = null)
	{
		if (is_string($isPublished)) {
			$is_published = in_array(strtolower($isPublished), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(teBlogPostPeer::IS_PUBLISHED, $isPublished, $comparison);
	}

	/**
	 * Filter the query on the allow_comments column
	 * 
	 * @param     boolean|string $allowComments The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostQuery The current query, for fluid interface
	 */
	public function filterByAllowComments($allowComments = null, $comparison = null)
	{
		if (is_string($allowComments)) {
			$allow_comments = in_array(strtolower($allowComments), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(teBlogPostPeer::ALLOW_COMMENTS, $allowComments, $comparison);
	}

	/**
	 * Filter the query on the published_at column
	 * 
	 * @param     string|array $publishedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostQuery The current query, for fluid interface
	 */
	public function filterByPublishedAt($publishedAt = null, $comparison = null)
	{
		if (is_array($publishedAt)) {
			$useMinMax = false;
			if (isset($publishedAt['min'])) {
				$this->addUsingAlias(teBlogPostPeer::PUBLISHED_AT, $publishedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($publishedAt['max'])) {
				$this->addUsingAlias(teBlogPostPeer::PUBLISHED_AT, $publishedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(teBlogPostPeer::PUBLISHED_AT, $publishedAt, $comparison);
	}

	/**
	 * Filter the query on the created_by column
	 * 
	 * @param     int|array $createdBy The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostQuery The current query, for fluid interface
	 */
	public function filterByCreatedBy($createdBy = null, $comparison = null)
	{
		if (is_array($createdBy)) {
			$useMinMax = false;
			if (isset($createdBy['min'])) {
				$this->addUsingAlias(teBlogPostPeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdBy['max'])) {
				$this->addUsingAlias(teBlogPostPeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(teBlogPostPeer::CREATED_BY, $createdBy, $comparison);
	}

	/**
	 * Filter the query on the updated_by column
	 * 
	 * @param     int|array $updatedBy The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostQuery The current query, for fluid interface
	 */
	public function filterByUpdatedBy($updatedBy = null, $comparison = null)
	{
		if (is_array($updatedBy)) {
			$useMinMax = false;
			if (isset($updatedBy['min'])) {
				$this->addUsingAlias(teBlogPostPeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedBy['max'])) {
				$this->addUsingAlias(teBlogPostPeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(teBlogPostPeer::UPDATED_BY, $updatedBy, $comparison);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(teBlogPostPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(teBlogPostPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(teBlogPostPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(teBlogPostPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(teBlogPostPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(teBlogPostPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(teBlogPostPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query on the slug column
	 * 
	 * @param     string $slug The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostQuery The current query, for fluid interface
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
		return $this->addUsingAlias(teBlogPostPeer::SLUG, $slug, $comparison);
	}

	/**
	 * Filter the query by a related sfGuardUser object
	 *
	 * @param     sfGuardUser $sfGuardUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostQuery The current query, for fluid interface
	 */
	public function filterByAuthor($sfGuardUser, $comparison = null)
	{
		return $this
			->addUsingAlias(teBlogPostPeer::AUTHOR_ID, $sfGuardUser->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Author relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    teBlogPostQuery The current query, for fluid interface
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
	 * Filter the query by a related sfGuardUser object
	 *
	 * @param     sfGuardUser $sfGuardUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostQuery The current query, for fluid interface
	 */
	public function filterByCreator($sfGuardUser, $comparison = null)
	{
		return $this
			->addUsingAlias(teBlogPostPeer::CREATED_BY, $sfGuardUser->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Creator relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    teBlogPostQuery The current query, for fluid interface
	 */
	public function joinCreator($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Creator');
		
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
			$this->addJoinObject($join, 'Creator');
		}
		
		return $this;
	}

	/**
	 * Use the Creator relation sfGuardUser object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserQuery A secondary query class using the current class as primary query
	 */
	public function useCreatorQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinCreator($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Creator', 'sfGuardUserQuery');
	}

	/**
	 * Filter the query by a related sfGuardUser object
	 *
	 * @param     sfGuardUser $sfGuardUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostQuery The current query, for fluid interface
	 */
	public function filterByUpdater($sfGuardUser, $comparison = null)
	{
		return $this
			->addUsingAlias(teBlogPostPeer::UPDATED_BY, $sfGuardUser->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Updater relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    teBlogPostQuery The current query, for fluid interface
	 */
	public function joinUpdater($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Updater');
		
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
			$this->addJoinObject($join, 'Updater');
		}
		
		return $this;
	}

	/**
	 * Use the Updater relation sfGuardUser object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserQuery A secondary query class using the current class as primary query
	 */
	public function useUpdaterQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinUpdater($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Updater', 'sfGuardUserQuery');
	}

	/**
	 * Filter the query by a related teBlogPostToCategoryLink object
	 *
	 * @param     teBlogPostToCategoryLink $teBlogPostToCategoryLink  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostQuery The current query, for fluid interface
	 */
	public function filterByteBlogPostToCategoryLink($teBlogPostToCategoryLink, $comparison = null)
	{
		return $this
			->addUsingAlias(teBlogPostPeer::ID, $teBlogPostToCategoryLink->getPostId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the teBlogPostToCategoryLink relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    teBlogPostQuery The current query, for fluid interface
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
	 * Filter the query by a related teBlogPostCategory object
	 * using the te_blog_posts_to_categories table as cross reference
	 *
	 * @param     teBlogPostCategory $teBlogPostCategory the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teBlogPostQuery The current query, for fluid interface
	 */
	public function filterByCategory($teBlogPostCategory, $comparison = Criteria::EQUAL)
	{
		return $this
			->useteBlogPostToCategoryLinkQuery()
				->filterByCategory($teBlogPostCategory, $comparison)
			->endUse();
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param     teBlogPost $teBlogPost Object to remove from the list of results
	 *
	 * @return    teBlogPostQuery The current query, for fluid interface
	 */
	public function prune($teBlogPost = null)
	{
		if ($teBlogPost) {
			$this->addUsingAlias(teBlogPostPeer::ID, $teBlogPost->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	// timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     teBlogPostQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(teBlogPostPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     teBlogPostQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(teBlogPostPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     teBlogPostQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(teBlogPostPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     teBlogPostQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(teBlogPostPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     teBlogPostQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(teBlogPostPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     teBlogPostQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(teBlogPostPeer::CREATED_AT);
	}

	// sluggable behavior
	
	/**
	 * Find one object based on its slug
	 * 
	 * @param     string $slug The value to use as filter.
	 * @param     PropelPDO $con The optional connection object
	 *
	 * @return    teBlogPost the result, formatted by the current formatter
	 */
	public function findOneBySlug($slug, $con = null)
	{
		return $this->filterBySlug($slug)->findOne($con);
	}

} // BaseteBlogPostQuery
