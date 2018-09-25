<?php


/**
 * Base static class for performing query and update operations on the 'esq_bar_associations' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseBarAssociationPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'propel';

	/** the table name for this class */
	const TABLE_NAME = 'esq_bar_associations';

	/** the related Propel class for this table */
	const OM_CLASS = 'BarAssociation';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'lib.model.BarAssociation';

	/** the related TableMap class for this table */
	const TM_CLASS = 'BarAssociationTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 13;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the NAME field */
	const NAME = 'esq_bar_associations.NAME';

	/** the column name for the ABBREVIATION field */
	const ABBREVIATION = 'esq_bar_associations.ABBREVIATION';

	/** the column name for the PRIMARY_CONTACT_EMAIL field */
	const PRIMARY_CONTACT_EMAIL = 'esq_bar_associations.PRIMARY_CONTACT_EMAIL';

	/** the column name for the CONTACT_INFO field */
	const CONTACT_INFO = 'esq_bar_associations.CONTACT_INFO';

	/** the column name for the NOTES field */
	const NOTES = 'esq_bar_associations.NOTES';

	/** the column name for the PASSWORD field */
	const PASSWORD = 'esq_bar_associations.PASSWORD';

	/** the column name for the LAST_LOGIN field */
	const LAST_LOGIN = 'esq_bar_associations.LAST_LOGIN';

	/** the column name for the AFFINITY_EXPIRATION_DATE field */
	const AFFINITY_EXPIRATION_DATE = 'esq_bar_associations.AFFINITY_EXPIRATION_DATE';

	/** the column name for the AFFINITY_START_DATE field */
	const AFFINITY_START_DATE = 'esq_bar_associations.AFFINITY_START_DATE';

	/** the column name for the ID field */
	const ID = 'esq_bar_associations.ID';

	/** the column name for the CREATED_AT field */
	const CREATED_AT = 'esq_bar_associations.CREATED_AT';

	/** the column name for the UPDATED_AT field */
	const UPDATED_AT = 'esq_bar_associations.UPDATED_AT';

	/** the column name for the SLUG field */
	const SLUG = 'esq_bar_associations.SLUG';

	/**
	 * An identiy map to hold any loaded instances of BarAssociation objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array BarAssociation[]
	 */
	public static $instances = array();


	// symfony behavior
	
	/**
	 * Indicates whether the current model includes I18N.
	 */
	const IS_I18N = false;

	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Name', 'Abbreviation', 'PrimaryContactEmail', 'ContactInfo', 'Notes', 'Password', 'LastLogin', 'AffinityExpirationDate', 'AffinityStartDate', 'Id', 'CreatedAt', 'UpdatedAt', 'Slug', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('name', 'abbreviation', 'primaryContactEmail', 'contactInfo', 'notes', 'password', 'lastLogin', 'affinityExpirationDate', 'affinityStartDate', 'id', 'createdAt', 'updatedAt', 'slug', ),
		BasePeer::TYPE_COLNAME => array (self::NAME, self::ABBREVIATION, self::PRIMARY_CONTACT_EMAIL, self::CONTACT_INFO, self::NOTES, self::PASSWORD, self::LAST_LOGIN, self::AFFINITY_EXPIRATION_DATE, self::AFFINITY_START_DATE, self::ID, self::CREATED_AT, self::UPDATED_AT, self::SLUG, ),
		BasePeer::TYPE_RAW_COLNAME => array ('NAME', 'ABBREVIATION', 'PRIMARY_CONTACT_EMAIL', 'CONTACT_INFO', 'NOTES', 'PASSWORD', 'LAST_LOGIN', 'AFFINITY_EXPIRATION_DATE', 'AFFINITY_START_DATE', 'ID', 'CREATED_AT', 'UPDATED_AT', 'SLUG', ),
		BasePeer::TYPE_FIELDNAME => array ('name', 'abbreviation', 'primary_contact_email', 'contact_info', 'notes', 'password', 'last_login', 'affinity_expiration_date', 'affinity_start_date', 'id', 'created_at', 'updated_at', 'slug', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Name' => 0, 'Abbreviation' => 1, 'PrimaryContactEmail' => 2, 'ContactInfo' => 3, 'Notes' => 4, 'Password' => 5, 'LastLogin' => 6, 'AffinityExpirationDate' => 7, 'AffinityStartDate' => 8, 'Id' => 9, 'CreatedAt' => 10, 'UpdatedAt' => 11, 'Slug' => 12, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('name' => 0, 'abbreviation' => 1, 'primaryContactEmail' => 2, 'contactInfo' => 3, 'notes' => 4, 'password' => 5, 'lastLogin' => 6, 'affinityExpirationDate' => 7, 'affinityStartDate' => 8, 'id' => 9, 'createdAt' => 10, 'updatedAt' => 11, 'slug' => 12, ),
		BasePeer::TYPE_COLNAME => array (self::NAME => 0, self::ABBREVIATION => 1, self::PRIMARY_CONTACT_EMAIL => 2, self::CONTACT_INFO => 3, self::NOTES => 4, self::PASSWORD => 5, self::LAST_LOGIN => 6, self::AFFINITY_EXPIRATION_DATE => 7, self::AFFINITY_START_DATE => 8, self::ID => 9, self::CREATED_AT => 10, self::UPDATED_AT => 11, self::SLUG => 12, ),
		BasePeer::TYPE_RAW_COLNAME => array ('NAME' => 0, 'ABBREVIATION' => 1, 'PRIMARY_CONTACT_EMAIL' => 2, 'CONTACT_INFO' => 3, 'NOTES' => 4, 'PASSWORD' => 5, 'LAST_LOGIN' => 6, 'AFFINITY_EXPIRATION_DATE' => 7, 'AFFINITY_START_DATE' => 8, 'ID' => 9, 'CREATED_AT' => 10, 'UPDATED_AT' => 11, 'SLUG' => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('name' => 0, 'abbreviation' => 1, 'primary_contact_email' => 2, 'contact_info' => 3, 'notes' => 4, 'password' => 5, 'last_login' => 6, 'affinity_expiration_date' => 7, 'affinity_start_date' => 8, 'id' => 9, 'created_at' => 10, 'updated_at' => 11, 'slug' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	/**
	 * Translates a fieldname to another type
	 *
	 * @param      string $name field name
	 * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @param      string $toType   One of the class type constants
	 * @return     string translated name of the field.
	 * @throws     PropelException - if the specified name could not be found in the fieldname mappings.
	 */
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	/**
	 * Returns an array of field names.
	 *
	 * @param      string $type The type of fieldnames to return:
	 *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     array A list of field names
	 */

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	/**
	 * Convenience method which changes table.column to alias.column.
	 *
	 * Using this method you can maintain SQL abstraction while using column aliases.
	 * <code>
	 *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
	 *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
	 * </code>
	 * @param      string $alias The alias for the current table.
	 * @param      string $column The column name for current table. (i.e. BarAssociationPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(BarAssociationPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      Criteria $criteria object containing the columns to add.
	 * @param      string   $alias    optional table alias
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria, $alias = null)
	{
		if (null === $alias) {
			$criteria->addSelectColumn(BarAssociationPeer::NAME);
			$criteria->addSelectColumn(BarAssociationPeer::ABBREVIATION);
			$criteria->addSelectColumn(BarAssociationPeer::PRIMARY_CONTACT_EMAIL);
			$criteria->addSelectColumn(BarAssociationPeer::CONTACT_INFO);
			$criteria->addSelectColumn(BarAssociationPeer::NOTES);
			$criteria->addSelectColumn(BarAssociationPeer::PASSWORD);
			$criteria->addSelectColumn(BarAssociationPeer::LAST_LOGIN);
			$criteria->addSelectColumn(BarAssociationPeer::AFFINITY_EXPIRATION_DATE);
			$criteria->addSelectColumn(BarAssociationPeer::AFFINITY_START_DATE);
			$criteria->addSelectColumn(BarAssociationPeer::ID);
			$criteria->addSelectColumn(BarAssociationPeer::CREATED_AT);
			$criteria->addSelectColumn(BarAssociationPeer::UPDATED_AT);
			$criteria->addSelectColumn(BarAssociationPeer::SLUG);
		} else {
			$criteria->addSelectColumn($alias . '.NAME');
			$criteria->addSelectColumn($alias . '.ABBREVIATION');
			$criteria->addSelectColumn($alias . '.PRIMARY_CONTACT_EMAIL');
			$criteria->addSelectColumn($alias . '.CONTACT_INFO');
			$criteria->addSelectColumn($alias . '.NOTES');
			$criteria->addSelectColumn($alias . '.PASSWORD');
			$criteria->addSelectColumn($alias . '.LAST_LOGIN');
			$criteria->addSelectColumn($alias . '.AFFINITY_EXPIRATION_DATE');
			$criteria->addSelectColumn($alias . '.AFFINITY_START_DATE');
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.CREATED_AT');
			$criteria->addSelectColumn($alias . '.UPDATED_AT');
			$criteria->addSelectColumn($alias . '.SLUG');
		}
	}

	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @return     int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
		// we may modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(BarAssociationPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			BarAssociationPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(BarAssociationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseBarAssociationPeer', $criteria, $con);
		}

		// BasePeer returns a PDOStatement
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}
	/**
	 * Method to select one object from the DB.
	 *
	 * @param      Criteria $criteria object used to create the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     BarAssociation
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = BarAssociationPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	/**
	 * Method to do selects.
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return BarAssociationPeer::populateObjects(BarAssociationPeer::doSelectStmt($criteria, $con));
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
	 *
	 * Use this method directly if you want to work with an executed statement durirectly (for example
	 * to perform your own object hydration).
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con The connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     PDOStatement The executed PDOStatement object.
	 * @see        BasePeer::doSelect()
	 */
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(BarAssociationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			BarAssociationPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);
		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseBarAssociationPeer', $criteria, $con);
		}


		// BasePeer returns a PDOStatement
		return BasePeer::doSelect($criteria, $con);
	}
	/**
	 * Adds an object to the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doSelect*()
	 * methods in your stub classes -- you may need to explicitly add objects
	 * to the cache in order to ensure that the same objects are always returned by doSelect*()
	 * and retrieveByPK*() calls.
	 *
	 * @param      BarAssociation $value A BarAssociation object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(BarAssociation $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getId();
			} // if key === null
			self::$instances[$key] = $obj;
		}
	}

	/**
	 * Removes an object from the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doDelete
	 * methods in your stub classes -- you may need to explicitly remove objects
	 * from the cache in order to prevent returning objects that no longer exist.
	 *
	 * @param      mixed $value A BarAssociation object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof BarAssociation) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or BarAssociation object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} // removeInstanceFromPool()

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
	 * @return     BarAssociation Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
	 * @see        getPrimaryKeyHash()
	 */
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; // just to be explicit
	}
	
	/**
	 * Clear the instance pool.
	 *
	 * @return     void
	 */
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	/**
	 * Method to invalidate the instance pool of all tables related to esq_bar_associations
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool()
	{
		// Invalidate objects in CustomerPeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		CustomerPeer::clearInstancePool();
		// Invalidate objects in CouponPeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		CouponPeer::clearInstancePool();
	}

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     string A string version of PK or NULL if the components of primary key in result array are all null.
	 */
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
		// If the PK cannot be derived from the row, return NULL.
		if ($row[$startcol + 9] === null) {
			return null;
		}
		return (string) $row[$startcol + 9];
	}

	/**
	 * Retrieves the primary key from the DB resultset row 
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, an array of the primary key columns will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     mixed The primary key of the row
	 */
	public static function getPrimaryKeyFromRow($row, $startcol = 0)
	{
		return (int) $row[$startcol + 9];
	}
	
	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
		// set the class once to avoid overhead in the loop
		$cls = BarAssociationPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = BarAssociationPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = BarAssociationPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				BarAssociationPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}
	/**
	 * Populates an object of the default type or an object that inherit from the default.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     array (BarAssociation object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = BarAssociationPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = BarAssociationPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + BarAssociationPeer::NUM_COLUMNS;
		} else {
			$cls = BarAssociationPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			BarAssociationPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}
	/**
	 * Returns the TableMap related to this peer.
	 * This method is not needed for general use but a specific application could have a need.
	 * @return     TableMap
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	/**
	 * Add a TableMap instance to the database for this peer class.
	 */
	public static function buildTableMap()
	{
	  $dbMap = Propel::getDatabaseMap(BaseBarAssociationPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseBarAssociationPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new BarAssociationTableMap());
	  }
	}

	/**
	 * The class that the Peer will make instances of.
	 *
	 * If $withPrefix is true, the returned path
	 * uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @param      boolean $withPrefix Whether or not to return the path with the class name
	 * @return     string path.to.ClassName
	 */
	public static function getOMClass($withPrefix = true)
	{
		return $withPrefix ? BarAssociationPeer::CLASS_DEFAULT : BarAssociationPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a BarAssociation or Criteria object.
	 *
	 * @param      mixed $values Criteria or BarAssociation object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(BarAssociationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from BarAssociation object
		}

		if ($criteria->containsKey(BarAssociationPeer::ID) && $criteria->keyContainsValue(BarAssociationPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.BarAssociationPeer::ID.')');
		}


		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		return $pk;
	}

	/**
	 * Method perform an UPDATE on the database, given a BarAssociation or Criteria object.
	 *
	 * @param      mixed $values Criteria or BarAssociation object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(BarAssociationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(BarAssociationPeer::ID);
			$value = $criteria->remove(BarAssociationPeer::ID);
			if ($value) {
				$selectCriteria->add(BarAssociationPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(BarAssociationPeer::TABLE_NAME);
			}

		} else { // $values is BarAssociation object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the esq_bar_associations table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(BarAssociationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			BarAssociationPeer::doOnDeleteSetNull(new Criteria(BarAssociationPeer::DATABASE_NAME), $con);
			$affectedRows += BasePeer::doDeleteAll(BarAssociationPeer::TABLE_NAME, $con, BarAssociationPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			BarAssociationPeer::clearInstancePool();
			BarAssociationPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a BarAssociation or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or BarAssociation object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param      PropelPDO $con the connection to use
	 * @return     int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(BarAssociationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof BarAssociation) { // it's a model object
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(BarAssociationPeer::ID, (array) $values, Criteria::IN);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			
			// cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
			$c = clone $criteria;
			BarAssociationPeer::doOnDeleteSetNull($c, $con);
			
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			if ($values instanceof Criteria) {
				BarAssociationPeer::clearInstancePool();
			} elseif ($values instanceof BarAssociation) { // it's a model object
				BarAssociationPeer::removeInstanceFromPool($values);
			} else { // it's a primary key, or an array of pks
				foreach ((array) $values as $singleval) {
					BarAssociationPeer::removeInstanceFromPool($singleval);
				}
			}
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			BarAssociationPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * This is a method for emulating ON DELETE SET NULL DBs that don't support this
	 * feature (like MySQL or SQLite).
	 *
	 * This method is not very speedy because it must perform a query first to get
	 * the implicated records and then perform the deletes by calling those Peer classes.
	 *
	 * This method should be used within a transaction if possible.
	 *
	 * @param      Criteria $criteria
	 * @param      PropelPDO $con
	 * @return     void
	 */
	protected static function doOnDeleteSetNull(Criteria $criteria, PropelPDO $con)
	{

		// first find the objects that are implicated by the $criteria
		$objects = BarAssociationPeer::doSelect($criteria, $con);
		foreach ($objects as $obj) {

			// set fkey col in related Customer rows to NULL
			$selectCriteria = new Criteria(BarAssociationPeer::DATABASE_NAME);
			$updateValues = new Criteria(BarAssociationPeer::DATABASE_NAME);
			$selectCriteria->add(CustomerPeer::BAR_ASSOCIATION_ID, $obj->getId());
			$updateValues->add(CustomerPeer::BAR_ASSOCIATION_ID, null);

			BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

			// set fkey col in related Coupon rows to NULL
			$selectCriteria = new Criteria(BarAssociationPeer::DATABASE_NAME);
			$updateValues = new Criteria(BarAssociationPeer::DATABASE_NAME);
			$selectCriteria->add(CouponPeer::BAR_ASSOCIATION_ID, $obj->getId());
			$updateValues->add(CouponPeer::BAR_ASSOCIATION_ID, null);

			BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

		}
	}

	/**
	 * Validates all modified columns of given BarAssociation object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      BarAssociation $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(BarAssociation $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(BarAssociationPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(BarAssociationPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		return BasePeer::doValidate(BarAssociationPeer::DATABASE_NAME, BarAssociationPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     BarAssociation
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = BarAssociationPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(BarAssociationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(BarAssociationPeer::DATABASE_NAME);
		$criteria->add(BarAssociationPeer::ID, $pk);

		$v = BarAssociationPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	/**
	 * Retrieve multiple objects by pkey.
	 *
	 * @param      array $pks List of primary keys
	 * @param      PropelPDO $con the connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(BarAssociationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(BarAssociationPeer::DATABASE_NAME);
			$criteria->add(BarAssociationPeer::ID, $pks, Criteria::IN);
			$objs = BarAssociationPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

	// symfony behavior
	
	/**
	 * Returns an array of arrays that contain columns in each unique index.
	 *
	 * @return array
	 */
	static public function getUniqueColumnNames()
	{
	  return array(array('name'), array('abbreviation'), array('slug'));
	}

	// symfony_behaviors behavior
	
	/**
	 * Returns the name of the hook to call from inside the supplied method.
	 *
	 * @param string $method The calling method
	 *
	 * @return string A hook name for {@link sfMixer}
	 *
	 * @throws LogicException If the method name is not recognized
	 */
	static private function getMixerPreSelectHook($method)
	{
	  if (preg_match('/^do(Select|Count)(Join(All(Except)?)?|Stmt)?/', $method, $match))
	  {
	    return sprintf('BaseBarAssociationPeer:%s:%1$s', 'Count' == $match[1] ? 'doCount' : $match[0]);
	  }
	
	  throw new LogicException(sprintf('Unrecognized function "%s"', $method));
	}

} // BaseBarAssociationPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseBarAssociationPeer::buildTableMap();

