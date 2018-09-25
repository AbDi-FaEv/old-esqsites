<?php


/**
 * Base class that represents a query for the 'esq_bar_association_promo_pages' table.
 *
 * 
 *
 * @method     BarAssociationPromoPageQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     BarAssociationPromoPageQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     BarAssociationPromoPageQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method     BarAssociationPromoPageQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     BarAssociationPromoPageQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     BarAssociationPromoPageQuery groupById() Group by the id column
 * @method     BarAssociationPromoPageQuery groupByTitle() Group by the title column
 * @method     BarAssociationPromoPageQuery groupByContent() Group by the content column
 * @method     BarAssociationPromoPageQuery groupByCreatedAt() Group by the created_at column
 * @method     BarAssociationPromoPageQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     BarAssociationPromoPageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     BarAssociationPromoPageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     BarAssociationPromoPageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     BarAssociationPromoPageQuery leftJoinBarAssociation($relationAlias = null) Adds a LEFT JOIN clause to the query using the BarAssociation relation
 * @method     BarAssociationPromoPageQuery rightJoinBarAssociation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BarAssociation relation
 * @method     BarAssociationPromoPageQuery innerJoinBarAssociation($relationAlias = null) Adds a INNER JOIN clause to the query using the BarAssociation relation
 *
 * @method     BarAssociationPromoPage findOne(PropelPDO $con = null) Return the first BarAssociationPromoPage matching the query
 * @method     BarAssociationPromoPage findOneOrCreate(PropelPDO $con = null) Return the first BarAssociationPromoPage matching the query, or a new BarAssociationPromoPage object populated from the query conditions when no match is found
 *
 * @method     BarAssociationPromoPage findOneById(int $id) Return the first BarAssociationPromoPage filtered by the id column
 * @method     BarAssociationPromoPage findOneByTitle(string $title) Return the first BarAssociationPromoPage filtered by the title column
 * @method     BarAssociationPromoPage findOneByContent(string $content) Return the first BarAssociationPromoPage filtered by the content column
 * @method     BarAssociationPromoPage findOneByCreatedAt(string $created_at) Return the first BarAssociationPromoPage filtered by the created_at column
 * @method     BarAssociationPromoPage findOneByUpdatedAt(string $updated_at) Return the first BarAssociationPromoPage filtered by the updated_at column
 *
 * @method     array findById(int $id) Return BarAssociationPromoPage objects filtered by the id column
 * @method     array findByTitle(string $title) Return BarAssociationPromoPage objects filtered by the title column
 * @method     array findByContent(string $content) Return BarAssociationPromoPage objects filtered by the content column
 * @method     array findByCreatedAt(string $created_at) Return BarAssociationPromoPage objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return BarAssociationPromoPage objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseBarAssociationPromoPageQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseBarAssociationPromoPageQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'BarAssociationPromoPage', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new BarAssociationPromoPageQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    BarAssociationPromoPageQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof BarAssociationPromoPageQuery) {
			return $criteria;
		}
		$query = new BarAssociationPromoPageQuery();
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
	 * @return    BarAssociationPromoPage|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = BarAssociationPromoPagePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    BarAssociationPromoPageQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(BarAssociationPromoPagePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    BarAssociationPromoPageQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(BarAssociationPromoPagePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BarAssociationPromoPageQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(BarAssociationPromoPagePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the title column
	 * 
	 * @param     string $title The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BarAssociationPromoPageQuery The current query, for fluid interface
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
		return $this->addUsingAlias(BarAssociationPromoPagePeer::TITLE, $title, $comparison);
	}

	/**
	 * Filter the query on the content column
	 * 
	 * @param     string $content The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BarAssociationPromoPageQuery The current query, for fluid interface
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
		return $this->addUsingAlias(BarAssociationPromoPagePeer::CONTENT, $content, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BarAssociationPromoPageQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(BarAssociationPromoPagePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(BarAssociationPromoPagePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(BarAssociationPromoPagePeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BarAssociationPromoPageQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(BarAssociationPromoPagePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(BarAssociationPromoPagePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(BarAssociationPromoPagePeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related BarAssociation object
	 *
	 * @param     BarAssociation $barAssociation  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BarAssociationPromoPageQuery The current query, for fluid interface
	 */
	public function filterByBarAssociation($barAssociation, $comparison = null)
	{
		return $this
			->addUsingAlias(BarAssociationPromoPagePeer::ID, $barAssociation->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the BarAssociation relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    BarAssociationPromoPageQuery The current query, for fluid interface
	 */
	public function joinBarAssociation($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('BarAssociation');
		
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
			$this->addJoinObject($join, 'BarAssociation');
		}
		
		return $this;
	}

	/**
	 * Use the BarAssociation relation BarAssociation object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    BarAssociationQuery A secondary query class using the current class as primary query
	 */
	public function useBarAssociationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinBarAssociation($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'BarAssociation', 'BarAssociationQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     BarAssociationPromoPage $barAssociationPromoPage Object to remove from the list of results
	 *
	 * @return    BarAssociationPromoPageQuery The current query, for fluid interface
	 */
	public function prune($barAssociationPromoPage = null)
	{
		if ($barAssociationPromoPage) {
			$this->addUsingAlias(BarAssociationPromoPagePeer::ID, $barAssociationPromoPage->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	// timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     BarAssociationPromoPageQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(BarAssociationPromoPagePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     BarAssociationPromoPageQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(BarAssociationPromoPagePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     BarAssociationPromoPageQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(BarAssociationPromoPagePeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     BarAssociationPromoPageQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(BarAssociationPromoPagePeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     BarAssociationPromoPageQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(BarAssociationPromoPagePeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     BarAssociationPromoPageQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(BarAssociationPromoPagePeer::CREATED_AT);
	}

} // BaseBarAssociationPromoPageQuery
