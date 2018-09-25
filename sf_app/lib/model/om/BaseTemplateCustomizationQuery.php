<?php


/**
 * Base class that represents a query for the 'esq_template_customizations' table.
 *
 * 
 *
 * @method     TemplateCustomizationQuery orderByWebsiteId($order = Criteria::ASC) Order by the website_id column
 * @method     TemplateCustomizationQuery orderByTemplateId($order = Criteria::ASC) Order by the template_id column
 * @method     TemplateCustomizationQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     TemplateCustomizationQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method     TemplateCustomizationQuery orderByReference($order = Criteria::ASC) Order by the reference column
 * @method     TemplateCustomizationQuery orderByRelatedFile($order = Criteria::ASC) Order by the related_file column
 * @method     TemplateCustomizationQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     TemplateCustomizationQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     TemplateCustomizationQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     TemplateCustomizationQuery groupByWebsiteId() Group by the website_id column
 * @method     TemplateCustomizationQuery groupByTemplateId() Group by the template_id column
 * @method     TemplateCustomizationQuery groupByType() Group by the type column
 * @method     TemplateCustomizationQuery groupByContent() Group by the content column
 * @method     TemplateCustomizationQuery groupByReference() Group by the reference column
 * @method     TemplateCustomizationQuery groupByRelatedFile() Group by the related_file column
 * @method     TemplateCustomizationQuery groupById() Group by the id column
 * @method     TemplateCustomizationQuery groupByCreatedAt() Group by the created_at column
 * @method     TemplateCustomizationQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     TemplateCustomizationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     TemplateCustomizationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     TemplateCustomizationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     TemplateCustomizationQuery leftJoinWebsite($relationAlias = null) Adds a LEFT JOIN clause to the query using the Website relation
 * @method     TemplateCustomizationQuery rightJoinWebsite($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Website relation
 * @method     TemplateCustomizationQuery innerJoinWebsite($relationAlias = null) Adds a INNER JOIN clause to the query using the Website relation
 *
 * @method     TemplateCustomizationQuery leftJoinWebsiteTemplate($relationAlias = null) Adds a LEFT JOIN clause to the query using the WebsiteTemplate relation
 * @method     TemplateCustomizationQuery rightJoinWebsiteTemplate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the WebsiteTemplate relation
 * @method     TemplateCustomizationQuery innerJoinWebsiteTemplate($relationAlias = null) Adds a INNER JOIN clause to the query using the WebsiteTemplate relation
 *
 * @method     TemplateCustomization findOne(PropelPDO $con = null) Return the first TemplateCustomization matching the query
 * @method     TemplateCustomization findOneOrCreate(PropelPDO $con = null) Return the first TemplateCustomization matching the query, or a new TemplateCustomization object populated from the query conditions when no match is found
 *
 * @method     TemplateCustomization findOneByWebsiteId(string $website_id) Return the first TemplateCustomization filtered by the website_id column
 * @method     TemplateCustomization findOneByTemplateId(string $template_id) Return the first TemplateCustomization filtered by the template_id column
 * @method     TemplateCustomization findOneByType(string $type) Return the first TemplateCustomization filtered by the type column
 * @method     TemplateCustomization findOneByContent(string $content) Return the first TemplateCustomization filtered by the content column
 * @method     TemplateCustomization findOneByReference(string $reference) Return the first TemplateCustomization filtered by the reference column
 * @method     TemplateCustomization findOneByRelatedFile(string $related_file) Return the first TemplateCustomization filtered by the related_file column
 * @method     TemplateCustomization findOneById(int $id) Return the first TemplateCustomization filtered by the id column
 * @method     TemplateCustomization findOneByCreatedAt(string $created_at) Return the first TemplateCustomization filtered by the created_at column
 * @method     TemplateCustomization findOneByUpdatedAt(string $updated_at) Return the first TemplateCustomization filtered by the updated_at column
 *
 * @method     array findByWebsiteId(string $website_id) Return TemplateCustomization objects filtered by the website_id column
 * @method     array findByTemplateId(string $template_id) Return TemplateCustomization objects filtered by the template_id column
 * @method     array findByType(string $type) Return TemplateCustomization objects filtered by the type column
 * @method     array findByContent(string $content) Return TemplateCustomization objects filtered by the content column
 * @method     array findByReference(string $reference) Return TemplateCustomization objects filtered by the reference column
 * @method     array findByRelatedFile(string $related_file) Return TemplateCustomization objects filtered by the related_file column
 * @method     array findById(int $id) Return TemplateCustomization objects filtered by the id column
 * @method     array findByCreatedAt(string $created_at) Return TemplateCustomization objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return TemplateCustomization objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTemplateCustomizationQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseTemplateCustomizationQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'TemplateCustomization', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new TemplateCustomizationQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    TemplateCustomizationQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof TemplateCustomizationQuery) {
			return $criteria;
		}
		$query = new TemplateCustomizationQuery();
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
	 * @return    TemplateCustomization|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = TemplateCustomizationPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    TemplateCustomizationQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(TemplateCustomizationPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    TemplateCustomizationQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(TemplateCustomizationPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the website_id column
	 * 
	 * @param     string $websiteId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateCustomizationQuery The current query, for fluid interface
	 */
	public function filterByWebsiteId($websiteId = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($websiteId)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $websiteId)) {
				$websiteId = str_replace('*', '%', $websiteId);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TemplateCustomizationPeer::WEBSITE_ID, $websiteId, $comparison);
	}

	/**
	 * Filter the query on the template_id column
	 * 
	 * @param     string $templateId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateCustomizationQuery The current query, for fluid interface
	 */
	public function filterByTemplateId($templateId = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($templateId)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $templateId)) {
				$templateId = str_replace('*', '%', $templateId);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TemplateCustomizationPeer::TEMPLATE_ID, $templateId, $comparison);
	}

	/**
	 * Filter the query on the type column
	 * 
	 * @param     string $type The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateCustomizationQuery The current query, for fluid interface
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
		return $this->addUsingAlias(TemplateCustomizationPeer::TYPE, $type, $comparison);
	}

	/**
	 * Filter the query on the content column
	 * 
	 * @param     string $content The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateCustomizationQuery The current query, for fluid interface
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
		return $this->addUsingAlias(TemplateCustomizationPeer::CONTENT, $content, $comparison);
	}

	/**
	 * Filter the query on the reference column
	 * 
	 * @param     string $reference The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateCustomizationQuery The current query, for fluid interface
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
		return $this->addUsingAlias(TemplateCustomizationPeer::REFERENCE, $reference, $comparison);
	}

	/**
	 * Filter the query on the related_file column
	 * 
	 * @param     string $relatedFile The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateCustomizationQuery The current query, for fluid interface
	 */
	public function filterByRelatedFile($relatedFile = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($relatedFile)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $relatedFile)) {
				$relatedFile = str_replace('*', '%', $relatedFile);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TemplateCustomizationPeer::RELATED_FILE, $relatedFile, $comparison);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateCustomizationQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(TemplateCustomizationPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateCustomizationQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(TemplateCustomizationPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(TemplateCustomizationPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TemplateCustomizationPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateCustomizationQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(TemplateCustomizationPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(TemplateCustomizationPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TemplateCustomizationPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related Website object
	 *
	 * @param     Website $website  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateCustomizationQuery The current query, for fluid interface
	 */
	public function filterByWebsite($website, $comparison = null)
	{
		return $this
			->addUsingAlias(TemplateCustomizationPeer::WEBSITE_ID, $website->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Website relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TemplateCustomizationQuery The current query, for fluid interface
	 */
	public function joinWebsite($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function useWebsiteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinWebsite($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Website', 'WebsiteQuery');
	}

	/**
	 * Filter the query by a related WebsiteTemplate object
	 *
	 * @param     WebsiteTemplate $websiteTemplate  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateCustomizationQuery The current query, for fluid interface
	 */
	public function filterByWebsiteTemplate($websiteTemplate, $comparison = null)
	{
		return $this
			->addUsingAlias(TemplateCustomizationPeer::TEMPLATE_ID, $websiteTemplate->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the WebsiteTemplate relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TemplateCustomizationQuery The current query, for fluid interface
	 */
	public function joinWebsiteTemplate($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('WebsiteTemplate');
		
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
			$this->addJoinObject($join, 'WebsiteTemplate');
		}
		
		return $this;
	}

	/**
	 * Use the WebsiteTemplate relation WebsiteTemplate object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WebsiteTemplateQuery A secondary query class using the current class as primary query
	 */
	public function useWebsiteTemplateQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinWebsiteTemplate($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'WebsiteTemplate', 'WebsiteTemplateQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     TemplateCustomization $templateCustomization Object to remove from the list of results
	 *
	 * @return    TemplateCustomizationQuery The current query, for fluid interface
	 */
	public function prune($templateCustomization = null)
	{
		if ($templateCustomization) {
			$this->addUsingAlias(TemplateCustomizationPeer::ID, $templateCustomization->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	// timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     TemplateCustomizationQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(TemplateCustomizationPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     TemplateCustomizationQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(TemplateCustomizationPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     TemplateCustomizationQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(TemplateCustomizationPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     TemplateCustomizationQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(TemplateCustomizationPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     TemplateCustomizationQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(TemplateCustomizationPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     TemplateCustomizationQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(TemplateCustomizationPeer::CREATED_AT);
	}

} // BaseTemplateCustomizationQuery
