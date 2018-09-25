<?php


/**
 * Base class that represents a row from the 'te_blog_post' table.
 *
 * 
 *
 * @package    propel.generator.plugins.teBlogPlugin.lib.model.om
 */
abstract class BaseteBlogPost extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'teBlogPostPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        teBlogPostPeer
	 */
	protected static $peer;

	/**
	 * The value for the author_id field.
	 * @var        int
	 */
	protected $author_id;

	/**
	 * The value for the title field.
	 * @var        string
	 */
	protected $title;

	/**
	 * The value for the extract field.
	 * @var        string
	 */
	protected $extract;

	/**
	 * The value for the content field.
	 * @var        string
	 */
	protected $content;

	/**
	 * The value for the is_published field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $is_published;

	/**
	 * The value for the allow_comments field.
	 * Note: this column has a database default value of: true
	 * @var        boolean
	 */
	protected $allow_comments;

	/**
	 * The value for the published_at field.
	 * @var        string
	 */
	protected $published_at;

	/**
	 * The value for the created_by field.
	 * @var        int
	 */
	protected $created_by;

	/**
	 * The value for the updated_by field.
	 * @var        int
	 */
	protected $updated_by;

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
	 * @var        sfGuardUser
	 */
	protected $aAuthor;

	/**
	 * @var        sfGuardUser
	 */
	protected $aCreator;

	/**
	 * @var        sfGuardUser
	 */
	protected $aUpdater;

	/**
	 * @var        array teBlogPostToCategoryLink[] Collection to store aggregation of teBlogPostToCategoryLink objects.
	 */
	protected $collteBlogPostToCategoryLinks;

	/**
	 * @var        array teBlogPostCategory[] Collection to store aggregation of teBlogPostCategory objects.
	 */
	protected $collCategorys;

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
		$this->is_published = false;
		$this->allow_comments = true;
	}

	/**
	 * Initializes internal state of BaseteBlogPost object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [author_id] column value.
	 * 
	 * @return     int
	 */
	public function getAuthorId()
	{
		return $this->author_id;
	}

	/**
	 * Get the [title] column value.
	 * 
	 * @return     string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * Get the [extract] column value.
	 * 
	 * @return     string
	 */
	public function getExtract()
	{
		return $this->extract;
	}

	/**
	 * Get the [content] column value.
	 * 
	 * @return     string
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * Get the [is_published] column value.
	 * 
	 * @return     boolean
	 */
	public function getIsPublished()
	{
		return $this->is_published;
	}

	/**
	 * Get the [allow_comments] column value.
	 * 
	 * @return     boolean
	 */
	public function getAllowComments()
	{
		return $this->allow_comments;
	}

	/**
	 * Get the [optionally formatted] temporal [published_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getPublishedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->published_at === null) {
			return null;
		}


		if ($this->published_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->published_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->published_at, true), $x);
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
	 * Get the [created_by] column value.
	 * 
	 * @return     int
	 */
	public function getCreatedBy()
	{
		return $this->created_by;
	}

	/**
	 * Get the [updated_by] column value.
	 * 
	 * @return     int
	 */
	public function getUpdatedBy()
	{
		return $this->updated_by;
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
	 * Set the value of [author_id] column.
	 * 
	 * @param      int $v new value
	 * @return     teBlogPost The current object (for fluent API support)
	 */
	public function setAuthorId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->author_id !== $v) {
			$this->author_id = $v;
			$this->modifiedColumns[] = teBlogPostPeer::AUTHOR_ID;
		}

		if ($this->aAuthor !== null && $this->aAuthor->getId() !== $v) {
			$this->aAuthor = null;
		}

		return $this;
	} // setAuthorId()

	/**
	 * Set the value of [title] column.
	 * 
	 * @param      string $v new value
	 * @return     teBlogPost The current object (for fluent API support)
	 */
	public function setTitle($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = teBlogPostPeer::TITLE;
		}

		return $this;
	} // setTitle()

	/**
	 * Set the value of [extract] column.
	 * 
	 * @param      string $v new value
	 * @return     teBlogPost The current object (for fluent API support)
	 */
	public function setExtract($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->extract !== $v) {
			$this->extract = $v;
			$this->modifiedColumns[] = teBlogPostPeer::EXTRACT;
		}

		return $this;
	} // setExtract()

	/**
	 * Set the value of [content] column.
	 * 
	 * @param      string $v new value
	 * @return     teBlogPost The current object (for fluent API support)
	 */
	public function setContent($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->content !== $v) {
			$this->content = $v;
			$this->modifiedColumns[] = teBlogPostPeer::CONTENT;
		}

		return $this;
	} // setContent()

	/**
	 * Set the value of [is_published] column.
	 * 
	 * @param      boolean $v new value
	 * @return     teBlogPost The current object (for fluent API support)
	 */
	public function setIsPublished($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->is_published !== $v || $this->isNew()) {
			$this->is_published = $v;
			$this->modifiedColumns[] = teBlogPostPeer::IS_PUBLISHED;
		}

		return $this;
	} // setIsPublished()

	/**
	 * Set the value of [allow_comments] column.
	 * 
	 * @param      boolean $v new value
	 * @return     teBlogPost The current object (for fluent API support)
	 */
	public function setAllowComments($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->allow_comments !== $v || $this->isNew()) {
			$this->allow_comments = $v;
			$this->modifiedColumns[] = teBlogPostPeer::ALLOW_COMMENTS;
		}

		return $this;
	} // setAllowComments()

	/**
	 * Sets the value of [published_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     teBlogPost The current object (for fluent API support)
	 */
	public function setPublishedAt($v)
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

		if ( $this->published_at !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->published_at !== null && $tmpDt = new DateTime($this->published_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->published_at = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = teBlogPostPeer::PUBLISHED_AT;
			}
		} // if either are not null

		return $this;
	} // setPublishedAt()

	/**
	 * Set the value of [created_by] column.
	 * 
	 * @param      int $v new value
	 * @return     teBlogPost The current object (for fluent API support)
	 */
	public function setCreatedBy($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = teBlogPostPeer::CREATED_BY;
		}

		if ($this->aCreator !== null && $this->aCreator->getId() !== $v) {
			$this->aCreator = null;
		}

		return $this;
	} // setCreatedBy()

	/**
	 * Set the value of [updated_by] column.
	 * 
	 * @param      int $v new value
	 * @return     teBlogPost The current object (for fluent API support)
	 */
	public function setUpdatedBy($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = teBlogPostPeer::UPDATED_BY;
		}

		if ($this->aUpdater !== null && $this->aUpdater->getId() !== $v) {
			$this->aUpdater = null;
		}

		return $this;
	} // setUpdatedBy()

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     teBlogPost The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = teBlogPostPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Sets the value of [created_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     teBlogPost The current object (for fluent API support)
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
				$this->modifiedColumns[] = teBlogPostPeer::CREATED_AT;
			}
		} // if either are not null

		return $this;
	} // setCreatedAt()

	/**
	 * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     teBlogPost The current object (for fluent API support)
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
				$this->modifiedColumns[] = teBlogPostPeer::UPDATED_AT;
			}
		} // if either are not null

		return $this;
	} // setUpdatedAt()

	/**
	 * Set the value of [slug] column.
	 * 
	 * @param      string $v new value
	 * @return     teBlogPost The current object (for fluent API support)
	 */
	public function setSlug($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->slug !== $v) {
			$this->slug = $v;
			$this->modifiedColumns[] = teBlogPostPeer::SLUG;
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
			if ($this->is_published !== false) {
				return false;
			}

			if ($this->allow_comments !== true) {
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

			$this->author_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->title = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->extract = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->content = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->is_published = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
			$this->allow_comments = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
			$this->published_at = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->created_by = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->updated_by = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->id = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->created_at = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->updated_at = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->slug = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 13; // 13 = teBlogPostPeer::NUM_COLUMNS - teBlogPostPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating teBlogPost object", $e);
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

		if ($this->aAuthor !== null && $this->author_id !== $this->aAuthor->getId()) {
			$this->aAuthor = null;
		}
		if ($this->aCreator !== null && $this->created_by !== $this->aCreator->getId()) {
			$this->aCreator = null;
		}
		if ($this->aUpdater !== null && $this->updated_by !== $this->aUpdater->getId()) {
			$this->aUpdater = null;
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
			$con = Propel::getConnection(teBlogPostPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = teBlogPostPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aAuthor = null;
			$this->aCreator = null;
			$this->aUpdater = null;
			$this->collteBlogPostToCategoryLinks = null;

			$this->collCategorys = null;
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
			$con = Propel::getConnection(teBlogPostPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseteBlogPost:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				teBlogPostQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseteBlogPost:delete:post') as $callable)
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
			$con = Propel::getConnection(teBlogPostPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// sluggable behavior
			
			if ($this->isColumnModified(teBlogPostPeer::SLUG) && $this->getSlug()) {
				$this->setSlug($this->makeSlugUnique($this->getSlug()));
			} elseif (!$this->getSlug()) {
				$this->setSlug($this->createSlug());
			}
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseteBlogPost:save:pre') as $callable)
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
				if (!$this->isColumnModified(teBlogPostPeer::CREATED_AT)) {
					$this->setCreatedAt(time());
				}
				if (!$this->isColumnModified(teBlogPostPeer::UPDATED_AT)) {
					$this->setUpdatedAt(time());
				}
			} else {
				$ret = $ret && $this->preUpdate($con);
				// timestampable behavior
				if ($this->isModified() && !$this->isColumnModified(teBlogPostPeer::UPDATED_AT)) {
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
				foreach (sfMixer::getCallables('BaseteBlogPost:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				teBlogPostPeer::addInstanceToPool($this);
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

			if ($this->aAuthor !== null) {
				if ($this->aAuthor->isModified() || $this->aAuthor->isNew()) {
					$affectedRows += $this->aAuthor->save($con);
				}
				$this->setAuthor($this->aAuthor);
			}

			if ($this->aCreator !== null) {
				if ($this->aCreator->isModified() || $this->aCreator->isNew()) {
					$affectedRows += $this->aCreator->save($con);
				}
				$this->setCreator($this->aCreator);
			}

			if ($this->aUpdater !== null) {
				if ($this->aUpdater->isModified() || $this->aUpdater->isNew()) {
					$affectedRows += $this->aUpdater->save($con);
				}
				$this->setUpdater($this->aUpdater);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = teBlogPostPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(teBlogPostPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.teBlogPostPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += teBlogPostPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collteBlogPostToCategoryLinks !== null) {
				foreach ($this->collteBlogPostToCategoryLinks as $referrerFK) {
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

			if ($this->aAuthor !== null) {
				if (!$this->aAuthor->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAuthor->getValidationFailures());
				}
			}

			if ($this->aCreator !== null) {
				if (!$this->aCreator->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCreator->getValidationFailures());
				}
			}

			if ($this->aUpdater !== null) {
				if (!$this->aUpdater->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUpdater->getValidationFailures());
				}
			}


			if (($retval = teBlogPostPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collteBlogPostToCategoryLinks !== null) {
					foreach ($this->collteBlogPostToCategoryLinks as $referrerFK) {
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
		$pos = teBlogPostPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getAuthorId();
				break;
			case 1:
				return $this->getTitle();
				break;
			case 2:
				return $this->getExtract();
				break;
			case 3:
				return $this->getContent();
				break;
			case 4:
				return $this->getIsPublished();
				break;
			case 5:
				return $this->getAllowComments();
				break;
			case 6:
				return $this->getPublishedAt();
				break;
			case 7:
				return $this->getCreatedBy();
				break;
			case 8:
				return $this->getUpdatedBy();
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
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $includeForeignObjects = false)
	{
		$keys = teBlogPostPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAuthorId(),
			$keys[1] => $this->getTitle(),
			$keys[2] => $this->getExtract(),
			$keys[3] => $this->getContent(),
			$keys[4] => $this->getIsPublished(),
			$keys[5] => $this->getAllowComments(),
			$keys[6] => $this->getPublishedAt(),
			$keys[7] => $this->getCreatedBy(),
			$keys[8] => $this->getUpdatedBy(),
			$keys[9] => $this->getId(),
			$keys[10] => $this->getCreatedAt(),
			$keys[11] => $this->getUpdatedAt(),
			$keys[12] => $this->getSlug(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aAuthor) {
				$result['Author'] = $this->aAuthor->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aCreator) {
				$result['Creator'] = $this->aCreator->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aUpdater) {
				$result['Updater'] = $this->aUpdater->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = teBlogPostPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setAuthorId($value);
				break;
			case 1:
				$this->setTitle($value);
				break;
			case 2:
				$this->setExtract($value);
				break;
			case 3:
				$this->setContent($value);
				break;
			case 4:
				$this->setIsPublished($value);
				break;
			case 5:
				$this->setAllowComments($value);
				break;
			case 6:
				$this->setPublishedAt($value);
				break;
			case 7:
				$this->setCreatedBy($value);
				break;
			case 8:
				$this->setUpdatedBy($value);
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
		$keys = teBlogPostPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAuthorId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTitle($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setExtract($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setContent($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setIsPublished($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAllowComments($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPublishedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedBy($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUpdatedBy($arr[$keys[8]]);
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
		$criteria = new Criteria(teBlogPostPeer::DATABASE_NAME);

		if ($this->isColumnModified(teBlogPostPeer::AUTHOR_ID)) $criteria->add(teBlogPostPeer::AUTHOR_ID, $this->author_id);
		if ($this->isColumnModified(teBlogPostPeer::TITLE)) $criteria->add(teBlogPostPeer::TITLE, $this->title);
		if ($this->isColumnModified(teBlogPostPeer::EXTRACT)) $criteria->add(teBlogPostPeer::EXTRACT, $this->extract);
		if ($this->isColumnModified(teBlogPostPeer::CONTENT)) $criteria->add(teBlogPostPeer::CONTENT, $this->content);
		if ($this->isColumnModified(teBlogPostPeer::IS_PUBLISHED)) $criteria->add(teBlogPostPeer::IS_PUBLISHED, $this->is_published);
		if ($this->isColumnModified(teBlogPostPeer::ALLOW_COMMENTS)) $criteria->add(teBlogPostPeer::ALLOW_COMMENTS, $this->allow_comments);
		if ($this->isColumnModified(teBlogPostPeer::PUBLISHED_AT)) $criteria->add(teBlogPostPeer::PUBLISHED_AT, $this->published_at);
		if ($this->isColumnModified(teBlogPostPeer::CREATED_BY)) $criteria->add(teBlogPostPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(teBlogPostPeer::UPDATED_BY)) $criteria->add(teBlogPostPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(teBlogPostPeer::ID)) $criteria->add(teBlogPostPeer::ID, $this->id);
		if ($this->isColumnModified(teBlogPostPeer::CREATED_AT)) $criteria->add(teBlogPostPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(teBlogPostPeer::UPDATED_AT)) $criteria->add(teBlogPostPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(teBlogPostPeer::SLUG)) $criteria->add(teBlogPostPeer::SLUG, $this->slug);

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
		$criteria = new Criteria(teBlogPostPeer::DATABASE_NAME);
		$criteria->add(teBlogPostPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of teBlogPost (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setAuthorId($this->author_id);
		$copyObj->setTitle($this->title);
		$copyObj->setExtract($this->extract);
		$copyObj->setContent($this->content);
		$copyObj->setIsPublished($this->is_published);
		$copyObj->setAllowComments($this->allow_comments);
		$copyObj->setPublishedAt($this->published_at);
		$copyObj->setCreatedBy($this->created_by);
		$copyObj->setUpdatedBy($this->updated_by);
		$copyObj->setCreatedAt($this->created_at);
		$copyObj->setUpdatedAt($this->updated_at);
		$copyObj->setSlug($this->slug);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getteBlogPostToCategoryLinks() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addteBlogPostToCategoryLink($relObj->copy($deepCopy));
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
	 * @return     teBlogPost Clone of current object.
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
	 * @return     teBlogPostPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new teBlogPostPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a sfGuardUser object.
	 *
	 * @param      sfGuardUser $v
	 * @return     teBlogPost The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setAuthor(sfGuardUser $v = null)
	{
		if ($v === null) {
			$this->setAuthorId(NULL);
		} else {
			$this->setAuthorId($v->getId());
		}

		$this->aAuthor = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the sfGuardUser object, it will not be re-added.
		if ($v !== null) {
			$v->addteBlogPostRelatedByAuthorId($this);
		}

		return $this;
	}


	/**
	 * Get the associated sfGuardUser object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     sfGuardUser The associated sfGuardUser object.
	 * @throws     PropelException
	 */
	public function getAuthor(PropelPDO $con = null)
	{
		if ($this->aAuthor === null && ($this->author_id !== null)) {
			$this->aAuthor = sfGuardUserQuery::create()->findPk($this->author_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aAuthor->addteBlogPostsRelatedByAuthorId($this);
			 */
		}
		return $this->aAuthor;
	}

	/**
	 * Declares an association between this object and a sfGuardUser object.
	 *
	 * @param      sfGuardUser $v
	 * @return     teBlogPost The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setCreator(sfGuardUser $v = null)
	{
		if ($v === null) {
			$this->setCreatedBy(NULL);
		} else {
			$this->setCreatedBy($v->getId());
		}

		$this->aCreator = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the sfGuardUser object, it will not be re-added.
		if ($v !== null) {
			$v->addteBlogPostRelatedByCreatedBy($this);
		}

		return $this;
	}


	/**
	 * Get the associated sfGuardUser object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     sfGuardUser The associated sfGuardUser object.
	 * @throws     PropelException
	 */
	public function getCreator(PropelPDO $con = null)
	{
		if ($this->aCreator === null && ($this->created_by !== null)) {
			$this->aCreator = sfGuardUserQuery::create()->findPk($this->created_by, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aCreator->addteBlogPostsRelatedByCreatedBy($this);
			 */
		}
		return $this->aCreator;
	}

	/**
	 * Declares an association between this object and a sfGuardUser object.
	 *
	 * @param      sfGuardUser $v
	 * @return     teBlogPost The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUpdater(sfGuardUser $v = null)
	{
		if ($v === null) {
			$this->setUpdatedBy(NULL);
		} else {
			$this->setUpdatedBy($v->getId());
		}

		$this->aUpdater = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the sfGuardUser object, it will not be re-added.
		if ($v !== null) {
			$v->addteBlogPostRelatedByUpdatedBy($this);
		}

		return $this;
	}


	/**
	 * Get the associated sfGuardUser object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     sfGuardUser The associated sfGuardUser object.
	 * @throws     PropelException
	 */
	public function getUpdater(PropelPDO $con = null)
	{
		if ($this->aUpdater === null && ($this->updated_by !== null)) {
			$this->aUpdater = sfGuardUserQuery::create()->findPk($this->updated_by, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aUpdater->addteBlogPostsRelatedByUpdatedBy($this);
			 */
		}
		return $this->aUpdater;
	}

	/**
	 * Clears out the collteBlogPostToCategoryLinks collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addteBlogPostToCategoryLinks()
	 */
	public function clearteBlogPostToCategoryLinks()
	{
		$this->collteBlogPostToCategoryLinks = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collteBlogPostToCategoryLinks collection.
	 *
	 * By default this just sets the collteBlogPostToCategoryLinks collection to an empty array (like clearcollteBlogPostToCategoryLinks());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initteBlogPostToCategoryLinks()
	{
		$this->collteBlogPostToCategoryLinks = new PropelObjectCollection();
		$this->collteBlogPostToCategoryLinks->setModel('teBlogPostToCategoryLink');
	}

	/**
	 * Gets an array of teBlogPostToCategoryLink objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this teBlogPost is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array teBlogPostToCategoryLink[] List of teBlogPostToCategoryLink objects
	 * @throws     PropelException
	 */
	public function getteBlogPostToCategoryLinks($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collteBlogPostToCategoryLinks || null !== $criteria) {
			if ($this->isNew() && null === $this->collteBlogPostToCategoryLinks) {
				// return empty collection
				$this->initteBlogPostToCategoryLinks();
			} else {
				$collteBlogPostToCategoryLinks = teBlogPostToCategoryLinkQuery::create(null, $criteria)
					->filterByPost($this)
					->find($con);
				if (null !== $criteria) {
					return $collteBlogPostToCategoryLinks;
				}
				$this->collteBlogPostToCategoryLinks = $collteBlogPostToCategoryLinks;
			}
		}
		return $this->collteBlogPostToCategoryLinks;
	}

	/**
	 * Returns the number of related teBlogPostToCategoryLink objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related teBlogPostToCategoryLink objects.
	 * @throws     PropelException
	 */
	public function countteBlogPostToCategoryLinks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collteBlogPostToCategoryLinks || null !== $criteria) {
			if ($this->isNew() && null === $this->collteBlogPostToCategoryLinks) {
				return 0;
			} else {
				$query = teBlogPostToCategoryLinkQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPost($this)
					->count($con);
			}
		} else {
			return count($this->collteBlogPostToCategoryLinks);
		}
	}

	/**
	 * Method called to associate a teBlogPostToCategoryLink object to this object
	 * through the teBlogPostToCategoryLink foreign key attribute.
	 *
	 * @param      teBlogPostToCategoryLink $l teBlogPostToCategoryLink
	 * @return     void
	 * @throws     PropelException
	 */
	public function addteBlogPostToCategoryLink(teBlogPostToCategoryLink $l)
	{
		if ($this->collteBlogPostToCategoryLinks === null) {
			$this->initteBlogPostToCategoryLinks();
		}
		if (!$this->collteBlogPostToCategoryLinks->contains($l)) { // only add it if the **same** object is not already associated
			$this->collteBlogPostToCategoryLinks[]= $l;
			$l->setPost($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this teBlogPost is new, it will return
	 * an empty collection; or if this teBlogPost has previously
	 * been saved, it will retrieve related teBlogPostToCategoryLinks from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in teBlogPost.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array teBlogPostToCategoryLink[] List of teBlogPostToCategoryLink objects
	 */
	public function getteBlogPostToCategoryLinksJoinCategory($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = teBlogPostToCategoryLinkQuery::create(null, $criteria);
		$query->joinWith('Category', $join_behavior);

		return $this->getteBlogPostToCategoryLinks($query, $con);
	}

	/**
	 * Clears out the collCategorys collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCategorys()
	 */
	public function clearCategorys()
	{
		$this->collCategorys = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCategorys collection.
	 *
	 * By default this just sets the collCategorys collection to an empty collection (like clearCategorys());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCategorys()
	{
		$this->collCategorys = new PropelObjectCollection();
		$this->collCategorys->setModel('teBlogPostCategory');
	}

	/**
	 * Gets a collection of teBlogPostCategory objects related by a many-to-many relationship
	 * to the current object by way of the te_blog_posts_to_categories cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this teBlogPost is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array teBlogPostCategory[] List of teBlogPostCategory objects
	 */
	public function getCategorys($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCategorys || null !== $criteria) {
			if ($this->isNew() && null === $this->collCategorys) {
				// return empty collection
				$this->initCategorys();
			} else {
				$collCategorys = teBlogPostCategoryQuery::create(null, $criteria)
					->filterByPost($this)
					->find($con);
				if (null !== $criteria) {
					return $collCategorys;
				}
				$this->collCategorys = $collCategorys;
			}
		}
		return $this->collCategorys;
	}

	/**
	 * Gets the number of teBlogPostCategory objects related by a many-to-many relationship
	 * to the current object by way of the te_blog_posts_to_categories cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related teBlogPostCategory objects
	 */
	public function countCategorys($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCategorys || null !== $criteria) {
			if ($this->isNew() && null === $this->collCategorys) {
				return 0;
			} else {
				$query = teBlogPostCategoryQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPost($this)
					->count($con);
			}
		} else {
			return count($this->collCategorys);
		}
	}

	/**
	 * Associate a teBlogPostCategory object to this object
	 * through the te_blog_posts_to_categories cross reference table.
	 *
	 * @param      teBlogPostCategory $teBlogPostCategory The teBlogPostToCategoryLink object to relate
	 * @return     void
	 */
	public function addCategory($teBlogPostCategory)
	{
		if ($this->collCategorys === null) {
			$this->initCategorys();
		}
		if (!$this->collCategorys->contains($teBlogPostCategory)) { // only add it if the **same** object is not already associated
			$teBlogPostToCategoryLink = new teBlogPostToCategoryLink();
			$teBlogPostToCategoryLink->setCategory($teBlogPostCategory);
			$this->addteBlogPostToCategoryLink($teBlogPostToCategoryLink);

			$this->collCategorys[]= $teBlogPostCategory;
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->author_id = null;
		$this->title = null;
		$this->extract = null;
		$this->content = null;
		$this->is_published = null;
		$this->allow_comments = null;
		$this->published_at = null;
		$this->created_by = null;
		$this->updated_by = null;
		$this->id = null;
		$this->created_at = null;
		$this->updated_at = null;
		$this->slug = null;
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
			if ($this->collteBlogPostToCategoryLinks) {
				foreach ((array) $this->collteBlogPostToCategoryLinks as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collteBlogPostToCategoryLinks = null;
		$this->aAuthor = null;
		$this->aCreator = null;
		$this->aUpdater = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string The value of the 'title' column
	 */
	public function __toString()
	{
		return (string) $this->getTitle();
	}

	// timestampable behavior
	
	/**
	 * Mark the current object so that the update date doesn't get updated during next save
	 *
	 * @return     teBlogPost The current object (for fluent API support)
	 */
	public function keepUpdateDateUnchanged()
	{
		$this->modifiedColumns[] = teBlogPostPeer::UPDATED_AT;
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
		$slugAlreadyExists = teBlogPostQuery::create()
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
		if ($callable = sfMixer::getCallable('BaseteBlogPost:' . $name))
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

} // BaseteBlogPost

// symfony_behaviors behavior
include_once 'plugins/teBlogPlugin/lib/model/om/BaseteBlogPostBehaviors.php';
