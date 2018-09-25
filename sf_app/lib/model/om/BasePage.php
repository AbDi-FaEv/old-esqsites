<?php


/**
 * Base class that represents a row from the 'esq_pages' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BasePage extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'PagePeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        PagePeer
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
	 * The value for the template_type_id field.
	 * @var        string
	 */
	protected $template_type_id;

	/**
	 * The value for the menu_type field.
	 * @var        int
	 */
	protected $menu_type;

	/**
	 * The value for the page_content_display_type_id field.
	 * @var        string
	 */
	protected $page_content_display_type_id;

	/**
	 * The value for the rank field.
	 * @var        int
	 */
	protected $rank;

	/**
	 * The value for the title field.
	 * @var        string
	 */
	protected $title;

	/**
	 * The value for the meta_title field.
	 * @var        string
	 */
	protected $meta_title;

	/**
	 * The value for the meta_description field.
	 * @var        string
	 */
	protected $meta_description;

	/**
	 * The value for the meta_keywords field.
	 * @var        string
	 */
	protected $meta_keywords;

	/**
	 * The value for the meta_content field.
	 * @var        string
	 */
	protected $meta_content;

	/**
	 * The value for the link_name field.
	 * @var        string
	 */
	protected $link_name;

	/**
	 * The value for the url field.
	 * @var        string
	 */
	protected $url;

	/**
	 * The value for the status field.
	 * @var        int
	 */
	protected $status;

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
	 * @var        TemplateType
	 */
	protected $aTemplateType;

	/**
	 * @var        PageContentDisplayType
	 */
	protected $aPageContentDisplayType;

	/**
	 * @var        array PageGroup[] Collection to store aggregation of PageGroup objects.
	 */
	protected $collPageGroups;

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
	 * Get the [website_id] column value.
	 * 
	 * @return     string
	 */
	public function getWebsiteId()
	{
		return $this->website_id;
	}

	/**
	 * Get the [template_type_id] column value.
	 * 
	 * @return     string
	 */
	public function getTemplateTypeId()
	{
		return $this->template_type_id;
	}

	/**
	 * Get the [menu_type] column value.
	 * 
	 * @return     int
	 */
	public function getMenuType()
	{
		return $this->menu_type;
	}

	/**
	 * Get the [page_content_display_type_id] column value.
	 * 
	 * @return     string
	 */
	public function getPageContentDisplayTypeId()
	{
		return $this->page_content_display_type_id;
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
	 * Get the [title] column value.
	 * 
	 * @return     string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * Get the [meta_title] column value.
	 * 
	 * @return     string
	 */
	public function getMetaTitle()
	{
		return $this->meta_title;
	}

	/**
	 * Get the [meta_description] column value.
	 * 
	 * @return     string
	 */
	public function getMetaDescription()
	{
		return $this->meta_description;
	}

	/**
	 * Get the [meta_keywords] column value.
	 * 
	 * @return     string
	 */
	public function getMetaKeywords()
	{
		return $this->meta_keywords;
	}

	/**
	 * Get the [meta_content] column value.
	 * 
	 * @return     string
	 */
	public function getMetaContent()
	{
		return $this->meta_content;
	}

	/**
	 * Get the [link_name] column value.
	 * 
	 * @return     string
	 */
	public function getLinkName()
	{
		return $this->link_name;
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
	 * @return     Page The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PagePeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [website_id] column.
	 * 
	 * @param      string $v new value
	 * @return     Page The current object (for fluent API support)
	 */
	public function setWebsiteId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->website_id !== $v) {
			$this->website_id = $v;
			$this->modifiedColumns[] = PagePeer::WEBSITE_ID;
		}

		if ($this->aWebsite !== null && $this->aWebsite->getId() !== $v) {
			$this->aWebsite = null;
		}

		return $this;
	} // setWebsiteId()

	/**
	 * Set the value of [template_type_id] column.
	 * 
	 * @param      string $v new value
	 * @return     Page The current object (for fluent API support)
	 */
	public function setTemplateTypeId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->template_type_id !== $v) {
			$this->template_type_id = $v;
			$this->modifiedColumns[] = PagePeer::TEMPLATE_TYPE_ID;
		}

		if ($this->aTemplateType !== null && $this->aTemplateType->getId() !== $v) {
			$this->aTemplateType = null;
		}

		return $this;
	} // setTemplateTypeId()

	/**
	 * Set the value of [menu_type] column.
	 * 
	 * @param      int $v new value
	 * @return     Page The current object (for fluent API support)
	 */
	public function setMenuType($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->menu_type !== $v) {
			$this->menu_type = $v;
			$this->modifiedColumns[] = PagePeer::MENU_TYPE;
		}

		return $this;
	} // setMenuType()

	/**
	 * Set the value of [page_content_display_type_id] column.
	 * 
	 * @param      string $v new value
	 * @return     Page The current object (for fluent API support)
	 */
	public function setPageContentDisplayTypeId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->page_content_display_type_id !== $v) {
			$this->page_content_display_type_id = $v;
			$this->modifiedColumns[] = PagePeer::PAGE_CONTENT_DISPLAY_TYPE_ID;
		}

		if ($this->aPageContentDisplayType !== null && $this->aPageContentDisplayType->getId() !== $v) {
			$this->aPageContentDisplayType = null;
		}

		return $this;
	} // setPageContentDisplayTypeId()

	/**
	 * Set the value of [rank] column.
	 * 
	 * @param      int $v new value
	 * @return     Page The current object (for fluent API support)
	 */
	public function setRank($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->rank !== $v) {
			$this->rank = $v;
			$this->modifiedColumns[] = PagePeer::RANK;
		}

		return $this;
	} // setRank()

	/**
	 * Set the value of [title] column.
	 * 
	 * @param      string $v new value
	 * @return     Page The current object (for fluent API support)
	 */
	public function setTitle($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = PagePeer::TITLE;
		}

		return $this;
	} // setTitle()

	/**
	 * Set the value of [meta_title] column.
	 * 
	 * @param      string $v new value
	 * @return     Page The current object (for fluent API support)
	 */
	public function setMetaTitle($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->meta_title !== $v) {
			$this->meta_title = $v;
			$this->modifiedColumns[] = PagePeer::META_TITLE;
		}

		return $this;
	} // setMetaTitle()

	/**
	 * Set the value of [meta_description] column.
	 * 
	 * @param      string $v new value
	 * @return     Page The current object (for fluent API support)
	 */
	public function setMetaDescription($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->meta_description !== $v) {
			$this->meta_description = $v;
			$this->modifiedColumns[] = PagePeer::META_DESCRIPTION;
		}

		return $this;
	} // setMetaDescription()

	/**
	 * Set the value of [meta_keywords] column.
	 * 
	 * @param      string $v new value
	 * @return     Page The current object (for fluent API support)
	 */
	public function setMetaKeywords($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->meta_keywords !== $v) {
			$this->meta_keywords = $v;
			$this->modifiedColumns[] = PagePeer::META_KEYWORDS;
		}

		return $this;
	} // setMetaKeywords()

	/**
	 * Set the value of [meta_content] column.
	 * 
	 * @param      string $v new value
	 * @return     Page The current object (for fluent API support)
	 */
	public function setMetaContent($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->meta_content !== $v) {
			$this->meta_content = $v;
			$this->modifiedColumns[] = PagePeer::META_CONTENT;
		}

		return $this;
	} // setMetaContent()

	/**
	 * Set the value of [link_name] column.
	 * 
	 * @param      string $v new value
	 * @return     Page The current object (for fluent API support)
	 */
	public function setLinkName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->link_name !== $v) {
			$this->link_name = $v;
			$this->modifiedColumns[] = PagePeer::LINK_NAME;
		}

		return $this;
	} // setLinkName()

	/**
	 * Set the value of [url] column.
	 * 
	 * @param      string $v new value
	 * @return     Page The current object (for fluent API support)
	 */
	public function setUrl($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->url !== $v) {
			$this->url = $v;
			$this->modifiedColumns[] = PagePeer::URL;
		}

		return $this;
	} // setUrl()

	/**
	 * Set the value of [status] column.
	 * 
	 * @param      int $v new value
	 * @return     Page The current object (for fluent API support)
	 */
	public function setStatus($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = PagePeer::STATUS;
		}

		return $this;
	} // setStatus()

	/**
	 * Sets the value of [created_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Page The current object (for fluent API support)
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
				$this->modifiedColumns[] = PagePeer::CREATED_AT;
			}
		} // if either are not null

		return $this;
	} // setCreatedAt()

	/**
	 * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Page The current object (for fluent API support)
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
				$this->modifiedColumns[] = PagePeer::UPDATED_AT;
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
			$this->website_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->template_type_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->menu_type = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->page_content_display_type_id = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->rank = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->title = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->meta_title = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->meta_description = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->meta_keywords = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->meta_content = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->link_name = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->url = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->status = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
			$this->created_at = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->updated_at = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 16; // 16 = PagePeer::NUM_COLUMNS - PagePeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Page object", $e);
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
		if ($this->aTemplateType !== null && $this->template_type_id !== $this->aTemplateType->getId()) {
			$this->aTemplateType = null;
		}
		if ($this->aPageContentDisplayType !== null && $this->page_content_display_type_id !== $this->aPageContentDisplayType->getId()) {
			$this->aPageContentDisplayType = null;
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
			$con = Propel::getConnection(PagePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = PagePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aWebsite = null;
			$this->aTemplateType = null;
			$this->aPageContentDisplayType = null;
			$this->collPageGroups = null;

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
			$con = Propel::getConnection(PagePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BasePage:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				PageQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BasePage:delete:post') as $callable)
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
			$con = Propel::getConnection(PagePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// sluggable behavior
			
			if ($this->isColumnModified(PagePeer::URL) && $this->getUrl()) {
				$this->setUrl($this->makeSlugUnique($this->getUrl()));
			} elseif (!$this->getUrl()) {
				$this->setUrl($this->createSlug());
			}
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BasePage:save:pre') as $callable)
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
				if (!$this->isColumnModified(PagePeer::CREATED_AT)) {
					$this->setCreatedAt(time());
				}
				if (!$this->isColumnModified(PagePeer::UPDATED_AT)) {
					$this->setUpdatedAt(time());
				}
			} else {
				$ret = $ret && $this->preUpdate($con);
				// timestampable behavior
				if ($this->isModified() && !$this->isColumnModified(PagePeer::UPDATED_AT)) {
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
				foreach (sfMixer::getCallables('BasePage:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				PagePeer::addInstanceToPool($this);
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

			if ($this->aTemplateType !== null) {
				if ($this->aTemplateType->isModified() || $this->aTemplateType->isNew()) {
					$affectedRows += $this->aTemplateType->save($con);
				}
				$this->setTemplateType($this->aTemplateType);
			}

			if ($this->aPageContentDisplayType !== null) {
				if ($this->aPageContentDisplayType->isModified() || $this->aPageContentDisplayType->isNew()) {
					$affectedRows += $this->aPageContentDisplayType->save($con);
				}
				$this->setPageContentDisplayType($this->aPageContentDisplayType);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setNew(false);
				} else {
					$affectedRows += PagePeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collPageGroups !== null) {
				foreach ($this->collPageGroups as $referrerFK) {
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

			if ($this->aTemplateType !== null) {
				if (!$this->aTemplateType->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTemplateType->getValidationFailures());
				}
			}

			if ($this->aPageContentDisplayType !== null) {
				if (!$this->aPageContentDisplayType->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPageContentDisplayType->getValidationFailures());
				}
			}


			if (($retval = PagePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collPageGroups !== null) {
					foreach ($this->collPageGroups as $referrerFK) {
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
		$pos = PagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getTemplateTypeId();
				break;
			case 3:
				return $this->getMenuType();
				break;
			case 4:
				return $this->getPageContentDisplayTypeId();
				break;
			case 5:
				return $this->getRank();
				break;
			case 6:
				return $this->getTitle();
				break;
			case 7:
				return $this->getMetaTitle();
				break;
			case 8:
				return $this->getMetaDescription();
				break;
			case 9:
				return $this->getMetaKeywords();
				break;
			case 10:
				return $this->getMetaContent();
				break;
			case 11:
				return $this->getLinkName();
				break;
			case 12:
				return $this->getUrl();
				break;
			case 13:
				return $this->getStatus();
				break;
			case 14:
				return $this->getCreatedAt();
				break;
			case 15:
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
		$keys = PagePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getWebsiteId(),
			$keys[2] => $this->getTemplateTypeId(),
			$keys[3] => $this->getMenuType(),
			$keys[4] => $this->getPageContentDisplayTypeId(),
			$keys[5] => $this->getRank(),
			$keys[6] => $this->getTitle(),
			$keys[7] => $this->getMetaTitle(),
			$keys[8] => $this->getMetaDescription(),
			$keys[9] => $this->getMetaKeywords(),
			$keys[10] => $this->getMetaContent(),
			$keys[11] => $this->getLinkName(),
			$keys[12] => $this->getUrl(),
			$keys[13] => $this->getStatus(),
			$keys[14] => $this->getCreatedAt(),
			$keys[15] => $this->getUpdatedAt(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aWebsite) {
				$result['Website'] = $this->aWebsite->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aTemplateType) {
				$result['TemplateType'] = $this->aTemplateType->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aPageContentDisplayType) {
				$result['PageContentDisplayType'] = $this->aPageContentDisplayType->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = PagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setTemplateTypeId($value);
				break;
			case 3:
				$this->setMenuType($value);
				break;
			case 4:
				$this->setPageContentDisplayTypeId($value);
				break;
			case 5:
				$this->setRank($value);
				break;
			case 6:
				$this->setTitle($value);
				break;
			case 7:
				$this->setMetaTitle($value);
				break;
			case 8:
				$this->setMetaDescription($value);
				break;
			case 9:
				$this->setMetaKeywords($value);
				break;
			case 10:
				$this->setMetaContent($value);
				break;
			case 11:
				$this->setLinkName($value);
				break;
			case 12:
				$this->setUrl($value);
				break;
			case 13:
				$this->setStatus($value);
				break;
			case 14:
				$this->setCreatedAt($value);
				break;
			case 15:
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
		$keys = PagePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setWebsiteId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTemplateTypeId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMenuType($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPageContentDisplayTypeId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRank($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTitle($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMetaTitle($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMetaDescription($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMetaKeywords($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMetaContent($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setLinkName($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setUrl($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setStatus($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCreatedAt($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setUpdatedAt($arr[$keys[15]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(PagePeer::DATABASE_NAME);

		if ($this->isColumnModified(PagePeer::ID)) $criteria->add(PagePeer::ID, $this->id);
		if ($this->isColumnModified(PagePeer::WEBSITE_ID)) $criteria->add(PagePeer::WEBSITE_ID, $this->website_id);
		if ($this->isColumnModified(PagePeer::TEMPLATE_TYPE_ID)) $criteria->add(PagePeer::TEMPLATE_TYPE_ID, $this->template_type_id);
		if ($this->isColumnModified(PagePeer::MENU_TYPE)) $criteria->add(PagePeer::MENU_TYPE, $this->menu_type);
		if ($this->isColumnModified(PagePeer::PAGE_CONTENT_DISPLAY_TYPE_ID)) $criteria->add(PagePeer::PAGE_CONTENT_DISPLAY_TYPE_ID, $this->page_content_display_type_id);
		if ($this->isColumnModified(PagePeer::RANK)) $criteria->add(PagePeer::RANK, $this->rank);
		if ($this->isColumnModified(PagePeer::TITLE)) $criteria->add(PagePeer::TITLE, $this->title);
		if ($this->isColumnModified(PagePeer::META_TITLE)) $criteria->add(PagePeer::META_TITLE, $this->meta_title);
		if ($this->isColumnModified(PagePeer::META_DESCRIPTION)) $criteria->add(PagePeer::META_DESCRIPTION, $this->meta_description);
		if ($this->isColumnModified(PagePeer::META_KEYWORDS)) $criteria->add(PagePeer::META_KEYWORDS, $this->meta_keywords);
		if ($this->isColumnModified(PagePeer::META_CONTENT)) $criteria->add(PagePeer::META_CONTENT, $this->meta_content);
		if ($this->isColumnModified(PagePeer::LINK_NAME)) $criteria->add(PagePeer::LINK_NAME, $this->link_name);
		if ($this->isColumnModified(PagePeer::URL)) $criteria->add(PagePeer::URL, $this->url);
		if ($this->isColumnModified(PagePeer::STATUS)) $criteria->add(PagePeer::STATUS, $this->status);
		if ($this->isColumnModified(PagePeer::CREATED_AT)) $criteria->add(PagePeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(PagePeer::UPDATED_AT)) $criteria->add(PagePeer::UPDATED_AT, $this->updated_at);

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
		$criteria = new Criteria(PagePeer::DATABASE_NAME);
		$criteria->add(PagePeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Page (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setId($this->id);
		$copyObj->setWebsiteId($this->website_id);
		$copyObj->setTemplateTypeId($this->template_type_id);
		$copyObj->setMenuType($this->menu_type);
		$copyObj->setPageContentDisplayTypeId($this->page_content_display_type_id);
		$copyObj->setRank($this->rank);
		$copyObj->setTitle($this->title);
		$copyObj->setMetaTitle($this->meta_title);
		$copyObj->setMetaDescription($this->meta_description);
		$copyObj->setMetaKeywords($this->meta_keywords);
		$copyObj->setMetaContent($this->meta_content);
		$copyObj->setLinkName($this->link_name);
		$copyObj->setUrl($this->url);
		$copyObj->setStatus($this->status);
		$copyObj->setCreatedAt($this->created_at);
		$copyObj->setUpdatedAt($this->updated_at);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getPageGroups() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPageGroup($relObj->copy($deepCopy));
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
	 * @return     Page Clone of current object.
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
	 * @return     PagePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new PagePeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Website object.
	 *
	 * @param      Website $v
	 * @return     Page The current object (for fluent API support)
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
			$v->addPage($this);
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
				 $this->aWebsite->addPages($this);
			 */
		}
		return $this->aWebsite;
	}

	/**
	 * Declares an association between this object and a TemplateType object.
	 *
	 * @param      TemplateType $v
	 * @return     Page The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setTemplateType(TemplateType $v = null)
	{
		if ($v === null) {
			$this->setTemplateTypeId(NULL);
		} else {
			$this->setTemplateTypeId($v->getId());
		}

		$this->aTemplateType = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the TemplateType object, it will not be re-added.
		if ($v !== null) {
			$v->addPage($this);
		}

		return $this;
	}


	/**
	 * Get the associated TemplateType object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     TemplateType The associated TemplateType object.
	 * @throws     PropelException
	 */
	public function getTemplateType(PropelPDO $con = null)
	{
		if ($this->aTemplateType === null && (($this->template_type_id !== "" && $this->template_type_id !== null))) {
			$this->aTemplateType = TemplateTypeQuery::create()->findPk($this->template_type_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aTemplateType->addPages($this);
			 */
		}
		return $this->aTemplateType;
	}

	/**
	 * Declares an association between this object and a PageContentDisplayType object.
	 *
	 * @param      PageContentDisplayType $v
	 * @return     Page The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setPageContentDisplayType(PageContentDisplayType $v = null)
	{
		if ($v === null) {
			$this->setPageContentDisplayTypeId(NULL);
		} else {
			$this->setPageContentDisplayTypeId($v->getId());
		}

		$this->aPageContentDisplayType = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the PageContentDisplayType object, it will not be re-added.
		if ($v !== null) {
			$v->addPage($this);
		}

		return $this;
	}


	/**
	 * Get the associated PageContentDisplayType object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     PageContentDisplayType The associated PageContentDisplayType object.
	 * @throws     PropelException
	 */
	public function getPageContentDisplayType(PropelPDO $con = null)
	{
		if ($this->aPageContentDisplayType === null && (($this->page_content_display_type_id !== "" && $this->page_content_display_type_id !== null))) {
			$this->aPageContentDisplayType = PageContentDisplayTypeQuery::create()->findPk($this->page_content_display_type_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aPageContentDisplayType->addPages($this);
			 */
		}
		return $this->aPageContentDisplayType;
	}

	/**
	 * Clears out the collPageGroups collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPageGroups()
	 */
	public function clearPageGroups()
	{
		$this->collPageGroups = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPageGroups collection.
	 *
	 * By default this just sets the collPageGroups collection to an empty array (like clearcollPageGroups());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initPageGroups()
	{
		$this->collPageGroups = new PropelObjectCollection();
		$this->collPageGroups->setModel('PageGroup');
	}

	/**
	 * Gets an array of PageGroup objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Page is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array PageGroup[] List of PageGroup objects
	 * @throws     PropelException
	 */
	public function getPageGroups($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collPageGroups || null !== $criteria) {
			if ($this->isNew() && null === $this->collPageGroups) {
				// return empty collection
				$this->initPageGroups();
			} else {
				$collPageGroups = PageGroupQuery::create(null, $criteria)
					->filterByPage($this)
					->find($con);
				if (null !== $criteria) {
					return $collPageGroups;
				}
				$this->collPageGroups = $collPageGroups;
			}
		}
		return $this->collPageGroups;
	}

	/**
	 * Returns the number of related PageGroup objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related PageGroup objects.
	 * @throws     PropelException
	 */
	public function countPageGroups(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collPageGroups || null !== $criteria) {
			if ($this->isNew() && null === $this->collPageGroups) {
				return 0;
			} else {
				$query = PageGroupQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPage($this)
					->count($con);
			}
		} else {
			return count($this->collPageGroups);
		}
	}

	/**
	 * Method called to associate a PageGroup object to this object
	 * through the PageGroup foreign key attribute.
	 *
	 * @param      PageGroup $l PageGroup
	 * @return     void
	 * @throws     PropelException
	 */
	public function addPageGroup(PageGroup $l)
	{
		if ($this->collPageGroups === null) {
			$this->initPageGroups();
		}
		if (!$this->collPageGroups->contains($l)) { // only add it if the **same** object is not already associated
			$this->collPageGroups[]= $l;
			$l->setPage($this);
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->website_id = null;
		$this->template_type_id = null;
		$this->menu_type = null;
		$this->page_content_display_type_id = null;
		$this->rank = null;
		$this->title = null;
		$this->meta_title = null;
		$this->meta_description = null;
		$this->meta_keywords = null;
		$this->meta_content = null;
		$this->link_name = null;
		$this->url = null;
		$this->status = null;
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
			if ($this->collPageGroups) {
				foreach ((array) $this->collPageGroups as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collPageGroups = null;
		$this->aWebsite = null;
		$this->aTemplateType = null;
		$this->aPageContentDisplayType = null;
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

	// sluggable behavior
	
	/**
	 * Wrap the setter for slug value
	 *
	 * @param   string
	 * @return  Page
	 */
	public function setSlug($v)
	{
		return $this->setUrl($v);
	}
	
	/**
	 * Wrap the getter for slug value
	 *
	 * @return  string 
	 */
	public function getSlug()
	{
		return $this->getUrl();
	}
	
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
		return '' . $this->cleanupSlugPart($this->getTitle()) . '';
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
		$slugAlreadyExists = PageQuery::create()
			->filterBySlug($slug2)
			->prune($this)
			->count();
		if ($slugAlreadyExists) {
			return $this->makeSlugUnique($slug, $separator, ++$increment);
		} else {
			return $slug2;
		}
	}

	// timestampable behavior
	
	/**
	 * Mark the current object so that the update date doesn't get updated during next save
	 *
	 * @return     Page The current object (for fluent API support)
	 */
	public function keepUpdateDateUnchanged()
	{
		$this->modifiedColumns[] = PagePeer::UPDATED_AT;
		return $this;
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BasePage:' . $name))
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

} // BasePage
