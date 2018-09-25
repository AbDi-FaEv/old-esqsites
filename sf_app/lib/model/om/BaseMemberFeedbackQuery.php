<?php


/**
 * Base class that represents a query for the 'esq_member_feedbacks' table.
 *
 * 
 *
 * @method     MemberFeedbackQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     MemberFeedbackQuery orderByCustomerId($order = Criteria::ASC) Order by the customer_id column
 * @method     MemberFeedbackQuery orderByReplyEmail($order = Criteria::ASC) Order by the reply_email column
 * @method     MemberFeedbackQuery orderBySubject($order = Criteria::ASC) Order by the subject column
 * @method     MemberFeedbackQuery orderByMessage($order = Criteria::ASC) Order by the message column
 * @method     MemberFeedbackQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     MemberFeedbackQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     MemberFeedbackQuery groupById() Group by the id column
 * @method     MemberFeedbackQuery groupByCustomerId() Group by the customer_id column
 * @method     MemberFeedbackQuery groupByReplyEmail() Group by the reply_email column
 * @method     MemberFeedbackQuery groupBySubject() Group by the subject column
 * @method     MemberFeedbackQuery groupByMessage() Group by the message column
 * @method     MemberFeedbackQuery groupByCreatedAt() Group by the created_at column
 * @method     MemberFeedbackQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     MemberFeedbackQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MemberFeedbackQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MemberFeedbackQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     MemberFeedbackQuery leftJoinCustomer($relationAlias = null) Adds a LEFT JOIN clause to the query using the Customer relation
 * @method     MemberFeedbackQuery rightJoinCustomer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Customer relation
 * @method     MemberFeedbackQuery innerJoinCustomer($relationAlias = null) Adds a INNER JOIN clause to the query using the Customer relation
 *
 * @method     MemberFeedback findOne(PropelPDO $con = null) Return the first MemberFeedback matching the query
 * @method     MemberFeedback findOneOrCreate(PropelPDO $con = null) Return the first MemberFeedback matching the query, or a new MemberFeedback object populated from the query conditions when no match is found
 *
 * @method     MemberFeedback findOneById(string $id) Return the first MemberFeedback filtered by the id column
 * @method     MemberFeedback findOneByCustomerId(string $customer_id) Return the first MemberFeedback filtered by the customer_id column
 * @method     MemberFeedback findOneByReplyEmail(string $reply_email) Return the first MemberFeedback filtered by the reply_email column
 * @method     MemberFeedback findOneBySubject(string $subject) Return the first MemberFeedback filtered by the subject column
 * @method     MemberFeedback findOneByMessage(string $message) Return the first MemberFeedback filtered by the message column
 * @method     MemberFeedback findOneByCreatedAt(string $created_at) Return the first MemberFeedback filtered by the created_at column
 * @method     MemberFeedback findOneByUpdatedAt(string $updated_at) Return the first MemberFeedback filtered by the updated_at column
 *
 * @method     array findById(string $id) Return MemberFeedback objects filtered by the id column
 * @method     array findByCustomerId(string $customer_id) Return MemberFeedback objects filtered by the customer_id column
 * @method     array findByReplyEmail(string $reply_email) Return MemberFeedback objects filtered by the reply_email column
 * @method     array findBySubject(string $subject) Return MemberFeedback objects filtered by the subject column
 * @method     array findByMessage(string $message) Return MemberFeedback objects filtered by the message column
 * @method     array findByCreatedAt(string $created_at) Return MemberFeedback objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return MemberFeedback objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseMemberFeedbackQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseMemberFeedbackQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'MemberFeedback', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new MemberFeedbackQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    MemberFeedbackQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof MemberFeedbackQuery) {
			return $criteria;
		}
		$query = new MemberFeedbackQuery();
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
	 * @return    MemberFeedback|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = MemberFeedbackPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    MemberFeedbackQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(MemberFeedbackPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    MemberFeedbackQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(MemberFeedbackPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     string $id The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MemberFeedbackQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MemberFeedbackPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the customer_id column
	 * 
	 * @param     string $customerId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MemberFeedbackQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MemberFeedbackPeer::CUSTOMER_ID, $customerId, $comparison);
	}

	/**
	 * Filter the query on the reply_email column
	 * 
	 * @param     string $replyEmail The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MemberFeedbackQuery The current query, for fluid interface
	 */
	public function filterByReplyEmail($replyEmail = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($replyEmail)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $replyEmail)) {
				$replyEmail = str_replace('*', '%', $replyEmail);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MemberFeedbackPeer::REPLY_EMAIL, $replyEmail, $comparison);
	}

	/**
	 * Filter the query on the subject column
	 * 
	 * @param     string $subject The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MemberFeedbackQuery The current query, for fluid interface
	 */
	public function filterBySubject($subject = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($subject)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $subject)) {
				$subject = str_replace('*', '%', $subject);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MemberFeedbackPeer::SUBJECT, $subject, $comparison);
	}

	/**
	 * Filter the query on the message column
	 * 
	 * @param     string $message The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MemberFeedbackQuery The current query, for fluid interface
	 */
	public function filterByMessage($message = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($message)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $message)) {
				$message = str_replace('*', '%', $message);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MemberFeedbackPeer::MESSAGE, $message, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MemberFeedbackQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(MemberFeedbackPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(MemberFeedbackPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MemberFeedbackPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MemberFeedbackQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(MemberFeedbackPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(MemberFeedbackPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MemberFeedbackPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related Customer object
	 *
	 * @param     Customer $customer  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MemberFeedbackQuery The current query, for fluid interface
	 */
	public function filterByCustomer($customer, $comparison = null)
	{
		return $this
			->addUsingAlias(MemberFeedbackPeer::CUSTOMER_ID, $customer->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Customer relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MemberFeedbackQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     MemberFeedback $memberFeedback Object to remove from the list of results
	 *
	 * @return    MemberFeedbackQuery The current query, for fluid interface
	 */
	public function prune($memberFeedback = null)
	{
		if ($memberFeedback) {
			$this->addUsingAlias(MemberFeedbackPeer::ID, $memberFeedback->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	// timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     MemberFeedbackQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(MemberFeedbackPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     MemberFeedbackQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(MemberFeedbackPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     MemberFeedbackQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(MemberFeedbackPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     MemberFeedbackQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(MemberFeedbackPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     MemberFeedbackQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(MemberFeedbackPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     MemberFeedbackQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(MemberFeedbackPeer::CREATED_AT);
	}

} // BaseMemberFeedbackQuery
