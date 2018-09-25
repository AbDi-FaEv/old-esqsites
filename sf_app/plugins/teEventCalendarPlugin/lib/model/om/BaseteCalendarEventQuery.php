<?php


/**
 * Base class that represents a query for the 'te_calendar_events' table.
 *
 * 
 *
 * @method     teCalendarEventQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     teCalendarEventQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     teCalendarEventQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     teCalendarEventQuery orderByExtract($order = Criteria::ASC) Order by the extract column
 * @method     teCalendarEventQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     teCalendarEventQuery orderByLocation($order = Criteria::ASC) Order by the location column
 * @method     teCalendarEventQuery orderByIsPublished($order = Criteria::ASC) Order by the is_published column
 * @method     teCalendarEventQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     teCalendarEventQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 * @method     teCalendarEventQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     teCalendarEventQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     teCalendarEventQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     teCalendarEventQuery orderBySlug($order = Criteria::ASC) Order by the slug column
 *
 * @method     teCalendarEventQuery groupByDate() Group by the date column
 * @method     teCalendarEventQuery groupByTime() Group by the time column
 * @method     teCalendarEventQuery groupByTitle() Group by the title column
 * @method     teCalendarEventQuery groupByExtract() Group by the extract column
 * @method     teCalendarEventQuery groupByDescription() Group by the description column
 * @method     teCalendarEventQuery groupByLocation() Group by the location column
 * @method     teCalendarEventQuery groupByIsPublished() Group by the is_published column
 * @method     teCalendarEventQuery groupByCreatedBy() Group by the created_by column
 * @method     teCalendarEventQuery groupByUpdatedBy() Group by the updated_by column
 * @method     teCalendarEventQuery groupById() Group by the id column
 * @method     teCalendarEventQuery groupByCreatedAt() Group by the created_at column
 * @method     teCalendarEventQuery groupByUpdatedAt() Group by the updated_at column
 * @method     teCalendarEventQuery groupBySlug() Group by the slug column
 *
 * @method     teCalendarEventQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     teCalendarEventQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     teCalendarEventQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     teCalendarEventQuery leftJoinCreator($relationAlias = null) Adds a LEFT JOIN clause to the query using the Creator relation
 * @method     teCalendarEventQuery rightJoinCreator($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Creator relation
 * @method     teCalendarEventQuery innerJoinCreator($relationAlias = null) Adds a INNER JOIN clause to the query using the Creator relation
 *
 * @method     teCalendarEventQuery leftJoinUpdater($relationAlias = null) Adds a LEFT JOIN clause to the query using the Updater relation
 * @method     teCalendarEventQuery rightJoinUpdater($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Updater relation
 * @method     teCalendarEventQuery innerJoinUpdater($relationAlias = null) Adds a INNER JOIN clause to the query using the Updater relation
 *
 * @method     teCalendarEvent findOne(PropelPDO $con = null) Return the first teCalendarEvent matching the query
 * @method     teCalendarEvent findOneOrCreate(PropelPDO $con = null) Return the first teCalendarEvent matching the query, or a new teCalendarEvent object populated from the query conditions when no match is found
 *
 * @method     teCalendarEvent findOneByDate(string $date) Return the first teCalendarEvent filtered by the date column
 * @method     teCalendarEvent findOneByTime(string $time) Return the first teCalendarEvent filtered by the time column
 * @method     teCalendarEvent findOneByTitle(string $title) Return the first teCalendarEvent filtered by the title column
 * @method     teCalendarEvent findOneByExtract(string $extract) Return the first teCalendarEvent filtered by the extract column
 * @method     teCalendarEvent findOneByDescription(string $description) Return the first teCalendarEvent filtered by the description column
 * @method     teCalendarEvent findOneByLocation(string $location) Return the first teCalendarEvent filtered by the location column
 * @method     teCalendarEvent findOneByIsPublished(boolean $is_published) Return the first teCalendarEvent filtered by the is_published column
 * @method     teCalendarEvent findOneByCreatedBy(int $created_by) Return the first teCalendarEvent filtered by the created_by column
 * @method     teCalendarEvent findOneByUpdatedBy(int $updated_by) Return the first teCalendarEvent filtered by the updated_by column
 * @method     teCalendarEvent findOneById(int $id) Return the first teCalendarEvent filtered by the id column
 * @method     teCalendarEvent findOneByCreatedAt(string $created_at) Return the first teCalendarEvent filtered by the created_at column
 * @method     teCalendarEvent findOneByUpdatedAt(string $updated_at) Return the first teCalendarEvent filtered by the updated_at column
 * @method     teCalendarEvent findOneBySlug(string $slug) Return the first teCalendarEvent filtered by the slug column
 *
 * @method     array findByDate(string $date) Return teCalendarEvent objects filtered by the date column
 * @method     array findByTime(string $time) Return teCalendarEvent objects filtered by the time column
 * @method     array findByTitle(string $title) Return teCalendarEvent objects filtered by the title column
 * @method     array findByExtract(string $extract) Return teCalendarEvent objects filtered by the extract column
 * @method     array findByDescription(string $description) Return teCalendarEvent objects filtered by the description column
 * @method     array findByLocation(string $location) Return teCalendarEvent objects filtered by the location column
 * @method     array findByIsPublished(boolean $is_published) Return teCalendarEvent objects filtered by the is_published column
 * @method     array findByCreatedBy(int $created_by) Return teCalendarEvent objects filtered by the created_by column
 * @method     array findByUpdatedBy(int $updated_by) Return teCalendarEvent objects filtered by the updated_by column
 * @method     array findById(int $id) Return teCalendarEvent objects filtered by the id column
 * @method     array findByCreatedAt(string $created_at) Return teCalendarEvent objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return teCalendarEvent objects filtered by the updated_at column
 * @method     array findBySlug(string $slug) Return teCalendarEvent objects filtered by the slug column
 *
 * @package    propel.generator.plugins.teEventCalendarPlugin.lib.model.om
 */
abstract class BaseteCalendarEventQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseteCalendarEventQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'teCalendarEvent', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new teCalendarEventQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    teCalendarEventQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof teCalendarEventQuery) {
			return $criteria;
		}
		$query = new teCalendarEventQuery();
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
	 * @return    teCalendarEvent|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = teCalendarEventPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    teCalendarEventQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(teCalendarEventPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    teCalendarEventQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(teCalendarEventPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the date column
	 * 
	 * @param     string|array $date The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teCalendarEventQuery The current query, for fluid interface
	 */
	public function filterByDate($date = null, $comparison = null)
	{
		if (is_array($date)) {
			$useMinMax = false;
			if (isset($date['min'])) {
				$this->addUsingAlias(teCalendarEventPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($date['max'])) {
				$this->addUsingAlias(teCalendarEventPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(teCalendarEventPeer::DATE, $date, $comparison);
	}

	/**
	 * Filter the query on the time column
	 * 
	 * @param     string|array $time The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teCalendarEventQuery The current query, for fluid interface
	 */
	public function filterByTime($time = null, $comparison = null)
	{
		if (is_array($time)) {
			$useMinMax = false;
			if (isset($time['min'])) {
				$this->addUsingAlias(teCalendarEventPeer::TIME, $time['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($time['max'])) {
				$this->addUsingAlias(teCalendarEventPeer::TIME, $time['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(teCalendarEventPeer::TIME, $time, $comparison);
	}

	/**
	 * Filter the query on the title column
	 * 
	 * @param     string $title The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teCalendarEventQuery The current query, for fluid interface
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
		return $this->addUsingAlias(teCalendarEventPeer::TITLE, $title, $comparison);
	}

	/**
	 * Filter the query on the extract column
	 * 
	 * @param     string $extract The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teCalendarEventQuery The current query, for fluid interface
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
		return $this->addUsingAlias(teCalendarEventPeer::EXTRACT, $extract, $comparison);
	}

	/**
	 * Filter the query on the description column
	 * 
	 * @param     string $description The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teCalendarEventQuery The current query, for fluid interface
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
		return $this->addUsingAlias(teCalendarEventPeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query on the location column
	 * 
	 * @param     string $location The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teCalendarEventQuery The current query, for fluid interface
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
		return $this->addUsingAlias(teCalendarEventPeer::LOCATION, $location, $comparison);
	}

	/**
	 * Filter the query on the is_published column
	 * 
	 * @param     boolean|string $isPublished The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teCalendarEventQuery The current query, for fluid interface
	 */
	public function filterByIsPublished($isPublished = null, $comparison = null)
	{
		if (is_string($isPublished)) {
			$is_published = in_array(strtolower($isPublished), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(teCalendarEventPeer::IS_PUBLISHED, $isPublished, $comparison);
	}

	/**
	 * Filter the query on the created_by column
	 * 
	 * @param     int|array $createdBy The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teCalendarEventQuery The current query, for fluid interface
	 */
	public function filterByCreatedBy($createdBy = null, $comparison = null)
	{
		if (is_array($createdBy)) {
			$useMinMax = false;
			if (isset($createdBy['min'])) {
				$this->addUsingAlias(teCalendarEventPeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdBy['max'])) {
				$this->addUsingAlias(teCalendarEventPeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(teCalendarEventPeer::CREATED_BY, $createdBy, $comparison);
	}

	/**
	 * Filter the query on the updated_by column
	 * 
	 * @param     int|array $updatedBy The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teCalendarEventQuery The current query, for fluid interface
	 */
	public function filterByUpdatedBy($updatedBy = null, $comparison = null)
	{
		if (is_array($updatedBy)) {
			$useMinMax = false;
			if (isset($updatedBy['min'])) {
				$this->addUsingAlias(teCalendarEventPeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedBy['max'])) {
				$this->addUsingAlias(teCalendarEventPeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(teCalendarEventPeer::UPDATED_BY, $updatedBy, $comparison);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teCalendarEventQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(teCalendarEventPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teCalendarEventQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(teCalendarEventPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(teCalendarEventPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(teCalendarEventPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teCalendarEventQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(teCalendarEventPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(teCalendarEventPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(teCalendarEventPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query on the slug column
	 * 
	 * @param     string $slug The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teCalendarEventQuery The current query, for fluid interface
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
		return $this->addUsingAlias(teCalendarEventPeer::SLUG, $slug, $comparison);
	}

	/**
	 * Filter the query by a related sfGuardUser object
	 *
	 * @param     sfGuardUser $sfGuardUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teCalendarEventQuery The current query, for fluid interface
	 */
	public function filterByCreator($sfGuardUser, $comparison = null)
	{
		return $this
			->addUsingAlias(teCalendarEventPeer::CREATED_BY, $sfGuardUser->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Creator relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    teCalendarEventQuery The current query, for fluid interface
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
	 * @return    teCalendarEventQuery The current query, for fluid interface
	 */
	public function filterByUpdater($sfGuardUser, $comparison = null)
	{
		return $this
			->addUsingAlias(teCalendarEventPeer::UPDATED_BY, $sfGuardUser->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Updater relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    teCalendarEventQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     teCalendarEvent $teCalendarEvent Object to remove from the list of results
	 *
	 * @return    teCalendarEventQuery The current query, for fluid interface
	 */
	public function prune($teCalendarEvent = null)
	{
		if ($teCalendarEvent) {
			$this->addUsingAlias(teCalendarEventPeer::ID, $teCalendarEvent->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	// timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     teCalendarEventQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(teCalendarEventPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     teCalendarEventQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(teCalendarEventPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     teCalendarEventQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(teCalendarEventPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     teCalendarEventQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(teCalendarEventPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     teCalendarEventQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(teCalendarEventPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     teCalendarEventQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(teCalendarEventPeer::CREATED_AT);
	}

	// sluggable behavior
	
	/**
	 * Find one object based on its slug
	 * 
	 * @param     string $slug The value to use as filter.
	 * @param     PropelPDO $con The optional connection object
	 *
	 * @return    teCalendarEvent the result, formatted by the current formatter
	 */
	public function findOneBySlug($slug, $con = null)
	{
		return $this->filterBySlug($slug)->findOne($con);
	}

} // BaseteCalendarEventQuery
