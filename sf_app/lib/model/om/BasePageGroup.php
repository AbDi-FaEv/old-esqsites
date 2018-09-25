<?php


/**
 * Base class that represents a row from the 'esq_page_groups' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BasePageGroup extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'PageGroupPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        PageGroupPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        string
	 */
	protected $id;

	/**
	 * The value for the page_id field.
	 * @var        string
	 */
	protected $page_id;

	/**
	 * The value for the rank field.
	 * @var        int
	 */
	protected $rank;

	/**
	 * The value for the data field.
	 * @var        string
	 */
	protected $data;

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
	 * @var        Page
	 */
	protected $aPage;

	/**
	 * @var        array PageEntry[] Collection to store aggregation of PageEntry objects.
	 */
	protected $collPageEntrys;

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

	// sortable behavior
	
	/**
	 * Queries to be executed in the save transaction
	 * @var        array
	 */
	protected $sortableQueries = array();

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
	 * Get the [page_id] column value.
	 * 
	 * @return     string
	 */
	public function getPageId()
	{
		return $this->page_id;
	}

	/**
	 * Get the [rank] column value.
	 * 
	 * @return     int
	 */
	public function getRank()
	{
		return $this->rank;
	}

	/**
	 * Get the [data] column value.
	 * 
	 * @return     string
	 */
	public function getData()
	{
		return $this->data;
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
	 * @return     PageGroup The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PageGroupPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [page_id] column.
	 * 
	 * @param      string $v new value
	 * @return     PageGroup The current object (for fluent API support)
	 */
	public function setPageId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->page_id !== $v) {
			$this->page_id = $v;
			$this->modifiedColumns[] = PageGroupPeer::PAGE_ID;
		}

		if ($this->aPage !== null && $this->aPage->getId() !== $v) {
			$this->aPage = null;
		}

		return $this;
	} // setPageId()

	/**
	 * Set the value of [rank] column.
	 * 
	 * @param      int $v new value
	 * @return     PageGroup The current object (for fluent API support)
	 */
	public function setRank($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->rank !== $v) {
			$this->rank = $v;
			$this->modifiedColumns[] = PageGroupPeer::RANK;
		}

		return $this;
	} // setRank()

	/**
	 * Set the value of [data] column.
	 * 
	 * @param      string $v new value
	 * @return     PageGroup The current object (for fluent API support)
	 */
	public function setData($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->data !== $v) {
			$this->data = $v;
			$this->modifiedColumns[] = PageGroupPeer::DATA;
		}

		return $this;
	} // setData()

	/**
	 * Sets the value of [created_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     PageGroup The current object (for fluent API support)
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
				$this->modifiedColumns[] = PageGroupPeer::CREATED_AT;
			}
		} // if either are not null

		return $this;
	} // setCreatedAt()

	/**
	 * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     PageGroup The current object (for fluent API support)
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
				$this->modifiedColumns[] = PageGroupPeer::UPDATED_AT;
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
			$this->page_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->rank = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->data = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->created_at = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->updated_at = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 6; // 6 = PageGroupPeer::NUM_COLUMNS - PageGroupPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating PageGroup object", $e);
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

		if ($this->aPage !== null && $this->page_id !== $this->aPage->getId()) {
			$this->aPage = null;
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
			$con = Propel::getConnection(PageGroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = PageGroupPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aPage = null;
			$this->collPageEntrys = null;

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
			$con = Propel::getConnection(PageGroupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// sortable behavior
			
			PageGroupPeer::shiftRank(-1, $this->getRank() + 1, null, $this->getPageId(), $con);
			PageGroupPeer::clearInstancePool();

			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BasePageGroup:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				PageGroupQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BasePageGroup:delete:post') as $callable)
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
			$con = Propel::getConnection(PageGroupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// sortable behavior
			$this->processSortableQueries($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BasePageGroup:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			  	$con->commit();
			    return $affectedRows;
			  }
			}

			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
				// sortable behavior
				if (!$this->isColumnModified(PageGroupPeer::RANK_COL)) {
					$this->setRank(PageGroupQuery::create()->getMaxRank($this->getPageId(), $con) + 1);
				}

				// timestampable behavior
				if (!$this->isColumnModified(PageGroupPeer::CREATED_AT)) {
					$this->setCreatedAt(time());
				}
				if (!$this->isColumnModified(PageGroupPeer::UPDATED_AT)) {
					$this->setUpdatedAt(time());
				}
			} else {
				$ret = $ret && $this->preUpdate($con);
				// timestampable behavior
				if ($this->isModified() && !$this->isColumnModified(PageGroupPeer::UPDATED_AT)) {
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
				foreach (sfMixer::getCallables('BasePageGroup:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				PageGroupPeer::addInstanceToPool($this);
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

			if ($this->aPage !== null) {
				if ($this->aPage->isModified() || $this->aPage->isNew()) {
					$affectedRows += $this->aPage->save($con);
				}
				$this->setPage($this->aPage);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setNew(false);
				} else {
					$affectedRows += PageGroupPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collPageEntrys !== null) {
				foreach ($this->collPageEntrys as $referrerFK) {
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

			if ($this->aPage !== null) {
				if (!$this->aPage->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPage->getValidationFailures());
				}
			}


			if (($retval = PageGroupPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collPageEntrys !== null) {
					foreach ($this->collPageEntrys as $referrerFK) {
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
		$pos = PageGroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getPageId();
				break;
			case 2:
				return $this->getRank();
				break;
			case 3:
				return $this->getData();
				break;
			case 4:
				return $this->getCreatedAt();
				break;
			case 5:
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
		$keys = PageGroupPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPageId(),
			$keys[2] => $this->getRank(),
			$keys[3] => $this->getData(),
			$keys[4] => $this->getCreatedAt(),
			$keys[5] => $this->getUpdatedAt(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aPage) {
				$result['Page'] = $this->aPage->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = PageGroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setPageId($value);
				break;
			case 2:
				$this->setRank($value);
				break;
			case 3:
				$this->setData($value);
				break;
			case 4:
				$this->setCreatedAt($value);
				break;
			case 5:
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
		$keys = PageGroupPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPageId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRank($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setData($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUpdatedAt($arr[$keys[5]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(PageGroupPeer::DATABASE_NAME);

		if ($this->isColumnModified(PageGroupPeer::ID)) $criteria->add(PageGroupPeer::ID, $this->id);
		if ($this->isColumnModified(PageGroupPeer::PAGE_ID)) $criteria->add(PageGroupPeer::PAGE_ID, $this->page_id);
		if ($this->isColumnModified(PageGroupPeer::RANK)) $criteria->add(PageGroupPeer::RANK, $this->rank);
		if ($this->isColumnModified(PageGroupPeer::DATA)) $criteria->add(PageGroupPeer::DATA, $this->data);
		if ($this->isColumnModified(PageGroupPeer::CREATED_AT)) $criteria->add(PageGroupPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(PageGroupPeer::UPDATED_AT)) $criteria->add(PageGroupPeer::UPDATED_AT, $this->updated_at);

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
		$criteria = new Criteria(PageGroupPeer::DATABASE_NAME);
		$criteria->add(PageGroupPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of PageGroup (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setId($this->id);
		$copyObj->setPageId($this->page_id);
		$copyObj->setRank($this->rank);
		$copyObj->setData($this->data);
		$copyObj->setCreatedAt($this->created_at);
		$copyObj->setUpdatedAt($this->updated_at);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getPageEntrys() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPageEntry($relObj->copy($deepCopy));
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
	 * @return     PageGroup Clone of current object.
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
	 * @return     PageGroupPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new PageGroupPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Page object.
	 *
	 * @param      Page $v
	 * @return     PageGroup The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setPage(Page $v = null)
	{
		if ($v === null) {
			$this->setPageId(NULL);
		} else {
			$this->setPageId($v->getId());
		}

		$this->aPage = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Page object, it will not be re-added.
		if ($v !== null) {
			$v->addPageGroup($this);
		}

		return $this;
	}


	/**
	 * Get the associated Page object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Page The associated Page object.
	 * @throws     PropelException
	 */
	public function getPage(PropelPDO $con = null)
	{
		if ($this->aPage === null && (($this->page_id !== "" && $this->page_id !== null))) {
			$this->aPage = PageQuery::create()->findPk($this->page_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aPage->addPageGroups($this);
			 */
		}
		return $this->aPage;
	}

	/**
	 * Clears out the collPageEntrys collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPageEntrys()
	 */
	public function clearPageEntrys()
	{
		$this->collPageEntrys = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPageEntrys collection.
	 *
	 * By default this just sets the collPageEntrys collection to an empty array (like clearcollPageEntrys());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initPageEntrys()
	{
		$this->collPageEntrys = new PropelObjectCollection();
		$this->collPageEntrys->setModel('PageEntry');
	}

	/**
	 * Gets an array of PageEntry objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this PageGroup is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array PageEntry[] List of PageEntry objects
	 * @throws     PropelException
	 */
	public function getPageEntrys($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collPageEntrys || null !== $criteria) {
			if ($this->isNew() && null === $this->collPageEntrys) {
				// return empty collection
				$this->initPageEntrys();
			} else {
				$collPageEntrys = PageEntryQuery::create(null, $criteria)
					->filterByPageGroup($this)
					->find($con);
				if (null !== $criteria) {
					return $collPageEntrys;
				}
				$this->collPageEntrys = $collPageEntrys;
			}
		}
		return $this->collPageEntrys;
	}

	/**
	 * Returns the number of related PageEntry objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related PageEntry objects.
	 * @throws     PropelException
	 */
	public function countPageEntrys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collPageEntrys || null !== $criteria) {
			if ($this->isNew() && null === $this->collPageEntrys) {
				return 0;
			} else {
				$query = PageEntryQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPageGroup($this)
					->count($con);
			}
		} else {
			return count($this->collPageEntrys);
		}
	}

	/**
	 * Method called to associate a PageEntry object to this object
	 * through the PageEntry foreign key attribute.
	 *
	 * @param      PageEntry $l PageEntry
	 * @return     void
	 * @throws     PropelException
	 */
	public function addPageEntry(PageEntry $l)
	{
		if ($this->collPageEntrys === null) {
			$this->initPageEntrys();
		}
		if (!$this->collPageEntrys->contains($l)) { // only add it if the **same** object is not already associated
			$this->collPageEntrys[]= $l;
			$l->setPageGroup($this);
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->page_id = null;
		$this->rank = null;
		$this->data = null;
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
			if ($this->collPageEntrys) {
				foreach ((array) $this->collPageEntrys as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collPageEntrys = null;
		$this->aPage = null;
	}

	// sortable behavior
	
	/**
	 * Wrap the getter for scope value
	 *
	 * @return    int
	 */
	public function getScopeValue()
	{
		return $this->page_id;
	}
	
	/**
	 * Wrap the setter for scope value
	 *
	 * @param     int
	 * @return    PageGroup
	 */
	public function setScopeValue($v)
	{
		return $this->setPageId($v);
	}
	
	/**
	 * Check if the object is first in the list, i.e. if it has 1 for rank
	 *
	 * @return    boolean
	 */
	public function isFirst()
	{
		return $this->getRank() == 1;
	}
	
	/**
	 * Check if the object is last in the list, i.e. if its rank is the highest rank
	 *
	 * @param     PropelPDO  $con      optional connection
	 *
	 * @return    boolean
	 */
	public function isLast(PropelPDO $con = null)
	{
		return $this->getRank() == PageGroupQuery::create()->getMaxRank($this->getPageId(), $con);
	}
	
	/**
	 * Get the next item in the list, i.e. the one for which rank is immediately higher
	 *
	 * @param     PropelPDO  $con      optional connection
	 *
	 * @return    PageGroup
	 */
	public function getNext(PropelPDO $con = null)
	{
		return PageGroupQuery::create()
			->filterByRank($this->getRank() + 1)
			->inList($this->getPageId())
			->findOne($con);
	}
	
	/**
	 * Get the previous item in the list, i.e. the one for which rank is immediately lower
	 *
	 * @param     PropelPDO  $con      optional connection
	 *
	 * @return    PageGroup
	 */
	public function getPrevious(PropelPDO $con = null)
	{
		return PageGroupQuery::create()
			->filterByRank($this->getRank() - 1)
			->inList($this->getPageId())
			->findOne($con);
	}
	
	/**
	 * Insert at specified rank
	 * The modifications are not persisted until the object is saved.
	 *
	 * @param     integer    $rank rank value
	 * @param     PropelPDO  $con      optional connection
	 *
	 * @return    PageGroup the current object
	 *
	 * @throws    PropelException
	 */
	public function insertAtRank($rank, PropelPDO $con = null)
	{
		if (null === $this->getPageId()) {
			throw new PropelException('The scope must be defined before inserting an object in a suite');
		}
		$maxRank = PageGroupQuery::create()->getMaxRank($this->getPageId(), $con);
		if ($rank < 1 || $rank > $maxRank + 1) {
			throw new PropelException('Invalid rank ' . $rank);
		}
		// move the object in the list, at the given rank
		$this->setRank($rank);
		if ($rank != $maxRank + 1) {
			// Keep the list modification query for the save() transaction
			$this->sortableQueries []= array(
				'callable'  => array('PageGroupPeer', 'shiftRank'),
				'arguments' => array(1, $rank, null, $this->getPageId())
			);
		}
		
		return $this;
	}
	
	/**
	 * Insert in the last rank
	 * The modifications are not persisted until the object is saved.
	 *
	 * @param PropelPDO $con optional connection
	 *
	 * @return    PageGroup the current object
	 *
	 * @throws    PropelException
	 */
	public function insertAtBottom(PropelPDO $con = null)
	{
		if (null === $this->getPageId()) {
			throw new PropelException('The scope must be defined before inserting an object in a suite');
		}
		$this->setRank(PageGroupQuery::create()->getMaxRank($this->getPageId(), $con) + 1);
		
		return $this;
	}
	
	/**
	 * Insert in the first rank
	 * The modifications are not persisted until the object is saved.
	 *
	 * @return    PageGroup the current object
	 */
	public function insertAtTop()
	{
		return $this->insertAtRank(1);
	}
	
	/**
	 * Move the object to a new rank, and shifts the rank
	 * Of the objects inbetween the old and new rank accordingly
	 *
	 * @param     integer   $newRank rank value
	 * @param     PropelPDO $con optional connection
	 *
	 * @return    PageGroup the current object
	 *
	 * @throws    PropelException
	 */
	public function moveToRank($newRank, PropelPDO $con = null)
	{
		if ($this->isNew()) {
			throw new PropelException('New objects cannot be moved. Please use insertAtRank() instead');
		}
		if ($con === null) {
			$con = Propel::getConnection(PageGroupPeer::DATABASE_NAME);
		}
		if ($newRank < 1 || $newRank > PageGroupQuery::create()->getMaxRank($this->getPageId(), $con)) {
			throw new PropelException('Invalid rank ' . $newRank);
		}
	
		$oldRank = $this->getRank();
		if ($oldRank == $newRank) {
			return $this;
		}
		
		$con->beginTransaction();
		try {
			// shift the objects between the old and the new rank
			$delta = ($oldRank < $newRank) ? -1 : 1;
			PageGroupPeer::shiftRank($delta, min($oldRank, $newRank), max($oldRank, $newRank), $this->getPageId(), $con);
				
			// move the object to its new rank
			$this->setRank($newRank);
			$this->save($con);
			
			$con->commit();
			return $this;
		} catch (Exception $e) {
			$con->rollback();
			throw $e;
		}
	}
	
	/**
	 * Exchange the rank of the object with the one passed as argument, and saves both objects
	 *
	 * @param     PageGroup $object
	 * @param     PropelPDO $con optional connection
	 *
	 * @return    PageGroup the current object
	 *
	 * @throws Exception if the database cannot execute the two updates
	 */
	public function swapWith($object, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(PageGroupPeer::DATABASE_NAME);
		}
		$con->beginTransaction();
		try {
			$oldRank = $this->getRank();
			$newRank = $object->getRank();
			$this->setRank($newRank);
			$this->save($con);
			$object->setRank($oldRank);
			$object->save($con);
			$con->commit();
			
			return $this;
		} catch (Exception $e) {
			$con->rollback();
			throw $e;
		}
	}
	
	/**
	 * Move the object higher in the list, i.e. exchanges its rank with the one of the previous object
	 *
	 * @param     PropelPDO $con optional connection
	 *
	 * @return    PageGroup the current object
	 */
	public function moveUp(PropelPDO $con = null)
	{
		if ($this->isFirst()) {
			return $this;
		}
		if ($con === null) {
			$con = Propel::getConnection(PageGroupPeer::DATABASE_NAME);
		}
		$con->beginTransaction();
		try {
			$prev = $this->getPrevious($con);
			$this->swapWith($prev, $con);
			$con->commit();
			
			return $this;
		} catch (Exception $e) {
			$con->rollback();
			throw $e;
		}
	}
	
	/**
	 * Move the object higher in the list, i.e. exchanges its rank with the one of the next object
	 *
	 * @param     PropelPDO $con optional connection
	 *
	 * @return    PageGroup the current object
	 */
	public function moveDown(PropelPDO $con = null)
	{
		if ($this->isLast($con)) {
			return $this;
		}
		if ($con === null) {
			$con = Propel::getConnection(PageGroupPeer::DATABASE_NAME);
		}
		$con->beginTransaction();
		try {
			$next = $this->getNext($con);
			$this->swapWith($next, $con);
			$con->commit();
			
			return $this;
		} catch (Exception $e) {
			$con->rollback();
			throw $e;
		}
	}
	
	/**
	 * Move the object to the top of the list
	 *
	 * @param     PropelPDO $con optional connection
	 *
	 * @return    PageGroup the current object
	 */
	public function moveToTop(PropelPDO $con = null)
	{
		if ($this->isFirst()) {
			return $this;
		}
		return $this->moveToRank(1, $con);
	}
	
	/**
	 * Move the object to the bottom of the list
	 *
	 * @param     PropelPDO $con optional connection
	 *
	 * @return integer the old object's rank
	 */
	public function moveToBottom(PropelPDO $con = null)
	{
		if ($this->isLast($con)) {
			return false;
		}
		if ($con === null) {
			$con = Propel::getConnection(PageGroupPeer::DATABASE_NAME);
		}
		$con->beginTransaction();
		try {
			$bottom = PageGroupQuery::create()->getMaxRank($this->getPageId(), $con);
			$res = $this->moveToRank($bottom, $con);
			$con->commit();
			
			return $res;
		} catch (Exception $e) {
			$con->rollback();
			throw $e;
		}
	}
	
	/**
	 * Removes the current object from the list.
	 * The modifications are not persisted until the object is saved.
	 *
	 * @return    PageGroup the current object
	 */
	public function removeFromList()
	{
		// Keep the list modification query for the save() transaction
		$this->sortableQueries []= array(
			'callable'  => array('PageGroupPeer', 'shiftRank'),
			'arguments' => array(-1, $this->getRank() + 1, null, $this->getPageId())
		);
		// remove the object from the list
		$this->setRank(null);
		$this->setPageId(null);
		
		return $this;
	}
	
	/**
	 * Execute queries that were saved to be run inside the save transaction
	 */
	protected function processSortableQueries($con)
	{
		foreach ($this->sortableQueries as $query) {
			$query['arguments'][]= $con;
			call_user_func_array($query['callable'], $query['arguments']);
		}
		$this->sortableQueries = array();
	}

	// timestampable behavior
	
	/**
	 * Mark the current object so that the update date doesn't get updated during next save
	 *
	 * @return     PageGroup The current object (for fluent API support)
	 */
	public function keepUpdateDateUnchanged()
	{
		$this->modifiedColumns[] = PageGroupPeer::UPDATED_AT;
		return $this;
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BasePageGroup:' . $name))
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

} // BasePageGroup
