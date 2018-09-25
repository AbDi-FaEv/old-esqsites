<?php


/**
 * Base class that represents a row from the 'esq_bar_associations' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseBarAssociation extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'BarAssociationPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        BarAssociationPeer
	 */
	protected static $peer;

	/**
	 * The value for the name field.
	 * @var        string
	 */
	protected $name;

	/**
	 * The value for the abbreviation field.
	 * @var        string
	 */
	protected $abbreviation;

	/**
	 * The value for the primary_contact_email field.
	 * @var        string
	 */
	protected $primary_contact_email;

	/**
	 * The value for the contact_info field.
	 * @var        string
	 */
	protected $contact_info;

	/**
	 * The value for the notes field.
	 * @var        string
	 */
	protected $notes;

	/**
	 * The value for the password field.
	 * @var        string
	 */
	protected $password;

	/**
	 * The value for the last_login field.
	 * @var        string
	 */
	protected $last_login;

	/**
	 * The value for the affinity_expiration_date field.
	 * @var        string
	 */
	protected $affinity_expiration_date;

	/**
	 * The value for the affinity_start_date field.
	 * @var        string
	 */
	protected $affinity_start_date;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

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
	 * The value for the slug field.
	 * @var        string
	 */
	protected $slug;

	/**
	 * @var        array Customer[] Collection to store aggregation of Customer objects.
	 */
	protected $collCustomers;

	/**
	 * @var        array Coupon[] Collection to store aggregation of Coupon objects.
	 */
	protected $collCoupons;

	/**
	 * @var        BarAssociationPromoPage one-to-one related BarAssociationPromoPage object
	 */
	protected $singleBarAssociationPromoPage;

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
	 * Get the [name] column value.
	 * 
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the [abbreviation] column value.
	 * 
	 * @return     string
	 */
	public function getAbbreviation()
	{
		return $this->abbreviation;
	}

	/**
	 * Get the [primary_contact_email] column value.
	 * 
	 * @return     string
	 */
	public function getPrimaryContactEmail()
	{
		return $this->primary_contact_email;
	}

	/**
	 * Get the [contact_info] column value.
	 * 
	 * @return     string
	 */
	public function getContactInfo()
	{
		return $this->contact_info;
	}

	/**
	 * Get the [notes] column value.
	 * 
	 * @return     string
	 */
	public function getNotes()
	{
		return $this->notes;
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
	 * Get the [optionally formatted] temporal [affinity_expiration_date] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getAffinityExpirationDate($format = 'Y-m-d')
	{
		if ($this->affinity_expiration_date === null) {
			return null;
		}


		if ($this->affinity_expiration_date === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->affinity_expiration_date);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->affinity_expiration_date, true), $x);
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
	 * Get the [optionally formatted] temporal [affinity_start_date] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getAffinityStartDate($format = 'Y-m-d')
	{
		if ($this->affinity_start_date === null) {
			return null;
		}


		if ($this->affinity_start_date === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->affinity_start_date);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->affinity_start_date, true), $x);
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
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
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
	 * Get the [slug] column value.
	 * 
	 * @return     string
	 */
	public function getSlug()
	{
		return $this->slug;
	}

	/**
	 * Set the value of [name] column.
	 * 
	 * @param      string $v new value
	 * @return     BarAssociation The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = BarAssociationPeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [abbreviation] column.
	 * 
	 * @param      string $v new value
	 * @return     BarAssociation The current object (for fluent API support)
	 */
	public function setAbbreviation($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->abbreviation !== $v) {
			$this->abbreviation = $v;
			$this->modifiedColumns[] = BarAssociationPeer::ABBREVIATION;
		}

		return $this;
	} // setAbbreviation()

	/**
	 * Set the value of [primary_contact_email] column.
	 * 
	 * @param      string $v new value
	 * @return     BarAssociation The current object (for fluent API support)
	 */
	public function setPrimaryContactEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->primary_contact_email !== $v) {
			$this->primary_contact_email = $v;
			$this->modifiedColumns[] = BarAssociationPeer::PRIMARY_CONTACT_EMAIL;
		}

		return $this;
	} // setPrimaryContactEmail()

	/**
	 * Set the value of [contact_info] column.
	 * 
	 * @param      string $v new value
	 * @return     BarAssociation The current object (for fluent API support)
	 */
	public function setContactInfo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->contact_info !== $v) {
			$this->contact_info = $v;
			$this->modifiedColumns[] = BarAssociationPeer::CONTACT_INFO;
		}

		return $this;
	} // setContactInfo()

	/**
	 * Set the value of [notes] column.
	 * 
	 * @param      string $v new value
	 * @return     BarAssociation The current object (for fluent API support)
	 */
	public function setNotes($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->notes !== $v) {
			$this->notes = $v;
			$this->modifiedColumns[] = BarAssociationPeer::NOTES;
		}

		return $this;
	} // setNotes()

	/**
	 * Set the value of [password] column.
	 * 
	 * @param      string $v new value
	 * @return     BarAssociation The current object (for fluent API support)
	 */
	public function setPassword($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->password !== $v) {
			$this->password = $v;
			$this->modifiedColumns[] = BarAssociationPeer::PASSWORD;
		}

		return $this;
	} // setPassword()

	/**
	 * Sets the value of [last_login] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     BarAssociation The current object (for fluent API support)
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
				$this->modifiedColumns[] = BarAssociationPeer::LAST_LOGIN;
			}
		} // if either are not null

		return $this;
	} // setLastLogin()

	/**
	 * Sets the value of [affinity_expiration_date] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     BarAssociation The current object (for fluent API support)
	 */
	public function setAffinityExpirationDate($v)
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

		if ( $this->affinity_expiration_date !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->affinity_expiration_date !== null && $tmpDt = new DateTime($this->affinity_expiration_date)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->affinity_expiration_date = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = BarAssociationPeer::AFFINITY_EXPIRATION_DATE;
			}
		} // if either are not null

		return $this;
	} // setAffinityExpirationDate()

	/**
	 * Sets the value of [affinity_start_date] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     BarAssociation The current object (for fluent API support)
	 */
	public function setAffinityStartDate($v)
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

		if ( $this->affinity_start_date !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->affinity_start_date !== null && $tmpDt = new DateTime($this->affinity_start_date)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->affinity_start_date = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = BarAssociationPeer::AFFINITY_START_DATE;
			}
		} // if either are not null

		return $this;
	} // setAffinityStartDate()

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     BarAssociation The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = BarAssociationPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Sets the value of [created_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     BarAssociation The current object (for fluent API support)
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
				$this->modifiedColumns[] = BarAssociationPeer::CREATED_AT;
			}
		} // if either are not null

		return $this;
	} // setCreatedAt()

	/**
	 * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     BarAssociation The current object (for fluent API support)
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
				$this->modifiedColumns[] = BarAssociationPeer::UPDATED_AT;
			}
		} // if either are not null

		return $this;
	} // setUpdatedAt()

	/**
	 * Set the value of [slug] column.
	 * 
	 * @param      string $v new value
	 * @return     BarAssociation The current object (for fluent API support)
	 */
	public function setSlug($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->slug !== $v) {
			$this->slug = $v;
			$this->modifiedColumns[] = BarAssociationPeer::SLUG;
		}

		return $this;
	} // setSlug()

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

			$this->name = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
			$this->abbreviation = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->primary_contact_email = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->contact_info = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->notes = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->password = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->last_login = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->affinity_expiration_date = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->affinity_start_date = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->id = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->created_at = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->updated_at = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->slug = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 13; // 13 = BarAssociationPeer::NUM_COLUMNS - BarAssociationPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating BarAssociation object", $e);
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
			$con = Propel::getConnection(BarAssociationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = BarAssociationPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collCustomers = null;

			$this->collCoupons = null;

			$this->singleBarAssociationPromoPage = null;

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
			$con = Propel::getConnection(BarAssociationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseBarAssociation:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				BarAssociationQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseBarAssociation:delete:post') as $callable)
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
			$con = Propel::getConnection(BarAssociationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// sluggable behavior
			
			if ($this->isColumnModified(BarAssociationPeer::SLUG) && $this->getSlug()) {
				$this->setSlug($this->makeSlugUnique($this->getSlug()));
			} elseif (!$this->getSlug()) {
				$this->setSlug($this->createSlug());
			}
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseBarAssociation:save:pre') as $callable)
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
				if (!$this->isColumnModified(BarAssociationPeer::CREATED_AT)) {
					$this->setCreatedAt(time());
				}
				if (!$this->isColumnModified(BarAssociationPeer::UPDATED_AT)) {
					$this->setUpdatedAt(time());
				}
			} else {
				$ret = $ret && $this->preUpdate($con);
				// timestampable behavior
				if ($this->isModified() && !$this->isColumnModified(BarAssociationPeer::UPDATED_AT)) {
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
				foreach (sfMixer::getCallables('BaseBarAssociation:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				BarAssociationPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = BarAssociationPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(BarAssociationPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.BarAssociationPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows = 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows = BarAssociationPeer::doUpdate($this, $con);
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

			if ($this->collCoupons !== null) {
				foreach ($this->collCoupons as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->singleBarAssociationPromoPage !== null) {
				if (!$this->singleBarAssociationPromoPage->isDeleted()) {
						$affectedRows += $this->singleBarAssociationPromoPage->save($con);
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


			if (($retval = BarAssociationPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCustomers !== null) {
					foreach ($this->collCustomers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCoupons !== null) {
					foreach ($this->collCoupons as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->singleBarAssociationPromoPage !== null) {
					if (!$this->singleBarAssociationPromoPage->validate($columns)) {
						$failureMap = array_merge($failureMap, $this->singleBarAssociationPromoPage->getValidationFailures());
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
		$pos = BarAssociationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getName();
				break;
			case 1:
				return $this->getAbbreviation();
				break;
			case 2:
				return $this->getPrimaryContactEmail();
				break;
			case 3:
				return $this->getContactInfo();
				break;
			case 4:
				return $this->getNotes();
				break;
			case 5:
				return $this->getPassword();
				break;
			case 6:
				return $this->getLastLogin();
				break;
			case 7:
				return $this->getAffinityExpirationDate();
				break;
			case 8:
				return $this->getAffinityStartDate();
				break;
			case 9:
				return $this->getId();
				break;
			case 10:
				return $this->getCreatedAt();
				break;
			case 11:
				return $this->getUpdatedAt();
				break;
			case 12:
				return $this->getSlug();
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
		$keys = BarAssociationPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getName(),
			$keys[1] => $this->getAbbreviation(),
			$keys[2] => $this->getPrimaryContactEmail(),
			$keys[3] => $this->getContactInfo(),
			$keys[4] => $this->getNotes(),
			$keys[5] => $this->getPassword(),
			$keys[6] => $this->getLastLogin(),
			$keys[7] => $this->getAffinityExpirationDate(),
			$keys[8] => $this->getAffinityStartDate(),
			$keys[9] => $this->getId(),
			$keys[10] => $this->getCreatedAt(),
			$keys[11] => $this->getUpdatedAt(),
			$keys[12] => $this->getSlug(),
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
		$pos = BarAssociationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setName($value);
				break;
			case 1:
				$this->setAbbreviation($value);
				break;
			case 2:
				$this->setPrimaryContactEmail($value);
				break;
			case 3:
				$this->setContactInfo($value);
				break;
			case 4:
				$this->setNotes($value);
				break;
			case 5:
				$this->setPassword($value);
				break;
			case 6:
				$this->setLastLogin($value);
				break;
			case 7:
				$this->setAffinityExpirationDate($value);
				break;
			case 8:
				$this->setAffinityStartDate($value);
				break;
			case 9:
				$this->setId($value);
				break;
			case 10:
				$this->setCreatedAt($value);
				break;
			case 11:
				$this->setUpdatedAt($value);
				break;
			case 12:
				$this->setSlug($value);
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
		$keys = BarAssociationPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setName($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAbbreviation($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPrimaryContactEmail($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setContactInfo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNotes($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPassword($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setLastLogin($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setAffinityExpirationDate($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setAffinityStartDate($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCreatedAt($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUpdatedAt($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setSlug($arr[$keys[12]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(BarAssociationPeer::DATABASE_NAME);

		if ($this->isColumnModified(BarAssociationPeer::NAME)) $criteria->add(BarAssociationPeer::NAME, $this->name);
		if ($this->isColumnModified(BarAssociationPeer::ABBREVIATION)) $criteria->add(BarAssociationPeer::ABBREVIATION, $this->abbreviation);
		if ($this->isColumnModified(BarAssociationPeer::PRIMARY_CONTACT_EMAIL)) $criteria->add(BarAssociationPeer::PRIMARY_CONTACT_EMAIL, $this->primary_contact_email);
		if ($this->isColumnModified(BarAssociationPeer::CONTACT_INFO)) $criteria->add(BarAssociationPeer::CONTACT_INFO, $this->contact_info);
		if ($this->isColumnModified(BarAssociationPeer::NOTES)) $criteria->add(BarAssociationPeer::NOTES, $this->notes);
		if ($this->isColumnModified(BarAssociationPeer::PASSWORD)) $criteria->add(BarAssociationPeer::PASSWORD, $this->password);
		if ($this->isColumnModified(BarAssociationPeer::LAST_LOGIN)) $criteria->add(BarAssociationPeer::LAST_LOGIN, $this->last_login);
		if ($this->isColumnModified(BarAssociationPeer::AFFINITY_EXPIRATION_DATE)) $criteria->add(BarAssociationPeer::AFFINITY_EXPIRATION_DATE, $this->affinity_expiration_date);
		if ($this->isColumnModified(BarAssociationPeer::AFFINITY_START_DATE)) $criteria->add(BarAssociationPeer::AFFINITY_START_DATE, $this->affinity_start_date);
		if ($this->isColumnModified(BarAssociationPeer::ID)) $criteria->add(BarAssociationPeer::ID, $this->id);
		if ($this->isColumnModified(BarAssociationPeer::CREATED_AT)) $criteria->add(BarAssociationPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(BarAssociationPeer::UPDATED_AT)) $criteria->add(BarAssociationPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(BarAssociationPeer::SLUG)) $criteria->add(BarAssociationPeer::SLUG, $this->slug);

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
		$criteria = new Criteria(BarAssociationPeer::DATABASE_NAME);
		$criteria->add(BarAssociationPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of BarAssociation (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setName($this->name);
		$copyObj->setAbbreviation($this->abbreviation);
		$copyObj->setPrimaryContactEmail($this->primary_contact_email);
		$copyObj->setContactInfo($this->contact_info);
		$copyObj->setNotes($this->notes);
		$copyObj->setPassword($this->password);
		$copyObj->setLastLogin($this->last_login);
		$copyObj->setAffinityExpirationDate($this->affinity_expiration_date);
		$copyObj->setAffinityStartDate($this->affinity_start_date);
		$copyObj->setCreatedAt($this->created_at);
		$copyObj->setUpdatedAt($this->updated_at);
		$copyObj->setSlug($this->slug);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getCustomers() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCustomer($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCoupons() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCoupon($relObj->copy($deepCopy));
				}
			}

			$relObj = $this->getBarAssociationPromoPage();
			if ($relObj) {
				$copyObj->setBarAssociationPromoPage($relObj->copy($deepCopy));
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
	 * @return     BarAssociation Clone of current object.
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
	 * @return     BarAssociationPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new BarAssociationPeer();
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
	 * If this BarAssociation is new, it will return
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
					->filterByBarAssociation($this)
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
					->filterByBarAssociation($this)
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
			$l->setBarAssociation($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this BarAssociation is new, it will return
	 * an empty collection; or if this BarAssociation has previously
	 * been saved, it will retrieve related Customers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in BarAssociation.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Customer[] List of Customer objects
	 */
	public function getCustomersJoinSalesPerson($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = CustomerQuery::create(null, $criteria);
		$query->joinWith('SalesPerson', $join_behavior);

		return $this->getCustomers($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this BarAssociation is new, it will return
	 * an empty collection; or if this BarAssociation has previously
	 * been saved, it will retrieve related Customers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in BarAssociation.
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
	 * Clears out the collCoupons collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCoupons()
	 */
	public function clearCoupons()
	{
		$this->collCoupons = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCoupons collection.
	 *
	 * By default this just sets the collCoupons collection to an empty array (like clearcollCoupons());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCoupons()
	{
		$this->collCoupons = new PropelObjectCollection();
		$this->collCoupons->setModel('Coupon');
	}

	/**
	 * Gets an array of Coupon objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this BarAssociation is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Coupon[] List of Coupon objects
	 * @throws     PropelException
	 */
	public function getCoupons($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCoupons || null !== $criteria) {
			if ($this->isNew() && null === $this->collCoupons) {
				// return empty collection
				$this->initCoupons();
			} else {
				$collCoupons = CouponQuery::create(null, $criteria)
					->filterByBarAssociation($this)
					->find($con);
				if (null !== $criteria) {
					return $collCoupons;
				}
				$this->collCoupons = $collCoupons;
			}
		}
		return $this->collCoupons;
	}

	/**
	 * Returns the number of related Coupon objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Coupon objects.
	 * @throws     PropelException
	 */
	public function countCoupons(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCoupons || null !== $criteria) {
			if ($this->isNew() && null === $this->collCoupons) {
				return 0;
			} else {
				$query = CouponQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByBarAssociation($this)
					->count($con);
			}
		} else {
			return count($this->collCoupons);
		}
	}

	/**
	 * Method called to associate a Coupon object to this object
	 * through the Coupon foreign key attribute.
	 *
	 * @param      Coupon $l Coupon
	 * @return     void
	 * @throws     PropelException
	 */
	public function addCoupon(Coupon $l)
	{
		if ($this->collCoupons === null) {
			$this->initCoupons();
		}
		if (!$this->collCoupons->contains($l)) { // only add it if the **same** object is not already associated
			$this->collCoupons[]= $l;
			$l->setBarAssociation($this);
		}
	}

	/**
	 * Gets a single BarAssociationPromoPage object, which is related to this object by a one-to-one relationship.
	 *
	 * @param      PropelPDO $con optional connection object
	 * @return     BarAssociationPromoPage
	 * @throws     PropelException
	 */
	public function getBarAssociationPromoPage(PropelPDO $con = null)
	{

		if ($this->singleBarAssociationPromoPage === null && !$this->isNew()) {
			$this->singleBarAssociationPromoPage = BarAssociationPromoPageQuery::create()->findPk($this->getPrimaryKey(), $con);
		}

		return $this->singleBarAssociationPromoPage;
	}

	/**
	 * Sets a single BarAssociationPromoPage object as related to this object by a one-to-one relationship.
	 *
	 * @param      BarAssociationPromoPage $v BarAssociationPromoPage
	 * @return     BarAssociation The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setBarAssociationPromoPage(BarAssociationPromoPage $v = null)
	{
		$this->singleBarAssociationPromoPage = $v;

		// Make sure that that the passed-in BarAssociationPromoPage isn't already associated with this object
		if ($v !== null && $v->getBarAssociation() === null) {
			$v->setBarAssociation($this);
		}

		return $this;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->name = null;
		$this->abbreviation = null;
		$this->primary_contact_email = null;
		$this->contact_info = null;
		$this->notes = null;
		$this->password = null;
		$this->last_login = null;
		$this->affinity_expiration_date = null;
		$this->affinity_start_date = null;
		$this->id = null;
		$this->created_at = null;
		$this->updated_at = null;
		$this->slug = null;
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
			if ($this->collCustomers) {
				foreach ((array) $this->collCustomers as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCoupons) {
				foreach ((array) $this->collCoupons as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->singleBarAssociationPromoPage) {
				$this->singleBarAssociationPromoPage->clearAllReferences($deep);
			}
		} // if ($deep)

		$this->collCustomers = null;
		$this->collCoupons = null;
		$this->singleBarAssociationPromoPage = null;
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
	 * @return     BarAssociation The current object (for fluent API support)
	 */
	public function keepUpdateDateUnchanged()
	{
		$this->modifiedColumns[] = BarAssociationPeer::UPDATED_AT;
		return $this;
	}

	// sluggable behavior
	
	/**
	 * Create a unique slug based on the object
	 *
	 * @return string The object slug
	 */
	protected function createSlug()
	{
		$slug = $this->createRawSlug();
		$slug = $this->limitSlugSize($slug);
		$slug = $this->makeSlugUnique($slug);
		
		return $slug;
	}
	
	/**
	 * Create the slug from the appropriate columns
	 *
	 * @return string
	 */
	protected function createRawSlug()
	{
		return $this->cleanupSlugPart($this->__toString());
	}
	
	/**
	 * Cleanup a string to make a slug of it
	 * Removes special characters, replaces blanks with a separator, and trim it
	 *
	 * @param     string $text      the text to slugify
	 * @param     string $separator the separator used by slug
	 * @return    string             the slugified text
	 */
	protected static function cleanupSlugPart($slug, $replacement = '-')
	{
		// transliterate
		if (function_exists('iconv')) {
			$slug = iconv('utf-8', 'us-ascii//TRANSLIT', $slug);
		}
		
		// lowercase
		if (function_exists('mb_strtolower')) {
			$slug = mb_strtolower($slug);
		} else {
			$slug = strtolower($slug);
		}
		
		// remove accents resulting from OSX's iconv
		$slug = str_replace(array('\'', '`', '^'), '', $slug);
		
		// replace non letter or digits with separator
		$slug = preg_replace('/\W+/', $replacement, $slug);
		
		// trim
		$slug = trim($slug, $replacement);
	
		if (empty($slug)) {
			return 'n-a';
		}
	
		return $slug;
	}
	
	
	/**
	 * Make sure the slug is short enough to accomodate the column size
	 *
	 * @param	string $slug			the slug to check
	 *
	 * @return string						the truncated slug
	 */
	protected static function limitSlugSize($slug, $incrementReservedSpace = 3)
	{
		// check length, as suffix could put it over maximum
		if (strlen($slug) > (255 - $incrementReservedSpace)) {
			$slug = substr($slug, 0, 255 - $incrementReservedSpace);
		}
		return $slug;
	}
	
	
	/**
	 * Get the slug, ensuring its uniqueness
	 *
	 * @param	string $slug			the slug to check
	 * @param	string $separator the separator used by slug
	 * @return string						the unique slug
	 */
	protected function makeSlugUnique($slug, $separator = '-', $increment = 0)
	{
		$slug2 = empty($increment) ? $slug : $slug . $separator . $increment;
		$slugAlreadyExists = BarAssociationQuery::create()
			->filterBySlug($slug2)
			->prune($this)
			->count();
		if ($slugAlreadyExists) {
			return $this->makeSlugUnique($slug, $separator, ++$increment);
		} else {
			return $slug2;
		}
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseBarAssociation:' . $name))
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

} // BaseBarAssociation
