<?php


/**
 * Base class that represents a query for the 'esq_client_messages' table.
 *
 * 
 *
 * @method     ClientMessageQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ClientMessageQuery orderByWebsiteId($order = Criteria::ASC) Order by the website_id column
 * @method     ClientMessageQuery orderByDomain($order = Criteria::ASC) Order by the domain column
 * @method     ClientMessageQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ClientMessageQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ClientMessageQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ClientMessageQuery orderBySubject($order = Criteria::ASC) Order by the subject column
 * @method     ClientMessageQuery orderByMessage($order = Criteria::ASC) Order by the message column
 * @method     ClientMessageQuery orderBySubmittedByIp($order = Criteria::ASC) Order by the submitted_by_ip column
 * @method     ClientMessageQuery orderBySubmittedByUserAgent($order = Criteria::ASC) Order by the submitted_by_user_agent column
 * @method     ClientMessageQuery orderByIsSpam($order = Criteria::ASC) Order by the is_spam column
 * @method     ClientMessageQuery orderByIsViewed($order = Criteria::ASC) Order by the is_viewed column
 * @method     ClientMessageQuery orderByDeletedAt($order = Criteria::ASC) Order by the deleted_at column
 * @method     ClientMessageQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ClientMessageQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ClientMessageQuery groupById() Group by the id column
 * @method     ClientMessageQuery groupByWebsiteId() Group by the website_id column
 * @method     ClientMessageQuery groupByDomain() Group by the domain column
 * @method     ClientMessageQuery groupByName() Group by the name column
 * @method     ClientMessageQuery groupByEmail() Group by the email column
 * @method     ClientMessageQuery groupByPhone() Group by the phone column
 * @method     ClientMessageQuery groupBySubject() Group by the subject column
 * @method     ClientMessageQuery groupByMessage() Group by the message column
 * @method     ClientMessageQuery groupBySubmittedByIp() Group by the submitted_by_ip column
 * @method     ClientMessageQuery groupBySubmittedByUserAgent() Group by the submitted_by_user_agent column
 * @method     ClientMessageQuery groupByIsSpam() Group by the is_spam column
 * @method     ClientMessageQuery groupByIsViewed() Group by the is_viewed column
 * @method     ClientMessageQuery groupByDeletedAt() Group by the deleted_at column
 * @method     ClientMessageQuery groupByCreatedAt() Group by the created_at column
 * @method     ClientMessageQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ClientMessageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ClientMessageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ClientMessageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ClientMessageQuery leftJoinWebsite($relationAlias = null) Adds a LEFT JOIN clause to the query using the Website relation
 * @method     ClientMessageQuery rightJoinWebsite($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Website relation
 * @method     ClientMessageQuery innerJoinWebsite($relationAlias = null) Adds a INNER JOIN clause to the query using the Website relation
 *
 * @method     ClientMessage findOne(PropelPDO $con = null) Return the first ClientMessage matching the query
 * @method     ClientMessage findOneOrCreate(PropelPDO $con = null) Return the first ClientMessage matching the query, or a new ClientMessage object populated from the query conditions when no match is found
 *
 * @method     ClientMessage findOneById(string $id) Return the first ClientMessage filtered by the id column
 * @method     ClientMessage findOneByWebsiteId(string $website_id) Return the first ClientMessage filtered by the website_id column
 * @method     ClientMessage findOneByDomain(string $domain) Return the first ClientMessage filtered by the domain column
 * @method     ClientMessage findOneByName(string $name) Return the first ClientMessage filtered by the name column
 * @method     ClientMessage findOneByEmail(string $email) Return the first ClientMessage filtered by the email column
 * @method     ClientMessage findOneByPhone(string $phone) Return the first ClientMessage filtered by the phone column
 * @method     ClientMessage findOneBySubject(string $subject) Return the first ClientMessage filtered by the subject column
 * @method     ClientMessage findOneByMessage(string $message) Return the first ClientMessage filtered by the message column
 * @method     ClientMessage findOneBySubmittedByIp(string $submitted_by_ip) Return the first ClientMessage filtered by the submitted_by_ip column
 * @method     ClientMessage findOneBySubmittedByUserAgent(string $submitted_by_user_agent) Return the first ClientMessage filtered by the submitted_by_user_agent column
 * @method     ClientMessage findOneByIsSpam(boolean $is_spam) Return the first ClientMessage filtered by the is_spam column
 * @method     ClientMessage findOneByIsViewed(boolean $is_viewed) Return the first ClientMessage filtered by the is_viewed column
 * @method     ClientMessage findOneByDeletedAt(string $deleted_at) Return the first ClientMessage filtered by the deleted_at column
 * @method     ClientMessage findOneByCreatedAt(string $created_at) Return the first ClientMessage filtered by the created_at column
 * @method     ClientMessage findOneByUpdatedAt(string $updated_at) Return the first ClientMessage filtered by the updated_at column
 *
 * @method     array findById(string $id) Return ClientMessage objects filtered by the id column
 * @method     array findByWebsiteId(string $website_id) Return ClientMessage objects filtered by the website_id column
 * @method     array findByDomain(string $domain) Return ClientMessage objects filtered by the domain column
 * @method     array findByName(string $name) Return ClientMessage objects filtered by the name column
 * @method     array findByEmail(string $email) Return ClientMessage objects filtered by the email column
 * @method     array findByPhone(string $phone) Return ClientMessage objects filtered by the phone column
 * @method     array findBySubject(string $subject) Return ClientMessage objects filtered by the subject column
 * @method     array findByMessage(string $message) Return ClientMessage objects filtered by the message column
 * @method     array findBySubmittedByIp(string $submitted_by_ip) Return ClientMessage objects filtered by the submitted_by_ip column
 * @method     array findBySubmittedByUserAgent(string $submitted_by_user_agent) Return ClientMessage objects filtered by the submitted_by_user_agent column
 * @method     array findByIsSpam(boolean $is_spam) Return ClientMessage objects filtered by the is_spam column
 * @method     array findByIsViewed(boolean $is_viewed) Return ClientMessage objects filtered by the is_viewed column
 * @method     array findByDeletedAt(string $deleted_at) Return ClientMessage objects filtered by the deleted_at column
 * @method     array findByCreatedAt(string $created_at) Return ClientMessage objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return ClientMessage objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseClientMessageQuery extends ModelCriteria
{

	// soft_delete behavior
	protected static $softDelete = true;
	protected $localSoftDelete = true;

	/**
	 * Initializes internal state of BaseClientMessageQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'ClientMessage', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ClientMessageQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ClientMessageQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ClientMessageQuery) {
			return $criteria;
		}
		$query = new ClientMessageQuery();
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
	 * @return    ClientMessage|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ClientMessagePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ClientMessageQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ClientMessagePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ClientMessageQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ClientMessagePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     string $id The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientMessageQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ClientMessagePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the website_id column
	 * 
	 * @param     string $websiteId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientMessageQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ClientMessagePeer::WEBSITE_ID, $websiteId, $comparison);
	}

	/**
	 * Filter the query on the domain column
	 * 
	 * @param     string $domain The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientMessageQuery The current query, for fluid interface
	 */
	public function filterByDomain($domain = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($domain)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $domain)) {
				$domain = str_replace('*', '%', $domain);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClientMessagePeer::DOMAIN, $domain, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientMessageQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ClientMessagePeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the email column
	 * 
	 * @param     string $email The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientMessageQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ClientMessagePeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query on the phone column
	 * 
	 * @param     string $phone The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientMessageQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ClientMessagePeer::PHONE, $phone, $comparison);
	}

	/**
	 * Filter the query on the subject column
	 * 
	 * @param     string $subject The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientMessageQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ClientMessagePeer::SUBJECT, $subject, $comparison);
	}

	/**
	 * Filter the query on the message column
	 * 
	 * @param     string $message The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientMessageQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ClientMessagePeer::MESSAGE, $message, $comparison);
	}

	/**
	 * Filter the query on the submitted_by_ip column
	 * 
	 * @param     string $submittedByIp The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientMessageQuery The current query, for fluid interface
	 */
	public function filterBySubmittedByIp($submittedByIp = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($submittedByIp)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $submittedByIp)) {
				$submittedByIp = str_replace('*', '%', $submittedByIp);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClientMessagePeer::SUBMITTED_BY_IP, $submittedByIp, $comparison);
	}

	/**
	 * Filter the query on the submitted_by_user_agent column
	 * 
	 * @param     string $submittedByUserAgent The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientMessageQuery The current query, for fluid interface
	 */
	public function filterBySubmittedByUserAgent($submittedByUserAgent = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($submittedByUserAgent)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $submittedByUserAgent)) {
				$submittedByUserAgent = str_replace('*', '%', $submittedByUserAgent);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClientMessagePeer::SUBMITTED_BY_USER_AGENT, $submittedByUserAgent, $comparison);
	}

	/**
	 * Filter the query on the is_spam column
	 * 
	 * @param     boolean|string $isSpam The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientMessageQuery The current query, for fluid interface
	 */
	public function filterByIsSpam($isSpam = null, $comparison = null)
	{
		if (is_string($isSpam)) {
			$is_spam = in_array(strtolower($isSpam), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ClientMessagePeer::IS_SPAM, $isSpam, $comparison);
	}

	/**
	 * Filter the query on the is_viewed column
	 * 
	 * @param     boolean|string $isViewed The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientMessageQuery The current query, for fluid interface
	 */
	public function filterByIsViewed($isViewed = null, $comparison = null)
	{
		if (is_string($isViewed)) {
			$is_viewed = in_array(strtolower($isViewed), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ClientMessagePeer::IS_VIEWED, $isViewed, $comparison);
	}

	/**
	 * Filter the query on the deleted_at column
	 * 
	 * @param     string|array $deletedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientMessageQuery The current query, for fluid interface
	 */
	public function filterByDeletedAt($deletedAt = null, $comparison = null)
	{
		if (is_array($deletedAt)) {
			$useMinMax = false;
			if (isset($deletedAt['min'])) {
				$this->addUsingAlias(ClientMessagePeer::DELETED_AT, $deletedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($deletedAt['max'])) {
				$this->addUsingAlias(ClientMessagePeer::DELETED_AT, $deletedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientMessagePeer::DELETED_AT, $deletedAt, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientMessageQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(ClientMessagePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(ClientMessagePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientMessagePeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientMessageQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(ClientMessagePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(ClientMessagePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientMessagePeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query by a related Website object
	 *
	 * @param     Website $website  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientMessageQuery The current query, for fluid interface
	 */
	public function filterByWebsite($website, $comparison = null)
	{
		return $this
			->addUsingAlias(ClientMessagePeer::WEBSITE_ID, $website->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Website relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientMessageQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     ClientMessage $clientMessage Object to remove from the list of results
	 *
	 * @return    ClientMessageQuery The current query, for fluid interface
	 */
	public function prune($clientMessage = null)
	{
		if ($clientMessage) {
			$this->addUsingAlias(ClientMessagePeer::ID, $clientMessage->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	/**
	 * Code to execute before every SELECT statement
	 * 
	 * @param     PropelPDO $con The connection object used by the query
	 */
	protected function basePreSelect(PropelPDO $con)
	{
		// soft_delete behavior
		if (ClientMessageQuery::isSoftDeleteEnabled() && $this->localSoftDelete) {
			$this->addUsingAlias(ClientMessagePeer::DELETED_AT, null, Criteria::ISNULL);
		} else {
			ClientMessagePeer::enableSoftDelete();
		}
		
		return $this->preSelect($con);
	}

	/**
	 * Code to execute before every DELETE statement
	 * 
	 * @param     PropelPDO $con The connection object used by the query
	 */
	protected function basePreDelete(PropelPDO $con)
	{
		// soft_delete behavior
		if (ClientMessageQuery::isSoftDeleteEnabled() && $this->localSoftDelete) {
			return $this->softDelete($con);
		} else {
			return $this->hasWhereClause() ? $this->forceDelete($con) : $this->forceDeleteAll($con);
		}
		
		return $this->preDelete($con);
	}

	// soft_delete behavior
	
	/**
	 * Temporarily disable the filter on deleted rows
	 * Valid only for the current query
	 * 
	 * @see ClientMessageQuery::disableSoftDelete() to disable the filter for more than one query
	 *
	 * @return ClientMessageQuery The current query, for fuid interface
	 */
	public function includeDeleted()
	{
		$this->localSoftDelete = false;
		return $this;
	}
	
	/**
	 * Soft delete the selected rows
	 *
	 * @param			PropelPDO $con an optional connection object
	 *
	 * @return		int Number of updated rows
	 */
	public function softDelete(PropelPDO $con = null)
	{
		return $this->update(array('DeletedAt' => time()), $con);
	}
	
	/**
	 * Bypass the soft_delete behavior and force a hard delete of the selected rows
	 *
	 * @param			PropelPDO $con an optional connection object
	 *
	 * @return		int Number of deleted rows
	 */
	public function forceDelete(PropelPDO $con = null)
	{
		return ClientMessagePeer::doForceDelete($this, $con);
	}
	
	/**
	 * Bypass the soft_delete behavior and force a hard delete of all the rows
	 *
	 * @param			PropelPDO $con an optional connection object
	 *
	 * @return		int Number of deleted rows
	 */
	public function forceDeleteAll(PropelPDO $con = null)
	{
		return ClientMessagePeer::doForceDeleteAll($con);}
	
	/**
	 * Undelete selected rows
	 *
	 * @param			PropelPDO $con an optional connection object
	 *
	 * @return		int The number of rows affected by this update and any referring fk objects' save() operations.
	 */
	public function unDelete(PropelPDO $con = null)
	{
		return $this->update(array('DeletedAt' => null), $con);
	}
		
	/**
	 * Enable the soft_delete behavior for this model
	 */
	public static function enableSoftDelete()
	{
		self::$softDelete = true;
	}
	
	/**
	 * Disable the soft_delete behavior for this model
	 */
	public static function disableSoftDelete()
	{
		self::$softDelete = false;
	}
	
	/**
	 * Check the soft_delete behavior for this model
	 *
	 * @return boolean true if the soft_delete behavior is enabled
	 */
	public static function isSoftDeleteEnabled()
	{
		return self::$softDelete;
	}

	// timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     ClientMessageQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(ClientMessagePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     ClientMessageQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(ClientMessagePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     ClientMessageQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(ClientMessagePeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     ClientMessageQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(ClientMessagePeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     ClientMessageQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(ClientMessagePeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     ClientMessageQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(ClientMessagePeer::CREATED_AT);
	}

} // BaseClientMessageQuery
