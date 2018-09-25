<?php


/**
 * Base class that represents a query for the 'te_task_logs' table.
 *
 * 
 *
 * @method     teTaskLogQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     teTaskLogQuery orderByTaskName($order = Criteria::ASC) Order by the task_name column
 * @method     teTaskLogQuery orderByArguments($order = Criteria::ASC) Order by the arguments column
 * @method     teTaskLogQuery orderByOptions($order = Criteria::ASC) Order by the options column
 * @method     teTaskLogQuery orderBySummary($order = Criteria::ASC) Order by the summary column
 * @method     teTaskLogQuery orderByStartedAt($order = Criteria::ASC) Order by the started_at column
 * @method     teTaskLogQuery orderByEndedAt($order = Criteria::ASC) Order by the ended_at column
 * @method     teTaskLogQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     teTaskLogQuery orderByLogFile($order = Criteria::ASC) Order by the log_file column
 *
 * @method     teTaskLogQuery groupById() Group by the id column
 * @method     teTaskLogQuery groupByTaskName() Group by the task_name column
 * @method     teTaskLogQuery groupByArguments() Group by the arguments column
 * @method     teTaskLogQuery groupByOptions() Group by the options column
 * @method     teTaskLogQuery groupBySummary() Group by the summary column
 * @method     teTaskLogQuery groupByStartedAt() Group by the started_at column
 * @method     teTaskLogQuery groupByEndedAt() Group by the ended_at column
 * @method     teTaskLogQuery groupByStatus() Group by the status column
 * @method     teTaskLogQuery groupByLogFile() Group by the log_file column
 *
 * @method     teTaskLogQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     teTaskLogQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     teTaskLogQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     teTaskLog findOne(PropelPDO $con = null) Return the first teTaskLog matching the query
 * @method     teTaskLog findOneOrCreate(PropelPDO $con = null) Return the first teTaskLog matching the query, or a new teTaskLog object populated from the query conditions when no match is found
 *
 * @method     teTaskLog findOneById(int $id) Return the first teTaskLog filtered by the id column
 * @method     teTaskLog findOneByTaskName(string $task_name) Return the first teTaskLog filtered by the task_name column
 * @method     teTaskLog findOneByArguments(string $arguments) Return the first teTaskLog filtered by the arguments column
 * @method     teTaskLog findOneByOptions(string $options) Return the first teTaskLog filtered by the options column
 * @method     teTaskLog findOneBySummary(string $summary) Return the first teTaskLog filtered by the summary column
 * @method     teTaskLog findOneByStartedAt(string $started_at) Return the first teTaskLog filtered by the started_at column
 * @method     teTaskLog findOneByEndedAt(string $ended_at) Return the first teTaskLog filtered by the ended_at column
 * @method     teTaskLog findOneByStatus(string $status) Return the first teTaskLog filtered by the status column
 * @method     teTaskLog findOneByLogFile(string $log_file) Return the first teTaskLog filtered by the log_file column
 *
 * @method     array findById(int $id) Return teTaskLog objects filtered by the id column
 * @method     array findByTaskName(string $task_name) Return teTaskLog objects filtered by the task_name column
 * @method     array findByArguments(string $arguments) Return teTaskLog objects filtered by the arguments column
 * @method     array findByOptions(string $options) Return teTaskLog objects filtered by the options column
 * @method     array findBySummary(string $summary) Return teTaskLog objects filtered by the summary column
 * @method     array findByStartedAt(string $started_at) Return teTaskLog objects filtered by the started_at column
 * @method     array findByEndedAt(string $ended_at) Return teTaskLog objects filtered by the ended_at column
 * @method     array findByStatus(string $status) Return teTaskLog objects filtered by the status column
 * @method     array findByLogFile(string $log_file) Return teTaskLog objects filtered by the log_file column
 *
 * @package    propel.generator.plugins.teTaskLoggerPlugin.lib.model.om
 */
abstract class BaseteTaskLogQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseteTaskLogQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'teTaskLog', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new teTaskLogQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    teTaskLogQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof teTaskLogQuery) {
			return $criteria;
		}
		$query = new teTaskLogQuery();
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
	 * @return    teTaskLog|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = teTaskLogPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    teTaskLogQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(teTaskLogPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    teTaskLogQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(teTaskLogPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teTaskLogQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(teTaskLogPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the task_name column
	 * 
	 * @param     string $taskName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teTaskLogQuery The current query, for fluid interface
	 */
	public function filterByTaskName($taskName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($taskName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $taskName)) {
				$taskName = str_replace('*', '%', $taskName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(teTaskLogPeer::TASK_NAME, $taskName, $comparison);
	}

	/**
	 * Filter the query on the arguments column
	 * 
	 * @param     string $arguments The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teTaskLogQuery The current query, for fluid interface
	 */
	public function filterByArguments($arguments = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($arguments)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $arguments)) {
				$arguments = str_replace('*', '%', $arguments);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(teTaskLogPeer::ARGUMENTS, $arguments, $comparison);
	}

	/**
	 * Filter the query on the options column
	 * 
	 * @param     string $options The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teTaskLogQuery The current query, for fluid interface
	 */
	public function filterByOptions($options = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($options)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $options)) {
				$options = str_replace('*', '%', $options);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(teTaskLogPeer::OPTIONS, $options, $comparison);
	}

	/**
	 * Filter the query on the summary column
	 * 
	 * @param     string $summary The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teTaskLogQuery The current query, for fluid interface
	 */
	public function filterBySummary($summary = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($summary)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $summary)) {
				$summary = str_replace('*', '%', $summary);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(teTaskLogPeer::SUMMARY, $summary, $comparison);
	}

	/**
	 * Filter the query on the started_at column
	 * 
	 * @param     string|array $startedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teTaskLogQuery The current query, for fluid interface
	 */
	public function filterByStartedAt($startedAt = null, $comparison = null)
	{
		if (is_array($startedAt)) {
			$useMinMax = false;
			if (isset($startedAt['min'])) {
				$this->addUsingAlias(teTaskLogPeer::STARTED_AT, $startedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($startedAt['max'])) {
				$this->addUsingAlias(teTaskLogPeer::STARTED_AT, $startedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(teTaskLogPeer::STARTED_AT, $startedAt, $comparison);
	}

	/**
	 * Filter the query on the ended_at column
	 * 
	 * @param     string|array $endedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teTaskLogQuery The current query, for fluid interface
	 */
	public function filterByEndedAt($endedAt = null, $comparison = null)
	{
		if (is_array($endedAt)) {
			$useMinMax = false;
			if (isset($endedAt['min'])) {
				$this->addUsingAlias(teTaskLogPeer::ENDED_AT, $endedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($endedAt['max'])) {
				$this->addUsingAlias(teTaskLogPeer::ENDED_AT, $endedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(teTaskLogPeer::ENDED_AT, $endedAt, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     string $status The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teTaskLogQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($status)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $status)) {
				$status = str_replace('*', '%', $status);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(teTaskLogPeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the log_file column
	 * 
	 * @param     string $logFile The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    teTaskLogQuery The current query, for fluid interface
	 */
	public function filterByLogFile($logFile = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($logFile)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $logFile)) {
				$logFile = str_replace('*', '%', $logFile);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(teTaskLogPeer::LOG_FILE, $logFile, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     teTaskLog $teTaskLog Object to remove from the list of results
	 *
	 * @return    teTaskLogQuery The current query, for fluid interface
	 */
	public function prune($teTaskLog = null)
	{
		if ($teTaskLog) {
			$this->addUsingAlias(teTaskLogPeer::ID, $teTaskLog->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	// timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     teTaskLogQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(teTaskLogPeer::ENDED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     teTaskLogQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(teTaskLogPeer::STARTED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     teTaskLogQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(teTaskLogPeer::ENDED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     teTaskLogQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(teTaskLogPeer::ENDED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     teTaskLogQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(teTaskLogPeer::STARTED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     teTaskLogQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(teTaskLogPeer::STARTED_AT);
	}

} // BaseteTaskLogQuery
