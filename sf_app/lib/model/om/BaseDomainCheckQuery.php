<?php


/**
 * Base class that represents a query for the 'esq_domain_checks' table.
 *
 * 
 *
 * @method     DomainCheckQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     DomainCheckQuery orderByDomainId($order = Criteria::ASC) Order by the domain_id column
 * @method     DomainCheckQuery orderByStatusCode($order = Criteria::ASC) Order by the status_code column
 * @method     DomainCheckQuery orderByHost($order = Criteria::ASC) Order by the host column
 * @method     DomainCheckQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method     DomainCheckQuery groupById() Group by the id column
 * @method     DomainCheckQuery groupByDomainId() Group by the domain_id column
 * @method     DomainCheckQuery groupByStatusCode() Group by the status_code column
 * @method     DomainCheckQuery groupByHost() Group by the host column
 * @method     DomainCheckQuery groupByCreatedAt() Group by the created_at column
 *
 * @method     DomainCheckQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     DomainCheckQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     DomainCheckQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     DomainCheckQuery leftJoinDomain($relationAlias = null) Adds a LEFT JOIN clause to the query using the Domain relation
 * @method     DomainCheckQuery rightJoinDomain($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Domain relation
 * @method     DomainCheckQuery innerJoinDomain($relationAlias = null) Adds a INNER JOIN clause to the query using the Domain relation
 *
 * @method     DomainCheck findOne(PropelPDO $con = null) Return the first DomainCheck matching the query
 * @method     DomainCheck findOneOrCreate(PropelPDO $con = null) Return the first DomainCheck matching the query, or a new DomainCheck object populated from the query conditions when no match is found
 *
 * @method     DomainCheck findOneById(int $id) Return the first DomainCheck filtered by the id column
 * @method     DomainCheck findOneByDomainId(string $domain_id) Return the first DomainCheck filtered by the domain_id column
 * @method     DomainCheck findOneByStatusCode(int $status_code) Return the first DomainCheck filtered by the status_code column
 * @method     DomainCheck findOneByHost(string $host) Return the first DomainCheck filtered by the host column
 * @method     DomainCheck findOneByCreatedAt(string $created_at) Return the first DomainCheck filtered by the created_at column
 *
 * @method     array findById(int $id) Return DomainCheck objects filtered by the id column
 * @method     array findByDomainId(string $domain_id) Return DomainCheck objects filtered by the domain_id column
 * @method     array findByStatusCode(int $status_code) Return DomainCheck objects filtered by the status_code column
 * @method     array findByHost(string $host) Return DomainCheck objects filtered by the host column
 * @method     array findByCreatedAt(string $created_at) Return DomainCheck objects filtered by the created_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseDomainCheckQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseDomainCheckQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'DomainCheck', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new DomainCheckQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    DomainCheckQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof DomainCheckQuery) {
			return $criteria;
		}
		$query = new DomainCheckQuery();
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
	 * @return    DomainCheck|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = DomainCheckPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    DomainCheckQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(DomainCheckPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    DomainCheckQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(DomainCheckPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainCheckQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(DomainCheckPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the domain_id column
	 * 
	 * @param     string $domainId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainCheckQuery The current query, for fluid interface
	 */
	public function filterByDomainId($domainId = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($domainId)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $domainId)) {
				$domainId = str_replace('*', '%', $domainId);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(DomainCheckPeer::DOMAIN_ID, $domainId, $comparison);
	}

	/**
	 * Filter the query on the status_code column
	 * 
	 * @param     int|array $statusCode The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainCheckQuery The current query, for fluid interface
	 */
	public function filterByStatusCode($statusCode = null, $comparison = null)
	{
		if (is_array($statusCode)) {
			$useMinMax = false;
			if (isset($statusCode['min'])) {
				$this->addUsingAlias(DomainCheckPeer::STATUS_CODE, $statusCode['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($statusCode['max'])) {
				$this->addUsingAlias(DomainCheckPeer::STATUS_CODE, $statusCode['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(DomainCheckPeer::STATUS_CODE, $statusCode, $comparison);
	}

	/**
	 * Filter the query on the host column
	 * 
	 * @param     string $host The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainCheckQuery The current query, for fluid interface
	 */
	public function filterByHost($host = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($host)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $host)) {
				$host = str_replace('*', '%', $host);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(DomainCheckPeer::HOST, $host, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainCheckQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(DomainCheckPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(DomainCheckPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(DomainCheckPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query by a related Domain object
	 *
	 * @param     Domain $domain  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainCheckQuery The current query, for fluid interface
	 */
	public function filterByDomain($domain, $comparison = null)
	{
		return $this
			->addUsingAlias(DomainCheckPeer::DOMAIN_ID, $domain->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Domain relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DomainCheckQuery The current query, for fluid interface
	 */
	public function joinDomain($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Domain');
		
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
			$this->addJoinObject($join, 'Domain');
		}
		
		return $this;
	}

	/**
	 * Use the Domain relation Domain object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DomainQuery A secondary query class using the current class as primary query
	 */
	public function useDomainQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinDomain($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Domain', 'DomainQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     DomainCheck $domainCheck Object to remove from the list of results
	 *
	 * @return    DomainCheckQuery The current query, for fluid interface
	 */
	public function prune($domainCheck = null)
	{
		if ($domainCheck) {
			$this->addUsingAlias(DomainCheckPeer::ID, $domainCheck->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseDomainCheckQuery
