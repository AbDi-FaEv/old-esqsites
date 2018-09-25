<?php


/**
 * Base class that represents a row from the 'esq_website_attributes' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseWebsiteAttribute extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'WebsiteAttributePeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        WebsiteAttributePeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        string
	 */
	protected $id;

	/**
	 * The value for the cg_code field.
	 * @var        string
	 */
	protected $cg_code;

	/**
	 * The value for the rank field.
	 * @var        int
	 */
	protected $rank;

	/**
	 * The value for the description field.
	 * @var        string
	 */
	protected $description;

	/**
	 * The value for the max_main_menu_pages field.
	 * @var        int
	 */
	protected $max_main_menu_pages;

	/**
	 * The value for the max_emails field.
	 * @var        int
	 */
	protected $max_emails;

	/**
	 * The value for the price field.
	 * @var        double
	 */
	protected $price;

	/**
	 * The value for the setup_price field.
	 * @var        double
	 */
	protected $setup_price;

	/**
	 * The value for the status field.
	 * @var        int
	 */
	protected $status;

	/**
	 * The value for the includes_payment_page field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $includes_payment_page;

	/**
	 * @var        array Website[] Collection to store aggregation of Website objects.
	 */
	protected $collWebsites;

	/**
	 * @var        array CouponToHostingPlanLink[] Collection to store aggregation of CouponToHostingPlanLink objects.
	 */
	protected $collCouponToHostingPlanLinks;

	/**
	 * @var        array Coupon[] Collection to store aggregation of Coupon objects.
	 */
	protected $collCoupons;

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
		$this->includes_payment_page = false;
	}

	/**
	 * Initializes internal state of BaseWebsiteAttribute object.
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
	 * Get the [cg_code] column value.
	 * 
	 * @return     string
	 */
	public function getCgCode()
	{
		return $this->cg_code;
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
	 * Get the [description] column value.
	 * 
	 * @return     string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Get the [max_main_menu_pages] column value.
	 * 
	 * @return     int
	 */
	public function getMaxMainMenuPages()
	{
		return $this->max_main_menu_pages;
	}

	/**
	 * Get the [max_emails] column value.
	 * 
	 * @return     int
	 */
	public function getMaxEmails()
	{
		return $this->max_emails;
	}

	/**
	 * Get the [price] column value.
	 * 
	 * @return     double
	 */
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * Get the [setup_price] column value.
	 * 
	 * @return     double
	 */
	public function getSetupPrice()
	{
		return $this->setup_price;
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
	 * Get the [includes_payment_page] column value.
	 * 
	 * @return     boolean
	 */
	public function getIncludesPaymentPage()
	{
		return $this->includes_payment_page;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      string $v new value
	 * @return     WebsiteAttribute The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = WebsiteAttributePeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [cg_code] column.
	 * 
	 * @param      string $v new value
	 * @return     WebsiteAttribute The current object (for fluent API support)
	 */
	public function setCgCode($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cg_code !== $v) {
			$this->cg_code = $v;
			$this->modifiedColumns[] = WebsiteAttributePeer::CG_CODE;
		}

		return $this;
	} // setCgCode()

	/**
	 * Set the value of [rank] column.
	 * 
	 * @param      int $v new value
	 * @return     WebsiteAttribute The current object (for fluent API support)
	 */
	public function setRank($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->rank !== $v) {
			$this->rank = $v;
			$this->modifiedColumns[] = WebsiteAttributePeer::RANK;
		}

		return $this;
	} // setRank()

	/**
	 * Set the value of [description] column.
	 * 
	 * @param      string $v new value
	 * @return     WebsiteAttribute The current object (for fluent API support)
	 */
	public function setDescription($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = WebsiteAttributePeer::DESCRIPTION;
		}

		return $this;
	} // setDescription()

	/**
	 * Set the value of [max_main_menu_pages] column.
	 * 
	 * @param      int $v new value
	 * @return     WebsiteAttribute The current object (for fluent API support)
	 */
	public function setMaxMainMenuPages($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->max_main_menu_pages !== $v) {
			$this->max_main_menu_pages = $v;
			$this->modifiedColumns[] = WebsiteAttributePeer::MAX_MAIN_MENU_PAGES;
		}

		return $this;
	} // setMaxMainMenuPages()

	/**
	 * Set the value of [max_emails] column.
	 * 
	 * @param      int $v new value
	 * @return     WebsiteAttribute The current object (for fluent API support)
	 */
	public function setMaxEmails($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->max_emails !== $v) {
			$this->max_emails = $v;
			$this->modifiedColumns[] = WebsiteAttributePeer::MAX_EMAILS;
		}

		return $this;
	} // setMaxEmails()

	/**
	 * Set the value of [price] column.
	 * 
	 * @param      double $v new value
	 * @return     WebsiteAttribute The current object (for fluent API support)
	 */
	public function setPrice($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->price !== $v) {
			$this->price = $v;
			$this->modifiedColumns[] = WebsiteAttributePeer::PRICE;
		}

		return $this;
	} // setPrice()

	/**
	 * Set the value of [setup_price] column.
	 * 
	 * @param      double $v new value
	 * @return     WebsiteAttribute The current object (for fluent API support)
	 */
	public function setSetupPrice($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->setup_price !== $v) {
			$this->setup_price = $v;
			$this->modifiedColumns[] = WebsiteAttributePeer::SETUP_PRICE;
		}

		return $this;
	} // setSetupPrice()

	/**
	 * Set the value of [status] column.
	 * 
	 * @param      int $v new value
	 * @return     WebsiteAttribute The current object (for fluent API support)
	 */
	public function setStatus($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = WebsiteAttributePeer::STATUS;
		}

		return $this;
	} // setStatus()

	/**
	 * Set the value of [includes_payment_page] column.
	 * 
	 * @param      boolean $v new value
	 * @return     WebsiteAttribute The current object (for fluent API support)
	 */
	public function setIncludesPaymentPage($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->includes_payment_page !== $v || $this->isNew()) {
			$this->includes_payment_page = $v;
			$this->modifiedColumns[] = WebsiteAttributePeer::INCLUDES_PAYMENT_PAGE;
		}

		return $this;
	} // setIncludesPaymentPage()

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
			if ($this->includes_payment_page !== false) {
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
			$this->cg_code = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->rank = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->description = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->max_main_menu_pages = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->max_emails = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->price = ($row[$startcol + 6] !== null) ? (double) $row[$startcol + 6] : null;
			$this->setup_price = ($row[$startcol + 7] !== null) ? (double) $row[$startcol + 7] : null;
			$this->status = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->includes_payment_page = ($row[$startcol + 9] !== null) ? (boolean) $row[$startcol + 9] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 10; // 10 = WebsiteAttributePeer::NUM_COLUMNS - WebsiteAttributePeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating WebsiteAttribute object", $e);
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
			$con = Propel::getConnection(WebsiteAttributePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = WebsiteAttributePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collWebsites = null;

			$this->collCouponToHostingPlanLinks = null;

			$this->collCoupons = null;
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
			$con = Propel::getConnection(WebsiteAttributePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseWebsiteAttribute:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				WebsiteAttributeQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseWebsiteAttribute:delete:post') as $callable)
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
			$con = Propel::getConnection(WebsiteAttributePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseWebsiteAttribute:save:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseWebsiteAttribute:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				WebsiteAttributePeer::addInstanceToPool($this);
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


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows = 1;
					$this->setNew(false);
				} else {
					$affectedRows = WebsiteAttributePeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collWebsites !== null) {
				foreach ($this->collWebsites as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCouponToHostingPlanLinks !== null) {
				foreach ($this->collCouponToHostingPlanLinks as $referrerFK) {
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


			if (($retval = WebsiteAttributePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collWebsites !== null) {
					foreach ($this->collWebsites as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCouponToHostingPlanLinks !== null) {
					foreach ($this->collCouponToHostingPlanLinks as $referrerFK) {
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
		$pos = WebsiteAttributePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCgCode();
				break;
			case 2:
				return $this->getRank();
				break;
			case 3:
				return $this->getDescription();
				break;
			case 4:
				return $this->getMaxMainMenuPages();
				break;
			case 5:
				return $this->getMaxEmails();
				break;
			case 6:
				return $this->getPrice();
				break;
			case 7:
				return $this->getSetupPrice();
				break;
			case 8:
				return $this->getStatus();
				break;
			case 9:
				return $this->getIncludesPaymentPage();
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
		$keys = WebsiteAttributePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCgCode(),
			$keys[2] => $this->getRank(),
			$keys[3] => $this->getDescription(),
			$keys[4] => $this->getMaxMainMenuPages(),
			$keys[5] => $this->getMaxEmails(),
			$keys[6] => $this->getPrice(),
			$keys[7] => $this->getSetupPrice(),
			$keys[8] => $this->getStatus(),
			$keys[9] => $this->getIncludesPaymentPage(),
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
		$pos = WebsiteAttributePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCgCode($value);
				break;
			case 2:
				$this->setRank($value);
				break;
			case 3:
				$this->setDescription($value);
				break;
			case 4:
				$this->setMaxMainMenuPages($value);
				break;
			case 5:
				$this->setMaxEmails($value);
				break;
			case 6:
				$this->setPrice($value);
				break;
			case 7:
				$this->setSetupPrice($value);
				break;
			case 8:
				$this->setStatus($value);
				break;
			case 9:
				$this->setIncludesPaymentPage($value);
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
		$keys = WebsiteAttributePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCgCode($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRank($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDescription($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMaxMainMenuPages($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMaxEmails($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPrice($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setSetupPrice($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setStatus($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setIncludesPaymentPage($arr[$keys[9]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(WebsiteAttributePeer::DATABASE_NAME);

		if ($this->isColumnModified(WebsiteAttributePeer::ID)) $criteria->add(WebsiteAttributePeer::ID, $this->id);
		if ($this->isColumnModified(WebsiteAttributePeer::CG_CODE)) $criteria->add(WebsiteAttributePeer::CG_CODE, $this->cg_code);
		if ($this->isColumnModified(WebsiteAttributePeer::RANK)) $criteria->add(WebsiteAttributePeer::RANK, $this->rank);
		if ($this->isColumnModified(WebsiteAttributePeer::DESCRIPTION)) $criteria->add(WebsiteAttributePeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(WebsiteAttributePeer::MAX_MAIN_MENU_PAGES)) $criteria->add(WebsiteAttributePeer::MAX_MAIN_MENU_PAGES, $this->max_main_menu_pages);
		if ($this->isColumnModified(WebsiteAttributePeer::MAX_EMAILS)) $criteria->add(WebsiteAttributePeer::MAX_EMAILS, $this->max_emails);
		if ($this->isColumnModified(WebsiteAttributePeer::PRICE)) $criteria->add(WebsiteAttributePeer::PRICE, $this->price);
		if ($this->isColumnModified(WebsiteAttributePeer::SETUP_PRICE)) $criteria->add(WebsiteAttributePeer::SETUP_PRICE, $this->setup_price);
		if ($this->isColumnModified(WebsiteAttributePeer::STATUS)) $criteria->add(WebsiteAttributePeer::STATUS, $this->status);
		if ($this->isColumnModified(WebsiteAttributePeer::INCLUDES_PAYMENT_PAGE)) $criteria->add(WebsiteAttributePeer::INCLUDES_PAYMENT_PAGE, $this->includes_payment_page);

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
		$criteria = new Criteria(WebsiteAttributePeer::DATABASE_NAME);
		$criteria->add(WebsiteAttributePeer::ID, $this->id);

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
	 * @param      object $copyObj An object of WebsiteAttribute (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setId($this->id);
		$copyObj->setCgCode($this->cg_code);
		$copyObj->setRank($this->rank);
		$copyObj->setDescription($this->description);
		$copyObj->setMaxMainMenuPages($this->max_main_menu_pages);
		$copyObj->setMaxEmails($this->max_emails);
		$copyObj->setPrice($this->price);
		$copyObj->setSetupPrice($this->setup_price);
		$copyObj->setStatus($this->status);
		$copyObj->setIncludesPaymentPage($this->includes_payment_page);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getWebsites() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addWebsite($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCouponToHostingPlanLinks() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCouponToHostingPlanLink($relObj->copy($deepCopy));
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
	 * @return     WebsiteAttribute Clone of current object.
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
	 * @return     WebsiteAttributePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new WebsiteAttributePeer();
		}
		return self::$peer;
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
	 * By default this just sets the collWebsites collection to an empty array (like clearcollWebsites());
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
	 * Gets an array of Website objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this WebsiteAttribute is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Website[] List of Website objects
	 * @throws     PropelException
	 */
	public function getWebsites($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collWebsites || null !== $criteria) {
			if ($this->isNew() && null === $this->collWebsites) {
				// return empty collection
				$this->initWebsites();
			} else {
				$collWebsites = WebsiteQuery::create(null, $criteria)
					->filterByWebsiteAttribute($this)
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
	 * Returns the number of related Website objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Website objects.
	 * @throws     PropelException
	 */
	public function countWebsites(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
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
					->filterByWebsiteAttribute($this)
					->count($con);
			}
		} else {
			return count($this->collWebsites);
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
	public function addWebsite(Website $l)
	{
		if ($this->collWebsites === null) {
			$this->initWebsites();
		}
		if (!$this->collWebsites->contains($l)) { // only add it if the **same** object is not already associated
			$this->collWebsites[]= $l;
			$l->setWebsiteAttribute($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this WebsiteAttribute is new, it will return
	 * an empty collection; or if this WebsiteAttribute has previously
	 * been saved, it will retrieve related Websites from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in WebsiteAttribute.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Website[] List of Website objects
	 */
	public function getWebsitesJoinCustomer($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = WebsiteQuery::create(null, $criteria);
		$query->joinWith('Customer', $join_behavior);

		return $this->getWebsites($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this WebsiteAttribute is new, it will return
	 * an empty collection; or if this WebsiteAttribute has previously
	 * been saved, it will retrieve related Websites from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in WebsiteAttribute.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Website[] List of Website objects
	 */
	public function getWebsitesJoinPrimaryDomain($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = WebsiteQuery::create(null, $criteria);
		$query->joinWith('PrimaryDomain', $join_behavior);

		return $this->getWebsites($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this WebsiteAttribute is new, it will return
	 * an empty collection; or if this WebsiteAttribute has previously
	 * been saved, it will retrieve related Websites from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in WebsiteAttribute.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Website[] List of Website objects
	 */
	public function getWebsitesJoinWebsiteTemplate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = WebsiteQuery::create(null, $criteria);
		$query->joinWith('WebsiteTemplate', $join_behavior);

		return $this->getWebsites($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this WebsiteAttribute is new, it will return
	 * an empty collection; or if this WebsiteAttribute has previously
	 * been saved, it will retrieve related Websites from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in WebsiteAttribute.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Website[] List of Website objects
	 */
	public function getWebsitesJoinHost($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = WebsiteQuery::create(null, $criteria);
		$query->joinWith('Host', $join_behavior);

		return $this->getWebsites($query, $con);
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
	 * If this WebsiteAttribute is new, it will return
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
					->filterByWebsiteAttribute($this)
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
					->filterByWebsiteAttribute($this)
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
			$l->setWebsiteAttribute($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this WebsiteAttribute is new, it will return
	 * an empty collection; or if this WebsiteAttribute has previously
	 * been saved, it will retrieve related CouponToHostingPlanLinks from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in WebsiteAttribute.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array CouponToHostingPlanLink[] List of CouponToHostingPlanLink objects
	 */
	public function getCouponToHostingPlanLinksJoinCoupon($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = CouponToHostingPlanLinkQuery::create(null, $criteria);
		$query->joinWith('Coupon', $join_behavior);

		return $this->getCouponToHostingPlanLinks($query, $con);
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
	 * By default this just sets the collCoupons collection to an empty collection (like clearCoupons());
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
	 * Gets a collection of Coupon objects related by a many-to-many relationship
	 * to the current object by way of the esq_coupons_to_hosting_plans cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this WebsiteAttribute is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Coupon[] List of Coupon objects
	 */
	public function getCoupons($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCoupons || null !== $criteria) {
			if ($this->isNew() && null === $this->collCoupons) {
				// return empty collection
				$this->initCoupons();
			} else {
				$collCoupons = CouponQuery::create(null, $criteria)
					->filterByWebsiteAttribute($this)
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
	 * Gets the number of Coupon objects related by a many-to-many relationship
	 * to the current object by way of the esq_coupons_to_hosting_plans cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Coupon objects
	 */
	public function countCoupons($criteria = null, $distinct = false, PropelPDO $con = null)
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
					->filterByWebsiteAttribute($this)
					->count($con);
			}
		} else {
			return count($this->collCoupons);
		}
	}

	/**
	 * Associate a Coupon object to this object
	 * through the esq_coupons_to_hosting_plans cross reference table.
	 *
	 * @param      Coupon $coupon The CouponToHostingPlanLink object to relate
	 * @return     void
	 */
	public function addCoupon($coupon)
	{
		if ($this->collCoupons === null) {
			$this->initCoupons();
		}
		if (!$this->collCoupons->contains($coupon)) { // only add it if the **same** object is not already associated
			$couponToHostingPlanLink = new CouponToHostingPlanLink();
			$couponToHostingPlanLink->setCoupon($coupon);
			$this->addCouponToHostingPlanLink($couponToHostingPlanLink);

			$this->collCoupons[]= $coupon;
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->cg_code = null;
		$this->rank = null;
		$this->description = null;
		$this->max_main_menu_pages = null;
		$this->max_emails = null;
		$this->price = null;
		$this->setup_price = null;
		$this->status = null;
		$this->includes_payment_page = null;
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
			if ($this->collWebsites) {
				foreach ((array) $this->collWebsites as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCouponToHostingPlanLinks) {
				foreach ((array) $this->collCouponToHostingPlanLinks as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collWebsites = null;
		$this->collCouponToHostingPlanLinks = null;
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseWebsiteAttribute:' . $name))
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

} // BaseWebsiteAttribute
