<?php


/**
 * Base class that represents a row from the 'esq_coupons' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCoupon extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'CouponPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        CouponPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        string
	 */
	protected $id;

	/**
	 * The value for the code field.
	 * @var        string
	 */
	protected $code;

	/**
	 * The value for the status field.
	 * @var        int
	 */
	protected $status;

	/**
	 * The value for the description field.
	 * @var        string
	 */
	protected $description;

	/**
	 * The value for the setup field.
	 * @var        double
	 */
	protected $setup;

	/**
	 * The value for the current_usage field.
	 * @var        int
	 */
	protected $current_usage;

	/**
	 * The value for the max_usage field.
	 * @var        int
	 */
	protected $max_usage;

	/**
	 * The value for the bar_association_id field.
	 * @var        int
	 */
	protected $bar_association_id;

	/**
	 * The value for the activation_date field.
	 * @var        string
	 */
	protected $activation_date;

	/**
	 * The value for the expiration_date field.
	 * @var        string
	 */
	protected $expiration_date;

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
	 * @var        BarAssociation
	 */
	protected $aBarAssociation;

	/**
	 * @var        array CouponToHostingPlanLink[] Collection to store aggregation of CouponToHostingPlanLink objects.
	 */
	protected $collCouponToHostingPlanLinks;

	/**
	 * @var        array CouponUsage[] Collection to store aggregation of CouponUsage objects.
	 */
	protected $collCouponUsages;

	/**
	 * @var        array WebsiteAttribute[] Collection to store aggregation of WebsiteAttribute objects.
	 */
	protected $collWebsiteAttributes;

	/**
	 * @var        array Website[] Collection to store aggregation of Website objects.
	 */
	protected $collWebsites;

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
	 * Get the [id] column value.
	 * 
	 * @return     string
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [code] column value.
	 * 
	 * @return     string
	 */
	public function getCode()
	{
		return $this->code;
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
	 * Get the [description] column value.
	 * 
	 * @return     string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Get the [setup] column value.
	 * 
	 * @return     double
	 */
	public function getSetup()
	{
		return $this->setup;
	}

	/**
	 * Get the [current_usage] column value.
	 * 
	 * @return     int
	 */
	public function getCurrentUsage()
	{
		return $this->current_usage;
	}

	/**
	 * Get the [max_usage] column value.
	 * 
	 * @return     int
	 */
	public function getMaxUsage()
	{
		return $this->max_usage;
	}

	/**
	 * Get the [bar_association_id] column value.
	 * 
	 * @return     int
	 */
	public function getBarAssociationId()
	{
		return $this->bar_association_id;
	}

	/**
	 * Get the [optionally formatted] temporal [activation_date] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getActivationDate($format = 'Y-m-d H:i:s')
	{
		if ($this->activation_date === null) {
			return null;
		}


		if ($this->activation_date === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->activation_date);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->activation_date, true), $x);
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
	 * Get the [optionally formatted] temporal [expiration_date] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getExpirationDate($format = 'Y-m-d H:i:s')
	{
		if ($this->expiration_date === null) {
			return null;
		}


		if ($this->expiration_date === '0000-00-00 00:00:00') {
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
	 * @return     Coupon The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CouponPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [code] column.
	 * 
	 * @param      string $v new value
	 * @return     Coupon The current object (for fluent API support)
	 */
	public function setCode($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->code !== $v) {
			$this->code = $v;
			$this->modifiedColumns[] = CouponPeer::CODE;
		}

		return $this;
	} // setCode()

	/**
	 * Set the value of [status] column.
	 * 
	 * @param      int $v new value
	 * @return     Coupon The current object (for fluent API support)
	 */
	public function setStatus($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = CouponPeer::STATUS;
		}

		return $this;
	} // setStatus()

	/**
	 * Set the value of [description] column.
	 * 
	 * @param      string $v new value
	 * @return     Coupon The current object (for fluent API support)
	 */
	public function setDescription($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = CouponPeer::DESCRIPTION;
		}

		return $this;
	} // setDescription()

	/**
	 * Set the value of [setup] column.
	 * 
	 * @param      double $v new value
	 * @return     Coupon The current object (for fluent API support)
	 */
	public function setSetup($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->setup !== $v) {
			$this->setup = $v;
			$this->modifiedColumns[] = CouponPeer::SETUP;
		}

		return $this;
	} // setSetup()

	/**
	 * Set the value of [current_usage] column.
	 * 
	 * @param      int $v new value
	 * @return     Coupon The current object (for fluent API support)
	 */
	public function setCurrentUsage($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->current_usage !== $v) {
			$this->current_usage = $v;
			$this->modifiedColumns[] = CouponPeer::CURRENT_USAGE;
		}

		return $this;
	} // setCurrentUsage()

	/**
	 * Set the value of [max_usage] column.
	 * 
	 * @param      int $v new value
	 * @return     Coupon The current object (for fluent API support)
	 */
	public function setMaxUsage($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->max_usage !== $v) {
			$this->max_usage = $v;
			$this->modifiedColumns[] = CouponPeer::MAX_USAGE;
		}

		return $this;
	} // setMaxUsage()

	/**
	 * Set the value of [bar_association_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Coupon The current object (for fluent API support)
	 */
	public function setBarAssociationId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->bar_association_id !== $v) {
			$this->bar_association_id = $v;
			$this->modifiedColumns[] = CouponPeer::BAR_ASSOCIATION_ID;
		}

		if ($this->aBarAssociation !== null && $this->aBarAssociation->getId() !== $v) {
			$this->aBarAssociation = null;
		}

		return $this;
	} // setBarAssociationId()

	/**
	 * Sets the value of [activation_date] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Coupon The current object (for fluent API support)
	 */
	public function setActivationDate($v)
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

		if ( $this->activation_date !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->activation_date !== null && $tmpDt = new DateTime($this->activation_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->activation_date = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = CouponPeer::ACTIVATION_DATE;
			}
		} // if either are not null

		return $this;
	} // setActivationDate()

	/**
	 * Sets the value of [expiration_date] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Coupon The current object (for fluent API support)
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

			$currNorm = ($this->expiration_date !== null && $tmpDt = new DateTime($this->expiration_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->expiration_date = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = CouponPeer::EXPIRATION_DATE;
			}
		} // if either are not null

		return $this;
	} // setExpirationDate()

	/**
	 * Sets the value of [created_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Coupon The current object (for fluent API support)
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
				$this->modifiedColumns[] = CouponPeer::CREATED_AT;
			}
		} // if either are not null

		return $this;
	} // setCreatedAt()

	/**
	 * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Coupon The current object (for fluent API support)
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
				$this->modifiedColumns[] = CouponPeer::UPDATED_AT;
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
			$this->code = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->status = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->description = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->setup = ($row[$startcol + 4] !== null) ? (double) $row[$startcol + 4] : null;
			$this->current_usage = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->max_usage = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->bar_association_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->activation_date = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->expiration_date = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->created_at = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->updated_at = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 12; // 12 = CouponPeer::NUM_COLUMNS - CouponPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Coupon object", $e);
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

		if ($this->aBarAssociation !== null && $this->bar_association_id !== $this->aBarAssociation->getId()) {
			$this->aBarAssociation = null;
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
			$con = Propel::getConnection(CouponPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = CouponPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aBarAssociation = null;
			$this->collCouponToHostingPlanLinks = null;

			$this->collCouponUsages = null;

			$this->collWebsiteAttributes = null;
			$this->collWebsites = null;
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
			$con = Propel::getConnection(CouponPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseCoupon:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				CouponQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseCoupon:delete:post') as $callable)
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
			$con = Propel::getConnection(CouponPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseCoupon:save:pre') as $callable)
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
				if (!$this->isColumnModified(CouponPeer::CREATED_AT)) {
					$this->setCreatedAt(time());
				}
				if (!$this->isColumnModified(CouponPeer::UPDATED_AT)) {
					$this->setUpdatedAt(time());
				}
			} else {
				$ret = $ret && $this->preUpdate($con);
				// timestampable behavior
				if ($this->isModified() && !$this->isColumnModified(CouponPeer::UPDATED_AT)) {
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
				foreach (sfMixer::getCallables('BaseCoupon:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				CouponPeer::addInstanceToPool($this);
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

			if ($this->aBarAssociation !== null) {
				if ($this->aBarAssociation->isModified() || $this->aBarAssociation->isNew()) {
					$affectedRows += $this->aBarAssociation->save($con);
				}
				$this->setBarAssociation($this->aBarAssociation);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setNew(false);
				} else {
					$affectedRows += CouponPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collCouponToHostingPlanLinks !== null) {
				foreach ($this->collCouponToHostingPlanLinks as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCouponUsages !== null) {
				foreach ($this->collCouponUsages as $referrerFK) {
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

			if ($this->aBarAssociation !== null) {
				if (!$this->aBarAssociation->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aBarAssociation->getValidationFailures());
				}
			}


			if (($retval = CouponPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCouponToHostingPlanLinks !== null) {
					foreach ($this->collCouponToHostingPlanLinks as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCouponUsages !== null) {
					foreach ($this->collCouponUsages as $referrerFK) {
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
		$pos = CouponPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCode();
				break;
			case 2:
				return $this->getStatus();
				break;
			case 3:
				return $this->getDescription();
				break;
			case 4:
				return $this->getSetup();
				break;
			case 5:
				return $this->getCurrentUsage();
				break;
			case 6:
				return $this->getMaxUsage();
				break;
			case 7:
				return $this->getBarAssociationId();
				break;
			case 8:
				return $this->getActivationDate();
				break;
			case 9:
				return $this->getExpirationDate();
				break;
			case 10:
				return $this->getCreatedAt();
				break;
			case 11:
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
		$keys = CouponPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCode(),
			$keys[2] => $this->getStatus(),
			$keys[3] => $this->getDescription(),
			$keys[4] => $this->getSetup(),
			$keys[5] => $this->getCurrentUsage(),
			$keys[6] => $this->getMaxUsage(),
			$keys[7] => $this->getBarAssociationId(),
			$keys[8] => $this->getActivationDate(),
			$keys[9] => $this->getExpirationDate(),
			$keys[10] => $this->getCreatedAt(),
			$keys[11] => $this->getUpdatedAt(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aBarAssociation) {
				$result['BarAssociation'] = $this->aBarAssociation->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = CouponPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCode($value);
				break;
			case 2:
				$this->setStatus($value);
				break;
			case 3:
				$this->setDescription($value);
				break;
			case 4:
				$this->setSetup($value);
				break;
			case 5:
				$this->setCurrentUsage($value);
				break;
			case 6:
				$this->setMaxUsage($value);
				break;
			case 7:
				$this->setBarAssociationId($value);
				break;
			case 8:
				$this->setActivationDate($value);
				break;
			case 9:
				$this->setExpirationDate($value);
				break;
			case 10:
				$this->setCreatedAt($value);
				break;
			case 11:
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
		$keys = CouponPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCode($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setStatus($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDescription($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSetup($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCurrentUsage($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMaxUsage($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setBarAssociationId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setActivationDate($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setExpirationDate($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCreatedAt($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUpdatedAt($arr[$keys[11]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(CouponPeer::DATABASE_NAME);

		if ($this->isColumnModified(CouponPeer::ID)) $criteria->add(CouponPeer::ID, $this->id);
		if ($this->isColumnModified(CouponPeer::CODE)) $criteria->add(CouponPeer::CODE, $this->code);
		if ($this->isColumnModified(CouponPeer::STATUS)) $criteria->add(CouponPeer::STATUS, $this->status);
		if ($this->isColumnModified(CouponPeer::DESCRIPTION)) $criteria->add(CouponPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(CouponPeer::SETUP)) $criteria->add(CouponPeer::SETUP, $this->setup);
		if ($this->isColumnModified(CouponPeer::CURRENT_USAGE)) $criteria->add(CouponPeer::CURRENT_USAGE, $this->current_usage);
		if ($this->isColumnModified(CouponPeer::MAX_USAGE)) $criteria->add(CouponPeer::MAX_USAGE, $this->max_usage);
		if ($this->isColumnModified(CouponPeer::BAR_ASSOCIATION_ID)) $criteria->add(CouponPeer::BAR_ASSOCIATION_ID, $this->bar_association_id);
		if ($this->isColumnModified(CouponPeer::ACTIVATION_DATE)) $criteria->add(CouponPeer::ACTIVATION_DATE, $this->activation_date);
		if ($this->isColumnModified(CouponPeer::EXPIRATION_DATE)) $criteria->add(CouponPeer::EXPIRATION_DATE, $this->expiration_date);
		if ($this->isColumnModified(CouponPeer::CREATED_AT)) $criteria->add(CouponPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(CouponPeer::UPDATED_AT)) $criteria->add(CouponPeer::UPDATED_AT, $this->updated_at);

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
		$criteria = new Criteria(CouponPeer::DATABASE_NAME);
		$criteria->add(CouponPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Coupon (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setId($this->id);
		$copyObj->setCode($this->code);
		$copyObj->setStatus($this->status);
		$copyObj->setDescription($this->description);
		$copyObj->setSetup($this->setup);
		$copyObj->setCurrentUsage($this->current_usage);
		$copyObj->setMaxUsage($this->max_usage);
		$copyObj->setBarAssociationId($this->bar_association_id);
		$copyObj->setActivationDate($this->activation_date);
		$copyObj->setExpirationDate($this->expiration_date);
		$copyObj->setCreatedAt($this->created_at);
		$copyObj->setUpdatedAt($this->updated_at);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getCouponToHostingPlanLinks() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCouponToHostingPlanLink($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCouponUsages() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCouponUsage($relObj->copy($deepCopy));
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
	 * @return     Coupon Clone of current object.
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
	 * @return     CouponPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new CouponPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a BarAssociation object.
	 *
	 * @param      BarAssociation $v
	 * @return     Coupon The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setBarAssociation(BarAssociation $v = null)
	{
		if ($v === null) {
			$this->setBarAssociationId(NULL);
		} else {
			$this->setBarAssociationId($v->getId());
		}

		$this->aBarAssociation = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the BarAssociation object, it will not be re-added.
		if ($v !== null) {
			$v->addCoupon($this);
		}

		return $this;
	}


	/**
	 * Get the associated BarAssociation object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     BarAssociation The associated BarAssociation object.
	 * @throws     PropelException
	 */
	public function getBarAssociation(PropelPDO $con = null)
	{
		if ($this->aBarAssociation === null && ($this->bar_association_id !== null)) {
			$this->aBarAssociation = BarAssociationQuery::create()->findPk($this->bar_association_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aBarAssociation->addCoupons($this);
			 */
		}
		return $this->aBarAssociation;
	}

	/**
	 * Clears out the collCouponToHostingPlanLinks collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCouponToHostingPlanLinks()
	 */
	public function clearCouponToHostingPlanLinks()
	{
		$this->collCouponToHostingPlanLinks = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCouponToHostingPlanLinks collection.
	 *
	 * By default this just sets the collCouponToHostingPlanLinks collection to an empty array (like clearcollCouponToHostingPlanLinks());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCouponToHostingPlanLinks()
	{
		$this->collCouponToHostingPlanLinks = new PropelObjectCollection();
		$this->collCouponToHostingPlanLinks->setModel('CouponToHostingPlanLink');
	}

	/**
	 * Gets an array of CouponToHostingPlanLink objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Coupon is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array CouponToHostingPlanLink[] List of CouponToHostingPlanLink objects
	 * @throws     PropelException
	 */
	public function getCouponToHostingPlanLinks($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCouponToHostingPlanLinks || null !== $criteria) {
			if ($this->isNew() && null === $this->collCouponToHostingPlanLinks) {
				// return empty collection
				$this->initCouponToHostingPlanLinks();
			} else {
				$collCouponToHostingPlanLinks = CouponToHostingPlanLinkQuery::create(null, $criteria)
					->filterByCoupon($this)
					->find($con);
				if (null !== $criteria) {
					return $collCouponToHostingPlanLinks;
				}
				$this->collCouponToHostingPlanLinks = $collCouponToHostingPlanLinks;
			}
		}
		return $this->collCouponToHostingPlanLinks;
	}

	/**
	 * Returns the number of related CouponToHostingPlanLink objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related CouponToHostingPlanLink objects.
	 * @throws     PropelException
	 */
	public function countCouponToHostingPlanLinks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCouponToHostingPlanLinks || null !== $criteria) {
			if ($this->isNew() && null === $this->collCouponToHostingPlanLinks) {
				return 0;
			} else {
				$query = CouponToHostingPlanLinkQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCoupon($this)
					->count($con);
			}
		} else {
			return count($this->collCouponToHostingPlanLinks);
		}
	}

	/**
	 * Method called to associate a CouponToHostingPlanLink object to this object
	 * through the CouponToHostingPlanLink foreign key attribute.
	 *
	 * @param      CouponToHostingPlanLink $l CouponToHostingPlanLink
	 * @return     void
	 * @throws     PropelException
	 */
	public function addCouponToHostingPlanLink(CouponToHostingPlanLink $l)
	{
		if ($this->collCouponToHostingPlanLinks === null) {
			$this->initCouponToHostingPlanLinks();
		}
		if (!$this->collCouponToHostingPlanLinks->contains($l)) { // only add it if the **same** object is not already associated
			$this->collCouponToHostingPlanLinks[]= $l;
			$l->setCoupon($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Coupon is new, it will return
	 * an empty collection; or if this Coupon has previously
	 * been saved, it will retrieve related CouponToHostingPlanLinks from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Coupon.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array CouponToHostingPlanLink[] List of CouponToHostingPlanLink objects
	 */
	public function getCouponToHostingPlanLinksJoinWebsiteAttribute($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = CouponToHostingPlanLinkQuery::create(null, $criteria);
		$query->joinWith('WebsiteAttribute', $join_behavior);

		return $this->getCouponToHostingPlanLinks($query, $con);
	}

	/**
	 * Clears out the collCouponUsages collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCouponUsages()
	 */
	public function clearCouponUsages()
	{
		$this->collCouponUsages = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCouponUsages collection.
	 *
	 * By default this just sets the collCouponUsages collection to an empty array (like clearcollCouponUsages());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCouponUsages()
	{
		$this->collCouponUsages = new PropelObjectCollection();
		$this->collCouponUsages->setModel('CouponUsage');
	}

	/**
	 * Gets an array of CouponUsage objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Coupon is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array CouponUsage[] List of CouponUsage objects
	 * @throws     PropelException
	 */
	public function getCouponUsages($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCouponUsages || null !== $criteria) {
			if ($this->isNew() && null === $this->collCouponUsages) {
				// return empty collection
				$this->initCouponUsages();
			} else {
				$collCouponUsages = CouponUsageQuery::create(null, $criteria)
					->filterByCoupon($this)
					->find($con);
				if (null !== $criteria) {
					return $collCouponUsages;
				}
				$this->collCouponUsages = $collCouponUsages;
			}
		}
		return $this->collCouponUsages;
	}

	/**
	 * Returns the number of related CouponUsage objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related CouponUsage objects.
	 * @throws     PropelException
	 */
	public function countCouponUsages(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCouponUsages || null !== $criteria) {
			if ($this->isNew() && null === $this->collCouponUsages) {
				return 0;
			} else {
				$query = CouponUsageQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCoupon($this)
					->count($con);
			}
		} else {
			return count($this->collCouponUsages);
		}
	}

	/**
	 * Method called to associate a CouponUsage object to this object
	 * through the CouponUsage foreign key attribute.
	 *
	 * @param      CouponUsage $l CouponUsage
	 * @return     void
	 * @throws     PropelException
	 */
	public function addCouponUsage(CouponUsage $l)
	{
		if ($this->collCouponUsages === null) {
			$this->initCouponUsages();
		}
		if (!$this->collCouponUsages->contains($l)) { // only add it if the **same** object is not already associated
			$this->collCouponUsages[]= $l;
			$l->setCoupon($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Coupon is new, it will return
	 * an empty collection; or if this Coupon has previously
	 * been saved, it will retrieve related CouponUsages from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Coupon.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array CouponUsage[] List of CouponUsage objects
	 */
	public function getCouponUsagesJoinWebsite($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = CouponUsageQuery::create(null, $criteria);
		$query->joinWith('Website', $join_behavior);

		return $this->getCouponUsages($query, $con);
	}

	/**
	 * Clears out the collWebsiteAttributes collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addWebsiteAttributes()
	 */
	public function clearWebsiteAttributes()
	{
		$this->collWebsiteAttributes = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collWebsiteAttributes collection.
	 *
	 * By default this just sets the collWebsiteAttributes collection to an empty collection (like clearWebsiteAttributes());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initWebsiteAttributes()
	{
		$this->collWebsiteAttributes = new PropelObjectCollection();
		$this->collWebsiteAttributes->setModel('WebsiteAttribute');
	}

	/**
	 * Gets a collection of WebsiteAttribute objects related by a many-to-many relationship
	 * to the current object by way of the esq_coupons_to_hosting_plans cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Coupon is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array WebsiteAttribute[] List of WebsiteAttribute objects
	 */
	public function getWebsiteAttributes($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collWebsiteAttributes || null !== $criteria) {
			if ($this->isNew() && null === $this->collWebsiteAttributes) {
				// return empty collection
				$this->initWebsiteAttributes();
			} else {
				$collWebsiteAttributes = WebsiteAttributeQuery::create(null, $criteria)
					->filterByCoupon($this)
					->find($con);
				if (null !== $criteria) {
					return $collWebsiteAttributes;
				}
				$this->collWebsiteAttributes = $collWebsiteAttributes;
			}
		}
		return $this->collWebsiteAttributes;
	}

	/**
	 * Gets the number of WebsiteAttribute objects related by a many-to-many relationship
	 * to the current object by way of the esq_coupons_to_hosting_plans cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related WebsiteAttribute objects
	 */
	public function countWebsiteAttributes($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collWebsiteAttributes || null !== $criteria) {
			if ($this->isNew() && null === $this->collWebsiteAttributes) {
				return 0;
			} else {
				$query = WebsiteAttributeQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCoupon($this)
					->count($con);
			}
		} else {
			return count($this->collWebsiteAttributes);
		}
	}

	/**
	 * Associate a WebsiteAttribute object to this object
	 * through the esq_coupons_to_hosting_plans cross reference table.
	 *
	 * @param      WebsiteAttribute $websiteAttribute The CouponToHostingPlanLink object to relate
	 * @return     void
	 */
	public function addWebsiteAttribute($websiteAttribute)
	{
		if ($this->collWebsiteAttributes === null) {
			$this->initWebsiteAttributes();
		}
		if (!$this->collWebsiteAttributes->contains($websiteAttribute)) { // only add it if the **same** object is not already associated
			$couponToHostingPlanLink = new CouponToHostingPlanLink();
			$couponToHostingPlanLink->setWebsiteAttribute($websiteAttribute);
			$this->addCouponToHostingPlanLink($couponToHostingPlanLink);

			$this->collWebsiteAttributes[]= $websiteAttribute;
		}
	}

	/**
	 * Clears out the collWebsites collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addWebsites()
	 */
	public function clearWebsites()
	{
		$this->collWebsites = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collWebsites collection.
	 *
	 * By default this just sets the collWebsites collection to an empty collection (like clearWebsites());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initWebsites()
	{
		$this->collWebsites = new PropelObjectCollection();
		$this->collWebsites->setModel('Website');
	}

	/**
	 * Gets a collection of Website objects related by a many-to-many relationship
	 * to the current object by way of the esq_coupon_usage cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Coupon is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Website[] List of Website objects
	 */
	public function getWebsites($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collWebsites || null !== $criteria) {
			if ($this->isNew() && null === $this->collWebsites) {
				// return empty collection
				$this->initWebsites();
			} else {
				$collWebsites = WebsiteQuery::create(null, $criteria)
					->filterByCoupon($this)
					->find($con);
				if (null !== $criteria) {
					return $collWebsites;
				}
				$this->collWebsites = $collWebsites;
			}
		}
		return $this->collWebsites;
	}

	/**
	 * Gets the number of Website objects related by a many-to-many relationship
	 * to the current object by way of the esq_coupon_usage cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Website objects
	 */
	public function countWebsites($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collWebsites || null !== $criteria) {
			if ($this->isNew() && null === $this->collWebsites) {
				return 0;
			} else {
				$query = WebsiteQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCoupon($this)
					->count($con);
			}
		} else {
			return count($this->collWebsites);
		}
	}

	/**
	 * Associate a Website object to this object
	 * through the esq_coupon_usage cross reference table.
	 *
	 * @param      Website $website The CouponUsage object to relate
	 * @return     void
	 */
	public function addWebsite($website)
	{
		if ($this->collWebsites === null) {
			$this->initWebsites();
		}
		if (!$this->collWebsites->contains($website)) { // only add it if the **same** object is not already associated
			$couponUsage = new CouponUsage();
			$couponUsage->setWebsite($website);
			$this->addCouponUsage($couponUsage);

			$this->collWebsites[]= $website;
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->code = null;
		$this->status = null;
		$this->description = null;
		$this->setup = null;
		$this->current_usage = null;
		$this->max_usage = null;
		$this->bar_association_id = null;
		$this->activation_date = null;
		$this->expiration_date = null;
		$this->created_at = null;
		$this->updated_at = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
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
			if ($this->collCouponToHostingPlanLinks) {
				foreach ((array) $this->collCouponToHostingPlanLinks as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCouponUsages) {
				foreach ((array) $this->collCouponUsages as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collCouponToHostingPlanLinks = null;
		$this->collCouponUsages = null;
		$this->aBarAssociation = null;
	}

	// timestampable behavior
	
	/**
	 * Mark the current object so that the update date doesn't get updated during next save
	 *
	 * @return     Coupon The current object (for fluent API support)
	 */
	public function keepUpdateDateUnchanged()
	{
		$this->modifiedColumns[] = CouponPeer::UPDATED_AT;
		return $this;
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseCoupon:' . $name))
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

} // BaseCoupon
