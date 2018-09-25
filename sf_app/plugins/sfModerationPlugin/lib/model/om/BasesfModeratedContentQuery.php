<?php


/**
 * Base class that represents a query for the 'sf_moderated_content' table.
 *
 * 
 *
 * @method     sfModeratedContentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     sfModeratedContentQuery orderByObjectId($order = Criteria::ASC) Order by the object_id column
 * @method     sfModeratedContentQuery orderByObjectModel($order = Criteria::ASC) Order by the object_model column
 * @method     sfModeratedContentQuery orderByUserName($order = Criteria::ASC) Order by the user_name column
 * @method     sfModeratedContentQuery orderByUserEmail($order = Criteria::ASC) Order by the user_email column
 * @method     sfModeratedContentQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     sfModeratedContentQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method     sfModeratedContentQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     sfModeratedContentQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     sfModeratedContentQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method     sfModeratedContentQuery orderByModeratedAt($order = Criteria::ASC) Order by the moderated_at column
 * @method     sfModeratedContentQuery orderByObjectUpdatedAt($order = Criteria::ASC) Order by the object_updated_at column
 *
 * @method     sfModeratedContentQuery groupById() Group by the id column
 * @method     sfModeratedContentQuery groupByObjectId() Group by the object_id column
 * @method     sfModeratedContentQuery groupByObjectModel() Group by the object_model column
 * @method     sfModeratedContentQuery groupByUserName() Group by the user_name column
 * @method     sfModeratedContentQuery groupByUserEmail() Group by the user_email column
 * @method     sfModeratedContentQuery groupByTitle() Group by the title column
 * @method     sfModeratedContentQuery groupByContent() Group by the content column
 * @method     sfModeratedContentQuery groupByUrl() Group by the url column
 * @method     sfModeratedContentQuery groupByStatus() Group by the status column
 * @method     sfModeratedContentQuery groupByComment() Group by the comment column
 * @method     sfModeratedContentQuery groupByModeratedAt() Group by the moderated_at column
 * @method     sfModeratedContentQuery groupByObjectUpdatedAt() Group by the object_updated_at column
 *
 * @method     sfModeratedContentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     sfModeratedContentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     sfModeratedContentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     sfModeratedContent findOne(PropelPDO $con = null) Return the first sfModeratedContent matching the query
 * @method     sfModeratedContent findOneOrCreate(PropelPDO $con = null) Return the first sfModeratedContent matching the query, or a new sfModeratedContent object populated from the query conditions when no match is found
 *
 * @method     sfModeratedContent findOneById(int $id) Return the first sfModeratedContent filtered by the id column
 * @method     sfModeratedContent findOneByObjectId(int $object_id) Return the first sfModeratedContent filtered by the object_id column
 * @method     sfModeratedContent findOneByObjectModel(string $object_model) Return the first sfModeratedContent filtered by the object_model column
 * @method     sfModeratedContent findOneByUserName(string $user_name) Return the first sfModeratedContent filtered by the user_name column
 * @method     sfModeratedContent findOneByUserEmail(string $user_email) Return the first sfModeratedContent filtered by the user_email column
 * @method     sfModeratedContent findOneByTitle(string $title) Return the first sfModeratedContent filtered by the title column
 * @method     sfModeratedContent findOneByContent(string $content) Return the first sfModeratedContent filtered by the content column
 * @method     sfModeratedContent findOneByUrl(string $url) Return the first sfModeratedContent filtered by the url column
 * @method     sfModeratedContent findOneByStatus(int $status) Return the first sfModeratedContent filtered by the status column
 * @method     sfModeratedContent findOneByComment(string $comment) Return the first sfModeratedContent filtered by the comment column
 * @method     sfModeratedContent findOneByModeratedAt(string $moderated_at) Return the first sfModeratedContent filtered by the moderated_at column
 * @method     sfModeratedContent findOneByObjectUpdatedAt(string $object_updated_at) Return the first sfModeratedContent filtered by the object_updated_at column
 *
 * @method     array findById(int $id) Return sfModeratedContent objects filtered by the id column
 * @method     array findByObjectId(int $object_id) Return sfModeratedContent objects filtered by the object_id column
 * @method     array findByObjectModel(string $object_model) Return sfModeratedContent objects filtered by the object_model column
 * @method     array findByUserName(string $user_name) Return sfModeratedContent objects filtered by the user_name column
 * @method     array findByUserEmail(string $user_email) Return sfModeratedContent objects filtered by the user_email column
 * @method     array findByTitle(string $title) Return sfModeratedContent objects filtered by the title column
 * @method     array findByContent(string $content) Return sfModeratedContent objects filtered by the content column
 * @method     array findByUrl(string $url) Return sfModeratedContent objects filtered by the url column
 * @method     array findByStatus(int $status) Return sfModeratedContent objects filtered by the status column
 * @method     array findByComment(string $comment) Return sfModeratedContent objects filtered by the comment column
 * @method     array findByModeratedAt(string $moderated_at) Return sfModeratedContent objects filtered by the moderated_at column
 * @method     array findByObjectUpdatedAt(string $object_updated_at) Return sfModeratedContent objects filtered by the object_updated_at column
 *
 * @package    propel.generator.plugins.sfModerationPlugin.lib.model.om
 */
abstract class BasesfModeratedContentQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasesfModeratedContentQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'sfModeratedContent', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new sfModeratedContentQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    sfModeratedContentQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof sfModeratedContentQuery) {
			return $criteria;
		}
		$query = new sfModeratedContentQuery();
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
	 * @return    sfModeratedContent|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = sfModeratedContentPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    sfModeratedContentQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(sfModeratedContentPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    sfModeratedContentQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(sfModeratedContentPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfModeratedContentQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(sfModeratedContentPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the object_id column
	 * 
	 * @param     int|array $objectId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfModeratedContentQuery The current query, for fluid interface
	 */
	public function filterByObjectId($objectId = null, $comparison = null)
	{
		if (is_array($objectId)) {
			$useMinMax = false;
			if (isset($objectId['min'])) {
				$this->addUsingAlias(sfModeratedContentPeer::OBJECT_ID, $objectId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($objectId['max'])) {
				$this->addUsingAlias(sfModeratedContentPeer::OBJECT_ID, $objectId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(sfModeratedContentPeer::OBJECT_ID, $objectId, $comparison);
	}

	/**
	 * Filter the query on the object_model column
	 * 
	 * @param     string $objectModel The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfModeratedContentQuery The current query, for fluid interface
	 */
	public function filterByObjectModel($objectModel = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($objectModel)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $objectModel)) {
				$objectModel = str_replace('*', '%', $objectModel);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(sfModeratedContentPeer::OBJECT_MODEL, $objectModel, $comparison);
	}

	/**
	 * Filter the query on the user_name column
	 * 
	 * @param     string $userName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfModeratedContentQuery The current query, for fluid interface
	 */
	public function filterByUserName($userName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($userName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $userName)) {
				$userName = str_replace('*', '%', $userName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(sfModeratedContentPeer::USER_NAME, $userName, $comparison);
	}

	/**
	 * Filter the query on the user_email column
	 * 
	 * @param     string $userEmail The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfModeratedContentQuery The current query, for fluid interface
	 */
	public function filterByUserEmail($userEmail = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($userEmail)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $userEmail)) {
				$userEmail = str_replace('*', '%', $userEmail);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(sfModeratedContentPeer::USER_EMAIL, $userEmail, $comparison);
	}

	/**
	 * Filter the query on the title column
	 * 
	 * @param     string $title The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfModeratedContentQuery The current query, for fluid interface
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
		return $this->addUsingAlias(sfModeratedContentPeer::TITLE, $title, $comparison);
	}

	/**
	 * Filter the query on the content column
	 * 
	 * @param     string $content The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfModeratedContentQuery The current query, for fluid interface
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
		return $this->addUsingAlias(sfModeratedContentPeer::CONTENT, $content, $comparison);
	}

	/**
	 * Filter the query on the url column
	 * 
	 * @param     string $url The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfModeratedContentQuery The current query, for fluid interface
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
		return $this->addUsingAlias(sfModeratedContentPeer::URL, $url, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     int|array $status The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfModeratedContentQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (is_array($status)) {
			$useMinMax = false;
			if (isset($status['min'])) {
				$this->addUsingAlias(sfModeratedContentPeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($status['max'])) {
				$this->addUsingAlias(sfModeratedContentPeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(sfModeratedContentPeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the comment column
	 * 
	 * @param     string $comment The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfModeratedContentQuery The current query, for fluid interface
	 */
	public function filterByComment($comment = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($comment)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $comment)) {
				$comment = str_replace('*', '%', $comment);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(sfModeratedContentPeer::COMMENT, $comment, $comparison);
	}

	/**
	 * Filter the query on the moderated_at column
	 * 
	 * @param     string|array $moderatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfModeratedContentQuery The current query, for fluid interface
	 */
	public function filterByModeratedAt($moderatedAt = null, $comparison = null)
	{
		if (is_array($moderatedAt)) {
			$useMinMax = false;
			if (isset($moderatedAt['min'])) {
				$this->addUsingAlias(sfModeratedContentPeer::MODERATED_AT, $moderatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($moderatedAt['max'])) {
				$this->addUsingAlias(sfModeratedContentPeer::MODERATED_AT, $moderatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(sfModeratedContentPeer::MODERATED_AT, $moderatedAt, $comparison);
	}

	/**
	 * Filter the query on the object_updated_at column
	 * 
	 * @param     string|array $objectUpdatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfModeratedContentQuery The current query, for fluid interface
	 */
	public function filterByObjectUpdatedAt($objectUpdatedAt = null, $comparison = null)
	{
		if (is_array($objectUpdatedAt)) {
			$useMinMax = false;
			if (isset($objectUpdatedAt['min'])) {
				$this->addUsingAlias(sfModeratedContentPeer::OBJECT_UPDATED_AT, $objectUpdatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($objectUpdatedAt['max'])) {
				$this->addUsingAlias(sfModeratedContentPeer::OBJECT_UPDATED_AT, $objectUpdatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(sfModeratedContentPeer::OBJECT_UPDATED_AT, $objectUpdatedAt, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     sfModeratedContent $sfModeratedContent Object to remove from the list of results
	 *
	 * @return    sfModeratedContentQuery The current query, for fluid interface
	 */
	public function prune($sfModeratedContent = null)
	{
		if ($sfModeratedContent) {
			$this->addUsingAlias(sfModeratedContentPeer::ID, $sfModeratedContent->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BasesfModeratedContentQuery
