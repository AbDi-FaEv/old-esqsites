<?php


/**
 * Base class that represents a query for the 'esq_website_attributes' table.
 *
 * 
 *
 * @method     WebsiteAttributeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     WebsiteAttributeQuery orderByCgCode($order = Criteria::ASC) Order by the cg_code column
 * @method     WebsiteAttributeQuery orderByRank($order = Criteria::ASC) Order by the rank column
 * @method     WebsiteAttributeQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     WebsiteAttributeQuery orderByMaxMainMenuPages($order = Criteria::ASC) Order by the max_main_menu_pages column
 * @method     WebsiteAttributeQuery orderByMaxEmails($order = Criteria::ASC) Order by the max_emails column
 * @method     WebsiteAttributeQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     WebsiteAttributeQuery orderBySetupPrice($order = Criteria::ASC) Order by the setup_price column
 * @method     WebsiteAttributeQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     WebsiteAttributeQuery orderByIncludesPaymentPage($order = Criteria::ASC) Order by the includes_payment_page column
 *
 * @method     WebsiteAttributeQuery groupById() Group by the id column
 * @method     WebsiteAttributeQuery groupByCgCode() Group by the cg_code column
 * @method     WebsiteAttributeQuery groupByRank() Group by the rank column
 * @method     WebsiteAttributeQuery groupByDescription() Group by the description column
 * @method     WebsiteAttributeQuery groupByMaxMainMenuPages() Group by the max_main_menu_pages column
 * @method     WebsiteAttributeQuery groupByMaxEmails() Group by the max_emails column
 * @method     WebsiteAttributeQuery groupByPrice() Group by the price column
 * @method     WebsiteAttributeQuery groupBySetupPrice() Group by the setup_price column
 * @method     WebsiteAttributeQuery groupByStatus() Group by the status column
 * @method     WebsiteAttributeQuery groupByIncludesPaymentPage() Group by the includes_payment_page column
 *
 * @method     WebsiteAttributeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     WebsiteAttributeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     WebsiteAttributeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     WebsiteAttributeQuery leftJoinWebsite($relationAlias = null) Adds a LEFT JOIN clause to the query using the Website relation
 * @method     WebsiteAttributeQuery rightJoinWebsite($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Website relation
 * @method     WebsiteAttributeQuery innerJoinWebsite($relationAlias = null) Adds a INNER JOIN clause to the query using the Website relation
 *
 * @method     WebsiteAttributeQuery leftJoinCouponToHostingPlanLink($relationAlias = null) Adds a LEFT JOIN clause to the query using the CouponToHostingPlanLink relation
 * @method     WebsiteAttributeQuery rightJoinCouponToHostingPlanLink($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CouponToHostingPlanLink relation
 * @method     WebsiteAttributeQuery innerJoinCouponToHostingPlanLink($relationAlias = null) Adds a INNER JOIN clause to the query using the CouponToHostingPlanLink relation
 *
 * @method     WebsiteAttribute findOne(PropelPDO $con = null) Return the first WebsiteAttribute matching the query
 * @method     WebsiteAttribute findOneOrCreate(PropelPDO $con = null) Return the first WebsiteAttribute matching the query, or a new WebsiteAttribute object populated from the query conditions when no match is found
 *
 * @method     WebsiteAttribute findOneById(string $id) Return the first WebsiteAttribute filtered by the id column
 * @method     WebsiteAttribute findOneByCgCode(string $cg_code) Return the first WebsiteAttribute filtered by the cg_code column
 * @method     WebsiteAttribute findOneByRank(int $rank) Return the first WebsiteAttribute filtered by the rank column
 * @method     WebsiteAttribute findOneByDescription(string $description) Return the first WebsiteAttribute filtered by the description column
 * @method     WebsiteAttribute findOneByMaxMainMenuPages(int $max_main_menu_pages) Return the first WebsiteAttribute filtered by the max_main_menu_pages column
 * @method     WebsiteAttribute findOneByMaxEmails(int $max_emails) Return the first WebsiteAttribute filtered by the max_emails column
 * @method     WebsiteAttribute findOneByPrice(double $price) Return the first WebsiteAttribute filtered by the price column
 * @method     WebsiteAttribute findOneBySetupPrice(double $setup_price) Return the first WebsiteAttribute filtered by the setup_price column
 * @method     WebsiteAttribute findOneByStatus(int $status) Return the first WebsiteAttribute filtered by the status column
 * @method     WebsiteAttribute findOneByIncludesPaymentPage(boolean $includes_payment_page) Return the first WebsiteAttribute filtered by the includes_payment_page column
 *
 * @method     array findById(string $id) Return WebsiteAttribute objects filtered by the id column
 * @method     array findByCgCode(string $cg_code) Return WebsiteAttribute objects filtered by the cg_code column
 * @method     array findByRank(int $rank) Return WebsiteAttribute objects filtered by the rank column
 * @method     array findByDescription(string $description) Return WebsiteAttribute objects filtered by the description column
 * @method     array findByMaxMainMenuPages(int $max_main_menu_pages) Return WebsiteAttribute objects filtered by the max_main_menu_pages column
 * @method     array findByMaxEmails(int $max_emails) Return WebsiteAttribute objects filtered by the max_emails column
 * @method     array findByPrice(double $price) Return WebsiteAttribute objects filtered by the price column
 * @method     array findBySetupPrice(double $setup_price) Return WebsiteAttribute objects filtered by the setup_price column
 * @method     array findByStatus(int $status) Return WebsiteAttribute objects filtered by the status column
 * @method     array findByIncludesPaymentPage(boolean $includes_payment_page) Return WebsiteAttribute objects filtered by the includes_payment_page column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseWebsiteAttributeQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseWebsiteAttributeQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'WebsiteAttribute', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new WebsiteAttributeQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    WebsiteAttributeQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof WebsiteAttributeQuery) {
			return $criteria;
		}
		$query = new WebsiteAttributeQuery();
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
	 * @return    WebsiteAttribute|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = WebsiteAttributePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    WebsiteAttributeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(WebsiteAttributePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    WebsiteAttributeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(WebsiteAttributePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     string $id The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteAttributeQuery The current query, for fluid interface
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
		return $this->addUsingAlias(WebsiteAttributePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the cg_code column
	 * 
	 * @param     string $cgCode The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteAttributeQuery The current query, for fluid interface
	 */
	public function filterByCgCode($cgCode = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($cgCode)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $cgCode)) {
				$cgCode = str_replace('*', '%', $cgCode);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WebsiteAttributePeer::CG_CODE, $cgCode, $comparison);
	}

	/**
	 * Filter the query on the rank column
	 * 
	 * @param     int|array $rank The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteAttributeQuery The current query, for fluid interface
	 */
	public function filterByRank($rank = null, $comparison = null)
	{
		if (is_array($rank)) {
			$useMinMax = false;
			if (isset($rank['min'])) {
				$this->addUsingAlias(WebsiteAttributePeer::RANK, $rank['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($rank['max'])) {
				$this->addUsingAlias(WebsiteAttributePeer::RANK, $rank['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WebsiteAttributePeer::RANK, $rank, $comparison);
	}

	/**
	 * Filter the query on the description column
	 * 
	 * @param     string $description The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteAttributeQuery The current query, for fluid interface
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
		return $this->addUsingAlias(WebsiteAttributePeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query on the max_main_menu_pages column
	 * 
	 * @param     int|array $maxMainMenuPages The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteAttributeQuery The current query, for fluid interface
	 */
	public function filterByMaxMainMenuPages($maxMainMenuPages = null, $comparison = null)
	{
		if (is_array($maxMainMenuPages)) {
			$useMinMax = false;
			if (isset($maxMainMenuPages['min'])) {
				$this->addUsingAlias(WebsiteAttributePeer::MAX_MAIN_MENU_PAGES, $maxMainMenuPages['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($maxMainMenuPages['max'])) {
				$this->addUsingAlias(WebsiteAttributePeer::MAX_MAIN_MENU_PAGES, $maxMainMenuPages['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WebsiteAttributePeer::MAX_MAIN_MENU_PAGES, $maxMainMenuPages, $comparison);
	}

	/**
	 * Filter the query on the max_emails column
	 * 
	 * @param     int|array $maxEmails The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteAttributeQuery The current query, for fluid interface
	 */
	public function filterByMaxEmails($maxEmails = null, $comparison = null)
	{
		if (is_array($maxEmails)) {
			$useMinMax = false;
			if (isset($maxEmails['min'])) {
				$this->addUsingAlias(WebsiteAttributePeer::MAX_EMAILS, $maxEmails['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($maxEmails['max'])) {
				$this->addUsingAlias(WebsiteAttributePeer::MAX_EMAILS, $maxEmails['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WebsiteAttributePeer::MAX_EMAILS, $maxEmails, $comparison);
	}

	/**
	 * Filter the query on the price column
	 * 
	 * @param     double|array $price The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteAttributeQuery The current query, for fluid interface
	 */
	public function filterByPrice($price = null, $comparison = null)
	{
		if (is_array($price)) {
			$useMinMax = false;
			if (isset($price['min'])) {
				$this->addUsingAlias(WebsiteAttributePeer::PRICE, $price['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($price['max'])) {
				$this->addUsingAlias(WebsiteAttributePeer::PRICE, $price['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WebsiteAttributePeer::PRICE, $price, $comparison);
	}

	/**
	 * Filter the query on the setup_price column
	 * 
	 * @param     double|array $setupPrice The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteAttributeQuery The current query, for fluid interface
	 */
	public function filterBySetupPrice($setupPrice = null, $comparison = null)
	{
		if (is_array($setupPrice)) {
			$useMinMax = false;
			if (isset($setupPrice['min'])) {
				$this->addUsingAlias(WebsiteAttributePeer::SETUP_PRICE, $setupPrice['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($setupPrice['max'])) {
				$this->addUsingAlias(WebsiteAttributePeer::SETUP_PRICE, $setupPrice['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WebsiteAttributePeer::SETUP_PRICE, $setupPrice, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     int|array $status The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteAttributeQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (is_array($status)) {
			$useMinMax = false;
			if (isset($status['min'])) {
				$this->addUsingAlias(WebsiteAttributePeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($status['max'])) {
				$this->addUsingAlias(WebsiteAttributePeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WebsiteAttributePeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the includes_payment_page column
	 * 
	 * @param     boolean|string $includesPaymentPage The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteAttributeQuery The current query, for fluid interface
	 */
	public function filterByIncludesPaymentPage($includesPaymentPage = null, $comparison = null)
	{
		if (is_string($includesPaymentPage)) {
			$includes_payment_page = in_array(strtolower($includesPaymentPage), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(WebsiteAttributePeer::INCLUDES_PAYMENT_PAGE, $includesPaymentPage, $comparison);
	}

	/**
	 * Filter the query by a related Website object
	 *
	 * @param     Website $website  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteAttributeQuery The current query, for fluid interface
	 */
	public function filterByWebsite($website, $comparison = null)
	{
		return $this
			->addUsingAlias(WebsiteAttributePeer::ID, $website->getWebsiteAttributeId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Website relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WebsiteAttributeQuery The current query, for fluid interface
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
	 * Filter the query by a related CouponToHostingPlanLink object
	 *
	 * @param     CouponToHostingPlanLink $couponToHostingPlanLink  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteAttributeQuery The current query, for fluid interface
	 */
	public function filterByCouponToHostingPlanLink($couponToHostingPlanLink, $comparison = null)
	{
		return $this
			->addUsingAlias(WebsiteAttributePeer::ID, $couponToHostingPlanLink->getHostingPlanId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the CouponToHostingPlanLink relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WebsiteAttributeQuery The current query, for fluid interface
	 */
	public function joinCouponToHostingPlanLink($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('CouponToHostingPlanLink');
		
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
			$this->addJoinObject($join, 'CouponToHostingPlanLink');
		}
		
		return $this;
	}

	/**
	 * Use the CouponToHostingPlanLink relation CouponToHostingPlanLink object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CouponToHostingPlanLinkQuery A secondary query class using the current class as primary query
	 */
	public function useCouponToHostingPlanLinkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCouponToHostingPlanLink($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'CouponToHostingPlanLink', 'CouponToHostingPlanLinkQuery');
	}

	/**
	 * Filter the query by a related Coupon object
	 * using the esq_coupons_to_hosting_plans table as cross reference
	 *
	 * @param     Coupon $coupon the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteAttributeQuery The current query, for fluid interface
	 */
	public function filterByCoupon($coupon, $comparison = Criteria::EQUAL)
	{
		return $this
			->useCouponToHostingPlanLinkQuery()
				->filterByCoupon($coupon, $comparison)
			->endUse();
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param     WebsiteAttribute $websiteAttribute Object to remove from the list of results
	 *
	 * @return    WebsiteAttributeQuery The current query, for fluid interface
	 */
	public function prune($websiteAttribute = null)
	{
		if ($websiteAttribute) {
			$this->addUsingAlias(WebsiteAttributePeer::ID, $websiteAttribute->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseWebsiteAttributeQuery
