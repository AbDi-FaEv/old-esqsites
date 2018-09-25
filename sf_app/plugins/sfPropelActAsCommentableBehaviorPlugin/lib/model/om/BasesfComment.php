<?php


/**
 * Base class that represents a row from the 'sf_comment' table.
 *
 * 
 *
 * @package    propel.generator.plugins.sfPropelActAsCommentableBehaviorPlugin.lib.model.om
 */
abstract class BasesfComment extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'sfCommentPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        sfCommentPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the commentable_model field.
	 * @var        string
	 */
	protected $commentable_model;

	/**
	 * The value for the commentable_id field.
	 * @var        string
	 */
	protected $commentable_id;

	/**
	 * The value for the comment_namespace field.
	 * @var        string
	 */
	protected $comment_namespace;

	/**
	 * The value for the title field.
	 * @var        string
	 */
	protected $title;

	/**
	 * The value for the text field.
	 * @var        string
	 */
	protected $text;

	/**
	 * The value for the author_id field.
	 * @var        int
	 */
	protected $author_id;

	/**
	 * The value for the author_name field.
	 * @var        string
	 */
	protected $author_name;

	/**
	 * The value for the author_email field.
	 * @var        string
	 */
	protected $author_email;

	/**
	 * The value for the author_website field.
	 * @var        string
	 */
	protected $author_website;

	/**
	 * The value for the created_at field.
	 * @var        string
	 */
	protected $created_at;

	/**
	 * @var        sfGuardUser
	 */
	protected $aAuthor;

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
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [commentable_model] column value.
	 * 
	 * @return     string
	 */
	public function getCommentableModel()
	{
		return $this->commentable_model;
	}

	/**
	 * Get the [commentable_id] column value.
	 * 
	 * @return     string
	 */
	public function getCommentableId()
	{
		return $this->commentable_id;
	}

	/**
	 * Get the [comment_namespace] column value.
	 * 
	 * @return     string
	 */
	public function getCommentNamespace()
	{
		return $this->comment_namespace;
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
	 * Get the [text] column value.
	 * 
	 * @return     string
	 */
	public function getText()
	{
		return $this->text;
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
	 * Get the [author_name] column value.
	 * 
	 * @return     string
	 */
	public function getAuthorName()
	{
		return $this->author_name;
	}

	/**
	 * Get the [author_email] column value.
	 * 
	 * @return     string
	 */
	public function getAuthorEmail()
	{
		return $this->author_email;
	}

	/**
	 * Get the [author_website] column value.
	 * 
	 * @return     string
	 */
	public function getAuthorWebsite()
	{
		return $this->author_website;
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
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     sfComment The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = sfCommentPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [commentable_model] column.
	 * 
	 * @param      string $v new value
	 * @return     sfComment The current object (for fluent API support)
	 */
	public function setCommentableModel($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->commentable_model !== $v) {
			$this->commentable_model = $v;
			$this->modifiedColumns[] = sfCommentPeer::COMMENTABLE_MODEL;
		}

		return $this;
	} // setCommentableModel()

	/**
	 * Set the value of [commentable_id] column.
	 * 
	 * @param      string $v new value
	 * @return     sfComment The current object (for fluent API support)
	 */
	public function setCommentableId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->commentable_id !== $v) {
			$this->commentable_id = $v;
			$this->modifiedColumns[] = sfCommentPeer::COMMENTABLE_ID;
		}

		return $this;
	} // setCommentableId()

	/**
	 * Set the value of [comment_namespace] column.
	 * 
	 * @param      string $v new value
	 * @return     sfComment The current object (for fluent API support)
	 */
	public function setCommentNamespace($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->comment_namespace !== $v) {
			$this->comment_namespace = $v;
			$this->modifiedColumns[] = sfCommentPeer::COMMENT_NAMESPACE;
		}

		return $this;
	} // setCommentNamespace()

	/**
	 * Set the value of [title] column.
	 * 
	 * @param      string $v new value
	 * @return     sfComment The current object (for fluent API support)
	 */
	public function setTitle($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = sfCommentPeer::TITLE;
		}

		return $this;
	} // setTitle()

	/**
	 * Set the value of [text] column.
	 * 
	 * @param      string $v new value
	 * @return     sfComment The current object (for fluent API support)
	 */
	public function setText($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->text !== $v) {
			$this->text = $v;
			$this->modifiedColumns[] = sfCommentPeer::TEXT;
		}

		return $this;
	} // setText()

	/**
	 * Set the value of [author_id] column.
	 * 
	 * @param      int $v new value
	 * @return     sfComment The current object (for fluent API support)
	 */
	public function setAuthorId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->author_id !== $v) {
			$this->author_id = $v;
			$this->modifiedColumns[] = sfCommentPeer::AUTHOR_ID;
		}

		if ($this->aAuthor !== null && $this->aAuthor->getId() !== $v) {
			$this->aAuthor = null;
		}

		return $this;
	} // setAuthorId()

	/**
	 * Set the value of [author_name] column.
	 * 
	 * @param      string $v new value
	 * @return     sfComment The current object (for fluent API support)
	 */
	public function setAuthorName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->author_name !== $v) {
			$this->author_name = $v;
			$this->modifiedColumns[] = sfCommentPeer::AUTHOR_NAME;
		}

		return $this;
	} // setAuthorName()

	/**
	 * Set the value of [author_email] column.
	 * 
	 * @param      string $v new value
	 * @return     sfComment The current object (for fluent API support)
	 */
	public function setAuthorEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->author_email !== $v) {
			$this->author_email = $v;
			$this->modifiedColumns[] = sfCommentPeer::AUTHOR_EMAIL;
		}

		return $this;
	} // setAuthorEmail()

	/**
	 * Set the value of [author_website] column.
	 * 
	 * @param      string $v new value
	 * @return     sfComment The current object (for fluent API support)
	 */
	public function setAuthorWebsite($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->author_website !== $v) {
			$this->author_website = $v;
			$this->modifiedColumns[] = sfCommentPeer::AUTHOR_WEBSITE;
		}

		return $this;
	} // setAuthorWebsite()

	/**
	 * Sets the value of [created_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     sfComment The current object (for fluent API support)
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
				$this->modifiedColumns[] = sfCommentPeer::CREATED_AT;
			}
		} // if either are not null

		return $this;
	} // setCreatedAt()

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

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->commentable_model = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->commentable_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->comment_namespace = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->title = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->text = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->author_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->author_name = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->author_email = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->author_website = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->created_at = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 11; // 11 = sfCommentPeer::NUM_COLUMNS - sfCommentPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating sfComment object", $e);
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
			$con = Propel::getConnection(sfCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = sfCommentPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aAuthor = null;
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
			$con = Propel::getConnection(sfCommentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BasesfComment:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				sfCommentQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BasesfComment:delete:post') as $callable)
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
			$con = Propel::getConnection(sfCommentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BasesfComment:save:pre') as $callable)
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
				if (!$this->isColumnModified(sfCommentPeer::CREATED_AT))
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
				foreach (sfMixer::getCallables('BasesfComment:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				sfCommentPeer::addInstanceToPool($this);
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

			if ($this->isNew() ) {
				$this->modifiedColumns[] = sfCommentPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(sfCommentPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.sfCommentPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += sfCommentPeer::doUpdate($this, $con);
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


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aAuthor !== null) {
				if (!$this->aAuthor->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAuthor->getValidationFailures());
				}
			}


			if (($retval = sfCommentPeer::doValidate($this, $columns)) !== true) {
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
		$pos = sfCommentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCommentableModel();
				break;
			case 2:
				return $this->getCommentableId();
				break;
			case 3:
				return $this->getCommentNamespace();
				break;
			case 4:
				return $this->getTitle();
				break;
			case 5:
				return $this->getText();
				break;
			case 6:
				return $this->getAuthorId();
				break;
			case 7:
				return $this->getAuthorName();
				break;
			case 8:
				return $this->getAuthorEmail();
				break;
			case 9:
				return $this->getAuthorWebsite();
				break;
			case 10:
				return $this->getCreatedAt();
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
		$keys = sfCommentPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCommentableModel(),
			$keys[2] => $this->getCommentableId(),
			$keys[3] => $this->getCommentNamespace(),
			$keys[4] => $this->getTitle(),
			$keys[5] => $this->getText(),
			$keys[6] => $this->getAuthorId(),
			$keys[7] => $this->getAuthorName(),
			$keys[8] => $this->getAuthorEmail(),
			$keys[9] => $this->getAuthorWebsite(),
			$keys[10] => $this->getCreatedAt(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aAuthor) {
				$result['Author'] = $this->aAuthor->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = sfCommentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCommentableModel($value);
				break;
			case 2:
				$this->setCommentableId($value);
				break;
			case 3:
				$this->setCommentNamespace($value);
				break;
			case 4:
				$this->setTitle($value);
				break;
			case 5:
				$this->setText($value);
				break;
			case 6:
				$this->setAuthorId($value);
				break;
			case 7:
				$this->setAuthorName($value);
				break;
			case 8:
				$this->setAuthorEmail($value);
				break;
			case 9:
				$this->setAuthorWebsite($value);
				break;
			case 10:
				$this->setCreatedAt($value);
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
		$keys = sfCommentPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCommentableModel($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCommentableId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCommentNamespace($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTitle($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setText($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAuthorId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setAuthorName($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setAuthorEmail($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setAuthorWebsite($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCreatedAt($arr[$keys[10]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(sfCommentPeer::DATABASE_NAME);

		if ($this->isColumnModified(sfCommentPeer::ID)) $criteria->add(sfCommentPeer::ID, $this->id);
		if ($this->isColumnModified(sfCommentPeer::COMMENTABLE_MODEL)) $criteria->add(sfCommentPeer::COMMENTABLE_MODEL, $this->commentable_model);
		if ($this->isColumnModified(sfCommentPeer::COMMENTABLE_ID)) $criteria->add(sfCommentPeer::COMMENTABLE_ID, $this->commentable_id);
		if ($this->isColumnModified(sfCommentPeer::COMMENT_NAMESPACE)) $criteria->add(sfCommentPeer::COMMENT_NAMESPACE, $this->comment_namespace);
		if ($this->isColumnModified(sfCommentPeer::TITLE)) $criteria->add(sfCommentPeer::TITLE, $this->title);
		if ($this->isColumnModified(sfCommentPeer::TEXT)) $criteria->add(sfCommentPeer::TEXT, $this->text);
		if ($this->isColumnModified(sfCommentPeer::AUTHOR_ID)) $criteria->add(sfCommentPeer::AUTHOR_ID, $this->author_id);
		if ($this->isColumnModified(sfCommentPeer::AUTHOR_NAME)) $criteria->add(sfCommentPeer::AUTHOR_NAME, $this->author_name);
		if ($this->isColumnModified(sfCommentPeer::AUTHOR_EMAIL)) $criteria->add(sfCommentPeer::AUTHOR_EMAIL, $this->author_email);
		if ($this->isColumnModified(sfCommentPeer::AUTHOR_WEBSITE)) $criteria->add(sfCommentPeer::AUTHOR_WEBSITE, $this->author_website);
		if ($this->isColumnModified(sfCommentPeer::CREATED_AT)) $criteria->add(sfCommentPeer::CREATED_AT, $this->created_at);

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
		$criteria = new Criteria(sfCommentPeer::DATABASE_NAME);
		$criteria->add(sfCommentPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of sfComment (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setCommentableModel($this->commentable_model);
		$copyObj->setCommentableId($this->commentable_id);
		$copyObj->setCommentNamespace($this->comment_namespace);
		$copyObj->setTitle($this->title);
		$copyObj->setText($this->text);
		$copyObj->setAuthorId($this->author_id);
		$copyObj->setAuthorName($this->author_name);
		$copyObj->setAuthorEmail($this->author_email);
		$copyObj->setAuthorWebsite($this->author_website);
		$copyObj->setCreatedAt($this->created_at);

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
	 * @return     sfComment Clone of current object.
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
	 * @return     sfCommentPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new sfCommentPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a sfGuardUser object.
	 *
	 * @param      sfGuardUser $v
	 * @return     sfComment The current object (for fluent API support)
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
			$v->addsfComment($this);
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
				 $this->aAuthor->addsfComments($this);
			 */
		}
		return $this->aAuthor;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->commentable_model = null;
		$this->commentable_id = null;
		$this->comment_namespace = null;
		$this->title = null;
		$this->text = null;
		$this->author_id = null;
		$this->author_name = null;
		$this->author_email = null;
		$this->author_website = null;
		$this->created_at = null;
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
		} // if ($deep)

		$this->aAuthor = null;
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BasesfComment:' . $name))
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

} // BasesfComment