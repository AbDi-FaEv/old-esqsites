<?php


/**
 * Base class that represents a query for the 'esq_resources' table.
 *
 * 
 *
 * @method     ResourceQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ResourceQuery orderByCategoryId($order = Criteria::ASC) Order by the category_id column
 * @method     ResourceQuery orderByCompanyName($order = Criteria::ASC) Order by the company_name column
 * @method     ResourceQuery orderByImageUrl($order = Criteria::ASC) Order by the image_url column
 * @method     ResourceQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     ResourceQuery orderByUrlTitle($order = Criteria::ASC) Order by the url_title column
 * @method     ResourceQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ResourceQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ResourceQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method     ResourceQuery groupById() Group by the id column
 * @method     ResourceQuery groupByCategoryId() Group by the category_id column
 * @method     ResourceQuery groupByCompanyName() Group by the company_name column
 * @method     ResourceQuery groupByImageUrl() Group by the image_url column
 * @method     ResourceQuery groupByUrl() Group by the url column
 * @method     ResourceQuery groupByUrlTitle() Group by the url_title column
 * @method     ResourceQuery groupByEmail() Group by the email column
 * @method     ResourceQuery groupByDescription() Group by the description column
 * @method     ResourceQuery groupByCreatedAt() Group by the created_at column
 *
 * @method     ResourceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ResourceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ResourceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ResourceQuery leftJoinResourceCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the ResourceCategory relation
 * @method     ResourceQuery rightJoinResourceCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ResourceCategory relation
 * @method     ResourceQuery innerJoinResourceCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the ResourceCategory relation
 *
 * @method     Resource findOne(PropelPDO $con = null) Return the first Resource matching the query
 * @method     Resource findOneOrCreate(PropelPDO $con = null) Return the first Resource matching the query, or a new Resource object populated from the query conditions when no match is found
 *
 * @method     Resource findOneById(string $id) Return the first Resource filtered by the id column
 * @method     Resource findOneByCategoryId(string $category_id) Return the first Resource filtered by the category_id column
 * @method     Resource findOneByCompanyName(string $company_name) Return the first Resource filtered by the company_name column
 * @method     Resource findOneByImageUrl(string $image_url) Return the first Resource filtered by the image_url column
 * @method     Resource findOneByUrl(string $url) Return the first Resource filtered by the url column
 * @method     Resource findOneByUrlTitle(string $url_title) Return the first Resource filtered by the url_title column
 * @method     Resource findOneByEmail(string $email) Return the first Resource filtered by the email column
 * @method     Resource findOneByDescription(string $description) Return the first Resource filtered by the description column
 * @method     Resource findOneByCreatedAt(string $created_at) Return the first Resource filtered by the created_at column
 *
 * @method     array findById(string $id) Return Resource objects filtered by the id column
 * @method     array findByCategoryId(string $category_id) Return Resource objects filtered by the category_id column
 * @method     array findByCompanyName(string $company_name) Return Resource objects filtered by the company_name column
 * @method     array findByImageUrl(string $image_url) Return Resource objects filtered by the image_url column
 * @method     array findByUrl(string $url) Return Resource objects filtered by the url column
 * @method     array findByUrlTitle(string $url_title) Return Resource objects filtered by the url_title column
 * @method     array findByEmail(string $email) Return Resource objects filtered by the email column
 * @method     array findByDescription(string $description) Return Resource objects filtered by the description column
 * @method     array findByCreatedAt(string $created_at) Return Resource objects filtered by the created_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseResourceQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseResourceQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Resource', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ResourceQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ResourceQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ResourceQuery) {
			return $criteria;
		}
		$query = new ResourceQuery();
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
	 * @return    Resource|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ResourcePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ResourceQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ResourcePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ResourceQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ResourcePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     string $id The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ResourceQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ResourcePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the category_id column
	 * 
	 * @param     string $categoryId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ResourceQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ResourcePeer::CATEGORY_ID, $categoryId, $comparison);
	}

	/**
	 * Filter the query on the company_name column
	 * 
	 * @param     string $companyName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ResourceQuery The current query, for fluid interface
	 */
	public function filterByCompanyName($companyName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($companyName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $companyName)) {
				$companyName = str_replace('*', '%', $companyName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ResourcePeer::COMPANY_NAME, $companyName, $comparison);
	}

	/**
	 * Filter the query on the image_url column
	 * 
	 * @param     string $imageUrl The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ResourceQuery The current query, for fluid interface
	 */
	public function filterByImageUrl($imageUrl = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($imageUrl)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $imageUrl)) {
				$imageUrl = str_replace('*', '%', $imageUrl);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ResourcePeer::IMAGE_URL, $imageUrl, $comparison);
	}

	/**
	 * Filter the query on the url column
	 * 
	 * @param     string $url The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ResourceQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ResourcePeer::URL, $url, $comparison);
	}

	/**
	 * Filter the query on the url_title column
	 * 
	 * @param     string $urlTitle The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ResourceQuery The current query, for fluid interface
	 */
	public function filterByUrlTitle($urlTitle = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($urlTitle)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $urlTitle)) {
				$urlTitle = str_replace('*', '%', $urlTitle);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ResourcePeer::URL_TITLE, $urlTitle, $comparison);
	}

	/**
	 * Filter the query on the email column
	 * 
	 * @param     string $email The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ResourceQuery The current query, for fluid interface
	 */
	public function filterByEmail($email = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($email)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $email)) {
				$email = str_replace('*', '%', $email);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ResourcePeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query on the description column
	 * 
	 * @param     string $description The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ResourceQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ResourcePeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ResourceQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(ResourcePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(ResourcePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ResourcePeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query by a related ResourceCategory object
	 *
	 * @param     ResourceCategory $resourceCategory  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ResourceQuery The current query, for fluid interface
	 */
	public function filterByResourceCategory($resourceCategory, $comparison = null)
	{
		return $this
			->addUsingAlias(ResourcePeer::CATEGORY_ID, $resourceCategory->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ResourceCategory relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ResourceQuery The current query, for fluid interface
	 */
	public function joinResourceCategory($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ResourceCategory');
		
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
			$this->addJoinObject($join, 'ResourceCategory');
		}
		
		return $this;
	}

	/**
	 * Use the ResourceCategory relation ResourceCategory object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ResourceCategoryQuery A secondary query class using the current class as primary query
	 */
	public function useResourceCategoryQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinResourceCategory($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ResourceCategory', 'ResourceCategoryQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Resource $resource Object to remove from the list of results
	 *
	 * @return    ResourceQuery The current query, for fluid interface
	 */
	public function prune($resource = null)
	{
		if ($resource) {
			$this->addUsingAlias(ResourcePeer::ID, $resource->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseResourceQuery
