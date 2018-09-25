<?php


/**
 * Base class that represents a query for the 'esq_pages' table.
 *
 * 
 *
 * @method     PageQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PageQuery orderByWebsiteId($order = Criteria::ASC) Order by the website_id column
 * @method     PageQuery orderByTemplateTypeId($order = Criteria::ASC) Order by the template_type_id column
 * @method     PageQuery orderByMenuType($order = Criteria::ASC) Order by the menu_type column
 * @method     PageQuery orderByPageContentDisplayTypeId($order = Criteria::ASC) Order by the page_content_display_type_id column
 * @method     PageQuery orderByRank($order = Criteria::ASC) Order by the rank column
 * @method     PageQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     PageQuery orderByMetaTitle($order = Criteria::ASC) Order by the meta_title column
 * @method     PageQuery orderByMetaDescription($order = Criteria::ASC) Order by the meta_description column
 * @method     PageQuery orderByMetaKeywords($order = Criteria::ASC) Order by the meta_keywords column
 * @method     PageQuery orderByMetaContent($order = Criteria::ASC) Order by the meta_content column
 * @method     PageQuery orderByLinkName($order = Criteria::ASC) Order by the link_name column
 * @method     PageQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     PageQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     PageQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     PageQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     PageQuery groupById() Group by the id column
 * @method     PageQuery groupByWebsiteId() Group by the website_id column
 * @method     PageQuery groupByTemplateTypeId() Group by the template_type_id column
 * @method     PageQuery groupByMenuType() Group by the menu_type column
 * @method     PageQuery groupByPageContentDisplayTypeId() Group by the page_content_display_type_id column
 * @method     PageQuery groupByRank() Group by the rank column
 * @method     PageQuery groupByTitle() Group by the title column
 * @method     PageQuery groupByMetaTitle() Group by the meta_title column
 * @method     PageQuery groupByMetaDescription() Group by the meta_description column
 * @method     PageQuery groupByMetaKeywords() Group by the meta_keywords column
 * @method     PageQuery groupByMetaContent() Group by the meta_content column
 * @method     PageQuery groupByLinkName() Group by the link_name column
 * @method     PageQuery groupByUrl() Group by the url column
 * @method     PageQuery groupByStatus() Group by the status column
 * @method     PageQuery groupByCreatedAt() Group by the created_at column
 * @method     PageQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     PageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PageQuery leftJoinWebsite($relationAlias = null) Adds a LEFT JOIN clause to the query using the Website relation
 * @method     PageQuery rightJoinWebsite($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Website relation
 * @method     PageQuery innerJoinWebsite($relationAlias = null) Adds a INNER JOIN clause to the query using the Website relation
 *
 * @method     PageQuery leftJoinTemplateType($relationAlias = null) Adds a LEFT JOIN clause to the query using the TemplateType relation
 * @method     PageQuery rightJoinTemplateType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TemplateType relation
 * @method     PageQuery innerJoinTemplateType($relationAlias = null) Adds a INNER JOIN clause to the query using the TemplateType relation
 *
 * @method     PageQuery leftJoinPageContentDisplayType($relationAlias = null) Adds a LEFT JOIN clause to the query using the PageContentDisplayType relation
 * @method     PageQuery rightJoinPageContentDisplayType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PageContentDisplayType relation
 * @method     PageQuery innerJoinPageContentDisplayType($relationAlias = null) Adds a INNER JOIN clause to the query using the PageContentDisplayType relation
 *
 * @method     PageQuery leftJoinPageGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the PageGroup relation
 * @method     PageQuery rightJoinPageGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PageGroup relation
 * @method     PageQuery innerJoinPageGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the PageGroup relation
 *
 * @method     Page findOne(PropelPDO $con = null) Return the first Page matching the query
 * @method     Page findOneOrCreate(PropelPDO $con = null) Return the first Page matching the query, or a new Page object populated from the query conditions when no match is found
 *
 * @method     Page findOneById(string $id) Return the first Page filtered by the id column
 * @method     Page findOneByWebsiteId(string $website_id) Return the first Page filtered by the website_id column
 * @method     Page findOneByTemplateTypeId(string $template_type_id) Return the first Page filtered by the template_type_id column
 * @method     Page findOneByMenuType(int $menu_type) Return the first Page filtered by the menu_type column
 * @method     Page findOneByPageContentDisplayTypeId(string $page_content_display_type_id) Return the first Page filtered by the page_content_display_type_id column
 * @method     Page findOneByRank(int $rank) Return the first Page filtered by the rank column
 * @method     Page findOneByTitle(string $title) Return the first Page filtered by the title column
 * @method     Page findOneByMetaTitle(string $meta_title) Return the first Page filtered by the meta_title column
 * @method     Page findOneByMetaDescription(string $meta_description) Return the first Page filtered by the meta_description column
 * @method     Page findOneByMetaKeywords(string $meta_keywords) Return the first Page filtered by the meta_keywords column
 * @method     Page findOneByMetaContent(string $meta_content) Return the first Page filtered by the meta_content column
 * @method     Page findOneByLinkName(string $link_name) Return the first Page filtered by the link_name column
 * @method     Page findOneByUrl(string $url) Return the first Page filtered by the url column
 * @method     Page findOneByStatus(int $status) Return the first Page filtered by the status column
 * @method     Page findOneByCreatedAt(string $created_at) Return the first Page filtered by the created_at column
 * @method     Page findOneByUpdatedAt(string $updated_at) Return the first Page filtered by the updated_at column
 *
 * @method     array findById(string $id) Return Page objects filtered by the id column
 * @method     array findByWebsiteId(string $website_id) Return Page objects filtered by the website_id column
 * @method     array findByTemplateTypeId(string $template_type_id) Return Page objects filtered by the template_type_id column
 * @method     array findByMenuType(int $menu_type) Return Page objects filtered by the menu_type column
 * @method     array findByPageContentDisplayTypeId(string $page_content_display_type_id) Return Page objects filtered by the page_content_display_type_id column
 * @method     array findByRank(int $rank) Return Page objects filtered by the rank column
 * @method     array findByTitle(string $title) Return Page objects filtered by the title column
 * @method     array findByMetaTitle(string $meta_title) Return Page objects filtered by the meta_title column
 * @method     array findByMetaDescription(string $meta_description) Return Page objects filtered by the meta_description column
 * @method     array findByMetaKeywords(string $meta_keywords) Return Page objects filtered by the meta_keywords column
 * @method     array findByMetaContent(string $meta_content) Return Page objects filtered by the meta_content column
 * @method     array findByLinkName(string $link_name) Return Page objects filtered by the link_name column
 * @method     array findByUrl(string $url) Return Page objects filtered by the url column
 * @method     array findByStatus(int $status) Return Page objects filtered by the status column
 * @method     array findByCreatedAt(string $created_at) Return Page objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Page objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BasePageQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasePageQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Page', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PageQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PageQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PageQuery) {
			return $criteria;
		}
		$query = new PageQuery();
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
	 * @return    Page|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = PagePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    PageQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PagePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PageQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PagePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     string $id The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PageQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PagePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the website_id column
	 * 
	 * @param     string $websiteId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PageQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PagePeer::WEBSITE_ID, $websiteId, $comparison);
	}

	/**
	 * Filter the query on the template_type_id column
	 * 
	 * @param     string $templateTypeId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PageQuery The current query, for fluid interface
	 */
	public function filterByTemplateTypeId($templateTypeId = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($templateTypeId)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $templateTypeId)) {
				$templateTypeId = str_replace('*', '%', $templateTypeId);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PagePeer::TEMPLATE_TYPE_ID, $templateTypeId, $comparison);
	}

	/**
	 * Filter the query on the menu_type column
	 * 
	 * @param     int|array $menuType The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PageQuery The current query, for fluid interface
	 */
	public function filterByMenuType($menuType = null, $comparison = null)
	{
		if (is_array($menuType)) {
			$useMinMax = false;
			if (isset($menuType['min'])) {
				$this->addUsingAlias(PagePeer::MENU_TYPE, $menuType['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($menuType['max'])) {
				$this->addUsingAlias(PagePeer::MENU_TYPE, $menuType['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PagePeer::MENU_TYPE, $menuType, $comparison);
	}

	/**
	 * Filter the query on the page_content_display_type_id column
	 * 
	 * @param     string $pageContentDisplayTypeId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PageQuery The current query, for fluid interface
	 */
	public function filterByPageContentDisplayTypeId($pageContentDisplayTypeId = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($pageContentDisplayTypeId)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $pageContentDisplayTypeId)) {
				$pageContentDisplayTypeId = str_replace('*', '%', $pageContentDisplayTypeId);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PagePeer::PAGE_CONTENT_DISPLAY_TYPE_ID, $pageContentDisplayTypeId, $comparison);
	}

	/**
	 * Filter the query on the rank column
	 * 
	 * @param     int|array $rank The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PageQuery The current query, for fluid interface
	 */
	public function filterByRank($rank = null, $comparison = null)
	{
		if (is_array($rank)) {
			$useMinMax = false;
			if (isset($rank['min'])) {
				$this->addUsingAlias(PagePeer::RANK, $rank['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($rank['max'])) {
				$this->addUsingAlias(PagePeer::RANK, $rank['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PagePeer::RANK, $rank, $comparison);
	}

	/**
	 * Filter the query on the title column
	 * 
	 * @param     string $title The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PageQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PagePeer::TITLE, $title, $comparison);
	}

	/**
	 * Filter the query on the meta_title column
	 * 
	 * @param     string $metaTitle The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PageQuery The current query, for fluid interface
	 */
	public function filterByMetaTitle($metaTitle = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($metaTitle)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $metaTitle)) {
				$metaTitle = str_replace('*', '%', $metaTitle);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PagePeer::META_TITLE, $metaTitle, $comparison);
	}

	/**
	 * Filter the query on the meta_description column
	 * 
	 * @param     string $metaDescription The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PageQuery The current query, for fluid interface
	 */
	public function filterByMetaDescription($metaDescription = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($metaDescription)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $metaDescription)) {
				$metaDescription = str_replace('*', '%', $metaDescription);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PagePeer::META_DESCRIPTION, $metaDescription, $comparison);
	}

	/**
	 * Filter the query on the meta_keywords column
	 * 
	 * @param     string $metaKeywords The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PageQuery The current query, for fluid interface
	 */
	public function filterByMetaKeywords($metaKeywords = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($metaKeywords)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $metaKeywords)) {
				$metaKeywords = str_replace('*', '%', $metaKeywords);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PagePeer::META_KEYWORDS, $metaKeywords, $comparison);
	}

	/**
	 * Filter the query on the meta_content column
	 * 
	 * @param     string $metaContent The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PageQuery The current query, for fluid interface
	 */
	public function filterByMetaContent($metaContent = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($metaContent)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $metaContent)) {
				$metaContent = str_replace('*', '%', $metaContent);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PagePeer::META_CONTENT, $metaContent, $comparison);
	}

	/**
	 * Filter the query on the link_name column
	 * 
	 * @param     string $linkName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PageQuery The current query, for fluid interface
	 */
	public function filterByLinkName($linkName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($linkName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $linkName)) {
				$linkName = str_replace('*', '%', $linkName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PagePeer::LINK_NAME, $linkName, $comparison);
	}

	/**
	 * Filter the query on the url column
	 * 
	 * @param     string $url The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PageQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PagePeer::URL, $url, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     int|array $status The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PageQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (is_array($status)) {
			$useMinMax = false;
			if (isset($status['min'])) {
				$this->addUsingAlias(PagePeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($status['max'])) {
				$this->addUsingAlias(PagePeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PagePeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PageQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(PagePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(PagePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PagePeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PageQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(PagePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(PagePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PagePeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related Website object
	 *
	 * @param     Website $website  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PageQuery The current query, for fluid interface
	 */
	public function filterByWebsite($website, $comparison = null)
	{
		return $this
			->addUsingAlias(PagePeer::WEBSITE_ID, $website->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Website relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PageQuery The current query, for fluid interface
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
	 * Filter the query by a related TemplateType object
	 *
	 * @param     TemplateType $templateType  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PageQuery The current query, for fluid interface
	 */
	public function filterByTemplateType($templateType, $comparison = null)
	{
		return $this
			->addUsingAlias(PagePeer::TEMPLATE_TYPE_ID, $templateType->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the TemplateType relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PageQuery The current query, for fluid interface
	 */
	public function joinTemplateType($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('TemplateType');
		
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
			$this->addJoinObject($join, 'TemplateType');
		}
		
		return $this;
	}

	/**
	 * Use the TemplateType relation TemplateType object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TemplateTypeQuery A secondary query class using the current class as primary query
	 */
	public function useTemplateTypeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinTemplateType($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'TemplateType', 'TemplateTypeQuery');
	}

	/**
	 * Filter the query by a related PageContentDisplayType object
	 *
	 * @param     PageContentDisplayType $pageContentDisplayType  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PageQuery The current query, for fluid interface
	 */
	public function filterByPageContentDisplayType($pageContentDisplayType, $comparison = null)
	{
		return $this
			->addUsingAlias(PagePeer::PAGE_CONTENT_DISPLAY_TYPE_ID, $pageContentDisplayType->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the PageContentDisplayType relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PageQuery The current query, for fluid interface
	 */
	public function joinPageContentDisplayType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PageContentDisplayType');
		
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
			$this->addJoinObject($join, 'PageContentDisplayType');
		}
		
		return $this;
	}

	/**
	 * Use the PageContentDisplayType relation PageContentDisplayType object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PageContentDisplayTypeQuery A secondary query class using the current class as primary query
	 */
	public function usePageContentDisplayTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPageContentDisplayType($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PageContentDisplayType', 'PageContentDisplayTypeQuery');
	}

	/**
	 * Filter the query by a related PageGroup object
	 *
	 * @param     PageGroup $pageGroup  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PageQuery The current query, for fluid interface
	 */
	public function filterByPageGroup($pageGroup, $comparison = null)
	{
		return $this
			->addUsingAlias(PagePeer::ID, $pageGroup->getPageId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the PageGroup relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PageQuery The current query, for fluid interface
	 */
	public function joinPageGroup($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PageGroup');
		
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
			$this->addJoinObject($join, 'PageGroup');
		}
		
		return $this;
	}

	/**
	 * Use the PageGroup relation PageGroup object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PageGroupQuery A secondary query class using the current class as primary query
	 */
	public function usePageGroupQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinPageGroup($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PageGroup', 'PageGroupQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Page $page Object to remove from the list of results
	 *
	 * @return    PageQuery The current query, for fluid interface
	 */
	public function prune($page = null)
	{
		if ($page) {
			$this->addUsingAlias(PagePeer::ID, $page->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	// sluggable behavior
	
	/**
	 * Filter the query on the slug column
	 * 
	 * @param     string $slug The value to use as filter.
	 *
	 * @return    PageQuery The current query, for fluid interface
	 */
	public function filterBySlug($slug)
	{
		return $this->addUsingAlias(PagePeer::URL, $slug, Criteria::EQUAL);
	}
	
	/**
	 * Find one object based on its slug
	 * 
	 * @param     string $slug The value to use as filter.
	 * @param     PropelPDO $con The optional connection object
	 *
	 * @return    Page the result, formatted by the current formatter
	 */
	public function findOneBySlug($slug, $con = null)
	{
		return $this->filterBySlug($slug)->findOne($con);
	}

	// timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     PageQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(PagePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     PageQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(PagePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     PageQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(PagePeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     PageQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(PagePeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     PageQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(PagePeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     PageQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(PagePeer::CREATED_AT);
	}

} // BasePageQuery
