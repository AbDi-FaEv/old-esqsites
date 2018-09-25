<?php


/**
 * Base class that represents a query for the 'esq_websites' table.
 *
 * 
 *
 * @method     WebsiteQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     WebsiteQuery orderByCgId($order = Criteria::ASC) Order by the cg_id column
 * @method     WebsiteQuery orderByCimCustomerProfileId($order = Criteria::ASC) Order by the cim_customer_profile_id column
 * @method     WebsiteQuery orderByCimPaymentProfileId($order = Criteria::ASC) Order by the cim_payment_profile_id column
 * @method     WebsiteQuery orderByCustomerId($order = Criteria::ASC) Order by the customer_id column
 * @method     WebsiteQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     WebsiteQuery orderByRank($order = Criteria::ASC) Order by the rank column
 * @method     WebsiteQuery orderByFirmName($order = Criteria::ASC) Order by the firm_name column
 * @method     WebsiteQuery orderByFirmType($order = Criteria::ASC) Order by the firm_type column
 * @method     WebsiteQuery orderByWebsiteName($order = Criteria::ASC) Order by the website_name column
 * @method     WebsiteQuery orderByPrimaryDomainId($order = Criteria::ASC) Order by the primary_domain_id column
 * @method     WebsiteQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     WebsiteQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     WebsiteQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method     WebsiteQuery orderByState($order = Criteria::ASC) Order by the state column
 * @method     WebsiteQuery orderByZip($order = Criteria::ASC) Order by the zip column
 * @method     WebsiteQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     WebsiteQuery orderByFax($order = Criteria::ASC) Order by the fax column
 * @method     WebsiteQuery orderByTemplateId($order = Criteria::ASC) Order by the template_id column
 * @method     WebsiteQuery orderByWebsiteAttributeId($order = Criteria::ASC) Order by the website_attribute_id column
 * @method     WebsiteQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     WebsiteQuery orderByPath($order = Criteria::ASC) Order by the path column
 * @method     WebsiteQuery orderByHostId($order = Criteria::ASC) Order by the host_id column
 * @method     WebsiteQuery orderByAnalyticsCode($order = Criteria::ASC) Order by the analytics_code column
 * @method     WebsiteQuery orderByPaymentAccountId($order = Criteria::ASC) Order by the payment_account_id column
 * @method     WebsiteQuery orderByMetaDescription($order = Criteria::ASC) Order by the meta_description column
 * @method     WebsiteQuery orderByMetaKeywords($order = Criteria::ASC) Order by the meta_keywords column
 * @method     WebsiteQuery orderBySocialMedia($order = Criteria::ASC) Order by the social_media column
 * @method     WebsiteQuery orderByLastPaymentUpdate($order = Criteria::ASC) Order by the last_payment_update column
 * @method     WebsiteQuery orderByLastBillingDate($order = Criteria::ASC) Order by the last_billing_date column
 * @method     WebsiteQuery orderByCancelledAt($order = Criteria::ASC) Order by the cancelled_at column
 * @method     WebsiteQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     WebsiteQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     WebsiteQuery groupById() Group by the id column
 * @method     WebsiteQuery groupByCgId() Group by the cg_id column
 * @method     WebsiteQuery groupByCimCustomerProfileId() Group by the cim_customer_profile_id column
 * @method     WebsiteQuery groupByCimPaymentProfileId() Group by the cim_payment_profile_id column
 * @method     WebsiteQuery groupByCustomerId() Group by the customer_id column
 * @method     WebsiteQuery groupByType() Group by the type column
 * @method     WebsiteQuery groupByRank() Group by the rank column
 * @method     WebsiteQuery groupByFirmName() Group by the firm_name column
 * @method     WebsiteQuery groupByFirmType() Group by the firm_type column
 * @method     WebsiteQuery groupByWebsiteName() Group by the website_name column
 * @method     WebsiteQuery groupByPrimaryDomainId() Group by the primary_domain_id column
 * @method     WebsiteQuery groupByEmail() Group by the email column
 * @method     WebsiteQuery groupByAddress() Group by the address column
 * @method     WebsiteQuery groupByCity() Group by the city column
 * @method     WebsiteQuery groupByState() Group by the state column
 * @method     WebsiteQuery groupByZip() Group by the zip column
 * @method     WebsiteQuery groupByPhone() Group by the phone column
 * @method     WebsiteQuery groupByFax() Group by the fax column
 * @method     WebsiteQuery groupByTemplateId() Group by the template_id column
 * @method     WebsiteQuery groupByWebsiteAttributeId() Group by the website_attribute_id column
 * @method     WebsiteQuery groupByStatus() Group by the status column
 * @method     WebsiteQuery groupByPath() Group by the path column
 * @method     WebsiteQuery groupByHostId() Group by the host_id column
 * @method     WebsiteQuery groupByAnalyticsCode() Group by the analytics_code column
 * @method     WebsiteQuery groupByPaymentAccountId() Group by the payment_account_id column
 * @method     WebsiteQuery groupByMetaDescription() Group by the meta_description column
 * @method     WebsiteQuery groupByMetaKeywords() Group by the meta_keywords column
 * @method     WebsiteQuery groupBySocialMedia() Group by the social_media column
 * @method     WebsiteQuery groupByLastPaymentUpdate() Group by the last_payment_update column
 * @method     WebsiteQuery groupByLastBillingDate() Group by the last_billing_date column
 * @method     WebsiteQuery groupByCancelledAt() Group by the cancelled_at column
 * @method     WebsiteQuery groupByCreatedAt() Group by the created_at column
 * @method     WebsiteQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     WebsiteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     WebsiteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     WebsiteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     WebsiteQuery leftJoinCustomer($relationAlias = null) Adds a LEFT JOIN clause to the query using the Customer relation
 * @method     WebsiteQuery rightJoinCustomer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Customer relation
 * @method     WebsiteQuery innerJoinCustomer($relationAlias = null) Adds a INNER JOIN clause to the query using the Customer relation
 *
 * @method     WebsiteQuery leftJoinPrimaryDomain($relationAlias = null) Adds a LEFT JOIN clause to the query using the PrimaryDomain relation
 * @method     WebsiteQuery rightJoinPrimaryDomain($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PrimaryDomain relation
 * @method     WebsiteQuery innerJoinPrimaryDomain($relationAlias = null) Adds a INNER JOIN clause to the query using the PrimaryDomain relation
 *
 * @method     WebsiteQuery leftJoinWebsiteTemplate($relationAlias = null) Adds a LEFT JOIN clause to the query using the WebsiteTemplate relation
 * @method     WebsiteQuery rightJoinWebsiteTemplate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the WebsiteTemplate relation
 * @method     WebsiteQuery innerJoinWebsiteTemplate($relationAlias = null) Adds a INNER JOIN clause to the query using the WebsiteTemplate relation
 *
 * @method     WebsiteQuery leftJoinWebsiteAttribute($relationAlias = null) Adds a LEFT JOIN clause to the query using the WebsiteAttribute relation
 * @method     WebsiteQuery rightJoinWebsiteAttribute($relationAlias = null) Adds a RIGHT JOIN clause to the query using the WebsiteAttribute relation
 * @method     WebsiteQuery innerJoinWebsiteAttribute($relationAlias = null) Adds a INNER JOIN clause to the query using the WebsiteAttribute relation
 *
 * @method     WebsiteQuery leftJoinHost($relationAlias = null) Adds a LEFT JOIN clause to the query using the Host relation
 * @method     WebsiteQuery rightJoinHost($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Host relation
 * @method     WebsiteQuery innerJoinHost($relationAlias = null) Adds a INNER JOIN clause to the query using the Host relation
 *
 * @method     WebsiteQuery leftJoinCheddarGetterNotification($relationAlias = null) Adds a LEFT JOIN clause to the query using the CheddarGetterNotification relation
 * @method     WebsiteQuery rightJoinCheddarGetterNotification($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CheddarGetterNotification relation
 * @method     WebsiteQuery innerJoinCheddarGetterNotification($relationAlias = null) Adds a INNER JOIN clause to the query using the CheddarGetterNotification relation
 *
 * @method     WebsiteQuery leftJoinDomain($relationAlias = null) Adds a LEFT JOIN clause to the query using the Domain relation
 * @method     WebsiteQuery rightJoinDomain($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Domain relation
 * @method     WebsiteQuery innerJoinDomain($relationAlias = null) Adds a INNER JOIN clause to the query using the Domain relation
 *
 * @method     WebsiteQuery leftJoinCouponUsage($relationAlias = null) Adds a LEFT JOIN clause to the query using the CouponUsage relation
 * @method     WebsiteQuery rightJoinCouponUsage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CouponUsage relation
 * @method     WebsiteQuery innerJoinCouponUsage($relationAlias = null) Adds a INNER JOIN clause to the query using the CouponUsage relation
 *
 * @method     WebsiteQuery leftJoinEmailAccount($relationAlias = null) Adds a LEFT JOIN clause to the query using the EmailAccount relation
 * @method     WebsiteQuery rightJoinEmailAccount($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EmailAccount relation
 * @method     WebsiteQuery innerJoinEmailAccount($relationAlias = null) Adds a INNER JOIN clause to the query using the EmailAccount relation
 *
 * @method     WebsiteQuery leftJoinPage($relationAlias = null) Adds a LEFT JOIN clause to the query using the Page relation
 * @method     WebsiteQuery rightJoinPage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Page relation
 * @method     WebsiteQuery innerJoinPage($relationAlias = null) Adds a INNER JOIN clause to the query using the Page relation
 *
 * @method     WebsiteQuery leftJoinClientMessage($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClientMessage relation
 * @method     WebsiteQuery rightJoinClientMessage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClientMessage relation
 * @method     WebsiteQuery innerJoinClientMessage($relationAlias = null) Adds a INNER JOIN clause to the query using the ClientMessage relation
 *
 * @method     WebsiteQuery leftJoinTemplateCustomization($relationAlias = null) Adds a LEFT JOIN clause to the query using the TemplateCustomization relation
 * @method     WebsiteQuery rightJoinTemplateCustomization($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TemplateCustomization relation
 * @method     WebsiteQuery innerJoinTemplateCustomization($relationAlias = null) Adds a INNER JOIN clause to the query using the TemplateCustomization relation
 *
 * @method     Website findOne(PropelPDO $con = null) Return the first Website matching the query
 * @method     Website findOneOrCreate(PropelPDO $con = null) Return the first Website matching the query, or a new Website object populated from the query conditions when no match is found
 *
 * @method     Website findOneById(string $id) Return the first Website filtered by the id column
 * @method     Website findOneByCgId(string $cg_id) Return the first Website filtered by the cg_id column
 * @method     Website findOneByCimCustomerProfileId(string $cim_customer_profile_id) Return the first Website filtered by the cim_customer_profile_id column
 * @method     Website findOneByCimPaymentProfileId(string $cim_payment_profile_id) Return the first Website filtered by the cim_payment_profile_id column
 * @method     Website findOneByCustomerId(string $customer_id) Return the first Website filtered by the customer_id column
 * @method     Website findOneByType(int $type) Return the first Website filtered by the type column
 * @method     Website findOneByRank(int $rank) Return the first Website filtered by the rank column
 * @method     Website findOneByFirmName(string $firm_name) Return the first Website filtered by the firm_name column
 * @method     Website findOneByFirmType(string $firm_type) Return the first Website filtered by the firm_type column
 * @method     Website findOneByWebsiteName(string $website_name) Return the first Website filtered by the website_name column
 * @method     Website findOneByPrimaryDomainId(string $primary_domain_id) Return the first Website filtered by the primary_domain_id column
 * @method     Website findOneByEmail(string $email) Return the first Website filtered by the email column
 * @method     Website findOneByAddress(string $address) Return the first Website filtered by the address column
 * @method     Website findOneByCity(string $city) Return the first Website filtered by the city column
 * @method     Website findOneByState(string $state) Return the first Website filtered by the state column
 * @method     Website findOneByZip(string $zip) Return the first Website filtered by the zip column
 * @method     Website findOneByPhone(string $phone) Return the first Website filtered by the phone column
 * @method     Website findOneByFax(string $fax) Return the first Website filtered by the fax column
 * @method     Website findOneByTemplateId(string $template_id) Return the first Website filtered by the template_id column
 * @method     Website findOneByWebsiteAttributeId(string $website_attribute_id) Return the first Website filtered by the website_attribute_id column
 * @method     Website findOneByStatus(int $status) Return the first Website filtered by the status column
 * @method     Website findOneByPath(string $path) Return the first Website filtered by the path column
 * @method     Website findOneByHostId(string $host_id) Return the first Website filtered by the host_id column
 * @method     Website findOneByAnalyticsCode(string $analytics_code) Return the first Website filtered by the analytics_code column
 * @method     Website findOneByPaymentAccountId(string $payment_account_id) Return the first Website filtered by the payment_account_id column
 * @method     Website findOneByMetaDescription(string $meta_description) Return the first Website filtered by the meta_description column
 * @method     Website findOneByMetaKeywords(string $meta_keywords) Return the first Website filtered by the meta_keywords column
 * @method     Website findOneBySocialMedia(string $social_media) Return the first Website filtered by the social_media column
 * @method     Website findOneByLastPaymentUpdate(string $last_payment_update) Return the first Website filtered by the last_payment_update column
 * @method     Website findOneByLastBillingDate(string $last_billing_date) Return the first Website filtered by the last_billing_date column
 * @method     Website findOneByCancelledAt(string $cancelled_at) Return the first Website filtered by the cancelled_at column
 * @method     Website findOneByCreatedAt(string $created_at) Return the first Website filtered by the created_at column
 * @method     Website findOneByUpdatedAt(string $updated_at) Return the first Website filtered by the updated_at column
 *
 * @method     array findById(string $id) Return Website objects filtered by the id column
 * @method     array findByCgId(string $cg_id) Return Website objects filtered by the cg_id column
 * @method     array findByCimCustomerProfileId(string $cim_customer_profile_id) Return Website objects filtered by the cim_customer_profile_id column
 * @method     array findByCimPaymentProfileId(string $cim_payment_profile_id) Return Website objects filtered by the cim_payment_profile_id column
 * @method     array findByCustomerId(string $customer_id) Return Website objects filtered by the customer_id column
 * @method     array findByType(int $type) Return Website objects filtered by the type column
 * @method     array findByRank(int $rank) Return Website objects filtered by the rank column
 * @method     array findByFirmName(string $firm_name) Return Website objects filtered by the firm_name column
 * @method     array findByFirmType(string $firm_type) Return Website objects filtered by the firm_type column
 * @method     array findByWebsiteName(string $website_name) Return Website objects filtered by the website_name column
 * @method     array findByPrimaryDomainId(string $primary_domain_id) Return Website objects filtered by the primary_domain_id column
 * @method     array findByEmail(string $email) Return Website objects filtered by the email column
 * @method     array findByAddress(string $address) Return Website objects filtered by the address column
 * @method     array findByCity(string $city) Return Website objects filtered by the city column
 * @method     array findByState(string $state) Return Website objects filtered by the state column
 * @method     array findByZip(string $zip) Return Website objects filtered by the zip column
 * @method     array findByPhone(string $phone) Return Website objects filtered by the phone column
 * @method     array findByFax(string $fax) Return Website objects filtered by the fax column
 * @method     array findByTemplateId(string $template_id) Return Website objects filtered by the template_id column
 * @method     array findByWebsiteAttributeId(string $website_attribute_id) Return Website objects filtered by the website_attribute_id column
 * @method     array findByStatus(int $status) Return Website objects filtered by the status column
 * @method     array findByPath(string $path) Return Website objects filtered by the path column
 * @method     array findByHostId(string $host_id) Return Website objects filtered by the host_id column
 * @method     array findByAnalyticsCode(string $analytics_code) Return Website objects filtered by the analytics_code column
 * @method     array findByPaymentAccountId(string $payment_account_id) Return Website objects filtered by the payment_account_id column
 * @method     array findByMetaDescription(string $meta_description) Return Website objects filtered by the meta_description column
 * @method     array findByMetaKeywords(string $meta_keywords) Return Website objects filtered by the meta_keywords column
 * @method     array findBySocialMedia(string $social_media) Return Website objects filtered by the social_media column
 * @method     array findByLastPaymentUpdate(string $last_payment_update) Return Website objects filtered by the last_payment_update column
 * @method     array findByLastBillingDate(string $last_billing_date) Return Website objects filtered by the last_billing_date column
 * @method     array findByCancelledAt(string $cancelled_at) Return Website objects filtered by the cancelled_at column
 * @method     array findByCreatedAt(string $created_at) Return Website objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Website objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseWebsiteQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseWebsiteQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Website', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new WebsiteQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    WebsiteQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof WebsiteQuery) {
			return $criteria;
		}
		$query = new WebsiteQuery();
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
	 * @return    Website|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = WebsitePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(WebsitePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(WebsitePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     string $id The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
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
		return $this->addUsingAlias(WebsitePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the cg_id column
	 * 
	 * @param     string $cgId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByCgId($cgId = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($cgId)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $cgId)) {
				$cgId = str_replace('*', '%', $cgId);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WebsitePeer::CG_ID, $cgId, $comparison);
	}

	/**
	 * Filter the query on the cim_customer_profile_id column
	 * 
	 * @param     string $cimCustomerProfileId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByCimCustomerProfileId($cimCustomerProfileId = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($cimCustomerProfileId)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $cimCustomerProfileId)) {
				$cimCustomerProfileId = str_replace('*', '%', $cimCustomerProfileId);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WebsitePeer::CIM_CUSTOMER_PROFILE_ID, $cimCustomerProfileId, $comparison);
	}

	/**
	 * Filter the query on the cim_payment_profile_id column
	 * 
	 * @param     string $cimPaymentProfileId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByCimPaymentProfileId($cimPaymentProfileId = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($cimPaymentProfileId)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $cimPaymentProfileId)) {
				$cimPaymentProfileId = str_replace('*', '%', $cimPaymentProfileId);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WebsitePeer::CIM_PAYMENT_PROFILE_ID, $cimPaymentProfileId, $comparison);
	}

	/**
	 * Filter the query on the customer_id column
	 * 
	 * @param     string $customerId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
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
		return $this->addUsingAlias(WebsitePeer::CUSTOMER_ID, $customerId, $comparison);
	}

	/**
	 * Filter the query on the type column
	 * 
	 * @param     int|array $type The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByType($type = null, $comparison = null)
	{
		if (is_array($type)) {
			$useMinMax = false;
			if (isset($type['min'])) {
				$this->addUsingAlias(WebsitePeer::TYPE, $type['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($type['max'])) {
				$this->addUsingAlias(WebsitePeer::TYPE, $type['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WebsitePeer::TYPE, $type, $comparison);
	}

	/**
	 * Filter the query on the rank column
	 * 
	 * @param     int|array $rank The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByRank($rank = null, $comparison = null)
	{
		if (is_array($rank)) {
			$useMinMax = false;
			if (isset($rank['min'])) {
				$this->addUsingAlias(WebsitePeer::RANK, $rank['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($rank['max'])) {
				$this->addUsingAlias(WebsitePeer::RANK, $rank['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WebsitePeer::RANK, $rank, $comparison);
	}

	/**
	 * Filter the query on the firm_name column
	 * 
	 * @param     string $firmName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByFirmName($firmName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($firmName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $firmName)) {
				$firmName = str_replace('*', '%', $firmName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WebsitePeer::FIRM_NAME, $firmName, $comparison);
	}

	/**
	 * Filter the query on the firm_type column
	 * 
	 * @param     string $firmType The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByFirmType($firmType = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($firmType)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $firmType)) {
				$firmType = str_replace('*', '%', $firmType);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WebsitePeer::FIRM_TYPE, $firmType, $comparison);
	}

	/**
	 * Filter the query on the website_name column
	 * 
	 * @param     string $websiteName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByWebsiteName($websiteName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($websiteName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $websiteName)) {
				$websiteName = str_replace('*', '%', $websiteName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WebsitePeer::WEBSITE_NAME, $websiteName, $comparison);
	}

	/**
	 * Filter the query on the primary_domain_id column
	 * 
	 * @param     string $primaryDomainId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryDomainId($primaryDomainId = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($primaryDomainId)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $primaryDomainId)) {
				$primaryDomainId = str_replace('*', '%', $primaryDomainId);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WebsitePeer::PRIMARY_DOMAIN_ID, $primaryDomainId, $comparison);
	}

	/**
	 * Filter the query on the email column
	 * 
	 * @param     string $email The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
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
		return $this->addUsingAlias(WebsitePeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query on the address column
	 * 
	 * @param     string $address The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByAddress($address = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($address)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $address)) {
				$address = str_replace('*', '%', $address);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WebsitePeer::ADDRESS, $address, $comparison);
	}

	/**
	 * Filter the query on the city column
	 * 
	 * @param     string $city The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByCity($city = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($city)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $city)) {
				$city = str_replace('*', '%', $city);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WebsitePeer::CITY, $city, $comparison);
	}

	/**
	 * Filter the query on the state column
	 * 
	 * @param     string $state The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByState($state = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($state)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $state)) {
				$state = str_replace('*', '%', $state);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WebsitePeer::STATE, $state, $comparison);
	}

	/**
	 * Filter the query on the zip column
	 * 
	 * @param     string $zip The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByZip($zip = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($zip)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $zip)) {
				$zip = str_replace('*', '%', $zip);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WebsitePeer::ZIP, $zip, $comparison);
	}

	/**
	 * Filter the query on the phone column
	 * 
	 * @param     string $phone The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByPhone($phone = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($phone)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $phone)) {
				$phone = str_replace('*', '%', $phone);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WebsitePeer::PHONE, $phone, $comparison);
	}

	/**
	 * Filter the query on the fax column
	 * 
	 * @param     string $fax The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByFax($fax = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($fax)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $fax)) {
				$fax = str_replace('*', '%', $fax);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WebsitePeer::FAX, $fax, $comparison);
	}

	/**
	 * Filter the query on the template_id column
	 * 
	 * @param     string $templateId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
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
		return $this->addUsingAlias(WebsitePeer::TEMPLATE_ID, $templateId, $comparison);
	}

	/**
	 * Filter the query on the website_attribute_id column
	 * 
	 * @param     string $websiteAttributeId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByWebsiteAttributeId($websiteAttributeId = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($websiteAttributeId)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $websiteAttributeId)) {
				$websiteAttributeId = str_replace('*', '%', $websiteAttributeId);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WebsitePeer::WEBSITE_ATTRIBUTE_ID, $websiteAttributeId, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     int|array $status The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (is_array($status)) {
			$useMinMax = false;
			if (isset($status['min'])) {
				$this->addUsingAlias(WebsitePeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($status['max'])) {
				$this->addUsingAlias(WebsitePeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WebsitePeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the path column
	 * 
	 * @param     string $path The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByPath($path = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($path)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $path)) {
				$path = str_replace('*', '%', $path);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WebsitePeer::PATH, $path, $comparison);
	}

	/**
	 * Filter the query on the host_id column
	 * 
	 * @param     string $hostId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByHostId($hostId = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($hostId)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $hostId)) {
				$hostId = str_replace('*', '%', $hostId);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WebsitePeer::HOST_ID, $hostId, $comparison);
	}

	/**
	 * Filter the query on the analytics_code column
	 * 
	 * @param     string $analyticsCode The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByAnalyticsCode($analyticsCode = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($analyticsCode)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $analyticsCode)) {
				$analyticsCode = str_replace('*', '%', $analyticsCode);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WebsitePeer::ANALYTICS_CODE, $analyticsCode, $comparison);
	}

	/**
	 * Filter the query on the payment_account_id column
	 * 
	 * @param     string $paymentAccountId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByPaymentAccountId($paymentAccountId = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($paymentAccountId)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $paymentAccountId)) {
				$paymentAccountId = str_replace('*', '%', $paymentAccountId);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WebsitePeer::PAYMENT_ACCOUNT_ID, $paymentAccountId, $comparison);
	}

	/**
	 * Filter the query on the meta_description column
	 * 
	 * @param     string $metaDescription The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
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
		return $this->addUsingAlias(WebsitePeer::META_DESCRIPTION, $metaDescription, $comparison);
	}

	/**
	 * Filter the query on the meta_keywords column
	 * 
	 * @param     string $metaKeywords The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
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
		return $this->addUsingAlias(WebsitePeer::META_KEYWORDS, $metaKeywords, $comparison);
	}

	/**
	 * Filter the query on the social_media column
	 * 
	 * @param     string $socialMedia The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterBySocialMedia($socialMedia = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($socialMedia)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $socialMedia)) {
				$socialMedia = str_replace('*', '%', $socialMedia);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WebsitePeer::SOCIAL_MEDIA, $socialMedia, $comparison);
	}

	/**
	 * Filter the query on the last_payment_update column
	 * 
	 * @param     string|array $lastPaymentUpdate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByLastPaymentUpdate($lastPaymentUpdate = null, $comparison = null)
	{
		if (is_array($lastPaymentUpdate)) {
			$useMinMax = false;
			if (isset($lastPaymentUpdate['min'])) {
				$this->addUsingAlias(WebsitePeer::LAST_PAYMENT_UPDATE, $lastPaymentUpdate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($lastPaymentUpdate['max'])) {
				$this->addUsingAlias(WebsitePeer::LAST_PAYMENT_UPDATE, $lastPaymentUpdate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WebsitePeer::LAST_PAYMENT_UPDATE, $lastPaymentUpdate, $comparison);
	}

	/**
	 * Filter the query on the last_billing_date column
	 * 
	 * @param     string|array $lastBillingDate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByLastBillingDate($lastBillingDate = null, $comparison = null)
	{
		if (is_array($lastBillingDate)) {
			$useMinMax = false;
			if (isset($lastBillingDate['min'])) {
				$this->addUsingAlias(WebsitePeer::LAST_BILLING_DATE, $lastBillingDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($lastBillingDate['max'])) {
				$this->addUsingAlias(WebsitePeer::LAST_BILLING_DATE, $lastBillingDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WebsitePeer::LAST_BILLING_DATE, $lastBillingDate, $comparison);
	}

	/**
	 * Filter the query on the cancelled_at column
	 * 
	 * @param     string|array $cancelledAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByCancelledAt($cancelledAt = null, $comparison = null)
	{
		if (is_array($cancelledAt)) {
			$useMinMax = false;
			if (isset($cancelledAt['min'])) {
				$this->addUsingAlias(WebsitePeer::CANCELLED_AT, $cancelledAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cancelledAt['max'])) {
				$this->addUsingAlias(WebsitePeer::CANCELLED_AT, $cancelledAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WebsitePeer::CANCELLED_AT, $cancelledAt, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(WebsitePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(WebsitePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WebsitePeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(WebsitePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(WebsitePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WebsitePeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related Customer object
	 *
	 * @param     Customer $customer  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByCustomer($customer, $comparison = null)
	{
		return $this
			->addUsingAlias(WebsitePeer::CUSTOMER_ID, $customer->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Customer relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function joinCustomer($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function useCustomerQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCustomer($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Customer', 'CustomerQuery');
	}

	/**
	 * Filter the query by a related Domain object
	 *
	 * @param     Domain $domain  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryDomain($domain, $comparison = null)
	{
		return $this
			->addUsingAlias(WebsitePeer::PRIMARY_DOMAIN_ID, $domain->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the PrimaryDomain relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function joinPrimaryDomain($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PrimaryDomain');
		
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
			$this->addJoinObject($join, 'PrimaryDomain');
		}
		
		return $this;
	}

	/**
	 * Use the PrimaryDomain relation Domain object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DomainQuery A secondary query class using the current class as primary query
	 */
	public function usePrimaryDomainQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinPrimaryDomain($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PrimaryDomain', 'DomainQuery');
	}

	/**
	 * Filter the query by a related WebsiteTemplate object
	 *
	 * @param     WebsiteTemplate $websiteTemplate  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByWebsiteTemplate($websiteTemplate, $comparison = null)
	{
		return $this
			->addUsingAlias(WebsitePeer::TEMPLATE_ID, $websiteTemplate->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the WebsiteTemplate relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
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
	 * Filter the query by a related WebsiteAttribute object
	 *
	 * @param     WebsiteAttribute $websiteAttribute  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByWebsiteAttribute($websiteAttribute, $comparison = null)
	{
		return $this
			->addUsingAlias(WebsitePeer::WEBSITE_ATTRIBUTE_ID, $websiteAttribute->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the WebsiteAttribute relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function joinWebsiteAttribute($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('WebsiteAttribute');
		
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
			$this->addJoinObject($join, 'WebsiteAttribute');
		}
		
		return $this;
	}

	/**
	 * Use the WebsiteAttribute relation WebsiteAttribute object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WebsiteAttributeQuery A secondary query class using the current class as primary query
	 */
	public function useWebsiteAttributeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinWebsiteAttribute($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'WebsiteAttribute', 'WebsiteAttributeQuery');
	}

	/**
	 * Filter the query by a related Host object
	 *
	 * @param     Host $host  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByHost($host, $comparison = null)
	{
		return $this
			->addUsingAlias(WebsitePeer::HOST_ID, $host->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Host relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function joinHost($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Host');
		
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
			$this->addJoinObject($join, 'Host');
		}
		
		return $this;
	}

	/**
	 * Use the Host relation Host object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    HostQuery A secondary query class using the current class as primary query
	 */
	public function useHostQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinHost($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Host', 'HostQuery');
	}

	/**
	 * Filter the query by a related CheddarGetterNotification object
	 *
	 * @param     CheddarGetterNotification $cheddarGetterNotification  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByCheddarGetterNotification($cheddarGetterNotification, $comparison = null)
	{
		return $this
			->addUsingAlias(WebsitePeer::ID, $cheddarGetterNotification->getWebsiteId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the CheddarGetterNotification relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function joinCheddarGetterNotification($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('CheddarGetterNotification');
		
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
			$this->addJoinObject($join, 'CheddarGetterNotification');
		}
		
		return $this;
	}

	/**
	 * Use the CheddarGetterNotification relation CheddarGetterNotification object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CheddarGetterNotificationQuery A secondary query class using the current class as primary query
	 */
	public function useCheddarGetterNotificationQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinCheddarGetterNotification($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'CheddarGetterNotification', 'CheddarGetterNotificationQuery');
	}

	/**
	 * Filter the query by a related Domain object
	 *
	 * @param     Domain $domain  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByDomain($domain, $comparison = null)
	{
		return $this
			->addUsingAlias(WebsitePeer::ID, $domain->getWebsiteId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Domain relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function joinDomain($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function useDomainQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinDomain($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Domain', 'DomainQuery');
	}

	/**
	 * Filter the query by a related CouponUsage object
	 *
	 * @param     CouponUsage $couponUsage  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByCouponUsage($couponUsage, $comparison = null)
	{
		return $this
			->addUsingAlias(WebsitePeer::ID, $couponUsage->getWebsiteId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the CouponUsage relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function joinCouponUsage($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('CouponUsage');
		
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
			$this->addJoinObject($join, 'CouponUsage');
		}
		
		return $this;
	}

	/**
	 * Use the CouponUsage relation CouponUsage object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CouponUsageQuery A secondary query class using the current class as primary query
	 */
	public function useCouponUsageQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinCouponUsage($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'CouponUsage', 'CouponUsageQuery');
	}

	/**
	 * Filter the query by a related EmailAccount object
	 *
	 * @param     EmailAccount $emailAccount  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByEmailAccount($emailAccount, $comparison = null)
	{
		return $this
			->addUsingAlias(WebsitePeer::ID, $emailAccount->getWebsiteId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the EmailAccount relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function joinEmailAccount($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('EmailAccount');
		
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
			$this->addJoinObject($join, 'EmailAccount');
		}
		
		return $this;
	}

	/**
	 * Use the EmailAccount relation EmailAccount object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EmailAccountQuery A secondary query class using the current class as primary query
	 */
	public function useEmailAccountQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinEmailAccount($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'EmailAccount', 'EmailAccountQuery');
	}

	/**
	 * Filter the query by a related Page object
	 *
	 * @param     Page $page  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByPage($page, $comparison = null)
	{
		return $this
			->addUsingAlias(WebsitePeer::ID, $page->getWebsiteId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Page relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
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
	 * Filter the query by a related ClientMessage object
	 *
	 * @param     ClientMessage $clientMessage  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByClientMessage($clientMessage, $comparison = null)
	{
		return $this
			->addUsingAlias(WebsitePeer::ID, $clientMessage->getWebsiteId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the ClientMessage relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function joinClientMessage($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ClientMessage');
		
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
			$this->addJoinObject($join, 'ClientMessage');
		}
		
		return $this;
	}

	/**
	 * Use the ClientMessage relation ClientMessage object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientMessageQuery A secondary query class using the current class as primary query
	 */
	public function useClientMessageQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinClientMessage($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ClientMessage', 'ClientMessageQuery');
	}

	/**
	 * Filter the query by a related TemplateCustomization object
	 *
	 * @param     TemplateCustomization $templateCustomization  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByTemplateCustomization($templateCustomization, $comparison = null)
	{
		return $this
			->addUsingAlias(WebsitePeer::ID, $templateCustomization->getWebsiteId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the TemplateCustomization relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function joinTemplateCustomization($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function useTemplateCustomizationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinTemplateCustomization($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'TemplateCustomization', 'TemplateCustomizationQuery');
	}

	/**
	 * Filter the query by a related Coupon object
	 * using the esq_coupon_usage table as cross reference
	 *
	 * @param     Coupon $coupon the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function filterByCoupon($coupon, $comparison = Criteria::EQUAL)
	{
		return $this
			->useCouponUsageQuery()
				->filterByCoupon($coupon, $comparison)
			->endUse();
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param     Website $website Object to remove from the list of results
	 *
	 * @return    WebsiteQuery The current query, for fluid interface
	 */
	public function prune($website = null)
	{
		if ($website) {
			$this->addUsingAlias(WebsitePeer::ID, $website->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	// sortable behavior
	
	/**
	 * Returns the objects in a certain list, from the list scope
	 *
	 * @param     int $scope		Scope to determine which objects node to return
	 *
	 * @return    WebsiteQuery The current query, for fuid interface
	 */
	public function inList($scope = null)
	{
		return $this->addUsingAlias(WebsitePeer::SCOPE_COL, $scope, Criteria::EQUAL);
	}
	
	/**
	 * Returns a list of objects
	 *
	 * @param      int $scope		Scope to determine which list to return
	 * @param      PropelPDO $con	Connection to use.
	 *
	 * @return     mixed the list of results, formatted by the current formatter
	 */
	public function findList($scope = null, $con = null)
	{
		return $this
			->inList($scope)
			->orderByRank()
			->find($con);
	}
	
	/**
	 * Get the highest rank
	 * 
	 * @param      int $scope		Scope to determine which suite to consider
	 * @param     PropelPDO optional connection
	 *
	 * @return    integer highest position
	 */
	public function getMaxRank($scope = null, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME);
		}
		// shift the objects with a position lower than the one of object
		$this->addSelectColumn('MAX(' . WebsitePeer::RANK_COL . ')');
		$this->add(WebsitePeer::SCOPE_COL, $scope, Criteria::EQUAL);
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
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME);
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

	// timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     WebsiteQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(WebsitePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     WebsiteQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(WebsitePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     WebsiteQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(WebsitePeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     WebsiteQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(WebsitePeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     WebsiteQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(WebsitePeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     WebsiteQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(WebsitePeer::CREATED_AT);
	}

} // BaseWebsiteQuery
