<?php


/**
 * Base class that represents a row from the 'esq_domain_names' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseDomain extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'DomainPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        DomainPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        string
	 */
	protected $id;

	/**
	 * The value for the website_id field.
	 * @var        string
	 */
	protected $website_id;

	/**
	 * The value for the name field.
	 * @var        string
	 */
	protected $name;

	/**
	 * The value for the type field.
	 * @var        string
	 */
	protected $type;

	/**
	 * The value for the registration_type field.
	 * @var        string
	 */
	protected $registration_type;

	/**
	 * The value for the is_auto_renew field.
	 * Note: this column has a database default value of: true
	 * @var        boolean
	 */
	protected $is_auto_renew;

	/**
	 * The value for the status field.
	 * @var        int
	 */
	protected $status;

	/**
	 * The value for the expiration_date field.
	 * @var        string
	 */
	protected $expiration_date;

	/**
	 * The value for the last_renewal_date field.
	 * @var        string
	 */
	protected $last_renewal_date;

	/**
	 * The value for the created_at field.
	 * @var        string
	 */
	protected $created_at;

	/**
	 * The value for the updated_at field.
	 * @var        string
	 */
	protected $updated_at;

	/**
	 * @var        Website
	 */
	protected $aWebsite;

	/**
	 * @var        array Website[] Collection to store aggregation of Website objects.
	 */
	protected $collWebsitesRelatedByPrimaryDomainId;

	/**
	 * @var        array DomainCheck[] Collection to store aggregation of DomainCheck objects.
	 */
	protected $collDomainChecks;

	/**
	 * @var        array EmailAccount[] Collection to store aggregation of EmailAccount objects.
	 */
	protected $collEmailAccounts;

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
		$this->is_auto_renew = true;
	}

	/**
	 * Initializes internal state of BaseDomain object.
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
	 * @return     string
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [website_id] column value.
	 * 
	 * @return     string
	 */
	public function getWebsiteId()
	{
		return $this->website_id;
	}

	/**
	 * Get the [name] column value.
	 * 
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the [type] column value.
	 * 
	 * @return     string
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * Get the [registration_type] column value.
	 * 
	 * @return     string
	 */
	public function getRegistrationType()
	{
		return $this->registration_type;
	}

	/**
	 * Get the [is_auto_renew] column value.
	 * 
	 * @return     boolean
	 */
	public function getIsAutoRenew()
	{
		return $this->is_auto_renew;
	}

	/**
	 * Get the [status] column value.
	 * 
	 * @return     int
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * Get the [optionally formatted] temporal [expiration_date] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getExpirationDate($format = 'Y-m-d')
	{
		if ($this->expiration_date === null) {
			return null;
		}


		if ($this->expiration_date === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->expiration_date);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->expiration_date, true), $x);
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
	 * Get the [optionally formatted] temporal [last_renewal_date] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getLastRenewalDate($format = 'Y-m-d')
	{
		if ($this->last_renewal_date === null) {
			return null;
		}


		if ($this->last_renewal_date === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->last_renewal_date);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->last_renewal_date, true), $x);
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
	 * Get the [optionally formatted] temporal [updated_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->updated_at === null) {
			return null;
		}


		if ($this->updated_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->updated_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->updated_at, true), $x);
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
	 * Set the value of [id] column.
	 * 
	 * @param      string $v new value
	 * @return     Domain The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = DomainPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [website_id] column.
	 * 
	 * @param      string $v new value
	 * @return     Domain The current object (for fluent API support)
	 */
	public function setWebsiteId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->website_id !== $v) {
			$this->website_id = $v;
			$this->modifiedColumns[] = DomainPeer::WEBSITE_ID;
		}

		if ($this->aWebsite !== null && $this->aWebsite->getId() !== $v) {
			$this->aWebsite = null;
		}

		return $this;
	} // setWebsiteId()

	/**
	 * Set the value of [name] column.
	 * 
	 * @param      string $v new value
	 * @return     Domain The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = DomainPeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [type] column.
	 * 
	 * @param      string $v new value
	 * @return     Domain The current object (for fluent API support)
	 */
	public function setType($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->type !== $v) {
			$this->type = $v;
			$this->modifiedColumns[] = DomainPeer::TYPE;
		}

		return $this;
	} // setType()

	/**
	 * Set the value of [registration_type] column.
	 * 
	 * @param      string $v new value
	 * @return     Domain The current object (for fluent API support)
	 */
	public function setRegistrationType($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->registration_type !== $v) {
			$this->registration_type = $v;
			$this->modifiedColumns[] = DomainPeer::REGISTRATION_TYPE;
		}

		return $this;
	} // setRegistrationType()

	/**
	 * Set the value of [is_auto_renew] column.
	 * 
	 * @param      boolean $v new value
	 * @return     Domain The current object (for fluent API support)
	 */
	public function setIsAutoRenew($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->is_auto_renew !== $v || $this->isNew()) {
			$this->is_auto_renew = $v;
			$this->modifiedColumns[] = DomainPeer::IS_AUTO_RENEW;
		}

		return $this;
	} // setIsAutoRenew()

	/**
	 * Set the value of [status] column.
	 * 
	 * @param      int $v new value
	 * @return     Domain The current object (for fluent API support)
	 */
	public function setStatus($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = DomainPeer::STATUS;
		}

		return $this;
	} // setStatus()

	/**
	 * Sets the value of [expiration_date] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Domain The current object (for fluent API support)
	 */
	public function setExpirationDate($v)
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

		if ( $this->expiration_date !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->expiration_date !== null && $tmpDt = new DateTime($this->expiration_date)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->expiration_date = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = DomainPeer::EXPIRATION_DATE;
			}
		} // if either are not null

		return $this;
	} // setExpirationDate()

	/**
	 * Sets the value of [last_renewal_date] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Domain The current object (for fluent API support)
	 */
	public function setLastRenewalDate($v)
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

		if ( $this->last_renewal_date !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->last_renewal_date !== null && $tmpDt = new DateTime($this->last_renewal_date)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->last_renewal_date = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = DomainPeer::LAST_RENEWAL_DATE;
			}
		} // if either are not null

		return $this;
	} // setLastRenewalDate()

	/**
	 * Sets the value of [created_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Domain The current object (for fluent API support)
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
				$this->modifiedColumns[] = DomainPeer::CREATED_AT;
			}
		} // if either are not null

		return $this;
	} // setCreatedAt()

	/**
	 * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Domain The current object (for fluent API support)
	 */
	public function setUpdatedAt($v)
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

		if ( $this->updated_at !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->updated_at = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = DomainPeer::UPDATED_AT;
			}
		} // if either are not null

		return $this;
	} // setUpdatedAt()

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
			if ($this->is_auto_renew !== true) {
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

			$this->id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
			$this->website_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->type = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->registration_type = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->is_auto_renew = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
			$this->status = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->expiration_date = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->last_renewal_date = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->created_at = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->updated_at = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 11; // 11 = DomainPeer::NUM_COLUMNS - DomainPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Domain object", $e);
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

		if ($this->aWebsite !== null && $this->website_id !== $this->aWebsite->getId()) {
			$this->aWebsite = null;
		}
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
			$con = Propel::getConnection(DomainPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = DomainPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aWebsite = null;
			$this->collWebsitesRelatedByPrimaryDomainId = null;

			$this->collDomainChecks = null;

			$this->collEmailAccounts = null;

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
			$con = Propel::getConnection(DomainPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseDomain:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				DomainQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseDomain:delete:post') as $callable)
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
			$con = Propel::getConnection(DomainPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseDomain:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			  	$con->commit();
			    return $affectedRows;
			  }
			}

			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
				// timestampable behavior
				if (!$this->isColumnModified(DomainPeer::CREATED_AT)) {
					$this->setCreatedAt(time());
				}
				if (!$this->isColumnModified(DomainPeer::UPDATED_AT)) {
					$this->setUpdatedAt(time());
				}
			} else {
				$ret = $ret && $this->preUpdate($con);
				// timestampable behavior
				if ($this->isModified() && !$this->isColumnModified(DomainPeer::UPDATED_AT)) {
					$this->setUpdatedAt(time());
				}
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
				foreach (sfMixer::getCallables('BaseDomain:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				DomainPeer::addInstanceToPool($this);
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

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aWebsite !== null) {
				if ($this->aWebsite->isModified() || $this->aWebsite->isNew()) {
					$affectedRows += $this->aWebsite->save($con);
				}
				$this->setWebsite($this->aWebsite);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setNew(false);
				} else {
					$affectedRows += DomainPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collWebsitesRelatedByPrimaryDomainId !== null) {
				foreach ($this->collWebsitesRelatedByPrimaryDomainId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collDomainChecks !== null) {
				foreach ($this->collDomainChecks as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collEmailAccounts !== null) {
				foreach ($this->collEmailAccounts as $referrerFK) {
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


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aWebsite !== null) {
				if (!$this->aWebsite->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aWebsite->getValidationFailures());
				}
			}


			if (($retval = DomainPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collWebsitesRelatedByPrimaryDomainId !== null) {
					foreach ($this->collWebsitesRelatedByPrimaryDomainId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collDomainChecks !== null) {
					foreach ($this->collDomainChecks as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collEmailAccounts !== null) {
					foreach ($this->collEmailAccounts as $referrerFK) {
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
		$pos = DomainPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getWebsiteId();
				break;
			case 2:
				return $this->getName();
				break;
			case 3:
				return $this->getType();
				break;
			case 4:
				return $this->getRegistrationType();
				break;
			case 5:
				return $this->getIsAutoRenew();
				break;
			case 6:
				return $this->getStatus();
				break;
			case 7:
				return $this->getExpirationDate();
				break;
			case 8:
				return $this->getLastRenewalDate();
				break;
			case 9:
				return $this->getCreatedAt();
				break;
			case 10:
				return $this->getUpdatedAt();
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
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $includeForeignObjects = false)
	{
		$keys = DomainPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getWebsiteId(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getType(),
			$keys[4] => $this->getRegistrationType(),
			$keys[5] => $this->getIsAutoRenew(),
			$keys[6] => $this->getStatus(),
			$keys[7] => $this->getExpirationDate(),
			$keys[8] => $this->getLastRenewalDate(),
			$keys[9] => $this->getCreatedAt(),
			$keys[10] => $this->getUpdatedAt(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aWebsite) {
				$result['Website'] = $this->aWebsite->toArray($keyType, $includeLazyLoadColumns, true);
			}
		}
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
		$pos = DomainPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setWebsiteId($value);
				break;
			case 2:
				$this->setName($value);
				break;
			case 3:
				$this->setType($value);
				break;
			case 4:
				$this->setRegistrationType($value);
				break;
			case 5:
				$this->setIsAutoRenew($value);
				break;
			case 6:
				$this->setStatus($value);
				break;
			case 7:
				$this->setExpirationDate($value);
				break;
			case 8:
				$this->setLastRenewalDate($value);
				break;
			case 9:
				$this->setCreatedAt($value);
				break;
			case 10:
				$this->setUpdatedAt($value);
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
		$keys = DomainPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setWebsiteId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setType($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRegistrationType($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setIsAutoRenew($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setStatus($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setExpirationDate($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setLastRenewalDate($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedAt($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUpdatedAt($arr[$keys[10]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(DomainPeer::DATABASE_NAME);

		if ($this->isColumnModified(DomainPeer::ID)) $criteria->add(DomainPeer::ID, $this->id);
		if ($this->isColumnModified(DomainPeer::WEBSITE_ID)) $criteria->add(DomainPeer::WEBSITE_ID, $this->website_id);
		if ($this->isColumnModified(DomainPeer::NAME)) $criteria->add(DomainPeer::NAME, $this->name);
		if ($this->isColumnModified(DomainPeer::TYPE)) $criteria->add(DomainPeer::TYPE, $this->type);
		if ($this->isColumnModified(DomainPeer::REGISTRATION_TYPE)) $criteria->add(DomainPeer::REGISTRATION_TYPE, $this->registration_type);
		if ($this->isColumnModified(DomainPeer::IS_AUTO_RENEW)) $criteria->add(DomainPeer::IS_AUTO_RENEW, $this->is_auto_renew);
		if ($this->isColumnModified(DomainPeer::STATUS)) $criteria->add(DomainPeer::STATUS, $this->status);
		if ($this->isColumnModified(DomainPeer::EXPIRATION_DATE)) $criteria->add(DomainPeer::EXPIRATION_DATE, $this->expiration_date);
		if ($this->isColumnModified(DomainPeer::LAST_RENEWAL_DATE)) $criteria->add(DomainPeer::LAST_RENEWAL_DATE, $this->last_renewal_date);
		if ($this->isColumnModified(DomainPeer::CREATED_AT)) $criteria->add(DomainPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(DomainPeer::UPDATED_AT)) $criteria->add(DomainPeer::UPDATED_AT, $this->updated_at);

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
		$criteria = new Criteria(DomainPeer::DATABASE_NAME);
		$criteria->add(DomainPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     string
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      string $key Primary key.
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
	 * @param      object $copyObj An object of Domain (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setId($this->id);
		$copyObj->setWebsiteId($this->website_id);
		$copyObj->setName($this->name);
		$copyObj->setType($this->type);
		$copyObj->setRegistrationType($this->registration_type);
		$copyObj->setIsAutoRenew($this->is_auto_renew);
		$copyObj->setStatus($this->status);
		$copyObj->setExpirationDate($this->expiration_date);
		$copyObj->setLastRenewalDate($this->last_renewal_date);
		$copyObj->setCreatedAt($this->created_at);
		$copyObj->setUpdatedAt($this->updated_at);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getWebsitesRelatedByPrimaryDomainId() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addWebsiteRelatedByPrimaryDomainId($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getDomainChecks() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addDomainCheck($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getEmailAccounts() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addEmailAccount($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);
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
	 * @return     Domain Clone of current object.
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
	 * @return     DomainPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new DomainPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Website object.
	 *
	 * @param      Website $v
	 * @return     Domain The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setWebsite(Website $v = null)
	{
		if ($v === null) {
			$this->setWebsiteId(NULL);
		} else {
			$this->setWebsiteId($v->getId());
		}

		$this->aWebsite = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Website object, it will not be re-added.
		if ($v !== null) {
			$v->addDomain($this);
		}

		return $this;
	}


	/**
	 * Get the associated Website object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Website The associated Website object.
	 * @throws     PropelException
	 */
	public function getWebsite(PropelPDO $con = null)
	{
		if ($this->aWebsite === null && (($this->website_id !== "" && $this->website_id !== null))) {
			$this->aWebsite = WebsiteQuery::create()->findPk($this->website_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aWebsite->addDomains($this);
			 */
		}
		return $this->aWebsite;
	}

	/**
	 * Clears out the collWebsitesRelatedByPrimaryDomainId collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addWebsitesRelatedByPrimaryDomainId()
	 */
	public function clearWebsitesRelatedByPrimaryDomainId()
	{
		$this->collWebsitesRelatedByPrimaryDomainId = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collWebsitesRelatedByPrimaryDomainId collection.
	 *
	 * By default this just sets the collWebsitesRelatedByPrimaryDomainId collection to an empty array (like clearcollWebsitesRelatedByPrimaryDomainId());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initWebsitesRelatedByPrimaryDomainId()
	{
		$this->collWebsitesRelatedByPrimaryDomainId = new PropelObjectCollection();
		$this->collWebsitesRelatedByPrimaryDomainId->setModel('Website');
	}

	/**
	 * Gets an array of Website objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Domain is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Website[] List of Website objects
	 * @throws     PropelException
	 */
	public function getWebsitesRelatedByPrimaryDomainId($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collWebsitesRelatedByPrimaryDomainId || null !== $criteria) {
			if ($this->isNew() && null === $this->collWebsitesRelatedByPrimaryDomainId) {
				// return empty collection
				$this->initWebsitesRelatedByPrimaryDomainId();
			} else {
				$collWebsitesRelatedByPrimaryDomainId = WebsiteQuery::create(null, $criteria)
					->filterByPrimaryDomain($this)
					->find($con);
				if (null !== $criteria) {
					return $collWebsitesRelatedByPrimaryDomainId;
				}
				$this->collWebsitesRelatedByPrimaryDomainId = $collWebsitesRelatedByPrimaryDomainId;
			}
		}
		return $this->collWebsitesRelatedByPrimaryDomainId;
	}

	/**
	 * Returns the number of related Website objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Website objects.
	 * @throws     PropelException
	 */
	public function countWebsitesRelatedByPrimaryDomainId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collWebsitesRelatedByPrimaryDomainId || null !== $criteria) {
			if ($this->isNew() && null === $this->collWebsitesRelatedByPrimaryDomainId) {
				return 0;
			} else {
				$query = WebsiteQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPrimaryDomain($this)
					->count($con);
			}
		} else {
			return count($this->collWebsitesRelatedByPrimaryDomainId);
		}
	}

	/**
	 * Method called to associate a Website object to this object
	 * through the Website foreign key attribute.
	 *
	 * @param      Website $l Website
	 * @return     void
	 * @throws     PropelException
	 */
	public function addWebsiteRelatedByPrimaryDomainId(Website $l)
	{
		if ($this->collWebsitesRelatedByPrimaryDomainId === null) {
			$this->initWebsitesRelatedByPrimaryDomainId();
		}
		if (!$this->collWebsitesRelatedByPrimaryDomainId->contains($l)) { // only add it if the **same** object is not already associated
			$this->collWebsitesRelatedByPrimaryDomainId[]= $l;
			$l->setPrimaryDomain($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Domain is new, it will return
	 * an empty collection; or if this Domain has previously
	 * been saved, it will retrieve related WebsitesRelatedByPrimaryDomainId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Domain.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Website[] List of Website objects
	 */
	public function getWebsitesRelatedByPrimaryDomainIdJoinCustomer($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = WebsiteQuery::create(null, $criteria);
		$query->joinWith('Customer', $join_behavior);

		return $this->getWebsitesRelatedByPrimaryDomainId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Domain is new, it will return
	 * an empty collection; or if this Domain has previously
	 * been saved, it will retrieve related WebsitesRelatedByPrimaryDomainId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Domain.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Website[] List of Website objects
	 */
	public function getWebsitesRelatedByPrimaryDomainIdJoinWebsiteTemplate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = WebsiteQuery::create(null, $criteria);
		$query->joinWith('WebsiteTemplate', $join_behavior);

		return $this->getWebsitesRelatedByPrimaryDomainId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Domain is new, it will return
	 * an empty collection; or if this Domain has previously
	 * been saved, it will retrieve related WebsitesRelatedByPrimaryDomainId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Domain.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Website[] List of Website objects
	 */
	public function getWebsitesRelatedByPrimaryDomainIdJoinWebsiteAttribute($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = WebsiteQuery::create(null, $criteria);
		$query->joinWith('WebsiteAttribute', $join_behavior);

		return $this->getWebsitesRelatedByPrimaryDomainId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Domain is new, it will return
	 * an empty collection; or if this Domain has previously
	 * been saved, it will retrieve related WebsitesRelatedByPrimaryDomainId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Domain.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Website[] List of Website objects
	 */
	public function getWebsitesRelatedByPrimaryDomainIdJoinHost($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = WebsiteQuery::create(null, $criteria);
		$query->joinWith('Host', $join_behavior);

		return $this->getWebsitesRelatedByPrimaryDomainId($query, $con);
	}

	/**
	 * Clears out the collDomainChecks collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addDomainChecks()
	 */
	public function clearDomainChecks()
	{
		$this->collDomainChecks = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collDomainChecks collection.
	 *
	 * By default this just sets the collDomainChecks collection to an empty array (like clearcollDomainChecks());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initDomainChecks()
	{
		$this->collDomainChecks = new PropelObjectCollection();
		$this->collDomainChecks->setModel('DomainCheck');
	}

	/**
	 * Gets an array of DomainCheck objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Domain is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array DomainCheck[] List of DomainCheck objects
	 * @throws     PropelException
	 */
	public function getDomainChecks($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collDomainChecks || null !== $criteria) {
			if ($this->isNew() && null === $this->collDomainChecks) {
				// return empty collection
				$this->initDomainChecks();
			} else {
				$collDomainChecks = DomainCheckQuery::create(null, $criteria)
					->filterByDomain($this)
					->find($con);
				if (null !== $criteria) {
					return $collDomainChecks;
				}
				$this->collDomainChecks = $collDomainChecks;
			}
		}
		return $this->collDomainChecks;
	}

	/**
	 * Returns the number of related DomainCheck objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related DomainCheck objects.
	 * @throws     PropelException
	 */
	public function countDomainChecks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collDomainChecks || null !== $criteria) {
			if ($this->isNew() && null === $this->collDomainChecks) {
				return 0;
			} else {
				$query = DomainCheckQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByDomain($this)
					->count($con);
			}
		} else {
			return count($this->collDomainChecks);
		}
	}

	/**
	 * Method called to associate a DomainCheck object to this object
	 * through the DomainCheck foreign key attribute.
	 *
	 * @param      DomainCheck $l DomainCheck
	 * @return     void
	 * @throws     PropelException
	 */
	public function addDomainCheck(DomainCheck $l)
	{
		if ($this->collDomainChecks === null) {
			$this->initDomainChecks();
		}
		if (!$this->collDomainChecks->contains($l)) { // only add it if the **same** object is not already associated
			$this->collDomainChecks[]= $l;
			$l->setDomain($this);
		}
	}

	/**
	 * Clears out the collEmailAccounts collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addEmailAccounts()
	 */
	public function clearEmailAccounts()
	{
		$this->collEmailAccounts = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collEmailAccounts collection.
	 *
	 * By default this just sets the collEmailAccounts collection to an empty array (like clearcollEmailAccounts());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initEmailAccounts()
	{
		$this->collEmailAccounts = new PropelObjectCollection();
		$this->collEmailAccounts->setModel('EmailAccount');
	}

	/**
	 * Gets an array of EmailAccount objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Domain is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array EmailAccount[] List of EmailAccount objects
	 * @throws     PropelException
	 */
	public function getEmailAccounts($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collEmailAccounts || null !== $criteria) {
			if ($this->isNew() && null === $this->collEmailAccounts) {
				// return empty collection
				$this->initEmailAccounts();
			} else {
				$collEmailAccounts = EmailAccountQuery::create(null, $criteria)
					->filterByDomain($this)
					->find($con);
				if (null !== $criteria) {
					return $collEmailAccounts;
				}
				$this->collEmailAccounts = $collEmailAccounts;
			}
		}
		return $this->collEmailAccounts;
	}

	/**
	 * Returns the number of related EmailAccount objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related EmailAccount objects.
	 * @throws     PropelException
	 */
	public function countEmailAccounts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collEmailAccounts || null !== $criteria) {
			if ($this->isNew() && null === $this->collEmailAccounts) {
				return 0;
			} else {
				$query = EmailAccountQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByDomain($this)
					->count($con);
			}
		} else {
			return count($this->collEmailAccounts);
		}
	}

	/**
	 * Method called to associate a EmailAccount object to this object
	 * through the EmailAccount foreign key attribute.
	 *
	 * @param      EmailAccount $l EmailAccount
	 * @return     void
	 * @throws     PropelException
	 */
	public function addEmailAccount(EmailAccount $l)
	{
		if ($this->collEmailAccounts === null) {
			$this->initEmailAccounts();
		}
		if (!$this->collEmailAccounts->contains($l)) { // only add it if the **same** object is not already associated
			$this->collEmailAccounts[]= $l;
			$l->setDomain($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Domain is new, it will return
	 * an empty collection; or if this Domain has previously
	 * been saved, it will retrieve related EmailAccounts from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Domain.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array EmailAccount[] List of EmailAccount objects
	 */
	public function getEmailAccountsJoinWebsite($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = EmailAccountQuery::create(null, $criteria);
		$query->joinWith('Website', $join_behavior);

		return $this->getEmailAccounts($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->website_id = null;
		$this->name = null;
		$this->type = null;
		$this->registration_type = null;
		$this->is_auto_renew = null;
		$this->status = null;
		$this->expiration_date = null;
		$this->last_renewal_date = null;
		$this->created_at = null;
		$this->updated_at = null;
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
			if ($this->collWebsitesRelatedByPrimaryDomainId) {
				foreach ((array) $this->collWebsitesRelatedByPrimaryDomainId as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collDomainChecks) {
				foreach ((array) $this->collDomainChecks as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collEmailAccounts) {
				foreach ((array) $this->collEmailAccounts as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collWebsitesRelatedByPrimaryDomainId = null;
		$this->collDomainChecks = null;
		$this->collEmailAccounts = null;
		$this->aWebsite = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string The value of the 'name' column
	 */
	public function __toString()
	{
		return (string) $this->getName();
	}

	// timestampable behavior
	
	/**
	 * Mark the current object so that the update date doesn't get updated during next save
	 *
	 * @return     Domain The current object (for fluent API support)
	 */
	public function keepUpdateDateUnchanged()
	{
		$this->modifiedColumns[] = DomainPeer::UPDATED_AT;
		return $this;
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseDomain:' . $name))
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

} // BaseDomain
