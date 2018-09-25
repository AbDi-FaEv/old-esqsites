<?php


/**
 * Base class that represents a query for the 'esq_customers' table.
 *
 * 
 *
 * @method     CustomerQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     CustomerQuery orderByBarAssociationId($order = Criteria::ASC) Order by the bar_association_id column
 * @method     CustomerQuery orderByCreditBarAssociation($order = Criteria::ASC) Order by the credit_bar_association column
 * @method     CustomerQuery orderBySalesPersonId($order = Criteria::ASC) Order by the sales_person_id column
 * @method     CustomerQuery orderByMbClientId($order = Criteria::ASC) Order by the mb_client_id column
 * @method     CustomerQuery orderByIcontactId($order = Criteria::ASC) Order by the icontact_id column
 * @method     CustomerQuery orderByReferralCode($order = Criteria::ASC) Order by the referral_code column
 * @method     CustomerQuery orderByReferredBy($order = Criteria::ASC) Order by the referred_by column
 * @method     CustomerQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     CustomerQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     CustomerQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     CustomerQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     CustomerQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method     CustomerQuery orderByMiddleName($order = Criteria::ASC) Order by the middle_name column
 * @method     CustomerQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method     CustomerQuery orderByBirthdate($order = Criteria::ASC) Order by the birthdate column
 * @method     CustomerQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     CustomerQuery orderByFax($order = Criteria::ASC) Order by the fax column
 * @method     CustomerQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     CustomerQuery orderByLastLogin($order = Criteria::ASC) Order by the last_login column
 * @method     CustomerQuery orderBySkillLevel($order = Criteria::ASC) Order by the skill_level column
 * @method     CustomerQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     CustomerQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     CustomerQuery groupById() Group by the id column
 * @method     CustomerQuery groupByBarAssociationId() Group by the bar_association_id column
 * @method     CustomerQuery groupByCreditBarAssociation() Group by the credit_bar_association column
 * @method     CustomerQuery groupBySalesPersonId() Group by the sales_person_id column
 * @method     CustomerQuery groupByMbClientId() Group by the mb_client_id column
 * @method     CustomerQuery groupByIcontactId() Group by the icontact_id column
 * @method     CustomerQuery groupByReferralCode() Group by the referral_code column
 * @method     CustomerQuery groupByReferredBy() Group by the referred_by column
 * @method     CustomerQuery groupByType() Group by the type column
 * @method     CustomerQuery groupByUsername() Group by the username column
 * @method     CustomerQuery groupByPassword() Group by the password column
 * @method     CustomerQuery groupByEmail() Group by the email column
 * @method     CustomerQuery groupByFirstName() Group by the first_name column
 * @method     CustomerQuery groupByMiddleName() Group by the middle_name column
 * @method     CustomerQuery groupByLastName() Group by the last_name column
 * @method     CustomerQuery groupByBirthdate() Group by the birthdate column
 * @method     CustomerQuery groupByPhone() Group by the phone column
 * @method     CustomerQuery groupByFax() Group by the fax column
 * @method     CustomerQuery groupByStatus() Group by the status column
 * @method     CustomerQuery groupByLastLogin() Group by the last_login column
 * @method     CustomerQuery groupBySkillLevel() Group by the skill_level column
 * @method     CustomerQuery groupByCreatedAt() Group by the created_at column
 * @method     CustomerQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     CustomerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CustomerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CustomerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CustomerQuery leftJoinBarAssociation($relationAlias = null) Adds a LEFT JOIN clause to the query using the BarAssociation relation
 * @method     CustomerQuery rightJoinBarAssociation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BarAssociation relation
 * @method     CustomerQuery innerJoinBarAssociation($relationAlias = null) Adds a INNER JOIN clause to the query using the BarAssociation relation
 *
 * @method     CustomerQuery leftJoinSalesPerson($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesPerson relation
 * @method     CustomerQuery rightJoinSalesPerson($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesPerson relation
 * @method     CustomerQuery innerJoinSalesPerson($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesPerson relation
 *
 * @method     CustomerQuery leftJoinReferrer($relationAlias = null) Adds a LEFT JOIN clause to the query using the Referrer relation
 * @method     CustomerQuery rightJoinReferrer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Referrer relation
 * @method     CustomerQuery innerJoinReferrer($relationAlias = null) Adds a INNER JOIN clause to the query using the Referrer relation
 *
 * @method     CustomerQuery leftJoinCustomerRelatedById($relationAlias = null) Adds a LEFT JOIN clause to the query using the CustomerRelatedById relation
 * @method     CustomerQuery rightJoinCustomerRelatedById($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CustomerRelatedById relation
 * @method     CustomerQuery innerJoinCustomerRelatedById($relationAlias = null) Adds a INNER JOIN clause to the query using the CustomerRelatedById relation
 *
 * @method     CustomerQuery leftJoinWebsite($relationAlias = null) Adds a LEFT JOIN clause to the query using the Website relation
 * @method     CustomerQuery rightJoinWebsite($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Website relation
 * @method     CustomerQuery innerJoinWebsite($relationAlias = null) Adds a INNER JOIN clause to the query using the Website relation
 *
 * @method     CustomerQuery leftJoinWebsiteTemplate($relationAlias = null) Adds a LEFT JOIN clause to the query using the WebsiteTemplate relation
 * @method     CustomerQuery rightJoinWebsiteTemplate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the WebsiteTemplate relation
 * @method     CustomerQuery innerJoinWebsiteTemplate($relationAlias = null) Adds a INNER JOIN clause to the query using the WebsiteTemplate relation
 *
 * @method     CustomerQuery leftJoinMemberFeedback($relationAlias = null) Adds a LEFT JOIN clause to the query using the MemberFeedback relation
 * @method     CustomerQuery rightJoinMemberFeedback($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MemberFeedback relation
 * @method     CustomerQuery innerJoinMemberFeedback($relationAlias = null) Adds a INNER JOIN clause to the query using the MemberFeedback relation
 *
 * @method     Customer findOne(PropelPDO $con = null) Return the first Customer matching the query
 * @method     Customer findOneOrCreate(PropelPDO $con = null) Return the first Customer matching the query, or a new Customer object populated from the query conditions when no match is found
 *
 * @method     Customer findOneById(string $id) Return the first Customer filtered by the id column
 * @method     Customer findOneByBarAssociationId(int $bar_association_id) Return the first Customer filtered by the bar_association_id column
 * @method     Customer findOneByCreditBarAssociation(boolean $credit_bar_association) Return the first Customer filtered by the credit_bar_association column
 * @method     Customer findOneBySalesPersonId(int $sales_person_id) Return the first Customer filtered by the sales_person_id column
 * @method     Customer findOneByMbClientId(int $mb_client_id) Return the first Customer filtered by the mb_client_id column
 * @method     Customer findOneByIcontactId(string $icontact_id) Return the first Customer filtered by the icontact_id column
 * @method     Customer findOneByReferralCode(string $referral_code) Return the first Customer filtered by the referral_code column
 * @method     Customer findOneByReferredBy(string $referred_by) Return the first Customer filtered by the referred_by column
 * @method     Customer findOneByType(int $type) Return the first Customer filtered by the type column
 * @method     Customer findOneByUsername(string $username) Return the first Customer filtered by the username column
 * @method     Customer findOneByPassword(string $password) Return the first Customer filtered by the password column
 * @method     Customer findOneByEmail(string $email) Return the first Customer filtered by the email column
 * @method     Customer findOneByFirstName(string $first_name) Return the first Customer filtered by the first_name column
 * @method     Customer findOneByMiddleName(string $middle_name) Return the first Customer filtered by the middle_name column
 * @method     Customer findOneByLastName(string $last_name) Return the first Customer filtered by the last_name column
 * @method     Customer findOneByBirthdate(string $birthdate) Return the first Customer filtered by the birthdate column
 * @method     Customer findOneByPhone(string $phone) Return the first Customer filtered by the phone column
 * @method     Customer findOneByFax(string $fax) Return the first Customer filtered by the fax column
 * @method     Customer findOneByStatus(int $status) Return the first Customer filtered by the status column
 * @method     Customer findOneByLastLogin(string $last_login) Return the first Customer filtered by the last_login column
 * @method     Customer findOneBySkillLevel(int $skill_level) Return the first Customer filtered by the skill_level column
 * @method     Customer findOneByCreatedAt(string $created_at) Return the first Customer filtered by the created_at column
 * @method     Customer findOneByUpdatedAt(string $updated_at) Return the first Customer filtered by the updated_at column
 *
 * @method     array findById(string $id) Return Customer objects filtered by the id column
 * @method     array findByBarAssociationId(int $bar_association_id) Return Customer objects filtered by the bar_association_id column
 * @method     array findByCreditBarAssociation(boolean $credit_bar_association) Return Customer objects filtered by the credit_bar_association column
 * @method     array findBySalesPersonId(int $sales_person_id) Return Customer objects filtered by the sales_person_id column
 * @method     array findByMbClientId(int $mb_client_id) Return Customer objects filtered by the mb_client_id column
 * @method     array findByIcontactId(string $icontact_id) Return Customer objects filtered by the icontact_id column
 * @method     array findByReferralCode(string $referral_code) Return Customer objects filtered by the referral_code column
 * @method     array findByReferredBy(string $referred_by) Return Customer objects filtered by the referred_by column
 * @method     array findByType(int $type) Return Customer objects filtered by the type column
 * @method     array findByUsername(string $username) Return Customer objects filtered by the username column
 * @method     array findByPassword(string $password) Return Customer objects filtered by the password column
 * @method     array findByEmail(string $email) Return Customer objects filtered by the email column
 * @method     array findByFirstName(string $first_name) Return Customer objects filtered by the first_name column
 * @method     array findByMiddleName(string $middle_name) Return Customer objects filtered by the middle_name column
 * @method     array findByLastName(string $last_name) Return Customer objects filtered by the last_name column
 * @method     array findByBirthdate(string $birthdate) Return Customer objects filtered by the birthdate column
 * @method     array findByPhone(string $phone) Return Customer objects filtered by the phone column
 * @method     array findByFax(string $fax) Return Customer objects filtered by the fax column
 * @method     array findByStatus(int $status) Return Customer objects filtered by the status column
 * @method     array findByLastLogin(string $last_login) Return Customer objects filtered by the last_login column
 * @method     array findBySkillLevel(int $skill_level) Return Customer objects filtered by the skill_level column
 * @method     array findByCreatedAt(string $created_at) Return Customer objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Customer objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCustomerQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseCustomerQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Customer', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new CustomerQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    CustomerQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof CustomerQuery) {
			return $criteria;
		}
		$query = new CustomerQuery();
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
	 * @return    Customer|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = CustomerPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(CustomerPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(CustomerPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     string $id The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
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
		return $this->addUsingAlias(CustomerPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the bar_association_id column
	 * 
	 * @param     int|array $barAssociationId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function filterByBarAssociationId($barAssociationId = null, $comparison = null)
	{
		if (is_array($barAssociationId)) {
			$useMinMax = false;
			if (isset($barAssociationId['min'])) {
				$this->addUsingAlias(CustomerPeer::BAR_ASSOCIATION_ID, $barAssociationId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($barAssociationId['max'])) {
				$this->addUsingAlias(CustomerPeer::BAR_ASSOCIATION_ID, $barAssociationId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CustomerPeer::BAR_ASSOCIATION_ID, $barAssociationId, $comparison);
	}

	/**
	 * Filter the query on the credit_bar_association column
	 * 
	 * @param     boolean|string $creditBarAssociation The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function filterByCreditBarAssociation($creditBarAssociation = null, $comparison = null)
	{
		if (is_string($creditBarAssociation)) {
			$credit_bar_association = in_array(strtolower($creditBarAssociation), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(CustomerPeer::CREDIT_BAR_ASSOCIATION, $creditBarAssociation, $comparison);
	}

	/**
	 * Filter the query on the sales_person_id column
	 * 
	 * @param     int|array $salesPersonId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function filterBySalesPersonId($salesPersonId = null, $comparison = null)
	{
		if (is_array($salesPersonId)) {
			$useMinMax = false;
			if (isset($salesPersonId['min'])) {
				$this->addUsingAlias(CustomerPeer::SALES_PERSON_ID, $salesPersonId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($salesPersonId['max'])) {
				$this->addUsingAlias(CustomerPeer::SALES_PERSON_ID, $salesPersonId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CustomerPeer::SALES_PERSON_ID, $salesPersonId, $comparison);
	}

	/**
	 * Filter the query on the mb_client_id column
	 * 
	 * @param     int|array $mbClientId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function filterByMbClientId($mbClientId = null, $comparison = null)
	{
		if (is_array($mbClientId)) {
			$useMinMax = false;
			if (isset($mbClientId['min'])) {
				$this->addUsingAlias(CustomerPeer::MB_CLIENT_ID, $mbClientId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($mbClientId['max'])) {
				$this->addUsingAlias(CustomerPeer::MB_CLIENT_ID, $mbClientId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CustomerPeer::MB_CLIENT_ID, $mbClientId, $comparison);
	}

	/**
	 * Filter the query on the icontact_id column
	 * 
	 * @param     string $icontactId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function filterByIcontactId($icontactId = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($icontactId)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $icontactId)) {
				$icontactId = str_replace('*', '%', $icontactId);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CustomerPeer::ICONTACT_ID, $icontactId, $comparison);
	}

	/**
	 * Filter the query on the referral_code column
	 * 
	 * @param     string $referralCode The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function filterByReferralCode($referralCode = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($referralCode)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $referralCode)) {
				$referralCode = str_replace('*', '%', $referralCode);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CustomerPeer::REFERRAL_CODE, $referralCode, $comparison);
	}

	/**
	 * Filter the query on the referred_by column
	 * 
	 * @param     string $referredBy The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function filterByReferredBy($referredBy = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($referredBy)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $referredBy)) {
				$referredBy = str_replace('*', '%', $referredBy);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CustomerPeer::REFERRED_BY, $referredBy, $comparison);
	}

	/**
	 * Filter the query on the type column
	 * 
	 * @param     int|array $type The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function filterByType($type = null, $comparison = null)
	{
		if (is_array($type)) {
			$useMinMax = false;
			if (isset($type['min'])) {
				$this->addUsingAlias(CustomerPeer::TYPE, $type['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($type['max'])) {
				$this->addUsingAlias(CustomerPeer::TYPE, $type['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CustomerPeer::TYPE, $type, $comparison);
	}

	/**
	 * Filter the query on the username column
	 * 
	 * @param     string $username The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function filterByUsername($username = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($username)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $username)) {
				$username = str_replace('*', '%', $username);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CustomerPeer::USERNAME, $username, $comparison);
	}

	/**
	 * Filter the query on the password column
	 * 
	 * @param     string $password The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function filterByPassword($password = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($password)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $password)) {
				$password = str_replace('*', '%', $password);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CustomerPeer::PASSWORD, $password, $comparison);
	}

	/**
	 * Filter the query on the email column
	 * 
	 * @param     string $email The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
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
		return $this->addUsingAlias(CustomerPeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query on the first_name column
	 * 
	 * @param     string $firstName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function filterByFirstName($firstName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($firstName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $firstName)) {
				$firstName = str_replace('*', '%', $firstName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CustomerPeer::FIRST_NAME, $firstName, $comparison);
	}

	/**
	 * Filter the query on the middle_name column
	 * 
	 * @param     string $middleName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function filterByMiddleName($middleName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($middleName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $middleName)) {
				$middleName = str_replace('*', '%', $middleName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CustomerPeer::MIDDLE_NAME, $middleName, $comparison);
	}

	/**
	 * Filter the query on the last_name column
	 * 
	 * @param     string $lastName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function filterByLastName($lastName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($lastName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $lastName)) {
				$lastName = str_replace('*', '%', $lastName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CustomerPeer::LAST_NAME, $lastName, $comparison);
	}

	/**
	 * Filter the query on the birthdate column
	 * 
	 * @param     string $birthdate The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function filterByBirthdate($birthdate = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($birthdate)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $birthdate)) {
				$birthdate = str_replace('*', '%', $birthdate);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CustomerPeer::BIRTHDATE, $birthdate, $comparison);
	}

	/**
	 * Filter the query on the phone column
	 * 
	 * @param     string $phone The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
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
		return $this->addUsingAlias(CustomerPeer::PHONE, $phone, $comparison);
	}

	/**
	 * Filter the query on the fax column
	 * 
	 * @param     string $fax The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
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
		return $this->addUsingAlias(CustomerPeer::FAX, $fax, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     int|array $status The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (is_array($status)) {
			$useMinMax = false;
			if (isset($status['min'])) {
				$this->addUsingAlias(CustomerPeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($status['max'])) {
				$this->addUsingAlias(CustomerPeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CustomerPeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the last_login column
	 * 
	 * @param     string|array $lastLogin The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function filterByLastLogin($lastLogin = null, $comparison = null)
	{
		if (is_array($lastLogin)) {
			$useMinMax = false;
			if (isset($lastLogin['min'])) {
				$this->addUsingAlias(CustomerPeer::LAST_LOGIN, $lastLogin['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($lastLogin['max'])) {
				$this->addUsingAlias(CustomerPeer::LAST_LOGIN, $lastLogin['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CustomerPeer::LAST_LOGIN, $lastLogin, $comparison);
	}

	/**
	 * Filter the query on the skill_level column
	 * 
	 * @param     int|array $skillLevel The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function filterBySkillLevel($skillLevel = null, $comparison = null)
	{
		if (is_array($skillLevel)) {
			$useMinMax = false;
			if (isset($skillLevel['min'])) {
				$this->addUsingAlias(CustomerPeer::SKILL_LEVEL, $skillLevel['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($skillLevel['max'])) {
				$this->addUsingAlias(CustomerPeer::SKILL_LEVEL, $skillLevel['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CustomerPeer::SKILL_LEVEL, $skillLevel, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(CustomerPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(CustomerPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CustomerPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(CustomerPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(CustomerPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CustomerPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related BarAssociation object
	 *
	 * @param     BarAssociation $barAssociation  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function filterByBarAssociation($barAssociation, $comparison = null)
	{
		return $this
			->addUsingAlias(CustomerPeer::BAR_ASSOCIATION_ID, $barAssociation->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the BarAssociation relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function joinBarAssociation($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function useBarAssociationQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinBarAssociation($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'BarAssociation', 'BarAssociationQuery');
	}

	/**
	 * Filter the query by a related sfGuardUser object
	 *
	 * @param     sfGuardUser $sfGuardUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function filterBySalesPerson($sfGuardUser, $comparison = null)
	{
		return $this
			->addUsingAlias(CustomerPeer::SALES_PERSON_ID, $sfGuardUser->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SalesPerson relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function joinSalesPerson($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SalesPerson');
		
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
			$this->addJoinObject($join, 'SalesPerson');
		}
		
		return $this;
	}

	/**
	 * Use the SalesPerson relation sfGuardUser object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserQuery A secondary query class using the current class as primary query
	 */
	public function useSalesPersonQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSalesPerson($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SalesPerson', 'sfGuardUserQuery');
	}

	/**
	 * Filter the query by a related Customer object
	 *
	 * @param     Customer $customer  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function filterByReferrer($customer, $comparison = null)
	{
		return $this
			->addUsingAlias(CustomerPeer::REFERRED_BY, $customer->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Referrer relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function joinReferrer($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Referrer');
		
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
			$this->addJoinObject($join, 'Referrer');
		}
		
		return $this;
	}

	/**
	 * Use the Referrer relation Customer object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CustomerQuery A secondary query class using the current class as primary query
	 */
	public function useReferrerQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinReferrer($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Referrer', 'CustomerQuery');
	}

	/**
	 * Filter the query by a related Customer object
	 *
	 * @param     Customer $customer  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function filterByCustomerRelatedById($customer, $comparison = null)
	{
		return $this
			->addUsingAlias(CustomerPeer::ID, $customer->getReferredBy(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the CustomerRelatedById relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function joinCustomerRelatedById($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('CustomerRelatedById');
		
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
			$this->addJoinObject($join, 'CustomerRelatedById');
		}
		
		return $this;
	}

	/**
	 * Use the CustomerRelatedById relation Customer object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CustomerQuery A secondary query class using the current class as primary query
	 */
	public function useCustomerRelatedByIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinCustomerRelatedById($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'CustomerRelatedById', 'CustomerQuery');
	}

	/**
	 * Filter the query by a related Website object
	 *
	 * @param     Website $website  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function filterByWebsite($website, $comparison = null)
	{
		return $this
			->addUsingAlias(CustomerPeer::ID, $website->getCustomerId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Website relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CustomerQuery The current query, for fluid interface
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
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function filterByWebsiteTemplate($websiteTemplate, $comparison = null)
	{
		return $this
			->addUsingAlias(CustomerPeer::ID, $websiteTemplate->getCustomerId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the WebsiteTemplate relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CustomerQuery The current query, for fluid interface
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
	 * Filter the query by a related MemberFeedback object
	 *
	 * @param     MemberFeedback $memberFeedback  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function filterByMemberFeedback($memberFeedback, $comparison = null)
	{
		return $this
			->addUsingAlias(CustomerPeer::ID, $memberFeedback->getCustomerId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the MemberFeedback relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function joinMemberFeedback($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('MemberFeedback');
		
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
			$this->addJoinObject($join, 'MemberFeedback');
		}
		
		return $this;
	}

	/**
	 * Use the MemberFeedback relation MemberFeedback object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MemberFeedbackQuery A secondary query class using the current class as primary query
	 */
	public function useMemberFeedbackQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinMemberFeedback($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'MemberFeedback', 'MemberFeedbackQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Customer $customer Object to remove from the list of results
	 *
	 * @return    CustomerQuery The current query, for fluid interface
	 */
	public function prune($customer = null)
	{
		if ($customer) {
			$this->addUsingAlias(CustomerPeer::ID, $customer->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	// timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     CustomerQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(CustomerPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     CustomerQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(CustomerPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     CustomerQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(CustomerPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     CustomerQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(CustomerPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     CustomerQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(CustomerPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     CustomerQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(CustomerPeer::CREATED_AT);
	}

} // BaseCustomerQuery
