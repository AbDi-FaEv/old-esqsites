<?php


/**
 * Base class that represents a query for the 'sf_guard_user' table.
 *
 * 
 *
 * @method     sfGuardUserQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     sfGuardUserQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     sfGuardUserQuery orderByAlgorithm($order = Criteria::ASC) Order by the algorithm column
 * @method     sfGuardUserQuery orderBySalt($order = Criteria::ASC) Order by the salt column
 * @method     sfGuardUserQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     sfGuardUserQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     sfGuardUserQuery orderByLastLogin($order = Criteria::ASC) Order by the last_login column
 * @method     sfGuardUserQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 * @method     sfGuardUserQuery orderByIsSuperAdmin($order = Criteria::ASC) Order by the is_super_admin column
 * @method     sfGuardUserQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     sfGuardUserQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method     sfGuardUserQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 *
 * @method     sfGuardUserQuery groupById() Group by the id column
 * @method     sfGuardUserQuery groupByUsername() Group by the username column
 * @method     sfGuardUserQuery groupByAlgorithm() Group by the algorithm column
 * @method     sfGuardUserQuery groupBySalt() Group by the salt column
 * @method     sfGuardUserQuery groupByPassword() Group by the password column
 * @method     sfGuardUserQuery groupByCreatedAt() Group by the created_at column
 * @method     sfGuardUserQuery groupByLastLogin() Group by the last_login column
 * @method     sfGuardUserQuery groupByIsActive() Group by the is_active column
 * @method     sfGuardUserQuery groupByIsSuperAdmin() Group by the is_super_admin column
 * @method     sfGuardUserQuery groupByEmail() Group by the email column
 * @method     sfGuardUserQuery groupByFirstName() Group by the first_name column
 * @method     sfGuardUserQuery groupByLastName() Group by the last_name column
 *
 * @method     sfGuardUserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     sfGuardUserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     sfGuardUserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     sfGuardUserQuery leftJoinCustomer($relationAlias = null) Adds a LEFT JOIN clause to the query using the Customer relation
 * @method     sfGuardUserQuery rightJoinCustomer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Customer relation
 * @method     sfGuardUserQuery innerJoinCustomer($relationAlias = null) Adds a INNER JOIN clause to the query using the Customer relation
 *
 * @method     sfGuardUserQuery leftJoinsfGuardUserPermission($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUserPermission relation
 * @method     sfGuardUserQuery rightJoinsfGuardUserPermission($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUserPermission relation
 * @method     sfGuardUserQuery innerJoinsfGuardUserPermission($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUserPermission relation
 *
 * @method     sfGuardUserQuery leftJoinsfGuardUserGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUserGroup relation
 * @method     sfGuardUserQuery rightJoinsfGuardUserGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUserGroup relation
 * @method     sfGuardUserQuery innerJoinsfGuardUserGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUserGroup relation
 *
 * @method     sfGuardUserQuery leftJoinsfGuardRememberKey($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardRememberKey relation
 * @method     sfGuardUserQuery rightJoinsfGuardRememberKey($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardRememberKey relation
 * @method     sfGuardUserQuery innerJoinsfGuardRememberKey($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardRememberKey relation
 *
 * @method     sfGuardUserQuery leftJoinsfComment($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfComment relation
 * @method     sfGuardUserQuery rightJoinsfComment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfComment relation
 * @method     sfGuardUserQuery innerJoinsfComment($relationAlias = null) Adds a INNER JOIN clause to the query using the sfComment relation
 *
 * @method     sfGuardUserQuery leftJointeBlogPostRelatedByAuthorId($relationAlias = null) Adds a LEFT JOIN clause to the query using the teBlogPostRelatedByAuthorId relation
 * @method     sfGuardUserQuery rightJointeBlogPostRelatedByAuthorId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the teBlogPostRelatedByAuthorId relation
 * @method     sfGuardUserQuery innerJointeBlogPostRelatedByAuthorId($relationAlias = null) Adds a INNER JOIN clause to the query using the teBlogPostRelatedByAuthorId relation
 *
 * @method     sfGuardUserQuery leftJointeBlogPostRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the teBlogPostRelatedByCreatedBy relation
 * @method     sfGuardUserQuery rightJointeBlogPostRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the teBlogPostRelatedByCreatedBy relation
 * @method     sfGuardUserQuery innerJointeBlogPostRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the teBlogPostRelatedByCreatedBy relation
 *
 * @method     sfGuardUserQuery leftJointeBlogPostRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the teBlogPostRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery rightJointeBlogPostRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the teBlogPostRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery innerJointeBlogPostRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the teBlogPostRelatedByUpdatedBy relation
 *
 * @method     sfGuardUserQuery leftJointeCalendarEventRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the teCalendarEventRelatedByCreatedBy relation
 * @method     sfGuardUserQuery rightJointeCalendarEventRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the teCalendarEventRelatedByCreatedBy relation
 * @method     sfGuardUserQuery innerJointeCalendarEventRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the teCalendarEventRelatedByCreatedBy relation
 *
 * @method     sfGuardUserQuery leftJointeCalendarEventRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the teCalendarEventRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery rightJointeCalendarEventRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the teCalendarEventRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery innerJointeCalendarEventRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the teCalendarEventRelatedByUpdatedBy relation
 *
 * @method     sfGuardUserQuery leftJointeTestimonialRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the teTestimonialRelatedByCreatedBy relation
 * @method     sfGuardUserQuery rightJointeTestimonialRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the teTestimonialRelatedByCreatedBy relation
 * @method     sfGuardUserQuery innerJointeTestimonialRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the teTestimonialRelatedByCreatedBy relation
 *
 * @method     sfGuardUserQuery leftJointeTestimonialRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the teTestimonialRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery rightJointeTestimonialRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the teTestimonialRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery innerJointeTestimonialRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the teTestimonialRelatedByUpdatedBy relation
 *
 * @method     sfGuardUser findOne(PropelPDO $con = null) Return the first sfGuardUser matching the query
 * @method     sfGuardUser findOneOrCreate(PropelPDO $con = null) Return the first sfGuardUser matching the query, or a new sfGuardUser object populated from the query conditions when no match is found
 *
 * @method     sfGuardUser findOneById(int $id) Return the first sfGuardUser filtered by the id column
 * @method     sfGuardUser findOneByUsername(string $username) Return the first sfGuardUser filtered by the username column
 * @method     sfGuardUser findOneByAlgorithm(string $algorithm) Return the first sfGuardUser filtered by the algorithm column
 * @method     sfGuardUser findOneBySalt(string $salt) Return the first sfGuardUser filtered by the salt column
 * @method     sfGuardUser findOneByPassword(string $password) Return the first sfGuardUser filtered by the password column
 * @method     sfGuardUser findOneByCreatedAt(string $created_at) Return the first sfGuardUser filtered by the created_at column
 * @method     sfGuardUser findOneByLastLogin(string $last_login) Return the first sfGuardUser filtered by the last_login column
 * @method     sfGuardUser findOneByIsActive(boolean $is_active) Return the first sfGuardUser filtered by the is_active column
 * @method     sfGuardUser findOneByIsSuperAdmin(boolean $is_super_admin) Return the first sfGuardUser filtered by the is_super_admin column
 * @method     sfGuardUser findOneByEmail(string $email) Return the first sfGuardUser filtered by the email column
 * @method     sfGuardUser findOneByFirstName(string $first_name) Return the first sfGuardUser filtered by the first_name column
 * @method     sfGuardUser findOneByLastName(string $last_name) Return the first sfGuardUser filtered by the last_name column
 *
 * @method     array findById(int $id) Return sfGuardUser objects filtered by the id column
 * @method     array findByUsername(string $username) Return sfGuardUser objects filtered by the username column
 * @method     array findByAlgorithm(string $algorithm) Return sfGuardUser objects filtered by the algorithm column
 * @method     array findBySalt(string $salt) Return sfGuardUser objects filtered by the salt column
 * @method     array findByPassword(string $password) Return sfGuardUser objects filtered by the password column
 * @method     array findByCreatedAt(string $created_at) Return sfGuardUser objects filtered by the created_at column
 * @method     array findByLastLogin(string $last_login) Return sfGuardUser objects filtered by the last_login column
 * @method     array findByIsActive(boolean $is_active) Return sfGuardUser objects filtered by the is_active column
 * @method     array findByIsSuperAdmin(boolean $is_super_admin) Return sfGuardUser objects filtered by the is_super_admin column
 * @method     array findByEmail(string $email) Return sfGuardUser objects filtered by the email column
 * @method     array findByFirstName(string $first_name) Return sfGuardUser objects filtered by the first_name column
 * @method     array findByLastName(string $last_name) Return sfGuardUser objects filtered by the last_name column
 *
 * @package    propel.generator.plugins.sfGuardPlugin.lib.model.om
 */
abstract class BasesfGuardUserQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasesfGuardUserQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'sfGuardUser', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new sfGuardUserQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    sfGuardUserQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof sfGuardUserQuery) {
			return $criteria;
		}
		$query = new sfGuardUserQuery();
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
	 * @return    sfGuardUser|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = sfGuardUserPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(sfGuardUserPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(sfGuardUserPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(sfGuardUserPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the username column
	 * 
	 * @param     string $username The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
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
		return $this->addUsingAlias(sfGuardUserPeer::USERNAME, $username, $comparison);
	}

	/**
	 * Filter the query on the algorithm column
	 * 
	 * @param     string $algorithm The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function filterByAlgorithm($algorithm = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($algorithm)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $algorithm)) {
				$algorithm = str_replace('*', '%', $algorithm);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(sfGuardUserPeer::ALGORITHM, $algorithm, $comparison);
	}

	/**
	 * Filter the query on the salt column
	 * 
	 * @param     string $salt The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function filterBySalt($salt = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($salt)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $salt)) {
				$salt = str_replace('*', '%', $salt);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(sfGuardUserPeer::SALT, $salt, $comparison);
	}

	/**
	 * Filter the query on the password column
	 * 
	 * @param     string $password The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
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
		return $this->addUsingAlias(sfGuardUserPeer::PASSWORD, $password, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(sfGuardUserPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(sfGuardUserPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(sfGuardUserPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the last_login column
	 * 
	 * @param     string|array $lastLogin The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function filterByLastLogin($lastLogin = null, $comparison = null)
	{
		if (is_array($lastLogin)) {
			$useMinMax = false;
			if (isset($lastLogin['min'])) {
				$this->addUsingAlias(sfGuardUserPeer::LAST_LOGIN, $lastLogin['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($lastLogin['max'])) {
				$this->addUsingAlias(sfGuardUserPeer::LAST_LOGIN, $lastLogin['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(sfGuardUserPeer::LAST_LOGIN, $lastLogin, $comparison);
	}

	/**
	 * Filter the query on the is_active column
	 * 
	 * @param     boolean|string $isActive The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function filterByIsActive($isActive = null, $comparison = null)
	{
		if (is_string($isActive)) {
			$is_active = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(sfGuardUserPeer::IS_ACTIVE, $isActive, $comparison);
	}

	/**
	 * Filter the query on the is_super_admin column
	 * 
	 * @param     boolean|string $isSuperAdmin The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function filterByIsSuperAdmin($isSuperAdmin = null, $comparison = null)
	{
		if (is_string($isSuperAdmin)) {
			$is_super_admin = in_array(strtolower($isSuperAdmin), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(sfGuardUserPeer::IS_SUPER_ADMIN, $isSuperAdmin, $comparison);
	}

	/**
	 * Filter the query on the email column
	 * 
	 * @param     string $email The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
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
		return $this->addUsingAlias(sfGuardUserPeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query on the first_name column
	 * 
	 * @param     string $firstName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
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
		return $this->addUsingAlias(sfGuardUserPeer::FIRST_NAME, $firstName, $comparison);
	}

	/**
	 * Filter the query on the last_name column
	 * 
	 * @param     string $lastName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
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
		return $this->addUsingAlias(sfGuardUserPeer::LAST_NAME, $lastName, $comparison);
	}

	/**
	 * Filter the query by a related Customer object
	 *
	 * @param     Customer $customer  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function filterByCustomer($customer, $comparison = null)
	{
		return $this
			->addUsingAlias(sfGuardUserPeer::ID, $customer->getSalesPersonId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Customer relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
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
	 * Filter the query by a related sfGuardUserPermission object
	 *
	 * @param     sfGuardUserPermission $sfGuardUserPermission  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function filterBysfGuardUserPermission($sfGuardUserPermission, $comparison = null)
	{
		return $this
			->addUsingAlias(sfGuardUserPeer::ID, $sfGuardUserPermission->getUserId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the sfGuardUserPermission relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function joinsfGuardUserPermission($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('sfGuardUserPermission');
		
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
			$this->addJoinObject($join, 'sfGuardUserPermission');
		}
		
		return $this;
	}

	/**
	 * Use the sfGuardUserPermission relation sfGuardUserPermission object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserPermissionQuery A secondary query class using the current class as primary query
	 */
	public function usesfGuardUserPermissionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinsfGuardUserPermission($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'sfGuardUserPermission', 'sfGuardUserPermissionQuery');
	}

	/**
	 * Filter the query by a related sfGuardUserGroup object
	 *
	 * @param     sfGuardUserGroup $sfGuardUserGroup  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function filterBysfGuardUserGroup($sfGuardUserGroup, $comparison = null)
	{
		return $this
			->addUsingAlias(sfGuardUserPeer::ID, $sfGuardUserGroup->getUserId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the sfGuardUserGroup relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function joinsfGuardUserGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('sfGuardUserGroup');
		
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
			$this->addJoinObject($join, 'sfGuardUserGroup');
		}
		
		return $this;
	}

	/**
	 * Use the sfGuardUserGroup relation sfGuardUserGroup object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserGroupQuery A secondary query class using the current class as primary query
	 */
	public function usesfGuardUserGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinsfGuardUserGroup($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'sfGuardUserGroup', 'sfGuardUserGroupQuery');
	}

	/**
	 * Filter the query by a related sfGuardRememberKey object
	 *
	 * @param     sfGuardRememberKey $sfGuardRememberKey  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function filterBysfGuardRememberKey($sfGuardRememberKey, $comparison = null)
	{
		return $this
			->addUsingAlias(sfGuardUserPeer::ID, $sfGuardRememberKey->getUserId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the sfGuardRememberKey relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function joinsfGuardRememberKey($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('sfGuardRememberKey');
		
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
			$this->addJoinObject($join, 'sfGuardRememberKey');
		}
		
		return $this;
	}

	/**
	 * Use the sfGuardRememberKey relation sfGuardRememberKey object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardRememberKeyQuery A secondary query class using the current class as primary query
	 */
	public function usesfGuardRememberKeyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinsfGuardRememberKey($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'sfGuardRememberKey', 'sfGuardRememberKeyQuery');
	}

	/**
	 * Filter the query by a related sfComment object
	 *
	 * @param     sfComment $sfComment  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function filterBysfComment($sfComment, $comparison = null)
	{
		return $this
			->addUsingAlias(sfGuardUserPeer::ID, $sfComment->getAuthorId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the sfComment relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function joinsfComment($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('sfComment');
		
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
			$this->addJoinObject($join, 'sfComment');
		}
		
		return $this;
	}

	/**
	 * Use the sfComment relation sfComment object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfCommentQuery A secondary query class using the current class as primary query
	 */
	public function usesfCommentQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinsfComment($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'sfComment', 'sfCommentQuery');
	}

	/**
	 * Filter the query by a related teBlogPost object
	 *
	 * @param     teBlogPost $teBlogPost  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function filterByteBlogPostRelatedByAuthorId($teBlogPost, $comparison = null)
	{
		return $this
			->addUsingAlias(sfGuardUserPeer::ID, $teBlogPost->getAuthorId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the teBlogPostRelatedByAuthorId relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function jointeBlogPostRelatedByAuthorId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('teBlogPostRelatedByAuthorId');
		
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
			$this->addJoinObject($join, 'teBlogPostRelatedByAuthorId');
		}
		
		return $this;
	}

	/**
	 * Use the teBlogPostRelatedByAuthorId relation teBlogPost object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    teBlogPostQuery A secondary query class using the current class as primary query
	 */
	public function useteBlogPostRelatedByAuthorIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->jointeBlogPostRelatedByAuthorId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'teBlogPostRelatedByAuthorId', 'teBlogPostQuery');
	}

	/**
	 * Filter the query by a related teBlogPost object
	 *
	 * @param     teBlogPost $teBlogPost  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function filterByteBlogPostRelatedByCreatedBy($teBlogPost, $comparison = null)
	{
		return $this
			->addUsingAlias(sfGuardUserPeer::ID, $teBlogPost->getCreatedBy(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the teBlogPostRelatedByCreatedBy relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function jointeBlogPostRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('teBlogPostRelatedByCreatedBy');
		
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
			$this->addJoinObject($join, 'teBlogPostRelatedByCreatedBy');
		}
		
		return $this;
	}

	/**
	 * Use the teBlogPostRelatedByCreatedBy relation teBlogPost object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    teBlogPostQuery A secondary query class using the current class as primary query
	 */
	public function useteBlogPostRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->jointeBlogPostRelatedByCreatedBy($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'teBlogPostRelatedByCreatedBy', 'teBlogPostQuery');
	}

	/**
	 * Filter the query by a related teBlogPost object
	 *
	 * @param     teBlogPost $teBlogPost  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function filterByteBlogPostRelatedByUpdatedBy($teBlogPost, $comparison = null)
	{
		return $this
			->addUsingAlias(sfGuardUserPeer::ID, $teBlogPost->getUpdatedBy(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the teBlogPostRelatedByUpdatedBy relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function jointeBlogPostRelatedByUpdatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('teBlogPostRelatedByUpdatedBy');
		
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
			$this->addJoinObject($join, 'teBlogPostRelatedByUpdatedBy');
		}
		
		return $this;
	}

	/**
	 * Use the teBlogPostRelatedByUpdatedBy relation teBlogPost object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    teBlogPostQuery A secondary query class using the current class as primary query
	 */
	public function useteBlogPostRelatedByUpdatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->jointeBlogPostRelatedByUpdatedBy($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'teBlogPostRelatedByUpdatedBy', 'teBlogPostQuery');
	}

	/**
	 * Filter the query by a related teCalendarEvent object
	 *
	 * @param     teCalendarEvent $teCalendarEvent  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function filterByteCalendarEventRelatedByCreatedBy($teCalendarEvent, $comparison = null)
	{
		return $this
			->addUsingAlias(sfGuardUserPeer::ID, $teCalendarEvent->getCreatedBy(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the teCalendarEventRelatedByCreatedBy relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function jointeCalendarEventRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('teCalendarEventRelatedByCreatedBy');
		
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
			$this->addJoinObject($join, 'teCalendarEventRelatedByCreatedBy');
		}
		
		return $this;
	}

	/**
	 * Use the teCalendarEventRelatedByCreatedBy relation teCalendarEvent object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    teCalendarEventQuery A secondary query class using the current class as primary query
	 */
	public function useteCalendarEventRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->jointeCalendarEventRelatedByCreatedBy($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'teCalendarEventRelatedByCreatedBy', 'teCalendarEventQuery');
	}

	/**
	 * Filter the query by a related teCalendarEvent object
	 *
	 * @param     teCalendarEvent $teCalendarEvent  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function filterByteCalendarEventRelatedByUpdatedBy($teCalendarEvent, $comparison = null)
	{
		return $this
			->addUsingAlias(sfGuardUserPeer::ID, $teCalendarEvent->getUpdatedBy(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the teCalendarEventRelatedByUpdatedBy relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function jointeCalendarEventRelatedByUpdatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('teCalendarEventRelatedByUpdatedBy');
		
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
			$this->addJoinObject($join, 'teCalendarEventRelatedByUpdatedBy');
		}
		
		return $this;
	}

	/**
	 * Use the teCalendarEventRelatedByUpdatedBy relation teCalendarEvent object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    teCalendarEventQuery A secondary query class using the current class as primary query
	 */
	public function useteCalendarEventRelatedByUpdatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->jointeCalendarEventRelatedByUpdatedBy($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'teCalendarEventRelatedByUpdatedBy', 'teCalendarEventQuery');
	}

	/**
	 * Filter the query by a related teTestimonial object
	 *
	 * @param     teTestimonial $teTestimonial  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function filterByteTestimonialRelatedByCreatedBy($teTestimonial, $comparison = null)
	{
		return $this
			->addUsingAlias(sfGuardUserPeer::ID, $teTestimonial->getCreatedBy(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the teTestimonialRelatedByCreatedBy relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function jointeTestimonialRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('teTestimonialRelatedByCreatedBy');
		
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
			$this->addJoinObject($join, 'teTestimonialRelatedByCreatedBy');
		}
		
		return $this;
	}

	/**
	 * Use the teTestimonialRelatedByCreatedBy relation teTestimonial object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    teTestimonialQuery A secondary query class using the current class as primary query
	 */
	public function useteTestimonialRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->jointeTestimonialRelatedByCreatedBy($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'teTestimonialRelatedByCreatedBy', 'teTestimonialQuery');
	}

	/**
	 * Filter the query by a related teTestimonial object
	 *
	 * @param     teTestimonial $teTestimonial  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function filterByteTestimonialRelatedByUpdatedBy($teTestimonial, $comparison = null)
	{
		return $this
			->addUsingAlias(sfGuardUserPeer::ID, $teTestimonial->getUpdatedBy(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the teTestimonialRelatedByUpdatedBy relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function jointeTestimonialRelatedByUpdatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('teTestimonialRelatedByUpdatedBy');
		
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
			$this->addJoinObject($join, 'teTestimonialRelatedByUpdatedBy');
		}
		
		return $this;
	}

	/**
	 * Use the teTestimonialRelatedByUpdatedBy relation teTestimonial object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    teTestimonialQuery A secondary query class using the current class as primary query
	 */
	public function useteTestimonialRelatedByUpdatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->jointeTestimonialRelatedByUpdatedBy($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'teTestimonialRelatedByUpdatedBy', 'teTestimonialQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     sfGuardUser $sfGuardUser Object to remove from the list of results
	 *
	 * @return    sfGuardUserQuery The current query, for fluid interface
	 */
	public function prune($sfGuardUser = null)
	{
		if ($sfGuardUser) {
			$this->addUsingAlias(sfGuardUserPeer::ID, $sfGuardUser->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BasesfGuardUserQuery
