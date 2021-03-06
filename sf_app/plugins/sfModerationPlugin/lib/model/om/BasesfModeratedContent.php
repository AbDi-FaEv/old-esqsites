<?php


/**
 * Base class that represents a row from the 'sf_moderated_content' table.
 *
 * 
 *
 * @package    propel.generator.plugins.sfModerationPlugin.lib.model.om
 */
abstract class BasesfModeratedContent extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'sfModeratedContentPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        sfModeratedContentPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the object_id field.
	 * @var        int
	 */
	protected $object_id;

	/**
	 * The value for the object_model field.
	 * @var        string
	 */
	protected $object_model;

	/**
	 * The value for the user_name field.
	 * @var        string
	 */
	protected $user_name;

	/**
	 * The value for the user_email field.
	 * @var        string
	 */
	protected $user_email;

	/**
	 * The value for the title field.
	 * @var        string
	 */
	protected $title;

	/**
	 * The value for the content field.
	 * @var        string
	 */
	protected $content;

	/**
	 * The value for the url field.
	 * @var        string
	 */
	protected $url;

	/**
	 * The value for the status field.
	 * Note: this column has a database default value of: 1
	 * @var        int
	 */
	protected $status;

	/**
	 * The value for the comment field.
	 * @var        string
	 */
	protected $comment;

	/**
	 * The value for the moderated_at field.
	 * @var        string
	 */
	protected $moderated_at;

	/**
	 * The value for the object_updated_at field.
	 * @var        string
	 */
	protected $object_updated_at;

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
		$this->status = 1;
	}

	/**
	 * Initializes internal state of BasesfModeratedContent object.
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
	 * Get the [object_id] column value.
	 * 
	 * @return     int
	 */
	public function getObjectId()
	{
		return $this->object_id;
	}

	/**
	 * Get the [object_model] column value.
	 * 
	 * @return     string
	 */
	public function getObjectModel()
	{
		return $this->object_model;
	}

	/**
	 * Get the [user_name] column value.
	 * 
	 * @return     string
	 */
	public function getUserName()
	{
		return $this->user_name;
	}

	/**
	 * Get the [user_email] column value.
	 * 
	 * @return     string
	 */
	public function getUserEmail()
	{
		return $this->user_email;
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
	 * Get the [content] column value.
	 * 
	 * @return     string
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * Get the [url] column value.
	 * 
	 * @return     string
	 */
	public function getUrl()
	{
		return $this->url;
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
	 * Get the [comment] column value.
	 * 
	 * @return     string
	 */
	public function getComment()
	{
		return $this->comment;
	}

	/**
	 * Get the [optionally formatted] temporal [moderated_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getModeratedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->moderated_at === null) {
			return null;
		}


		if ($this->moderated_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->moderated_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->moderated_at, true), $x);
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
	 * Get the [optionally formatted] temporal [object_updated_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getObjectUpdatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->object_updated_at === null) {
			return null;
		}


		if ($this->object_updated_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->object_updated_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->object_updated_at, true), $x);
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
	 * @param      int $v new value
	 * @return     sfModeratedContent The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = sfModeratedContentPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [object_id] column.
	 * 
	 * @param      int $v new value
	 * @return     sfModeratedContent The current object (for fluent API support)
	 */
	public function setObjectId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->object_id !== $v) {
			$this->object_id = $v;
			$this->modifiedColumns[] = sfModeratedContentPeer::OBJECT_ID;
		}

		return $this;
	} // setObjectId()

	/**
	 * Set the value of [object_model] column.
	 * 
	 * @param      string $v new value
	 * @return     sfModeratedContent The current object (for fluent API support)
	 */
	public function setObjectModel($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->object_model !== $v) {
			$this->object_model = $v;
			$this->modifiedColumns[] = sfModeratedContentPeer::OBJECT_MODEL;
		}

		return $this;
	} // setObjectModel()

	/**
	 * Set the value of [user_name] column.
	 * 
	 * @param      string $v new value
	 * @return     sfModeratedContent The current object (for fluent API support)
	 */
	public function setUserName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->user_name !== $v) {
			$this->user_name = $v;
			$this->modifiedColumns[] = sfModeratedContentPeer::USER_NAME;
		}

		return $this;
	} // setUserName()

	/**
	 * Set the value of [user_email] column.
	 * 
	 * @param      string $v new value
	 * @return     sfModeratedContent The current object (for fluent API support)
	 */
	public function setUserEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->user_email !== $v) {
			$this->user_email = $v;
			$this->modifiedColumns[] = sfModeratedContentPeer::USER_EMAIL;
		}

		return $this;
	} // setUserEmail()

	/**
	 * Set the value of [title] column.
	 * 
	 * @param      string $v new value
	 * @return     sfModeratedContent The current object (for fluent API support)
	 */
	public function setTitle($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = sfModeratedContentPeer::TITLE;
		}

		return $this;
	} // setTitle()

	/**
	 * Set the value of [content] column.
	 * 
	 * @param      string $v new value
	 * @return     sfModeratedContent The current object (for fluent API support)
	 */
	public function setContent($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->content !== $v) {
			$this->content = $v;
			$this->modifiedColumns[] = sfModeratedContentPeer::CONTENT;
		}

		return $this;
	} // setContent()

	/**
	 * Set the value of [url] column.
	 * 
	 * @param      string $v new value
	 * @return     sfModeratedContent The current object (for fluent API support)
	 */
	public function setUrl($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->url !== $v) {
			$this->url = $v;
			$this->modifiedColumns[] = sfModeratedContentPeer::URL;
		}

		return $this;
	} // setUrl()

	/**
	 * Set the value of [status] column.
	 * 
	 * @param      int $v new value
	 * @return     sfModeratedContent The current object (for fluent API support)
	 */
	public function setStatus($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->status !== $v || $this->isNew()) {
			$this->status = $v;
			$this->modifiedColumns[] = sfModeratedContentPeer::STATUS;
		}

		return $this;
	} // setStatus()

	/**
	 * Set the value of [comment] column.
	 * 
	 * @param      string $v new value
	 * @return     sfModeratedContent The current object (for fluent API support)
	 */
	public function setComment($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->comment !== $v) {
			$this->comment = $v;
			$this->modifiedColumns[] = sfModeratedContentPeer::COMMENT;
		}

		return $this;
	} // setComment()

	/**
	 * Sets the value of [moderated_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     sfModeratedContent The current object (for fluent API support)
	 */
	public function setModeratedAt($v)
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

		if ( $this->moderated_at !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->moderated_at !== null && $tmpDt = new DateTime($this->moderated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->moderated_at = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = sfModeratedContentPeer::MODERATED_AT;
			}
		} // if either are not null

		return $this;
	} // setModeratedAt()

	/**
	 * Sets the value of [object_updated_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     sfModeratedContent The current object (for fluent API support)
	 */
	public function setObjectUpdatedAt($v)
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

		if ( $this->object_updated_at !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->object_updated_at !== null && $tmpDt = new DateTime($this->object_updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->object_updated_at = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = sfModeratedContentPeer::OBJECT_UPDATED_AT;
			}
		} // if either are not null

		return $this;
	} // setObjectUpdatedAt()

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
			if ($this->status !== 1) {
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
			$this->object_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->object_model = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->user_name = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->user_email = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->title = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->content = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->url = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->status = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->comment = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->moderated_at = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->object_updated_at = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 12; // 12 = sfModeratedContentPeer::NUM_COLUMNS - sfModeratedContentPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating sfModeratedContent object", $e);
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
			$con = Propel::getConnection(sfModeratedContentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = sfModeratedContentPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

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
			$con = Propel::getConnection(sfModeratedContentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BasesfModeratedContent:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				sfModeratedContentQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BasesfModeratedContent:delete:post') as $callable)
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
			$con = Propel::getConnection(sfModeratedContentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BasesfModeratedContent:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			  	$con->commit();
			    return $affectedRows;
			  }
			}

			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
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
				foreach (sfMixer::getCallables('BasesfModeratedContent:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				sfModeratedContentPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = sfModeratedContentPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(sfModeratedContentPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.sfModeratedContentPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows = 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows = sfModeratedContentPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
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


			if (($retval = sfModeratedContentPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = sfModeratedContentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getObjectId();
				break;
			case 2:
				return $this->getObjectModel();
				break;
			case 3:
				return $this->getUserName();
				break;
			case 4:
				return $this->getUserEmail();
				break;
			case 5:
				return $this->getTitle();
				break;
			case 6:
				return $this->getContent();
				break;
			case 7:
				return $this->getUrl();
				break;
			case 8:
				return $this->getStatus();
				break;
			case 9:
				return $this->getComment();
				break;
			case 10:
				return $this->getModeratedAt();
				break;
			case 11:
				return $this->getObjectUpdatedAt();
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
		$keys = sfModeratedContentPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getObjectId(),
			$keys[2] => $this->getObjectModel(),
			$keys[3] => $this->getUserName(),
			$keys[4] => $this->getUserEmail(),
			$keys[5] => $this->getTitle(),
			$keys[6] => $this->getContent(),
			$keys[7] => $this->getUrl(),
			$keys[8] => $this->getStatus(),
			$keys[9] => $this->getComment(),
			$keys[10] => $this->getModeratedAt(),
			$keys[11] => $this->getObjectUpdatedAt(),
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
		$pos = sfModeratedContentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setObjectId($value);
				break;
			case 2:
				$this->setObjectModel($value);
				break;
			case 3:
				$this->setUserName($value);
				break;
			case 4:
				$this->setUserEmail($value);
				break;
			case 5:
				$this->setTitle($value);
				break;
			case 6:
				$this->setContent($value);
				break;
			case 7:
				$this->setUrl($value);
				break;
			case 8:
				$this->setStatus($value);
				break;
			case 9:
				$this->setComment($value);
				break;
			case 10:
				$this->setModeratedAt($value);
				break;
			case 11:
				$this->setObjectUpdatedAt($value);
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
		$keys = sfModeratedContentPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setObjectId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setObjectModel($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUserName($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUserEmail($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTitle($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setContent($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUrl($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setStatus($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setComment($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setModeratedAt($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setObjectUpdatedAt($arr[$keys[11]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(sfModeratedContentPeer::DATABASE_NAME);

		if ($this->isColumnModified(sfModeratedContentPeer::ID)) $criteria->add(sfModeratedContentPeer::ID, $this->id);
		if ($this->isColumnModified(sfModeratedContentPeer::OBJECT_ID)) $criteria->add(sfModeratedContentPeer::OBJECT_ID, $this->object_id);
		if ($this->isColumnModified(sfModeratedContentPeer::OBJECT_MODEL)) $criteria->add(sfModeratedContentPeer::OBJECT_MODEL, $this->object_model);
		if ($this->isColumnModified(sfModeratedContentPeer::USER_NAME)) $criteria->add(sfModeratedContentPeer::USER_NAME, $this->user_name);
		if ($this->isColumnModified(sfModeratedContentPeer::USER_EMAIL)) $criteria->add(sfModeratedContentPeer::USER_EMAIL, $this->user_email);
		if ($this->isColumnModified(sfModeratedContentPeer::TITLE)) $criteria->add(sfModeratedContentPeer::TITLE, $this->title);
		if ($this->isColumnModified(sfModeratedContentPeer::CONTENT)) $criteria->add(sfModeratedContentPeer::CONTENT, $this->content);
		if ($this->isColumnModified(sfModeratedContentPeer::URL)) $criteria->add(sfModeratedContentPeer::URL, $this->url);
		if ($this->isColumnModified(sfModeratedContentPeer::STATUS)) $criteria->add(sfModeratedContentPeer::STATUS, $this->status);
		if ($this->isColumnModified(sfModeratedContentPeer::COMMENT)) $criteria->add(sfModeratedContentPeer::COMMENT, $this->comment);
		if ($this->isColumnModified(sfModeratedContentPeer::MODERATED_AT)) $criteria->add(sfModeratedContentPeer::MODERATED_AT, $this->moderated_at);
		if ($this->isColumnModified(sfModeratedContentPeer::OBJECT_UPDATED_AT)) $criteria->add(sfModeratedContentPeer::OBJECT_UPDATED_AT, $this->object_updated_at);

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
		$criteria = new Criteria(sfModeratedContentPeer::DATABASE_NAME);
		$criteria->add(sfModeratedContentPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of sfModeratedContent (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setObjectId($this->object_id);
		$copyObj->setObjectModel($this->object_model);
		$copyObj->setUserName($this->user_name);
		$copyObj->setUserEmail($this->user_email);
		$copyObj->setTitle($this->title);
		$copyObj->setContent($this->content);
		$copyObj->setUrl($this->url);
		$copyObj->setStatus($this->status);
		$copyObj->setComment($this->comment);
		$copyObj->setModeratedAt($this->moderated_at);
		$copyObj->setObjectUpdatedAt($this->object_updated_at);

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
	 * @return     sfModeratedContent Clone of current object.
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
	 * @return     sfModeratedContentPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new sfModeratedContentPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->object_id = null;
		$this->object_model = null;
		$this->user_name = null;
		$this->user_email = null;
		$this->title = null;
		$this->content = null;
		$this->url = null;
		$this->status = null;
		$this->comment = null;
		$this->moderated_at = null;
		$this->object_updated_at = null;
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
		} // if ($deep)

	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BasesfModeratedContent:' . $name))
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

} // BasesfModeratedContent
