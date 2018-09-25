<?php


/**
 * Base class that represents a query for the 'te_form_submissions' table.
 *
 * 
 *
 * @method     teFormSubmissionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     teFormSubmissionQuery orderByFormType($order = Criteria::ASC) Order by the form_type column
 * @method     teFormSubmissionQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method     teFormSubmissionQuery orderByIsViewed($order = Criteria::ASC) Order by the is_viewed column
 * @method     teFormSubmissionQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     teFormSubmissionQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     teFormSubmissionQuery groupById() Group by the id column
 * @method     teFormSubmissionQuery groupByFormType() Group by the form_type column
 * @method     teFormSubmissionQuery groupByContent() Group by the content column
 * @method     teFormSubmissionQuery groupByIsViewed() Group by the is_viewed column
 * @method     teFormSubmissionQuery groupByCreatedAt() Group by the created_at column
 * @method     teFormSubmissionQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     teFormSubmissionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     teFormSubmissionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     teFormSubmissionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     teFormSubmission findOne(PropelPDO $con = null) Return the first teFormSubmission matching the query
 * @method     teFormSubmission findOneOrCreate(PropelPDO $con = null) Return the first teFormSubmission matching the query, or a new teFormSubmission object populated from the query conditions when no match is found
 *
 * @method     teFormSubmission findOneById(int $id) Return the first teFormSubmission filtered by the id column
 * @method     teFormSubmission findOneByFormType(string $form_type) Return the first teFormSubmission filtered by the form_type column
 * @method     teFormSubmission findOneByContent(string $content) Return the first teFormSubmission filtered by the content column
 * @method     teFormSubmission findOneByIsViewed(boolean $is_viewed) Return the first teFormSubmission filtered by the is_viewed column
 * @method     teFormSubmission findOneByCreatedAt(string $created_at) Return the first teFormSubmission filtered by the created_at column
 * @method     teFormSubmission findOneByUpdatedAt(string $updated_at) Return the first teFormSubmission filtered by the updated_at column
 *
 * @method     array findById(int $id) Return teFormSubmission objects filtered by the id column
 * @method     array findByFormType(string $form_type) Return teFormSubmission objects filtered by the form_type column
 * @method     array findByContent(string $content) Return teFormSubmission objects filtered by the content column
 * @method     array findByIsViewed(boolean $is_viewed) Return teFormSubmission objects filtered by the is_viewed column
 * @method     array findByCreatedAt(string $created_at) Return teFormSubmission objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return teFormSubmission objects filtered by the updated_at column
 *
 * @package    propel.generator.plugins.teFormHandlerPlugin.lib.model.om
 */
abstract class BaseteFormSubmissionQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseteFormSubmissionQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'teFormSubmission', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new teFormSubmissionQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    teFormSubmissionQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof teFormSubmissionQuery) {
			return $criteria;
		}
		$query = new teFormSubmissionQuery();
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
	 * @return    teFormSubmission|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = teFormSubmissionPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    teFormSubmissionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(teFormSubmissionPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    teFormSubmissionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(teFormSubmissionPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teFormSubmissionQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(teFormSubmissionPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the form_type column
	 * 
	 * @param     string $formType The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teFormSubmissionQuery The current query, for fluid interface
	 */
	public function filterByFormType($formType = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($formType)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $formType)) {
				$formType = str_replace('*', '%', $formType);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(teFormSubmissionPeer::FORM_TYPE, $formType, $comparison);
	}

	/**
	 * Filter the query on the content column
	 * 
	 * @param     string $content The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teFormSubmissionQuery The current query, for fluid interface
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
		return $this->addUsingAlias(teFormSubmissionPeer::CONTENT, $content, $comparison);
	}

	/**
	 * Filter the query on the is_viewed column
	 * 
	 * @param     boolean|string $isViewed The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teFormSubmissionQuery The current query, for fluid interface
	 */
	public function filterByIsViewed($isViewed = null, $comparison = null)
	{
		if (is_string($isViewed)) {
			$is_viewed = in_array(strtolower($isViewed), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(teFormSubmissionPeer::IS_VIEWED, $isViewed, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teFormSubmissionQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(teFormSubmissionPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(teFormSubmissionPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(teFormSubmissionPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teFormSubmissionQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(teFormSubmissionPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(teFormSubmissionPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(teFormSubmissionPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     teFormSubmission $teFormSubmission Object to remove from the list of results
	 *
	 * @return    teFormSubmissionQuery The current query, for fluid interface
	 */
	public function prune($teFormSubmission = null)
	{
		if ($teFormSubmission) {
			$this->addUsingAlias(teFormSubmissionPeer::ID, $teFormSubmission->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	// timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     teFormSubmissionQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(teFormSubmissionPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     teFormSubmissionQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(teFormSubmissionPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     teFormSubmissionQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(teFormSubmissionPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     teFormSubmissionQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(teFormSubmissionPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     teFormSubmissionQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(teFormSubmissionPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     teFormSubmissionQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(teFormSubmissionPeer::CREATED_AT);
	}

} // BaseteFormSubmissionQuery
