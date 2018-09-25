<?php


/**
 * Base class that represents a query for the 'esq_templates' table.
 *
 * 
 *
 * @method     WebsiteTemplateQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     WebsiteTemplateQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     WebsiteTemplateQuery orderByReference($order = Criteria::ASC) Order by the reference column
 * @method     WebsiteTemplateQuery orderByCategoryId($order = Criteria::ASC) Order by the category_id column
 * @method     WebsiteTemplateQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     WebsiteTemplateQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     WebsiteTemplateQuery orderByCustomerId($order = Criteria::ASC) Order by the customer_id column
 * @method     WebsiteTemplateQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     WebsiteTemplateQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     WebsiteTemplateQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     WebsiteTemplateQuery orderByRank($order = Criteria::ASC) Order by the rank column
 *
 * @method     WebsiteTemplateQuery groupById() Group by the id column
 * @method     WebsiteTemplateQuery groupByType() Group by the type column
 * @method     WebsiteTemplateQuery groupByReference() Group by the reference column
 * @method     WebsiteTemplateQuery groupByCategoryId() Group by the category_id column
 * @method     WebsiteTemplateQuery groupByTitle() Group by the title column
 * @method     WebsiteTemplateQuery groupByDescription() Group by the description column
 * @method     WebsiteTemplateQuery groupByCustomerId() Group by the customer_id column
 * @method     WebsiteTemplateQuery groupByStatus() Group by the status column
 * @method     WebsiteTemplateQuery groupByCreatedAt() Group by the created_at column
 * @method     WebsiteTemplateQuery groupByUpdatedAt() Group by the updated_at column
 * @method     WebsiteTemplateQuery groupByRank() Group by the rank column
 *
 * @method     WebsiteTemplateQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     WebsiteTemplateQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     WebsiteTemplateQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     WebsiteTemplateQuery leftJoinTemplateCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the TemplateCategory relation
 * @method     WebsiteTemplateQuery rightJoinTemplateCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TemplateCategory relation
 * @method     WebsiteTemplateQuery innerJoinTemplateCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the TemplateCategory relation
 *
 * @method     WebsiteTemplateQuery leftJoinCustomer($relationAlias = null) Adds a LEFT JOIN clause to the query using the Customer relation
 * @method     WebsiteTemplateQuery rightJoinCustomer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Customer relation
 * @method     WebsiteTemplateQuery innerJoinCustomer($relationAlias = null) Adds a INNER JOIN clause to the query using the Customer relation
 *
 * @method     WebsiteTemplateQuery leftJoinWebsite($relationAlias = null) Adds a LEFT JOIN clause to the query using the Website relation
 * @method     WebsiteTemplateQuery rightJoinWebsite($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Website relation
 * @method     WebsiteTemplateQuery innerJoinWebsite($relationAlias = null) Adds a INNER JOIN clause to the query using the Website relation
 *
 * @method     WebsiteTemplateQuery leftJoinTemplateCustomization($relationAlias = null) Adds a LEFT JOIN clause to the query using the TemplateCustomization relation
 * @method     WebsiteTemplateQuery rightJoinTemplateCustomization($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TemplateCustomization relation
 * @method     WebsiteTemplateQuery innerJoinTemplateCustomization($relationAlias = null) Adds a INNER JOIN clause to the query using the TemplateCustomization relation
 *
 * @method     WebsiteTemplate findOne(PropelPDO $con = null) Return the first WebsiteTemplate matching the query
 * @method     WebsiteTemplate findOneOrCreate(PropelPDO $con = null) Return the first WebsiteTemplate matching the query, or a new WebsiteTemplate object populated from the query conditions when no match is found
 *
 * @method     WebsiteTemplate findOneById(string $id) Return the first WebsiteTemplate filtered by the id column
 * @method     WebsiteTemplate findOneByType(string $type) Return the first WebsiteTemplate filtered by the type column
 * @method     WebsiteTemplate findOneByReference(string $reference) Return the first WebsiteTemplate filtered by the reference column
 * @method     WebsiteTemplate findOneByCategoryId(string $category_id) Return the first WebsiteTemplate filtered by the category_id column
 * @method     WebsiteTemplate findOneByTitle(string $title) Return the first WebsiteTemplate filtered by the title column
 * @method     WebsiteTemplate findOneByDescription(string $description) Return the first WebsiteTemplate filtered by the description column
 * @method     WebsiteTemplate findOneByCustomerId(string $customer_id) Return the first WebsiteTemplate filtered by the customer_id column
 * @method     WebsiteTemplate findOneByStatus(int $status) Return the first WebsiteTemplate filtered by the status column
 * @method     WebsiteTemplate findOneByCreatedAt(string $created_at) Return the first WebsiteTemplate filtered by the created_at column
 * @method     WebsiteTemplate findOneByUpdatedAt(string $updated_at) Return the first WebsiteTemplate filtered by the updated_at column
 * @method     WebsiteTemplate findOneByRank(int $rank) Return the first WebsiteTemplate filtered by the rank column
 *
 * @method     array findById(string $id) Return WebsiteTemplate objects filtered by the id column
 * @method     array findByType(string $type) Return WebsiteTemplate objects filtered by the type column
 * @method     array findByReference(string $reference) Return WebsiteTemplate objects filtered by the reference column
 * @method     array findByCategoryId(string $category_id) Return WebsiteTemplate objects filtered by the category_id column
 * @method     array findByTitle(string $title) Return WebsiteTemplate objects filtered by the title column
 * @method     array findByDescription(string $description) Return WebsiteTemplate objects filtered by the description column
 * @method     array findByCustomerId(string $customer_id) Return WebsiteTemplate objects filtered by the customer_id column
 * @method     array findByStatus(int $status) Return WebsiteTemplate objects filtered by the status column
 * @method     array findByCreatedAt(string $created_at) Return WebsiteTemplate objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return WebsiteTemplate objects filtered by the updated_at column
 * @method     array findByRank(int $rank) Return WebsiteTemplate objects filtered by the rank column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseWebsiteTemplateQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseWebsiteTemplateQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'WebsiteTemplate', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new WebsiteTemplateQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    WebsiteTemplateQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof WebsiteTemplateQuery) {
			return $criteria;
		}
		$query = new WebsiteTemplateQuery();
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
	 * @return    WebsiteTemplate|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = WebsiteTemplatePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    WebsiteTemplateQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(WebsiteTemplatePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    WebsiteTemplateQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(WebsiteTemplatePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     string $id The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteTemplateQuery The current query, for fluid interface
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
		return $this->addUsingAlias(WebsiteTemplatePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the type column
	 * 
	 * @param     string $type The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteTemplateQuery The current query, for fluid interface
	 */
	public function filterByType($type = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($type)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $type)) {
				$type = str_replace('*', '%', $type);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WebsiteTemplatePeer::TYPE, $type, $comparison);
	}

	/**
	 * Filter the query on the reference column
	 * 
	 * @param     string $reference The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteTemplateQuery The current query, for fluid interface
	 */
	public function filterByReference($reference = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($reference)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $reference)) {
				$reference = str_replace('*', '%', $reference);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WebsiteTemplatePeer::REFERENCE, $reference, $comparison);
	}

	/**
	 * Filter the query on the category_id column
	 * 
	 * @param     string $categoryId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteTemplateQuery The current query, for fluid interface
	 */
	public function filterByCategoryId($categoryId = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($categoryId)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $categoryId)) {
				$categoryId = str_replace('*', '%', $categoryId);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WebsiteTemplatePeer::CATEGORY_ID, $categoryId, $comparison);
	}

	/**
	 * Filter the query on the title column
	 * 
	 * @param     string $title The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteTemplateQuery The current query, for fluid interface
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
		return $this->addUsingAlias(WebsiteTemplatePeer::TITLE, $title, $comparison);
	}

	/**
	 * Filter the query on the description column
	 * 
	 * @param     string $description The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteTemplateQuery The current query, for fluid interface
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
		return $this->addUsingAlias(WebsiteTemplatePeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query on the customer_id column
	 * 
	 * @param     string $customerId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteTemplateQuery The current query, for fluid interface
	 */
	public function filterByCustomerId($customerId = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($customerId)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $customerId)) {
				$customerId = str_replace('*', '%', $customerId);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WebsiteTemplatePeer::CUSTOMER_ID, $customerId, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     int|array $status The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteTemplateQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (is_array($status)) {
			$useMinMax = false;
			if (isset($status['min'])) {
				$this->addUsingAlias(WebsiteTemplatePeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($status['max'])) {
				$this->addUsingAlias(WebsiteTemplatePeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WebsiteTemplatePeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteTemplateQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(WebsiteTemplatePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(WebsiteTemplatePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WebsiteTemplatePeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteTemplateQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(WebsiteTemplatePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(WebsiteTemplatePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WebsiteTemplatePeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query on the rank column
	 * 
	 * @param     int|array $rank The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteTemplateQuery The current query, for fluid interface
	 */
	public function filterByRank($rank = null, $comparison = null)
	{
		if (is_array($rank)) {
			$useMinMax = false;
			if (isset($rank['min'])) {
				$this->addUsingAlias(WebsiteTemplatePeer::RANK, $rank['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($rank['max'])) {
				$this->addUsingAlias(WebsiteTemplatePeer::RANK, $rank['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WebsiteTemplatePeer::RANK, $rank, $comparison);
	}

	/**
	 * Filter the query by a related TemplateCategory object
	 *
	 * @param     TemplateCategory $templateCategory  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteTemplateQuery The current query, for fluid interface
	 */
	public function filterByTemplateCategory($templateCategory, $comparison = null)
	{
		return $this
			->addUsingAlias(WebsiteTemplatePeer::CATEGORY_ID, $templateCategory->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the TemplateCategory relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WebsiteTemplateQuery The current query, for fluid interface
	 */
	public function joinTemplateCategory($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('TemplateCategory');
		
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
			$this->addJoinObject($join, 'TemplateCategory');
		}
		
		return $this;
	}

	/**
	 * Use the TemplateCategory relation TemplateCategory object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TemplateCategoryQuery A secondary query class using the current class as primary query
	 */
	public function useTemplateCategoryQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinTemplateCategory($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'TemplateCategory', 'TemplateCategoryQuery');
	}

	/**
	 * Filter the query by a related Customer object
	 *
	 * @param     Customer $customer  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteTemplateQuery The current query, for fluid interface
	 */
	public function filterByCustomer($customer, $comparison = null)
	{
		return $this
			->addUsingAlias(WebsiteTemplatePeer::CUSTOMER_ID, $customer->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Customer relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WebsiteTemplateQuery The current query, for fluid interface
	 */
	public function joinCustomer($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Customer');
		
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
			$this->addJoinObject($join, 'Customer');
		}
		
		return $this;
	}

	/**
	 * Use the Customer relation Customer object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CustomerQuery A secondary query class using the current class as primary query
	 */
	public function useCustomerQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinCustomer($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Customer', 'CustomerQuery');
	}

	/**
	 * Filter the query by a related Website object
	 *
	 * @param     Website $website  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteTemplateQuery The current query, for fluid interface
	 */
	public function filterByWebsite($website, $comparison = null)
	{
		return $this
			->addUsingAlias(WebsiteTemplatePeer::ID, $website->getTemplateId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Website relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WebsiteTemplateQuery The current query, for fluid interface
	 */
	public function joinWebsite($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Website');
		
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
			$this->addJoinObject($join, 'Website');
		}
		
		return $this;
	}

	/**
	 * Use the Website relation Website object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WebsiteQuery A secondary query class using the current class as primary query
	 */
	public function useWebsiteQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinWebsite($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Website', 'WebsiteQuery');
	}

	/**
	 * Filter the query by a related TemplateCustomization object
	 *
	 * @param     TemplateCustomization $templateCustomization  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteTemplateQuery The current query, for fluid interface
	 */
	public function filterByTemplateCustomization($templateCustomization, $comparison = null)
	{
		return $this
			->addUsingAlias(WebsiteTemplatePeer::ID, $templateCustomization->getTemplateId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the TemplateCustomization relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WebsiteTemplateQuery The current query, for fluid interface
	 */
	public function joinTemplateCustomization($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('TemplateCustomization');
		
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
			$this->addJoinObject($join, 'TemplateCustomization');
		}
		
		return $this;
	}

	/**
	 * Use the TemplateCustomization relation TemplateCustomization object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TemplateCustomizationQuery A secondary query class using the current class as primary query
	 */
	public function useTemplateCustomizationQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinTemplateCustomization($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'TemplateCustomization', 'TemplateCustomizationQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     WebsiteTemplate $websiteTemplate Object to remove from the list of results
	 *
	 * @return    WebsiteTemplateQuery The current query, for fluid interface
	 */
	public function prune($websiteTemplate = null)
	{
		if ($websiteTemplate) {
			$this->addUsingAlias(WebsiteTemplatePeer::ID, $websiteTemplate->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	// timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     WebsiteTemplateQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(WebsiteTemplatePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     WebsiteTemplateQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(WebsiteTemplatePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     WebsiteTemplateQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(WebsiteTemplatePeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     WebsiteTemplateQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(WebsiteTemplatePeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     WebsiteTemplateQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(WebsiteTemplatePeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     WebsiteTemplateQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(WebsiteTemplatePeer::CREATED_AT);
	}

	// sortable behavior
	
	/**
	 * Returns the list of objects
	 *
	 * @param      PropelPDO $con	Connection to use.
	 *
	 * @return     mixed the list of results, formatted by the current formatter
	 */
	public function findList($con = null)
	{
		return $this
			->orderByRank()
			->find($con);
	}
	
	/**
	 * Get the highest rank
	 * 
	 * @param     PropelPDO optional connection
	 *
	 * @return    integer highest position
	 */
	public function getMaxRank(PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(WebsiteTemplatePeer::DATABASE_NAME);
		}
		// shift the objects with a position lower than the one of object
		$this->addSelectColumn('MAX(' . WebsiteTemplatePeer::RANK_COL . ')');
		$stmt = $this->getSelectStatement($con);
		
		return $stmt->fetchColumn();
	}
	
	/**
	 * Reorder a set of sortable objects based on a list of id/position
	 * Beware that there is no check made on the positions passed
	 * So incoherent positions will result in an incoherent list
	 *
	 * @param     array     $order id => rank pairs
	 * @param     PropelPDO $con   optional connection
	 *
	 * @return    boolean true if the reordering took place, false if a database problem prevented it
	 */
	public function reorder(array $order, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(WebsiteTemplatePeer::DATABASE_NAME);
		}
		
		$con->beginTransaction();
		try {
			$ids = array_keys($order);
			$objects = $this->findPks($ids, $con);
			foreach ($objects as $object) {
				$pk = $object->getPrimaryKey();
				if ($object->getRank() != $order[$pk]) {
					$object->setRank($order[$pk]);
					$object->save($con);
				}
			}
			$con->commit();
	
			return true;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

} // BaseWebsiteTemplateQuery
