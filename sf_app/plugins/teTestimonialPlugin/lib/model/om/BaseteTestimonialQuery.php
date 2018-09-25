<?php


/**
 * Base class that represents a query for the 'te_testimonials' table.
 *
 * 
 *
 * @method     teTestimonialQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     teTestimonialQuery orderBySource($order = Criteria::ASC) Order by the source column
 * @method     teTestimonialQuery orderByLocation($order = Criteria::ASC) Order by the location column
 * @method     teTestimonialQuery orderByCompany($order = Criteria::ASC) Order by the company column
 * @method     teTestimonialQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method     teTestimonialQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     teTestimonialQuery orderByIsPublished($order = Criteria::ASC) Order by the is_published column
 * @method     teTestimonialQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     teTestimonialQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     teTestimonialQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     teTestimonialQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method     teTestimonialQuery groupById() Group by the id column
 * @method     teTestimonialQuery groupBySource() Group by the source column
 * @method     teTestimonialQuery groupByLocation() Group by the location column
 * @method     teTestimonialQuery groupByCompany() Group by the company column
 * @method     teTestimonialQuery groupByContent() Group by the content column
 * @method     teTestimonialQuery groupByDate() Group by the date column
 * @method     teTestimonialQuery groupByIsPublished() Group by the is_published column
 * @method     teTestimonialQuery groupByCreatedAt() Group by the created_at column
 * @method     teTestimonialQuery groupByUpdatedAt() Group by the updated_at column
 * @method     teTestimonialQuery groupByCreatedBy() Group by the created_by column
 * @method     teTestimonialQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method     teTestimonialQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     teTestimonialQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     teTestimonialQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     teTestimonialQuery leftJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 * @method     teTestimonialQuery rightJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 * @method     teTestimonialQuery innerJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 *
 * @method     teTestimonialQuery leftJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 * @method     teTestimonialQuery rightJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 * @method     teTestimonialQuery innerJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 *
 * @method     teTestimonial findOne(PropelPDO $con = null) Return the first teTestimonial matching the query
 * @method     teTestimonial findOneOrCreate(PropelPDO $con = null) Return the first teTestimonial matching the query, or a new teTestimonial object populated from the query conditions when no match is found
 *
 * @method     teTestimonial findOneById(int $id) Return the first teTestimonial filtered by the id column
 * @method     teTestimonial findOneBySource(string $source) Return the first teTestimonial filtered by the source column
 * @method     teTestimonial findOneByLocation(string $location) Return the first teTestimonial filtered by the location column
 * @method     teTestimonial findOneByCompany(string $company) Return the first teTestimonial filtered by the company column
 * @method     teTestimonial findOneByContent(string $content) Return the first teTestimonial filtered by the content column
 * @method     teTestimonial findOneByDate(string $date) Return the first teTestimonial filtered by the date column
 * @method     teTestimonial findOneByIsPublished(boolean $is_published) Return the first teTestimonial filtered by the is_published column
 * @method     teTestimonial findOneByCreatedAt(string $created_at) Return the first teTestimonial filtered by the created_at column
 * @method     teTestimonial findOneByUpdatedAt(string $updated_at) Return the first teTestimonial filtered by the updated_at column
 * @method     teTestimonial findOneByCreatedBy(int $created_by) Return the first teTestimonial filtered by the created_by column
 * @method     teTestimonial findOneByUpdatedBy(int $updated_by) Return the first teTestimonial filtered by the updated_by column
 *
 * @method     array findById(int $id) Return teTestimonial objects filtered by the id column
 * @method     array findBySource(string $source) Return teTestimonial objects filtered by the source column
 * @method     array findByLocation(string $location) Return teTestimonial objects filtered by the location column
 * @method     array findByCompany(string $company) Return teTestimonial objects filtered by the company column
 * @method     array findByContent(string $content) Return teTestimonial objects filtered by the content column
 * @method     array findByDate(string $date) Return teTestimonial objects filtered by the date column
 * @method     array findByIsPublished(boolean $is_published) Return teTestimonial objects filtered by the is_published column
 * @method     array findByCreatedAt(string $created_at) Return teTestimonial objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return teTestimonial objects filtered by the updated_at column
 * @method     array findByCreatedBy(int $created_by) Return teTestimonial objects filtered by the created_by column
 * @method     array findByUpdatedBy(int $updated_by) Return teTestimonial objects filtered by the updated_by column
 *
 * @package    propel.generator.plugins.teTestimonialPlugin.lib.model.om
 */
abstract class BaseteTestimonialQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseteTestimonialQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'teTestimonial', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new teTestimonialQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    teTestimonialQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof teTestimonialQuery) {
			return $criteria;
		}
		$query = new teTestimonialQuery();
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
	 * @return    teTestimonial|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = teTestimonialPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    teTestimonialQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(teTestimonialPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    teTestimonialQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(teTestimonialPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teTestimonialQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(teTestimonialPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the source column
	 * 
	 * @param     string $source The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teTestimonialQuery The current query, for fluid interface
	 */
	public function filterBySource($source = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($source)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $source)) {
				$source = str_replace('*', '%', $source);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(teTestimonialPeer::SOURCE, $source, $comparison);
	}

	/**
	 * Filter the query on the location column
	 * 
	 * @param     string $location The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teTestimonialQuery The current query, for fluid interface
	 */
	public function filterByLocation($location = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($location)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $location)) {
				$location = str_replace('*', '%', $location);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(teTestimonialPeer::LOCATION, $location, $comparison);
	}

	/**
	 * Filter the query on the company column
	 * 
	 * @param     string $company The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teTestimonialQuery The current query, for fluid interface
	 */
	public function filterByCompany($company = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($company)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $company)) {
				$company = str_replace('*', '%', $company);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(teTestimonialPeer::COMPANY, $company, $comparison);
	}

	/**
	 * Filter the query on the content column
	 * 
	 * @param     string $content The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teTestimonialQuery The current query, for fluid interface
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
		return $this->addUsingAlias(teTestimonialPeer::CONTENT, $content, $comparison);
	}

	/**
	 * Filter the query on the date column
	 * 
	 * @param     string|array $date The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teTestimonialQuery The current query, for fluid interface
	 */
	public function filterByDate($date = null, $comparison = null)
	{
		if (is_array($date)) {
			$useMinMax = false;
			if (isset($date['min'])) {
				$this->addUsingAlias(teTestimonialPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($date['max'])) {
				$this->addUsingAlias(teTestimonialPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(teTestimonialPeer::DATE, $date, $comparison);
	}

	/**
	 * Filter the query on the is_published column
	 * 
	 * @param     boolean|string $isPublished The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teTestimonialQuery The current query, for fluid interface
	 */
	public function filterByIsPublished($isPublished = null, $comparison = null)
	{
		if (is_string($isPublished)) {
			$is_published = in_array(strtolower($isPublished), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(teTestimonialPeer::IS_PUBLISHED, $isPublished, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teTestimonialQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(teTestimonialPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(teTestimonialPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(teTestimonialPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teTestimonialQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(teTestimonialPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(teTestimonialPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(teTestimonialPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query on the created_by column
	 * 
	 * @param     int|array $createdBy The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teTestimonialQuery The current query, for fluid interface
	 */
	public function filterByCreatedBy($createdBy = null, $comparison = null)
	{
		if (is_array($createdBy)) {
			$useMinMax = false;
			if (isset($createdBy['min'])) {
				$this->addUsingAlias(teTestimonialPeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdBy['max'])) {
				$this->addUsingAlias(teTestimonialPeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(teTestimonialPeer::CREATED_BY, $createdBy, $comparison);
	}

	/**
	 * Filter the query on the updated_by column
	 * 
	 * @param     int|array $updatedBy The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teTestimonialQuery The current query, for fluid interface
	 */
	public function filterByUpdatedBy($updatedBy = null, $comparison = null)
	{
		if (is_array($updatedBy)) {
			$useMinMax = false;
			if (isset($updatedBy['min'])) {
				$this->addUsingAlias(teTestimonialPeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedBy['max'])) {
				$this->addUsingAlias(teTestimonialPeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(teTestimonialPeer::UPDATED_BY, $updatedBy, $comparison);
	}

	/**
	 * Filter the query by a related sfGuardUser object
	 *
	 * @param     sfGuardUser $sfGuardUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teTestimonialQuery The current query, for fluid interface
	 */
	public function filterBysfGuardUserRelatedByCreatedBy($sfGuardUser, $comparison = null)
	{
		return $this
			->addUsingAlias(teTestimonialPeer::CREATED_BY, $sfGuardUser->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    teTestimonialQuery The current query, for fluid interface
	 */
	public function joinsfGuardUserRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('sfGuardUserRelatedByCreatedBy');
		
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
			$this->addJoinObject($join, 'sfGuardUserRelatedByCreatedBy');
		}
		
		return $this;
	}

	/**
	 * Use the sfGuardUserRelatedByCreatedBy relation sfGuardUser object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserQuery A secondary query class using the current class as primary query
	 */
	public function usesfGuardUserRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinsfGuardUserRelatedByCreatedBy($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'sfGuardUserRelatedByCreatedBy', 'sfGuardUserQuery');
	}

	/**
	 * Filter the query by a related sfGuardUser object
	 *
	 * @param     sfGuardUser $sfGuardUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teTestimonialQuery The current query, for fluid interface
	 */
	public function filterBysfGuardUserRelatedByUpdatedBy($sfGuardUser, $comparison = null)
	{
		return $this
			->addUsingAlias(teTestimonialPeer::UPDATED_BY, $sfGuardUser->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    teTestimonialQuery The current query, for fluid interface
	 */
	public function joinsfGuardUserRelatedByUpdatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('sfGuardUserRelatedByUpdatedBy');
		
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
			$this->addJoinObject($join, 'sfGuardUserRelatedByUpdatedBy');
		}
		
		return $this;
	}

	/**
	 * Use the sfGuardUserRelatedByUpdatedBy relation sfGuardUser object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserQuery A secondary query class using the current class as primary query
	 */
	public function usesfGuardUserRelatedByUpdatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinsfGuardUserRelatedByUpdatedBy($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'sfGuardUserRelatedByUpdatedBy', 'sfGuardUserQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     teTestimonial $teTestimonial Object to remove from the list of results
	 *
	 * @return    teTestimonialQuery The current query, for fluid interface
	 */
	public function prune($teTestimonial = null)
	{
		if ($teTestimonial) {
			$this->addUsingAlias(teTestimonialPeer::ID, $teTestimonial->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseteTestimonialQuery
