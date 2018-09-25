<?php


/**
 * Base class that represents a query for the 'te_faq' table.
 *
 * 
 *
 * @method     teFaqQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     teFaqQuery orderByQuestion($order = Criteria::ASC) Order by the question column
 * @method     teFaqQuery orderByAnswer($order = Criteria::ASC) Order by the answer column
 * @method     teFaqQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     teFaqQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     teFaqQuery groupById() Group by the id column
 * @method     teFaqQuery groupByQuestion() Group by the question column
 * @method     teFaqQuery groupByAnswer() Group by the answer column
 * @method     teFaqQuery groupByCreatedAt() Group by the created_at column
 * @method     teFaqQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     teFaqQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     teFaqQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     teFaqQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     teFaq findOne(PropelPDO $con = null) Return the first teFaq matching the query
 * @method     teFaq findOneOrCreate(PropelPDO $con = null) Return the first teFaq matching the query, or a new teFaq object populated from the query conditions when no match is found
 *
 * @method     teFaq findOneById(int $id) Return the first teFaq filtered by the id column
 * @method     teFaq findOneByQuestion(string $question) Return the first teFaq filtered by the question column
 * @method     teFaq findOneByAnswer(string $answer) Return the first teFaq filtered by the answer column
 * @method     teFaq findOneByCreatedAt(string $created_at) Return the first teFaq filtered by the created_at column
 * @method     teFaq findOneByUpdatedAt(string $updated_at) Return the first teFaq filtered by the updated_at column
 *
 * @method     array findById(int $id) Return teFaq objects filtered by the id column
 * @method     array findByQuestion(string $question) Return teFaq objects filtered by the question column
 * @method     array findByAnswer(string $answer) Return teFaq objects filtered by the answer column
 * @method     array findByCreatedAt(string $created_at) Return teFaq objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return teFaq objects filtered by the updated_at column
 *
 * @package    propel.generator.plugins.teFaqPlugin.lib.model.om
 */
abstract class BaseteFaqQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseteFaqQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'teFaq', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new teFaqQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    teFaqQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof teFaqQuery) {
			return $criteria;
		}
		$query = new teFaqQuery();
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
	 * @return    teFaq|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = teFaqPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    teFaqQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(teFaqPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    teFaqQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(teFaqPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teFaqQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(teFaqPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the question column
	 * 
	 * @param     string $question The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teFaqQuery The current query, for fluid interface
	 */
	public function filterByQuestion($question = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($question)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $question)) {
				$question = str_replace('*', '%', $question);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(teFaqPeer::QUESTION, $question, $comparison);
	}

	/**
	 * Filter the query on the answer column
	 * 
	 * @param     string $answer The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teFaqQuery The current query, for fluid interface
	 */
	public function filterByAnswer($answer = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($answer)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $answer)) {
				$answer = str_replace('*', '%', $answer);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(teFaqPeer::ANSWER, $answer, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teFaqQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(teFaqPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(teFaqPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(teFaqPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teFaqQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(teFaqPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(teFaqPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(teFaqPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     teFaq $teFaq Object to remove from the list of results
	 *
	 * @return    teFaqQuery The current query, for fluid interface
	 */
	public function prune($teFaq = null)
	{
		if ($teFaq) {
			$this->addUsingAlias(teFaqPeer::ID, $teFaq->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	// timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     teFaqQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(teFaqPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     teFaqQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(teFaqPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     teFaqQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(teFaqPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     teFaqQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(teFaqPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     teFaqQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(teFaqPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     teFaqQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(teFaqPeer::CREATED_AT);
	}

} // BaseteFaqQuery
