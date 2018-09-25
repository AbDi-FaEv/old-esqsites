<?php


/**
 * Base class that represents a query for the 'esq_template_types' table.
 *
 * 
 *
 * @method     TemplateTypeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     TemplateTypeQuery orderByRank($order = Criteria::ASC) Order by the rank column
 * @method     TemplateTypeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     TemplateTypeQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method     TemplateTypeQuery groupById() Group by the id column
 * @method     TemplateTypeQuery groupByRank() Group by the rank column
 * @method     TemplateTypeQuery groupByName() Group by the name column
 * @method     TemplateTypeQuery groupByDescription() Group by the description column
 *
 * @method     TemplateTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     TemplateTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     TemplateTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     TemplateTypeQuery leftJoinPage($relationAlias = null) Adds a LEFT JOIN clause to the query using the Page relation
 * @method     TemplateTypeQuery rightJoinPage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Page relation
 * @method     TemplateTypeQuery innerJoinPage($relationAlias = null) Adds a INNER JOIN clause to the query using the Page relation
 *
 * @method     TemplateType findOne(PropelPDO $con = null) Return the first TemplateType matching the query
 * @method     TemplateType findOneOrCreate(PropelPDO $con = null) Return the first TemplateType matching the query, or a new TemplateType object populated from the query conditions when no match is found
 *
 * @method     TemplateType findOneById(string $id) Return the first TemplateType filtered by the id column
 * @method     TemplateType findOneByRank(int $rank) Return the first TemplateType filtered by the rank column
 * @method     TemplateType findOneByName(string $name) Return the first TemplateType filtered by the name column
 * @method     TemplateType findOneByDescription(string $description) Return the first TemplateType filtered by the description column
 *
 * @method     array findById(string $id) Return TemplateType objects filtered by the id column
 * @method     array findByRank(int $rank) Return TemplateType objects filtered by the rank column
 * @method     array findByName(string $name) Return TemplateType objects filtered by the name column
 * @method     array findByDescription(string $description) Return TemplateType objects filtered by the description column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTemplateTypeQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseTemplateTypeQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'TemplateType', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new TemplateTypeQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    TemplateTypeQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof TemplateTypeQuery) {
			return $criteria;
		}
		$query = new TemplateTypeQuery();
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
	 * @return    TemplateType|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = TemplateTypePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    TemplateTypeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(TemplateTypePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    TemplateTypeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(TemplateTypePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     string $id The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateTypeQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($id)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $id)) {
				$id = str_replace('*', '%', $id);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TemplateTypePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the rank column
	 * 
	 * @param     int|array $rank The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateTypeQuery The current query, for fluid interface
	 */
	public function filterByRank($rank = null, $comparison = null)
	{
		if (is_array($rank)) {
			$useMinMax = false;
			if (isset($rank['min'])) {
				$this->addUsingAlias(TemplateTypePeer::RANK, $rank['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($rank['max'])) {
				$this->addUsingAlias(TemplateTypePeer::RANK, $rank['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TemplateTypePeer::RANK, $rank, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateTypeQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($name)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $name)) {
				$name = str_replace('*', '%', $name);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TemplateTypePeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the description column
	 * 
	 * @param     string $description The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateTypeQuery The current query, for fluid interface
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
		return $this->addUsingAlias(TemplateTypePeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query by a related Page object
	 *
	 * @param     Page $page  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateTypeQuery The current query, for fluid interface
	 */
	public function filterByPage($page, $comparison = null)
	{
		return $this
			->addUsingAlias(TemplateTypePeer::ID, $page->getTemplateTypeId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Page relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TemplateTypeQuery The current query, for fluid interface
	 */
	public function joinPage($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Page');
		
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
			$this->addJoinObject($join, 'Page');
		}
		
		return $this;
	}

	/**
	 * Use the Page relation Page object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PageQuery A secondary query class using the current class as primary query
	 */
	public function usePageQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinPage($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Page', 'PageQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     TemplateType $templateType Object to remove from the list of results
	 *
	 * @return    TemplateTypeQuery The current query, for fluid interface
	 */
	public function prune($templateType = null)
	{
		if ($templateType) {
			$this->addUsingAlias(TemplateTypePeer::ID, $templateType->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseTemplateTypeQuery
