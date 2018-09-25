<?php


/**
 * Base class that represents a row from the 'sf_guard_user' table.
 *
 * 
 *
 * @package    propel.generator.plugins.sfGuardPlugin.lib.model.om
 */
abstract class BasesfGuardUser extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'sfGuardUserPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        sfGuardUserPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the username field.
	 * @var        string
	 */
	protected $username;

	/**
	 * The value for the algorithm field.
	 * Note: this column has a database default value of: 'sha1'
	 * @var        string
	 */
	protected $algorithm;

	/**
	 * The value for the salt field.
	 * @var        string
	 */
	protected $salt;

	/**
	 * The value for the password field.
	 * @var        string
	 */
	protected $password;

	/**
	 * The value for the created_at field.
	 * @var        string
	 */
	protected $created_at;

	/**
	 * The value for the last_login field.
	 * @var        string
	 */
	protected $last_login;

	/**
	 * The value for the is_active field.
	 * Note: this column has a database default value of: true
	 * @var        boolean
	 */
	protected $is_active;

	/**
	 * The value for the is_super_admin field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $is_super_admin;

	/**
	 * The value for the email field.
	 * @var        string
	 */
	protected $email;

	/**
	 * The value for the first_name field.
	 * @var        string
	 */
	protected $first_name;

	/**
	 * The value for the last_name field.
	 * @var        string
	 */
	protected $last_name;

	/**
	 * @var        array Customer[] Collection to store aggregation of Customer objects.
	 */
	protected $collCustomers;

	/**
	 * @var        array sfGuardUserPermission[] Collection to store aggregation of sfGuardUserPermission objects.
	 */
	protected $collsfGuardUserPermissions;

	/**
	 * @var        array sfGuardUserGroup[] Collection to store aggregation of sfGuardUserGroup objects.
	 */
	protected $collsfGuardUserGroups;

	/**
	 * @var        array sfGuardRememberKey[] Collection to store aggregation of sfGuardRememberKey objects.
	 */
	protected $collsfGuardRememberKeys;

	/**
	 * @var        array sfComment[] Collection to store aggregation of sfComment objects.
	 */
	protected $collsfComments;

	/**
	 * @var        array teBlogPost[] Collection to store aggregation of teBlogPost objects.
	 */
	protected $collteBlogPostsRelatedByAuthorId;

	/**
	 * @var        array teBlogPost[] Collection to store aggregation of teBlogPost objects.
	 */
	protected $collteBlogPostsRelatedByCreatedBy;

	/**
	 * @var        array teBlogPost[] Collection to store aggregation of teBlogPost objects.
	 */
	protected $collteBlogPostsRelatedByUpdatedBy;

	/**
	 * @var        array teCalendarEvent[] Collection to store aggregation of teCalendarEvent objects.
	 */
	protected $collteCalendarEventsRelatedByCreatedBy;

	/**
	 * @var        array teCalendarEvent[] Collection to store aggregation of teCalendarEvent objects.
	 */
	protected $collteCalendarEventsRelatedByUpdatedBy;

	/**
	 * @var        array teTestimonial[] Collection to store aggregation of teTestimonial objects.
	 */
	protected $collteTestimonialsRelatedByCreatedBy;

	/**
	 * @var        array teTestimonial[] Collection to store aggregation of teTestimonial objects.
	 */
	protected $collteTestimonialsRelatedByUpdatedBy;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->algorithm = 'sha1';
		$this->is_active = true;
		$this->is_super_admin = false;
	}

	/**
	 * Initializes internal state of BasesfGuardUser object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [username] column value.
	 * 
	 * @return     string
	 */
	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * Get the [algorithm] column value.
	 * 
	 * @return     string
	 */
	public function getAlgorithm()
	{
		return $this->algorithm;
	}

	/**
	 * Get the [salt] column value.
	 * 
	 * @return     string
	 */
	public function getSalt()
	{
		return $this->salt;
	}

	/**
	 * Get the [password] column value.
	 * 
	 * @return     string
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Get the [optionally formatted] temporal [created_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->created_at === null) {
			return null;
		}


		if ($this->created_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->created_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [optionally formatted] temporal [last_login] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getLastLogin($format = 'Y-m-d H:i:s')
	{
		if ($this->last_login === null) {
			return null;
		}


		if ($this->last_login === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->last_login);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->last_login, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [is_active] column value.
	 * 
	 * @return     boolean
	 */
	public function getIsActive()
	{
		return $this->is_active;
	}

	/**
	 * Get the [is_super_admin] column value.
	 * 
	 * @return     boolean
	 */
	public function getIsSuperAdmin()
	{
		return $this->is_super_admin;
	}

	/**
	 * Get the [email] column value.
	 * 
	 * @return     string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Get the [first_name] column value.
	 * 
	 * @return     string
	 */
	public function getFirstName()
	{
		return $this->first_name;
	}

	/**
	 * Get the [last_name] column value.
	 * 
	 * @return     string
	 */
	public function getLastName()
	{
		return $this->last_name;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     sfGuardUser The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [username] column.
	 * 
	 * @param      string $v new value
	 * @return     sfGuardUser The current object (for fluent API support)
	 */
	public function setUsername($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->username !== $v) {
			$this->username = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::USERNAME;
		}

		return $this;
	} // setUsername()

	/**
	 * Set the value of [algorithm] column.
	 * 
	 * @param      string $v new value
	 * @return     sfGuardUser The current object (for fluent API support)
	 */
	public function setAlgorithm($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->algorithm !== $v || $this->isNew()) {
			$this->algorithm = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::ALGORITHM;
		}

		return $this;
	} // setAlgorithm()

	/**
	 * Set the value of [salt] column.
	 * 
	 * @param      string $v new value
	 * @return     sfGuardUser The current object (for fluent API support)
	 */
	public function setSalt($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->salt !== $v) {
			$this->salt = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::SALT;
		}

		return $this;
	} // setSalt()

	/**
	 * Set the value of [password] column.
	 * 
	 * @param      string $v new value
	 * @return     sfGuardUser The current object (for fluent API support)
	 */
	public function setPassword($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->password !== $v) {
			$this->password = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::PASSWORD;
		}

		return $this;
	} // setPassword()

	/**
	 * Sets the value of [created_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     sfGuardUser The current object (for fluent API support)
	 */
	public function setCreatedAt($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->created_at !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->created_at = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = sfGuardUserPeer::CREATED_AT;
			}
		} // if either are not null

		return $this;
	} // setCreatedAt()

	/**
	 * Sets the value of [last_login] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     sfGuardUser The current object (for fluent API support)
	 */
	public function setLastLogin($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->last_login !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->last_login !== null && $tmpDt = new DateTime($this->last_login)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->last_login = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = sfGuardUserPeer::LAST_LOGIN;
			}
		} // if either are not null

		return $this;
	} // setLastLogin()

	/**
	 * Set the value of [is_active] column.
	 * 
	 * @param      boolean $v new value
	 * @return     sfGuardUser The current object (for fluent API support)
	 */
	public function setIsActive($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->is_active !== $v || $this->isNew()) {
			$this->is_active = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::IS_ACTIVE;
		}

		return $this;
	} // setIsActive()

	/**
	 * Set the value of [is_super_admin] column.
	 * 
	 * @param      boolean $v new value
	 * @return     sfGuardUser The current object (for fluent API support)
	 */
	public function setIsSuperAdmin($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->is_super_admin !== $v || $this->isNew()) {
			$this->is_super_admin = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::IS_SUPER_ADMIN;
		}

		return $this;
	} // setIsSuperAdmin()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param      string $v new value
	 * @return     sfGuardUser The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::EMAIL;
		}

		return $this;
	} // setEmail()

	/**
	 * Set the value of [first_name] column.
	 * 
	 * @param      string $v new value
	 * @return     sfGuardUser The current object (for fluent API support)
	 */
	public function setFirstName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->first_name !== $v) {
			$this->first_name = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::FIRST_NAME;
		}

		return $this;
	} // setFirstName()

	/**
	 * Set the value of [last_name] column.
	 * 
	 * @param      string $v new value
	 * @return     sfGuardUser The current object (for fluent API support)
	 */
	public function setLastName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->last_name !== $v) {
			$this->last_name = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::LAST_NAME;
		}

		return $this;
	} // setLastName()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			if ($this->algorithm !== 'sha1') {
				return false;
			}

			if ($this->is_active !== true) {
				return false;
			}

			if ($this->is_super_admin !== false) {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->username = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->algorithm = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->salt = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->password = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->created_at = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->last_login = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->is_active = ($row[$startcol + 7] !== null) ? (boolean) $row[$startcol + 7] : null;
			$this->is_super_admin = ($row[$startcol + 8] !== null) ? (boolean) $row[$startcol + 8] : null;
			$this->email = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->first_name = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->last_name = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 12; // 12 = sfGuardUserPeer::NUM_COLUMNS - sfGuardUserPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating sfGuardUser object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(sfGuardUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = sfGuardUserPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collCustomers = null;

			$this->collsfGuardUserPermissions = null;

			$this->collsfGuardUserGroups = null;

			$this->collsfGuardRememberKeys = null;

			$this->collsfComments = null;

			$this->collteBlogPostsRelatedByAuthorId = null;

			$this->collteBlogPostsRelatedByCreatedBy = null;

			$this->collteBlogPostsRelatedByUpdatedBy = null;

			$this->collteCalendarEventsRelatedByCreatedBy = null;

			$this->collteCalendarEventsRelatedByUpdatedBy = null;

			$this->collteTestimonialsRelatedByCreatedBy = null;

			$this->collteTestimonialsRelatedByUpdatedBy = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(sfGuardUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BasesfGuardUser:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				sfGuardUserQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BasesfGuardUser:delete:post') as $callable)
				{
				  call_user_func($callable, $this, $con);
				}

				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(sfGuardUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BasesfGuardUser:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			  	$con->commit();
			    return $affectedRows;
			  }
			}

			// symfony_timestampable behavior
			
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
				// symfony_timestampable behavior
				if (!$this->isColumnModified(sfGuardUserPeer::CREATED_AT))
				{
				  $this->setCreatedAt(time());
				}

			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BasesfGuardUser:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				sfGuardUserPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			if ($this->isNew() ) {
				$this->modifiedColumns[] = sfGuardUserPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows = 1;
					if ($pk !== null) {
						$this->setId($pk);  //[IMV] update autoincrement primary key
					}
					$this->setNew(false);
				} else {
					$affectedRows = sfGuardUserPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collCustomers !== null) {
				foreach ($this->collCustomers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfGuardUserPermissions !== null) {
				foreach ($this->collsfGuardUserPermissions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfGuardUserGroups !== null) {
				foreach ($this->collsfGuardUserGroups as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfGuardRememberKeys !== null) {
				foreach ($this->collsfGuardRememberKeys as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfComments !== null) {
				foreach ($this->collsfComments as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collteBlogPostsRelatedByAuthorId !== null) {
				foreach ($this->collteBlogPostsRelatedByAuthorId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collteBlogPostsRelatedByCreatedBy !== null) {
				foreach ($this->collteBlogPostsRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collteBlogPostsRelatedByUpdatedBy !== null) {
				foreach ($this->collteBlogPostsRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collteCalendarEventsRelatedByCreatedBy !== null) {
				foreach ($this->collteCalendarEventsRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collteCalendarEventsRelatedByUpdatedBy !== null) {
				foreach ($this->collteCalendarEventsRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collteTestimonialsRelatedByCreatedBy !== null) {
				foreach ($this->collteTestimonialsRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collteTestimonialsRelatedByUpdatedBy !== null) {
				foreach ($this->collteTestimonialsRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = sfGuardUserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCustomers !== null) {
					foreach ($this->collCustomers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfGuardUserPermissions !== null) {
					foreach ($this->collsfGuardUserPermissions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfGuardUserGroups !== null) {
					foreach ($this->collsfGuardUserGroups as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfGuardRememberKeys !== null) {
					foreach ($this->collsfGuardRememberKeys as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfComments !== null) {
					foreach ($this->collsfComments as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collteBlogPostsRelatedByAuthorId !== null) {
					foreach ($this->collteBlogPostsRelatedByAuthorId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collteBlogPostsRelatedByCreatedBy !== null) {
					foreach ($this->collteBlogPostsRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collteBlogPostsRelatedByUpdatedBy !== null) {
					foreach ($this->collteBlogPostsRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collteCalendarEventsRelatedByCreatedBy !== null) {
					foreach ($this->collteCalendarEventsRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collteCalendarEventsRelatedByUpdatedBy !== null) {
					foreach ($this->collteCalendarEventsRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collteTestimonialsRelatedByCreatedBy !== null) {
					foreach ($this->collteTestimonialsRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collteTestimonialsRelatedByUpdatedBy !== null) {
					foreach ($this->collteTestimonialsRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfGuardUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getUsername();
				break;
			case 2:
				return $this->getAlgorithm();
				break;
			case 3:
				return $this->getSalt();
				break;
			case 4:
				return $this->getPassword();
				break;
			case 5:
				return $this->getCreatedAt();
				break;
			case 6:
				return $this->getLastLogin();
				break;
			case 7:
				return $this->getIsActive();
				break;
			case 8:
				return $this->getIsSuperAdmin();
				break;
			case 9:
				return $this->getEmail();
				break;
			case 10:
				return $this->getFirstName();
				break;
			case 11:
				return $this->getLastName();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = sfGuardUserPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUsername(),
			$keys[2] => $this->getAlgorithm(),
			$keys[3] => $this->getSalt(),
			$keys[4] => $this->getPassword(),
			$keys[5] => $this->getCreatedAt(),
			$keys[6] => $this->getLastLogin(),
			$keys[7] => $this->getIsActive(),
			$keys[8] => $this->getIsSuperAdmin(),
			$keys[9] => $this->getEmail(),
			$keys[10] => $this->getFirstName(),
			$keys[11] => $this->getLastName(),
		);
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfGuardUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setUsername($value);
				break;
			case 2:
				$this->setAlgorithm($value);
				break;
			case 3:
				$this->setSalt($value);
				break;
			case 4:
				$this->setPassword($value);
				break;
			case 5:
				$this->setCreatedAt($value);
				break;
			case 6:
				$this->setLastLogin($value);
				break;
			case 7:
				$this->setIsActive($value);
				break;
			case 8:
				$this->setIsSuperAdmin($value);
				break;
			case 9:
				$this->setEmail($value);
				break;
			case 10:
				$this->setFirstName($value);
				break;
			case 11:
				$this->setLastName($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfGuardUserPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUsername($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAlgorithm($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSalt($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPassword($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setLastLogin($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setIsActive($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setIsSuperAdmin($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setEmail($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFirstName($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setLastName($arr[$keys[11]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);

		if ($this->isColumnModified(sfGuardUserPeer::ID)) $criteria->add(sfGuardUserPeer::ID, $this->id);
		if ($this->isColumnModified(sfGuardUserPeer::USERNAME)) $criteria->add(sfGuardUserPeer::USERNAME, $this->username);
		if ($this->isColumnModified(sfGuardUserPeer::ALGORITHM)) $criteria->add(sfGuardUserPeer::ALGORITHM, $this->algorithm);
		if ($this->isColumnModified(sfGuardUserPeer::SALT)) $criteria->add(sfGuardUserPeer::SALT, $this->salt);
		if ($this->isColumnModified(sfGuardUserPeer::PASSWORD)) $criteria->add(sfGuardUserPeer::PASSWORD, $this->password);
		if ($this->isColumnModified(sfGuardUserPeer::CREATED_AT)) $criteria->add(sfGuardUserPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(sfGuardUserPeer::LAST_LOGIN)) $criteria->add(sfGuardUserPeer::LAST_LOGIN, $this->last_login);
		if ($this->isColumnModified(sfGuardUserPeer::IS_ACTIVE)) $criteria->add(sfGuardUserPeer::IS_ACTIVE, $this->is_active);
		if ($this->isColumnModified(sfGuardUserPeer::IS_SUPER_ADMIN)) $criteria->add(sfGuardUserPeer::IS_SUPER_ADMIN, $this->is_super_admin);
		if ($this->isColumnModified(sfGuardUserPeer::EMAIL)) $criteria->add(sfGuardUserPeer::EMAIL, $this->email);
		if ($this->isColumnModified(sfGuardUserPeer::FIRST_NAME)) $criteria->add(sfGuardUserPeer::FIRST_NAME, $this->first_name);
		if ($this->isColumnModified(sfGuardUserPeer::LAST_NAME)) $criteria->add(sfGuardUserPeer::LAST_NAME, $this->last_name);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);
		$criteria->add(sfGuardUserPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of sfGuardUser (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setUsername($this->username);
		$copyObj->setAlgorithm($this->algorithm);
		$copyObj->setSalt($this->salt);
		$copyObj->setPassword($this->password);
		$copyObj->setCreatedAt($this->created_at);
		$copyObj->setLastLogin($this->last_login);
		$copyObj->setIsActive($this->is_active);
		$copyObj->setIsSuperAdmin($this->is_super_admin);
		$copyObj->setEmail($this->email);
		$copyObj->setFirstName($this->first_name);
		$copyObj->setLastName($this->last_name);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getCustomers() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCustomer($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getsfGuardUserPermissions() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addsfGuardUserPermission($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getsfGuardUserGroups() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addsfGuardUserGroup($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getsfGuardRememberKeys() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addsfGuardRememberKey($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getsfComments() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addsfComment($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getteBlogPostsRelatedByAuthorId() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addteBlogPostRelatedByAuthorId($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getteBlogPostsRelatedByCreatedBy() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addteBlogPostRelatedByCreatedBy($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getteBlogPostsRelatedByUpdatedBy() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addteBlogPostRelatedByUpdatedBy($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getteCalendarEventsRelatedByCreatedBy() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addteCalendarEventRelatedByCreatedBy($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getteCalendarEventsRelatedByUpdatedBy() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addteCalendarEventRelatedByUpdatedBy($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getteTestimonialsRelatedByCreatedBy() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addteTestimonialRelatedByCreatedBy($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getteTestimonialsRelatedByUpdatedBy() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addteTestimonialRelatedByUpdatedBy($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);
		$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     sfGuardUser Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     sfGuardUserPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new sfGuardUserPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears out the collCustomers collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCustomers()
	 */
	public function clearCustomers()
	{
		$this->collCustomers = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCustomers collection.
	 *
	 * By default this just sets the collCustomers collection to an empty array (like clearcollCustomers());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCustomers()
	{
		$this->collCustomers = new PropelObjectCollection();
		$this->collCustomers->setModel('Customer');
	}

	/**
	 * Gets an array of Customer objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this sfGuardUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Customer[] List of Customer objects
	 * @throws     PropelException
	 */
	public function getCustomers($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCustomers || null !== $criteria) {
			if ($this->isNew() && null === $this->collCustomers) {
				// return empty collection
				$this->initCustomers();
			} else {
				$collCustomers = CustomerQuery::create(null, $criteria)
					->filterBySalesPerson($this)
					->find($con);
				if (null !== $criteria) {
					return $collCustomers;
				}
				$this->collCustomers = $collCustomers;
			}
		}
		return $this->collCustomers;
	}

	/**
	 * Returns the number of related Customer objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Customer objects.
	 * @throws     PropelException
	 */
	public function countCustomers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCustomers || null !== $criteria) {
			if ($this->isNew() && null === $this->collCustomers) {
				return 0;
			} else {
				$query = CustomerQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterBySalesPerson($this)
					->count($con);
			}
		} else {
			return count($this->collCustomers);
		}
	}

	/**
	 * Method called to associate a Customer object to this object
	 * through the Customer foreign key attribute.
	 *
	 * @param      Customer $l Customer
	 * @return     void
	 * @throws     PropelException
	 */
	public function addCustomer(Customer $l)
	{
		if ($this->collCustomers === null) {
			$this->initCustomers();
		}
		if (!$this->collCustomers->contains($l)) { // only add it if the **same** object is not already associated
			$this->collCustomers[]= $l;
			$l->setSalesPerson($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this sfGuardUser is new, it will return
	 * an empty collection; or if this sfGuardUser has previously
	 * been saved, it will retrieve related Customers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in sfGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Customer[] List of Customer objects
	 */
	public function getCustomersJoinBarAssociation($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = CustomerQuery::create(null, $criteria);
		$query->joinWith('BarAssociation', $join_behavior);

		return $this->getCustomers($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this sfGuardUser is new, it will return
	 * an empty collection; or if this sfGuardUser has previously
	 * been saved, it will retrieve related Customers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in sfGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Customer[] List of Customer objects
	 */
	public function getCustomersJoinReferrer($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = CustomerQuery::create(null, $criteria);
		$query->joinWith('Referrer', $join_behavior);

		return $this->getCustomers($query, $con);
	}

	/**
	 * Clears out the collsfGuardUserPermissions collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addsfGuardUserPermissions()
	 */
	public function clearsfGuardUserPermissions()
	{
		$this->collsfGuardUserPermissions = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collsfGuardUserPermissions collection.
	 *
	 * By default this just sets the collsfGuardUserPermissions collection to an empty array (like clearcollsfGuardUserPermissions());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initsfGuardUserPermissions()
	{
		$this->collsfGuardUserPermissions = new PropelObjectCollection();
		$this->collsfGuardUserPermissions->setModel('sfGuardUserPermission');
	}

	/**
	 * Gets an array of sfGuardUserPermission objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this sfGuardUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array sfGuardUserPermission[] List of sfGuardUserPermission objects
	 * @throws     PropelException
	 */
	public function getsfGuardUserPermissions($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collsfGuardUserPermissions || null !== $criteria) {
			if ($this->isNew() && null === $this->collsfGuardUserPermissions) {
				// return empty collection
				$this->initsfGuardUserPermissions();
			} else {
				$collsfGuardUserPermissions = sfGuardUserPermissionQuery::create(null, $criteria)
					->filterBysfGuardUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collsfGuardUserPermissions;
				}
				$this->collsfGuardUserPermissions = $collsfGuardUserPermissions;
			}
		}
		return $this->collsfGuardUserPermissions;
	}

	/**
	 * Returns the number of related sfGuardUserPermission objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related sfGuardUserPermission objects.
	 * @throws     PropelException
	 */
	public function countsfGuardUserPermissions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collsfGuardUserPermissions || null !== $criteria) {
			if ($this->isNew() && null === $this->collsfGuardUserPermissions) {
				return 0;
			} else {
				$query = sfGuardUserPermissionQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterBysfGuardUser($this)
					->count($con);
			}
		} else {
			return count($this->collsfGuardUserPermissions);
		}
	}

	/**
	 * Method called to associate a sfGuardUserPermission object to this object
	 * through the sfGuardUserPermission foreign key attribute.
	 *
	 * @param      sfGuardUserPermission $l sfGuardUserPermission
	 * @return     void
	 * @throws     PropelException
	 */
	public function addsfGuardUserPermission(sfGuardUserPermission $l)
	{
		if ($this->collsfGuardUserPermissions === null) {
			$this->initsfGuardUserPermissions();
		}
		if (!$this->collsfGuardUserPermissions->contains($l)) { // only add it if the **same** object is not already associated
			$this->collsfGuardUserPermissions[]= $l;
			$l->setsfGuardUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this sfGuardUser is new, it will return
	 * an empty collection; or if this sfGuardUser has previously
	 * been saved, it will retrieve related sfGuardUserPermissions from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in sfGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array sfGuardUserPermission[] List of sfGuardUserPermission objects
	 */
	public function getsfGuardUserPermissionsJoinsfGuardPermission($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = sfGuardUserPermissionQuery::create(null, $criteria);
		$query->joinWith('sfGuardPermission', $join_behavior);

		return $this->getsfGuardUserPermissions($query, $con);
	}

	/**
	 * Clears out the collsfGuardUserGroups collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addsfGuardUserGroups()
	 */
	public function clearsfGuardUserGroups()
	{
		$this->collsfGuardUserGroups = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collsfGuardUserGroups collection.
	 *
	 * By default this just sets the collsfGuardUserGroups collection to an empty array (like clearcollsfGuardUserGroups());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initsfGuardUserGroups()
	{
		$this->collsfGuardUserGroups = new PropelObjectCollection();
		$this->collsfGuardUserGroups->setModel('sfGuardUserGroup');
	}

	/**
	 * Gets an array of sfGuardUserGroup objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this sfGuardUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array sfGuardUserGroup[] List of sfGuardUserGroup objects
	 * @throws     PropelException
	 */
	public function getsfGuardUserGroups($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collsfGuardUserGroups || null !== $criteria) {
			if ($this->isNew() && null === $this->collsfGuardUserGroups) {
				// return empty collection
				$this->initsfGuardUserGroups();
			} else {
				$collsfGuardUserGroups = sfGuardUserGroupQuery::create(null, $criteria)
					->filterBysfGuardUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collsfGuardUserGroups;
				}
				$this->collsfGuardUserGroups = $collsfGuardUserGroups;
			}
		}
		return $this->collsfGuardUserGroups;
	}

	/**
	 * Returns the number of related sfGuardUserGroup objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related sfGuardUserGroup objects.
	 * @throws     PropelException
	 */
	public function countsfGuardUserGroups(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collsfGuardUserGroups || null !== $criteria) {
			if ($this->isNew() && null === $this->collsfGuardUserGroups) {
				return 0;
			} else {
				$query = sfGuardUserGroupQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterBysfGuardUser($this)
					->count($con);
			}
		} else {
			return count($this->collsfGuardUserGroups);
		}
	}

	/**
	 * Method called to associate a sfGuardUserGroup object to this object
	 * through the sfGuardUserGroup foreign key attribute.
	 *
	 * @param      sfGuardUserGroup $l sfGuardUserGroup
	 * @return     void
	 * @throws     PropelException
	 */
	public function addsfGuardUserGroup(sfGuardUserGroup $l)
	{
		if ($this->collsfGuardUserGroups === null) {
			$this->initsfGuardUserGroups();
		}
		if (!$this->collsfGuardUserGroups->contains($l)) { // only add it if the **same** object is not already associated
			$this->collsfGuardUserGroups[]= $l;
			$l->setsfGuardUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this sfGuardUser is new, it will return
	 * an empty collection; or if this sfGuardUser has previously
	 * been saved, it will retrieve related sfGuardUserGroups from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in sfGuardUser.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array sfGuardUserGroup[] List of sfGuardUserGroup objects
	 */
	public function getsfGuardUserGroupsJoinsfGuardGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = sfGuardUserGroupQuery::create(null, $criteria);
		$query->joinWith('sfGuardGroup', $join_behavior);

		return $this->getsfGuardUserGroups($query, $con);
	}

	/**
	 * Clears out the collsfGuardRememberKeys collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addsfGuardRememberKeys()
	 */
	public function clearsfGuardRememberKeys()
	{
		$this->collsfGuardRememberKeys = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collsfGuardRememberKeys collection.
	 *
	 * By default this just sets the collsfGuardRememberKeys collection to an empty array (like clearcollsfGuardRememberKeys());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initsfGuardRememberKeys()
	{
		$this->collsfGuardRememberKeys = new PropelObjectCollection();
		$this->collsfGuardRememberKeys->setModel('sfGuardRememberKey');
	}

	/**
	 * Gets an array of sfGuardRememberKey objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this sfGuardUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array sfGuardRememberKey[] List of sfGuardRememberKey objects
	 * @throws     PropelException
	 */
	public function getsfGuardRememberKeys($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collsfGuardRememberKeys || null !== $criteria) {
			if ($this->isNew() && null === $this->collsfGuardRememberKeys) {
				// return empty collection
				$this->initsfGuardRememberKeys();
			} else {
				$collsfGuardRememberKeys = sfGuardRememberKeyQuery::create(null, $criteria)
					->filterBysfGuardUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collsfGuardRememberKeys;
				}
				$this->collsfGuardRememberKeys = $collsfGuardRememberKeys;
			}
		}
		return $this->collsfGuardRememberKeys;
	}

	/**
	 * Returns the number of related sfGuardRememberKey objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related sfGuardRememberKey objects.
	 * @throws     PropelException
	 */
	public function countsfGuardRememberKeys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collsfGuardRememberKeys || null !== $criteria) {
			if ($this->isNew() && null === $this->collsfGuardRememberKeys) {
				return 0;
			} else {
				$query = sfGuardRememberKeyQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterBysfGuardUser($this)
					->count($con);
			}
		} else {
			return count($this->collsfGuardRememberKeys);
		}
	}

	/**
	 * Method called to associate a sfGuardRememberKey object to this object
	 * through the sfGuardRememberKey foreign key attribute.
	 *
	 * @param      sfGuardRememberKey $l sfGuardRememberKey
	 * @return     void
	 * @throws     PropelException
	 */
	public function addsfGuardRememberKey(sfGuardRememberKey $l)
	{
		if ($this->collsfGuardRememberKeys === null) {
			$this->initsfGuardRememberKeys();
		}
		if (!$this->collsfGuardRememberKeys->contains($l)) { // only add it if the **same** object is not already associated
			$this->collsfGuardRememberKeys[]= $l;
			$l->setsfGuardUser($this);
		}
	}

	/**
	 * Clears out the collsfComments collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addsfComments()
	 */
	public function clearsfComments()
	{
		$this->collsfComments = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collsfComments collection.
	 *
	 * By default this just sets the collsfComments collection to an empty array (like clearcollsfComments());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initsfComments()
	{
		$this->collsfComments = new PropelObjectCollection();
		$this->collsfComments->setModel('sfComment');
	}

	/**
	 * Gets an array of sfComment objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this sfGuardUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array sfComment[] List of sfComment objects
	 * @throws     PropelException
	 */
	public function getsfComments($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collsfComments || null !== $criteria) {
			if ($this->isNew() && null === $this->collsfComments) {
				// return empty collection
				$this->initsfComments();
			} else {
				$collsfComments = sfCommentQuery::create(null, $criteria)
					->filterByAuthor($this)
					->find($con);
				if (null !== $criteria) {
					return $collsfComments;
				}
				$this->collsfComments = $collsfComments;
			}
		}
		return $this->collsfComments;
	}

	/**
	 * Returns the number of related sfComment objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related sfComment objects.
	 * @throws     PropelException
	 */
	public function countsfComments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collsfComments || null !== $criteria) {
			if ($this->isNew() && null === $this->collsfComments) {
				return 0;
			} else {
				$query = sfCommentQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAuthor($this)
					->count($con);
			}
		} else {
			return count($this->collsfComments);
		}
	}

	/**
	 * Method called to associate a sfComment object to this object
	 * through the sfComment foreign key attribute.
	 *
	 * @param      sfComment $l sfComment
	 * @return     void
	 * @throws     PropelException
	 */
	public function addsfComment(sfComment $l)
	{
		if ($this->collsfComments === null) {
			$this->initsfComments();
		}
		if (!$this->collsfComments->contains($l)) { // only add it if the **same** object is not already associated
			$this->collsfComments[]= $l;
			$l->setAuthor($this);
		}
	}

	/**
	 * Clears out the collteBlogPostsRelatedByAuthorId collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addteBlogPostsRelatedByAuthorId()
	 */
	public function clearteBlogPostsRelatedByAuthorId()
	{
		$this->collteBlogPostsRelatedByAuthorId = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collteBlogPostsRelatedByAuthorId collection.
	 *
	 * By default this just sets the collteBlogPostsRelatedByAuthorId collection to an empty array (like clearcollteBlogPostsRelatedByAuthorId());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initteBlogPostsRelatedByAuthorId()
	{
		$this->collteBlogPostsRelatedByAuthorId = new PropelObjectCollection();
		$this->collteBlogPostsRelatedByAuthorId->setModel('teBlogPost');
	}

	/**
	 * Gets an array of teBlogPost objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this sfGuardUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array teBlogPost[] List of teBlogPost objects
	 * @throws     PropelException
	 */
	public function getteBlogPostsRelatedByAuthorId($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collteBlogPostsRelatedByAuthorId || null !== $criteria) {
			if ($this->isNew() && null === $this->collteBlogPostsRelatedByAuthorId) {
				// return empty collection
				$this->initteBlogPostsRelatedByAuthorId();
			} else {
				$collteBlogPostsRelatedByAuthorId = teBlogPostQuery::create(null, $criteria)
					->filterByAuthor($this)
					->find($con);
				if (null !== $criteria) {
					return $collteBlogPostsRelatedByAuthorId;
				}
				$this->collteBlogPostsRelatedByAuthorId = $collteBlogPostsRelatedByAuthorId;
			}
		}
		return $this->collteBlogPostsRelatedByAuthorId;
	}

	/**
	 * Returns the number of related teBlogPost objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related teBlogPost objects.
	 * @throws     PropelException
	 */
	public function countteBlogPostsRelatedByAuthorId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collteBlogPostsRelatedByAuthorId || null !== $criteria) {
			if ($this->isNew() && null === $this->collteBlogPostsRelatedByAuthorId) {
				return 0;
			} else {
				$query = teBlogPostQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAuthor($this)
					->count($con);
			}
		} else {
			return count($this->collteBlogPostsRelatedByAuthorId);
		}
	}

	/**
	 * Method called to associate a teBlogPost object to this object
	 * through the teBlogPost foreign key attribute.
	 *
	 * @param      teBlogPost $l teBlogPost
	 * @return     void
	 * @throws     PropelException
	 */
	public function addteBlogPostRelatedByAuthorId(teBlogPost $l)
	{
		if ($this->collteBlogPostsRelatedByAuthorId === null) {
			$this->initteBlogPostsRelatedByAuthorId();
		}
		if (!$this->collteBlogPostsRelatedByAuthorId->contains($l)) { // only add it if the **same** object is not already associated
			$this->collteBlogPostsRelatedByAuthorId[]= $l;
			$l->setAuthor($this);
		}
	}

	/**
	 * Clears out the collteBlogPostsRelatedByCreatedBy collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addteBlogPostsRelatedByCreatedBy()
	 */
	public function clearteBlogPostsRelatedByCreatedBy()
	{
		$this->collteBlogPostsRelatedByCreatedBy = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collteBlogPostsRelatedByCreatedBy collection.
	 *
	 * By default this just sets the collteBlogPostsRelatedByCreatedBy collection to an empty array (like clearcollteBlogPostsRelatedByCreatedBy());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initteBlogPostsRelatedByCreatedBy()
	{
		$this->collteBlogPostsRelatedByCreatedBy = new PropelObjectCollection();
		$this->collteBlogPostsRelatedByCreatedBy->setModel('teBlogPost');
	}

	/**
	 * Gets an array of teBlogPost objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this sfGuardUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array teBlogPost[] List of teBlogPost objects
	 * @throws     PropelException
	 */
	public function getteBlogPostsRelatedByCreatedBy($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collteBlogPostsRelatedByCreatedBy || null !== $criteria) {
			if ($this->isNew() && null === $this->collteBlogPostsRelatedByCreatedBy) {
				// return empty collection
				$this->initteBlogPostsRelatedByCreatedBy();
			} else {
				$collteBlogPostsRelatedByCreatedBy = teBlogPostQuery::create(null, $criteria)
					->filterByCreator($this)
					->find($con);
				if (null !== $criteria) {
					return $collteBlogPostsRelatedByCreatedBy;
				}
				$this->collteBlogPostsRelatedByCreatedBy = $collteBlogPostsRelatedByCreatedBy;
			}
		}
		return $this->collteBlogPostsRelatedByCreatedBy;
	}

	/**
	 * Returns the number of related teBlogPost objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related teBlogPost objects.
	 * @throws     PropelException
	 */
	public function countteBlogPostsRelatedByCreatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collteBlogPostsRelatedByCreatedBy || null !== $criteria) {
			if ($this->isNew() && null === $this->collteBlogPostsRelatedByCreatedBy) {
				return 0;
			} else {
				$query = teBlogPostQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCreator($this)
					->count($con);
			}
		} else {
			return count($this->collteBlogPostsRelatedByCreatedBy);
		}
	}

	/**
	 * Method called to associate a teBlogPost object to this object
	 * through the teBlogPost foreign key attribute.
	 *
	 * @param      teBlogPost $l teBlogPost
	 * @return     void
	 * @throws     PropelException
	 */
	public function addteBlogPostRelatedByCreatedBy(teBlogPost $l)
	{
		if ($this->collteBlogPostsRelatedByCreatedBy === null) {
			$this->initteBlogPostsRelatedByCreatedBy();
		}
		if (!$this->collteBlogPostsRelatedByCreatedBy->contains($l)) { // only add it if the **same** object is not already associated
			$this->collteBlogPostsRelatedByCreatedBy[]= $l;
			$l->setCreator($this);
		}
	}

	/**
	 * Clears out the collteBlogPostsRelatedByUpdatedBy collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addteBlogPostsRelatedByUpdatedBy()
	 */
	public function clearteBlogPostsRelatedByUpdatedBy()
	{
		$this->collteBlogPostsRelatedByUpdatedBy = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collteBlogPostsRelatedByUpdatedBy collection.
	 *
	 * By default this just sets the collteBlogPostsRelatedByUpdatedBy collection to an empty array (like clearcollteBlogPostsRelatedByUpdatedBy());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initteBlogPostsRelatedByUpdatedBy()
	{
		$this->collteBlogPostsRelatedByUpdatedBy = new PropelObjectCollection();
		$this->collteBlogPostsRelatedByUpdatedBy->setModel('teBlogPost');
	}

	/**
	 * Gets an array of teBlogPost objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this sfGuardUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array teBlogPost[] List of teBlogPost objects
	 * @throws     PropelException
	 */
	public function getteBlogPostsRelatedByUpdatedBy($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collteBlogPostsRelatedByUpdatedBy || null !== $criteria) {
			if ($this->isNew() && null === $this->collteBlogPostsRelatedByUpdatedBy) {
				// return empty collection
				$this->initteBlogPostsRelatedByUpdatedBy();
			} else {
				$collteBlogPostsRelatedByUpdatedBy = teBlogPostQuery::create(null, $criteria)
					->filterByUpdater($this)
					->find($con);
				if (null !== $criteria) {
					return $collteBlogPostsRelatedByUpdatedBy;
				}
				$this->collteBlogPostsRelatedByUpdatedBy = $collteBlogPostsRelatedByUpdatedBy;
			}
		}
		return $this->collteBlogPostsRelatedByUpdatedBy;
	}

	/**
	 * Returns the number of related teBlogPost objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related teBlogPost objects.
	 * @throws     PropelException
	 */
	public function countteBlogPostsRelatedByUpdatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collteBlogPostsRelatedByUpdatedBy || null !== $criteria) {
			if ($this->isNew() && null === $this->collteBlogPostsRelatedByUpdatedBy) {
				return 0;
			} else {
				$query = teBlogPostQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUpdater($this)
					->count($con);
			}
		} else {
			return count($this->collteBlogPostsRelatedByUpdatedBy);
		}
	}

	/**
	 * Method called to associate a teBlogPost object to this object
	 * through the teBlogPost foreign key attribute.
	 *
	 * @param      teBlogPost $l teBlogPost
	 * @return     void
	 * @throws     PropelException
	 */
	public function addteBlogPostRelatedByUpdatedBy(teBlogPost $l)
	{
		if ($this->collteBlogPostsRelatedByUpdatedBy === null) {
			$this->initteBlogPostsRelatedByUpdatedBy();
		}
		if (!$this->collteBlogPostsRelatedByUpdatedBy->contains($l)) { // only add it if the **same** object is not already associated
			$this->collteBlogPostsRelatedByUpdatedBy[]= $l;
			$l->setUpdater($this);
		}
	}

	/**
	 * Clears out the collteCalendarEventsRelatedByCreatedBy collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addteCalendarEventsRelatedByCreatedBy()
	 */
	public function clearteCalendarEventsRelatedByCreatedBy()
	{
		$this->collteCalendarEventsRelatedByCreatedBy = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collteCalendarEventsRelatedByCreatedBy collection.
	 *
	 * By default this just sets the collteCalendarEventsRelatedByCreatedBy collection to an empty array (like clearcollteCalendarEventsRelatedByCreatedBy());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initteCalendarEventsRelatedByCreatedBy()
	{
		$this->collteCalendarEventsRelatedByCreatedBy = new PropelObjectCollection();
		$this->collteCalendarEventsRelatedByCreatedBy->setModel('teCalendarEvent');
	}

	/**
	 * Gets an array of teCalendarEvent objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this sfGuardUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array teCalendarEvent[] List of teCalendarEvent objects
	 * @throws     PropelException
	 */
	public function getteCalendarEventsRelatedByCreatedBy($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collteCalendarEventsRelatedByCreatedBy || null !== $criteria) {
			if ($this->isNew() && null === $this->collteCalendarEventsRelatedByCreatedBy) {
				// return empty collection
				$this->initteCalendarEventsRelatedByCreatedBy();
			} else {
				$collteCalendarEventsRelatedByCreatedBy = teCalendarEventQuery::create(null, $criteria)
					->filterByCreator($this)
					->find($con);
				if (null !== $criteria) {
					return $collteCalendarEventsRelatedByCreatedBy;
				}
				$this->collteCalendarEventsRelatedByCreatedBy = $collteCalendarEventsRelatedByCreatedBy;
			}
		}
		return $this->collteCalendarEventsRelatedByCreatedBy;
	}

	/**
	 * Returns the number of related teCalendarEvent objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related teCalendarEvent objects.
	 * @throws     PropelException
	 */
	public function countteCalendarEventsRelatedByCreatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collteCalendarEventsRelatedByCreatedBy || null !== $criteria) {
			if ($this->isNew() && null === $this->collteCalendarEventsRelatedByCreatedBy) {
				return 0;
			} else {
				$query = teCalendarEventQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCreator($this)
					->count($con);
			}
		} else {
			return count($this->collteCalendarEventsRelatedByCreatedBy);
		}
	}

	/**
	 * Method called to associate a teCalendarEvent object to this object
	 * through the teCalendarEvent foreign key attribute.
	 *
	 * @param      teCalendarEvent $l teCalendarEvent
	 * @return     void
	 * @throws     PropelException
	 */
	public function addteCalendarEventRelatedByCreatedBy(teCalendarEvent $l)
	{
		if ($this->collteCalendarEventsRelatedByCreatedBy === null) {
			$this->initteCalendarEventsRelatedByCreatedBy();
		}
		if (!$this->collteCalendarEventsRelatedByCreatedBy->contains($l)) { // only add it if the **same** object is not already associated
			$this->collteCalendarEventsRelatedByCreatedBy[]= $l;
			$l->setCreator($this);
		}
	}

	/**
	 * Clears out the collteCalendarEventsRelatedByUpdatedBy collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addteCalendarEventsRelatedByUpdatedBy()
	 */
	public function clearteCalendarEventsRelatedByUpdatedBy()
	{
		$this->collteCalendarEventsRelatedByUpdatedBy = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collteCalendarEventsRelatedByUpdatedBy collection.
	 *
	 * By default this just sets the collteCalendarEventsRelatedByUpdatedBy collection to an empty array (like clearcollteCalendarEventsRelatedByUpdatedBy());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initteCalendarEventsRelatedByUpdatedBy()
	{
		$this->collteCalendarEventsRelatedByUpdatedBy = new PropelObjectCollection();
		$this->collteCalendarEventsRelatedByUpdatedBy->setModel('teCalendarEvent');
	}

	/**
	 * Gets an array of teCalendarEvent objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this sfGuardUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array teCalendarEvent[] List of teCalendarEvent objects
	 * @throws     PropelException
	 */
	public function getteCalendarEventsRelatedByUpdatedBy($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collteCalendarEventsRelatedByUpdatedBy || null !== $criteria) {
			if ($this->isNew() && null === $this->collteCalendarEventsRelatedByUpdatedBy) {
				// return empty collection
				$this->initteCalendarEventsRelatedByUpdatedBy();
			} else {
				$collteCalendarEventsRelatedByUpdatedBy = teCalendarEventQuery::create(null, $criteria)
					->filterByUpdater($this)
					->find($con);
				if (null !== $criteria) {
					return $collteCalendarEventsRelatedByUpdatedBy;
				}
				$this->collteCalendarEventsRelatedByUpdatedBy = $collteCalendarEventsRelatedByUpdatedBy;
			}
		}
		return $this->collteCalendarEventsRelatedByUpdatedBy;
	}

	/**
	 * Returns the number of related teCalendarEvent objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related teCalendarEvent objects.
	 * @throws     PropelException
	 */
	public function countteCalendarEventsRelatedByUpdatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collteCalendarEventsRelatedByUpdatedBy || null !== $criteria) {
			if ($this->isNew() && null === $this->collteCalendarEventsRelatedByUpdatedBy) {
				return 0;
			} else {
				$query = teCalendarEventQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUpdater($this)
					->count($con);
			}
		} else {
			return count($this->collteCalendarEventsRelatedByUpdatedBy);
		}
	}

	/**
	 * Method called to associate a teCalendarEvent object to this object
	 * through the teCalendarEvent foreign key attribute.
	 *
	 * @param      teCalendarEvent $l teCalendarEvent
	 * @return     void
	 * @throws     PropelException
	 */
	public function addteCalendarEventRelatedByUpdatedBy(teCalendarEvent $l)
	{
		if ($this->collteCalendarEventsRelatedByUpdatedBy === null) {
			$this->initteCalendarEventsRelatedByUpdatedBy();
		}
		if (!$this->collteCalendarEventsRelatedByUpdatedBy->contains($l)) { // only add it if the **same** object is not already associated
			$this->collteCalendarEventsRelatedByUpdatedBy[]= $l;
			$l->setUpdater($this);
		}
	}

	/**
	 * Clears out the collteTestimonialsRelatedByCreatedBy collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addteTestimonialsRelatedByCreatedBy()
	 */
	public function clearteTestimonialsRelatedByCreatedBy()
	{
		$this->collteTestimonialsRelatedByCreatedBy = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collteTestimonialsRelatedByCreatedBy collection.
	 *
	 * By default this just sets the collteTestimonialsRelatedByCreatedBy collection to an empty array (like clearcollteTestimonialsRelatedByCreatedBy());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initteTestimonialsRelatedByCreatedBy()
	{
		$this->collteTestimonialsRelatedByCreatedBy = new PropelObjectCollection();
		$this->collteTestimonialsRelatedByCreatedBy->setModel('teTestimonial');
	}

	/**
	 * Gets an array of teTestimonial objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this sfGuardUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array teTestimonial[] List of teTestimonial objects
	 * @throws     PropelException
	 */
	public function getteTestimonialsRelatedByCreatedBy($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collteTestimonialsRelatedByCreatedBy || null !== $criteria) {
			if ($this->isNew() && null === $this->collteTestimonialsRelatedByCreatedBy) {
				// return empty collection
				$this->initteTestimonialsRelatedByCreatedBy();
			} else {
				$collteTestimonialsRelatedByCreatedBy = teTestimonialQuery::create(null, $criteria)
					->filterBysfGuardUserRelatedByCreatedBy($this)
					->find($con);
				if (null !== $criteria) {
					return $collteTestimonialsRelatedByCreatedBy;
				}
				$this->collteTestimonialsRelatedByCreatedBy = $collteTestimonialsRelatedByCreatedBy;
			}
		}
		return $this->collteTestimonialsRelatedByCreatedBy;
	}

	/**
	 * Returns the number of related teTestimonial objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related teTestimonial objects.
	 * @throws     PropelException
	 */
	public function countteTestimonialsRelatedByCreatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collteTestimonialsRelatedByCreatedBy || null !== $criteria) {
			if ($this->isNew() && null === $this->collteTestimonialsRelatedByCreatedBy) {
				return 0;
			} else {
				$query = teTestimonialQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterBysfGuardUserRelatedByCreatedBy($this)
					->count($con);
			}
		} else {
			return count($this->collteTestimonialsRelatedByCreatedBy);
		}
	}

	/**
	 * Method called to associate a teTestimonial object to this object
	 * through the teTestimonial foreign key attribute.
	 *
	 * @param      teTestimonial $l teTestimonial
	 * @return     void
	 * @throws     PropelException
	 */
	public function addteTestimonialRelatedByCreatedBy(teTestimonial $l)
	{
		if ($this->collteTestimonialsRelatedByCreatedBy === null) {
			$this->initteTestimonialsRelatedByCreatedBy();
		}
		if (!$this->collteTestimonialsRelatedByCreatedBy->contains($l)) { // only add it if the **same** object is not already associated
			$this->collteTestimonialsRelatedByCreatedBy[]= $l;
			$l->setsfGuardUserRelatedByCreatedBy($this);
		}
	}

	/**
	 * Clears out the collteTestimonialsRelatedByUpdatedBy collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addteTestimonialsRelatedByUpdatedBy()
	 */
	public function clearteTestimonialsRelatedByUpdatedBy()
	{
		$this->collteTestimonialsRelatedByUpdatedBy = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collteTestimonialsRelatedByUpdatedBy collection.
	 *
	 * By default this just sets the collteTestimonialsRelatedByUpdatedBy collection to an empty array (like clearcollteTestimonialsRelatedByUpdatedBy());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initteTestimonialsRelatedByUpdatedBy()
	{
		$this->collteTestimonialsRelatedByUpdatedBy = new PropelObjectCollection();
		$this->collteTestimonialsRelatedByUpdatedBy->setModel('teTestimonial');
	}

	/**
	 * Gets an array of teTestimonial objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this sfGuardUser is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array teTestimonial[] List of teTestimonial objects
	 * @throws     PropelException
	 */
	public function getteTestimonialsRelatedByUpdatedBy($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collteTestimonialsRelatedByUpdatedBy || null !== $criteria) {
			if ($this->isNew() && null === $this->collteTestimonialsRelatedByUpdatedBy) {
				// return empty collection
				$this->initteTestimonialsRelatedByUpdatedBy();
			} else {
				$collteTestimonialsRelatedByUpdatedBy = teTestimonialQuery::create(null, $criteria)
					->filterBysfGuardUserRelatedByUpdatedBy($this)
					->find($con);
				if (null !== $criteria) {
					return $collteTestimonialsRelatedByUpdatedBy;
				}
				$this->collteTestimonialsRelatedByUpdatedBy = $collteTestimonialsRelatedByUpdatedBy;
			}
		}
		return $this->collteTestimonialsRelatedByUpdatedBy;
	}

	/**
	 * Returns the number of related teTestimonial objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related teTestimonial objects.
	 * @throws     PropelException
	 */
	public function countteTestimonialsRelatedByUpdatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collteTestimonialsRelatedByUpdatedBy || null !== $criteria) {
			if ($this->isNew() && null === $this->collteTestimonialsRelatedByUpdatedBy) {
				return 0;
			} else {
				$query = teTestimonialQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterBysfGuardUserRelatedByUpdatedBy($this)
					->count($con);
			}
		} else {
			return count($this->collteTestimonialsRelatedByUpdatedBy);
		}
	}

	/**
	 * Method called to associate a teTestimonial object to this object
	 * through the teTestimonial foreign key attribute.
	 *
	 * @param      teTestimonial $l teTestimonial
	 * @return     void
	 * @throws     PropelException
	 */
	public function addteTestimonialRelatedByUpdatedBy(teTestimonial $l)
	{
		if ($this->collteTestimonialsRelatedByUpdatedBy === null) {
			$this->initteTestimonialsRelatedByUpdatedBy();
		}
		if (!$this->collteTestimonialsRelatedByUpdatedBy->contains($l)) { // only add it if the **same** object is not already associated
			$this->collteTestimonialsRelatedByUpdatedBy[]= $l;
			$l->setsfGuardUserRelatedByUpdatedBy($this);
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->username = null;
		$this->algorithm = null;
		$this->salt = null;
		$this->password = null;
		$this->created_at = null;
		$this->last_login = null;
		$this->is_active = null;
		$this->is_super_admin = null;
		$this->email = null;
		$this->first_name = null;
		$this->last_name = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->applyDefaultValues();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collCustomers) {
				foreach ((array) $this->collCustomers as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collsfGuardUserPermissions) {
				foreach ((array) $this->collsfGuardUserPermissions as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collsfGuardUserGroups) {
				foreach ((array) $this->collsfGuardUserGroups as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collsfGuardRememberKeys) {
				foreach ((array) $this->collsfGuardRememberKeys as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collsfComments) {
				foreach ((array) $this->collsfComments as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collteBlogPostsRelatedByAuthorId) {
				foreach ((array) $this->collteBlogPostsRelatedByAuthorId as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collteBlogPostsRelatedByCreatedBy) {
				foreach ((array) $this->collteBlogPostsRelatedByCreatedBy as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collteBlogPostsRelatedByUpdatedBy) {
				foreach ((array) $this->collteBlogPostsRelatedByUpdatedBy as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collteCalendarEventsRelatedByCreatedBy) {
				foreach ((array) $this->collteCalendarEventsRelatedByCreatedBy as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collteCalendarEventsRelatedByUpdatedBy) {
				foreach ((array) $this->collteCalendarEventsRelatedByUpdatedBy as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collteTestimonialsRelatedByCreatedBy) {
				foreach ((array) $this->collteTestimonialsRelatedByCreatedBy as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collteTestimonialsRelatedByUpdatedBy) {
				foreach ((array) $this->collteTestimonialsRelatedByUpdatedBy as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collCustomers = null;
		$this->collsfGuardUserPermissions = null;
		$this->collsfGuardUserGroups = null;
		$this->collsfGuardRememberKeys = null;
		$this->collsfComments = null;
		$this->collteBlogPostsRelatedByAuthorId = null;
		$this->collteBlogPostsRelatedByCreatedBy = null;
		$this->collteBlogPostsRelatedByUpdatedBy = null;
		$this->collteCalendarEventsRelatedByCreatedBy = null;
		$this->collteCalendarEventsRelatedByUpdatedBy = null;
		$this->collteTestimonialsRelatedByCreatedBy = null;
		$this->collteTestimonialsRelatedByUpdatedBy = null;
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BasesfGuardUser:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}

		if (preg_match('/get(\w+)/', $name, $matches)) {
			$virtualColumn = $matches[1];
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
			// no lcfirst in php<5.3...
			$virtualColumn[0] = strtolower($virtualColumn[0]);
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
		}
		return parent::__call($name, $params);
	}

} // BasesfGuardUser
