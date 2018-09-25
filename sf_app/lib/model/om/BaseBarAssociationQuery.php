<?php


/**
 * Base class that represents a query for the 'esq_bar_associations' table.
 *
 * 
 *
 * @method     BarAssociationQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     BarAssociationQuery orderByAbbreviation($order = Criteria::ASC) Order by the abbreviation column
 * @method     BarAssociationQuery orderByPrimaryContactEmail($order = Criteria::ASC) Order by the primary_contact_email column
 * @method     BarAssociationQuery orderByContactInfo($order = Criteria::ASC) Order by the contact_info column
 * @method     BarAssociationQuery orderByNotes($order = Criteria::ASC) Order by the notes column
 * @method     BarAssociationQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     BarAssociationQuery orderByLastLogin($order = Criteria::ASC) Order by the last_login column
 * @method     BarAssociationQuery orderByAffinityExpirationDate($order = Criteria::ASC) Order by the affinity_expiration_date column
 * @method     BarAssociationQuery orderByAffinityStartDate($order = Criteria::ASC) Order by the affinity_start_date column
 * @method     BarAssociationQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     BarAssociationQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     BarAssociationQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     BarAssociationQuery orderBySlug($order = Criteria::ASC) Order by the slug column
 *
 * @method     BarAssociationQuery groupByName() Group by the name column
 * @method     BarAssociationQuery groupByAbbreviation() Group by the abbreviation column
 * @method     BarAssociationQuery groupByPrimaryContactEmail() Group by the primary_contact_email column
 * @method     BarAssociationQuery groupByContactInfo() Group by the contact_info column
 * @method     BarAssociationQuery groupByNotes() Group by the notes column
 * @method     BarAssociationQuery groupByPassword() Group by the password column
 * @method     BarAssociationQuery groupByLastLogin() Group by the last_login column
 * @method     BarAssociationQuery groupByAffinityExpirationDate() Group by the affinity_expiration_date column
 * @method     BarAssociationQuery groupByAffinityStartDate() Group by the affinity_start_date column
 * @method     BarAssociationQuery groupById() Group by the id column
 * @method     BarAssociationQuery groupByCreatedAt() Group by the created_at column
 * @method     BarAssociationQuery groupByUpdatedAt() Group by the updated_at column
 * @method     BarAssociationQuery groupBySlug() Group by the slug column
 *
 * @method     BarAssociationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     BarAssociationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     BarAssociationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     BarAssociationQuery leftJoinCustomer($relationAlias = null) Adds a LEFT JOIN clause to the query using the Customer relation
 * @method     BarAssociationQuery rightJoinCustomer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Customer relation
 * @method     BarAssociationQuery innerJoinCustomer($relationAlias = null) Adds a INNER JOIN clause to the query using the Customer relation
 *
 * @method     BarAssociationQuery leftJoinCoupon($relationAlias = null) Adds a LEFT JOIN clause to the query using the Coupon relation
 * @method     BarAssociationQuery rightJoinCoupon($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Coupon relation
 * @method     BarAssociationQuery innerJoinCoupon($relationAlias = null) Adds a INNER JOIN clause to the query using the Coupon relation
 *
 * @method     BarAssociationQuery leftJoinBarAssociationPromoPage($relationAlias = null) Adds a LEFT JOIN clause to the query using the BarAssociationPromoPage relation
 * @method     BarAssociationQuery rightJoinBarAssociationPromoPage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BarAssociationPromoPage relation
 * @method     BarAssociationQuery innerJoinBarAssociationPromoPage($relationAlias = null) Adds a INNER JOIN clause to the query using the BarAssociationPromoPage relation
 *
 * @method     BarAssociation findOne(PropelPDO $con = null) Return the first BarAssociation matching the query
 * @method     BarAssociation findOneOrCreate(PropelPDO $con = null) Return the first BarAssociation matching the query, or a new BarAssociation object populated from the query conditions when no match is found
 *
 * @method     BarAssociation findOneByName(string $name) Return the first BarAssociation filtered by the name column
 * @method     BarAssociation findOneByAbbreviation(string $abbreviation) Return the first BarAssociation filtered by the abbreviation column
 * @method     BarAssociation findOneByPrimaryContactEmail(string $primary_contact_email) Return the first BarAssociation filtered by the primary_contact_email column
 * @method     BarAssociation findOneByContactInfo(string $contact_info) Return the first BarAssociation filtered by the contact_info column
 * @method     BarAssociation findOneByNotes(string $notes) Return the first BarAssociation filtered by the notes column
 * @method     BarAssociation findOneByPassword(string $password) Return the first BarAssociation filtered by the password column
 * @method     BarAssociation findOneByLastLogin(string $last_login) Return the first BarAssociation filtered by the last_login column
 * @method     BarAssociation findOneByAffinityExpirationDate(string $affinity_expiration_date) Return the first BarAssociation filtered by the affinity_expiration_date column
 * @method     BarAssociation findOneByAffinityStartDate(string $affinity_start_date) Return the first BarAssociation filtered by the affinity_start_date column
 * @method     BarAssociation findOneById(int $id) Return the first BarAssociation filtered by the id column
 * @method     BarAssociation findOneByCreatedAt(string $created_at) Return the first BarAssociation filtered by the created_at column
 * @method     BarAssociation findOneByUpdatedAt(string $updated_at) Return the first BarAssociation filtered by the updated_at column
 * @method     BarAssociation findOneBySlug(string $slug) Return the first BarAssociation filtered by the slug column
 *
 * @method     array findByName(string $name) Return BarAssociation objects filtered by the name column
 * @method     array findByAbbreviation(string $abbreviation) Return BarAssociation objects filtered by the abbreviation column
 * @method     array findByPrimaryContactEmail(string $primary_contact_email) Return BarAssociation objects filtered by the primary_contact_email column
 * @method     array findByContactInfo(string $contact_info) Return BarAssociation objects filtered by the contact_info column
 * @method     array findByNotes(string $notes) Return BarAssociation objects filtered by the notes column
 * @method     array findByPassword(string $password) Return BarAssociation objects filtered by the password column
 * @method     array findByLastLogin(string $last_login) Return BarAssociation objects filtered by the last_login column
 * @method     array findByAffinityExpirationDate(string $affinity_expiration_date) Return BarAssociation objects filtered by the affinity_expiration_date column
 * @method     array findByAffinityStartDate(string $affinity_start_date) Return BarAssociation objects filtered by the affinity_start_date column
 * @method     array findById(int $id) Return BarAssociation objects filtered by the id column
 * @method     array findByCreatedAt(string $created_at) Return BarAssociation objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return BarAssociation objects filtered by the updated_at column
 * @method     array findBySlug(string $slug) Return BarAssociation objects filtered by the slug column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseBarAssociationQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseBarAssociationQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'BarAssociation', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new BarAssociationQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    BarAssociationQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof BarAssociationQuery) {
			return $criteria;
		}
		$query = new BarAssociationQuery();
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
	 * @return    BarAssociation|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = BarAssociationPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    BarAssociationQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(BarAssociationPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    BarAssociationQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(BarAssociationPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BarAssociationQuery The current query, for fluid interface
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
		return $this->addUsingAlias(BarAssociationPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the abbreviation column
	 * 
	 * @param     string $abbreviation The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BarAssociationQuery The current query, for fluid interface
	 */
	public function filterByAbbreviation($abbreviation = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($abbreviation)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $abbreviation)) {
				$abbreviation = str_replace('*', '%', $abbreviation);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(BarAssociationPeer::ABBREVIATION, $abbreviation, $comparison);
	}

	/**
	 * Filter the query on the primary_contact_email column
	 * 
	 * @param     string $primaryContactEmail The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BarAssociationQuery The current query, for fluid interface
	 */
	public function filterByPrimaryContactEmail($primaryContactEmail = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($primaryContactEmail)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $primaryContactEmail)) {
				$primaryContactEmail = str_replace('*', '%', $primaryContactEmail);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(BarAssociationPeer::PRIMARY_CONTACT_EMAIL, $primaryContactEmail, $comparison);
	}

	/**
	 * Filter the query on the contact_info column
	 * 
	 * @param     string $contactInfo The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BarAssociationQuery The current query, for fluid interface
	 */
	public function filterByContactInfo($contactInfo = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($contactInfo)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $contactInfo)) {
				$contactInfo = str_replace('*', '%', $contactInfo);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(BarAssociationPeer::CONTACT_INFO, $contactInfo, $comparison);
	}

	/**
	 * Filter the query on the notes column
	 * 
	 * @param     string $notes The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BarAssociationQuery The current query, for fluid interface
	 */
	public function filterByNotes($notes = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($notes)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $notes)) {
				$notes = str_replace('*', '%', $notes);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(BarAssociationPeer::NOTES, $notes, $comparison);
	}

	/**
	 * Filter the query on the password column
	 * 
	 * @param     string $password The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BarAssociationQuery The current query, for fluid interface
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
		return $this->addUsingAlias(BarAssociationPeer::PASSWORD, $password, $comparison);
	}

	/**
	 * Filter the query on the last_login column
	 * 
	 * @param     string|array $lastLogin The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BarAssociationQuery The current query, for fluid interface
	 */
	public function filterByLastLogin($lastLogin = null, $comparison = null)
	{
		if (is_array($lastLogin)) {
			$useMinMax = false;
			if (isset($lastLogin['min'])) {
				$this->addUsingAlias(BarAssociationPeer::LAST_LOGIN, $lastLogin['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($lastLogin['max'])) {
				$this->addUsingAlias(BarAssociationPeer::LAST_LOGIN, $lastLogin['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(BarAssociationPeer::LAST_LOGIN, $lastLogin, $comparison);
	}

	/**
	 * Filter the query on the affinity_expiration_date column
	 * 
	 * @param     string|array $affinityExpirationDate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BarAssociationQuery The current query, for fluid interface
	 */
	public function filterByAffinityExpirationDate($affinityExpirationDate = null, $comparison = null)
	{
		if (is_array($affinityExpirationDate)) {
			$useMinMax = false;
			if (isset($affinityExpirationDate['min'])) {
				$this->addUsingAlias(BarAssociationPeer::AFFINITY_EXPIRATION_DATE, $affinityExpirationDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($affinityExpirationDate['max'])) {
				$this->addUsingAlias(BarAssociationPeer::AFFINITY_EXPIRATION_DATE, $affinityExpirationDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(BarAssociationPeer::AFFINITY_EXPIRATION_DATE, $affinityExpirationDate, $comparison);
	}

	/**
	 * Filter the query on the affinity_start_date column
	 * 
	 * @param     string|array $affinityStartDate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BarAssociationQuery The current query, for fluid interface
	 */
	public function filterByAffinityStartDate($affinityStartDate = null, $comparison = null)
	{
		if (is_array($affinityStartDate)) {
			$useMinMax = false;
			if (isset($affinityStartDate['min'])) {
				$this->addUsingAlias(BarAssociationPeer::AFFINITY_START_DATE, $affinityStartDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($affinityStartDate['max'])) {
				$this->addUsingAlias(BarAssociationPeer::AFFINITY_START_DATE, $affinityStartDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(BarAssociationPeer::AFFINITY_START_DATE, $affinityStartDate, $comparison);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BarAssociationQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(BarAssociationPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BarAssociationQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(BarAssociationPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(BarAssociationPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(BarAssociationPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BarAssociationQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(BarAssociationPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(BarAssociationPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(BarAssociationPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query on the slug column
	 * 
	 * @param     string $slug The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BarAssociationQuery The current query, for fluid interface
	 */
	public function filterBySlug($slug = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($slug)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $slug)) {
				$slug = str_replace('*', '%', $slug);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(BarAssociationPeer::SLUG, $slug, $comparison);
	}

	/**
	 * Filter the query by a related Customer object
	 *
	 * @param     Customer $customer  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BarAssociationQuery The current query, for fluid interface
	 */
	public function filterByCustomer($customer, $comparison = null)
	{
		return $this
			->addUsingAlias(BarAssociationPeer::ID, $customer->getBarAssociationId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Customer relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    BarAssociationQuery The current query, for fluid interface
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
	 * Filter the query by a related Coupon object
	 *
	 * @param     Coupon $coupon  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BarAssociationQuery The current query, for fluid interface
	 */
	public function filterByCoupon($coupon, $comparison = null)
	{
		return $this
			->addUsingAlias(BarAssociationPeer::ID, $coupon->getBarAssociationId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Coupon relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    BarAssociationQuery The current query, for fluid interface
	 */
	public function joinCoupon($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Coupon');
		
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
			$this->addJoinObject($join, 'Coupon');
		}
		
		return $this;
	}

	/**
	 * Use the Coupon relation Coupon object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CouponQuery A secondary query class using the current class as primary query
	 */
	public function useCouponQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinCoupon($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Coupon', 'CouponQuery');
	}

	/**
	 * Filter the query by a related BarAssociationPromoPage object
	 *
	 * @param     BarAssociationPromoPage $barAssociationPromoPage  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BarAssociationQuery The current query, for fluid interface
	 */
	public function filterByBarAssociationPromoPage($barAssociationPromoPage, $comparison = null)
	{
		return $this
			->addUsingAlias(BarAssociationPeer::ID, $barAssociationPromoPage->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the BarAssociationPromoPage relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    BarAssociationQuery The current query, for fluid interface
	 */
	public function joinBarAssociationPromoPage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('BarAssociationPromoPage');
		
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
			$this->addJoinObject($join, 'BarAssociationPromoPage');
		}
		
		return $this;
	}

	/**
	 * Use the BarAssociationPromoPage relation BarAssociationPromoPage object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    BarAssociationPromoPageQuery A secondary query class using the current class as primary query
	 */
	public function useBarAssociationPromoPageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinBarAssociationPromoPage($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'BarAssociationPromoPage', 'BarAssociationPromoPageQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     BarAssociation $barAssociation Object to remove from the list of results
	 *
	 * @return    BarAssociationQuery The current query, for fluid interface
	 */
	public function prune($barAssociation = null)
	{
		if ($barAssociation) {
			$this->addUsingAlias(BarAssociationPeer::ID, $barAssociation->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	// timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     BarAssociationQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(BarAssociationPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     BarAssociationQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(BarAssociationPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     BarAssociationQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(BarAssociationPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     BarAssociationQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(BarAssociationPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     BarAssociationQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(BarAssociationPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     BarAssociationQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(BarAssociationPeer::CREATED_AT);
	}

	// sluggable behavior
	
	/**
	 * Find one object based on its slug
	 * 
	 * @param     string $slug The value to use as filter.
	 * @param     PropelPDO $con The optional connection object
	 *
	 * @return    BarAssociation the result, formatted by the current formatter
	 */
	public function findOneBySlug($slug, $con = null)
	{
		return $this->filterBySlug($slug)->findOne($con);
	}

} // BaseBarAssociationQuery
