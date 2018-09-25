<?php


/**
 * Base static class for performing query and update operations on the 'esq_websites' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseWebsitePeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'propel';

	/** the table name for this class */
	const TABLE_NAME = 'esq_websites';

	/** the related Propel class for this table */
	const OM_CLASS = 'Website';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'lib.model.Website';

	/** the related TableMap class for this table */
	const TM_CLASS = 'WebsiteTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 33;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'esq_websites.ID';

	/** the column name for the CG_ID field */
	const CG_ID = 'esq_websites.CG_ID';

	/** the column name for the CIM_CUSTOMER_PROFILE_ID field */
	const CIM_CUSTOMER_PROFILE_ID = 'esq_websites.CIM_CUSTOMER_PROFILE_ID';

	/** the column name for the CIM_PAYMENT_PROFILE_ID field */
	const CIM_PAYMENT_PROFILE_ID = 'esq_websites.CIM_PAYMENT_PROFILE_ID';

	/** the column name for the CUSTOMER_ID field */
	const CUSTOMER_ID = 'esq_websites.CUSTOMER_ID';

	/** the column name for the TYPE field */
	const TYPE = 'esq_websites.TYPE';

	/** the column name for the RANK field */
	const RANK = 'esq_websites.RANK';

	/** the column name for the FIRM_NAME field */
	const FIRM_NAME = 'esq_websites.FIRM_NAME';

	/** the column name for the FIRM_TYPE field */
	const FIRM_TYPE = 'esq_websites.FIRM_TYPE';

	/** the column name for the WEBSITE_NAME field */
	const WEBSITE_NAME = 'esq_websites.WEBSITE_NAME';

	/** the column name for the PRIMARY_DOMAIN_ID field */
	const PRIMARY_DOMAIN_ID = 'esq_websites.PRIMARY_DOMAIN_ID';

	/** the column name for the EMAIL field */
	const EMAIL = 'esq_websites.EMAIL';

	/** the column name for the ADDRESS field */
	const ADDRESS = 'esq_websites.ADDRESS';

	/** the column name for the CITY field */
	const CITY = 'esq_websites.CITY';

	/** the column name for the STATE field */
	const STATE = 'esq_websites.STATE';

	/** the column name for the ZIP field */
	const ZIP = 'esq_websites.ZIP';

	/** the column name for the PHONE field */
	const PHONE = 'esq_websites.PHONE';

	/** the column name for the FAX field */
	const FAX = 'esq_websites.FAX';

	/** the column name for the TEMPLATE_ID field */
	const TEMPLATE_ID = 'esq_websites.TEMPLATE_ID';

	/** the column name for the WEBSITE_ATTRIBUTE_ID field */
	const WEBSITE_ATTRIBUTE_ID = 'esq_websites.WEBSITE_ATTRIBUTE_ID';

	/** the column name for the STATUS field */
	const STATUS = 'esq_websites.STATUS';

	/** the column name for the PATH field */
	const PATH = 'esq_websites.PATH';

	/** the column name for the HOST_ID field */
	const HOST_ID = 'esq_websites.HOST_ID';

	/** the column name for the ANALYTICS_CODE field */
	const ANALYTICS_CODE = 'esq_websites.ANALYTICS_CODE';

	/** the column name for the PAYMENT_ACCOUNT_ID field */
	const PAYMENT_ACCOUNT_ID = 'esq_websites.PAYMENT_ACCOUNT_ID';

	/** the column name for the META_DESCRIPTION field */
	const META_DESCRIPTION = 'esq_websites.META_DESCRIPTION';

	/** the column name for the META_KEYWORDS field */
	const META_KEYWORDS = 'esq_websites.META_KEYWORDS';

	/** the column name for the SOCIAL_MEDIA field */
	const SOCIAL_MEDIA = 'esq_websites.SOCIAL_MEDIA';

	/** the column name for the LAST_PAYMENT_UPDATE field */
	const LAST_PAYMENT_UPDATE = 'esq_websites.LAST_PAYMENT_UPDATE';

	/** the column name for the LAST_BILLING_DATE field */
	const LAST_BILLING_DATE = 'esq_websites.LAST_BILLING_DATE';

	/** the column name for the CANCELLED_AT field */
	const CANCELLED_AT = 'esq_websites.CANCELLED_AT';

	/** the column name for the CREATED_AT field */
	const CREATED_AT = 'esq_websites.CREATED_AT';

	/** the column name for the UPDATED_AT field */
	const UPDATED_AT = 'esq_websites.UPDATED_AT';

	/**
	 * An identiy map to hold any loaded instances of Website objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array Website[]
	 */
	public static $instances = array();


	// sortable behavior
	
	/**
	 * rank column
	 */
	const RANK_COL = 'esq_websites.RANK';
	
	/**
	 * Scope column for the set
	 */
	const SCOPE_COL = 'esq_websites.CUSTOMER_ID';

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
		BasePeer::TYPE_PHPNAME => array ('Id', 'CgId', 'CimCustomerProfileId', 'CimPaymentProfileId', 'CustomerId', 'Type', 'Rank', 'FirmName', 'FirmType', 'WebsiteName', 'PrimaryDomainId', 'Email', 'Address', 'City', 'State', 'Zip', 'Phone', 'Fax', 'TemplateId', 'WebsiteAttributeId', 'Status', 'Path', 'HostId', 'AnalyticsCode', 'PaymentAccountId', 'MetaDescription', 'MetaKeywords', 'SocialMedia', 'LastPaymentUpdate', 'LastBillingDate', 'CancelledAt', 'CreatedAt', 'UpdatedAt', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'cgId', 'cimCustomerProfileId', 'cimPaymentProfileId', 'customerId', 'type', 'rank', 'firmName', 'firmType', 'websiteName', 'primaryDomainId', 'email', 'address', 'city', 'state', 'zip', 'phone', 'fax', 'templateId', 'websiteAttributeId', 'status', 'path', 'hostId', 'analyticsCode', 'paymentAccountId', 'metaDescription', 'metaKeywords', 'socialMedia', 'lastPaymentUpdate', 'lastBillingDate', 'cancelledAt', 'createdAt', 'updatedAt', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::CG_ID, self::CIM_CUSTOMER_PROFILE_ID, self::CIM_PAYMENT_PROFILE_ID, self::CUSTOMER_ID, self::TYPE, self::RANK, self::FIRM_NAME, self::FIRM_TYPE, self::WEBSITE_NAME, self::PRIMARY_DOMAIN_ID, self::EMAIL, self::ADDRESS, self::CITY, self::STATE, self::ZIP, self::PHONE, self::FAX, self::TEMPLATE_ID, self::WEBSITE_ATTRIBUTE_ID, self::STATUS, self::PATH, self::HOST_ID, self::ANALYTICS_CODE, self::PAYMENT_ACCOUNT_ID, self::META_DESCRIPTION, self::META_KEYWORDS, self::SOCIAL_MEDIA, self::LAST_PAYMENT_UPDATE, self::LAST_BILLING_DATE, self::CANCELLED_AT, self::CREATED_AT, self::UPDATED_AT, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CG_ID', 'CIM_CUSTOMER_PROFILE_ID', 'CIM_PAYMENT_PROFILE_ID', 'CUSTOMER_ID', 'TYPE', 'RANK', 'FIRM_NAME', 'FIRM_TYPE', 'WEBSITE_NAME', 'PRIMARY_DOMAIN_ID', 'EMAIL', 'ADDRESS', 'CITY', 'STATE', 'ZIP', 'PHONE', 'FAX', 'TEMPLATE_ID', 'WEBSITE_ATTRIBUTE_ID', 'STATUS', 'PATH', 'HOST_ID', 'ANALYTICS_CODE', 'PAYMENT_ACCOUNT_ID', 'META_DESCRIPTION', 'META_KEYWORDS', 'SOCIAL_MEDIA', 'LAST_PAYMENT_UPDATE', 'LAST_BILLING_DATE', 'CANCELLED_AT', 'CREATED_AT', 'UPDATED_AT', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'cg_id', 'cim_customer_profile_id', 'cim_payment_profile_id', 'customer_id', 'type', 'rank', 'firm_name', 'firm_type', 'website_name', 'primary_domain_id', 'email', 'address', 'city', 'state', 'zip', 'phone', 'fax', 'template_id', 'website_attribute_id', 'status', 'path', 'host_id', 'analytics_code', 'payment_account_id', 'meta_description', 'meta_keywords', 'social_media', 'last_payment_update', 'last_billing_date', 'cancelled_at', 'created_at', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'CgId' => 1, 'CimCustomerProfileId' => 2, 'CimPaymentProfileId' => 3, 'CustomerId' => 4, 'Type' => 5, 'Rank' => 6, 'FirmName' => 7, 'FirmType' => 8, 'WebsiteName' => 9, 'PrimaryDomainId' => 10, 'Email' => 11, 'Address' => 12, 'City' => 13, 'State' => 14, 'Zip' => 15, 'Phone' => 16, 'Fax' => 17, 'TemplateId' => 18, 'WebsiteAttributeId' => 19, 'Status' => 20, 'Path' => 21, 'HostId' => 22, 'AnalyticsCode' => 23, 'PaymentAccountId' => 24, 'MetaDescription' => 25, 'MetaKeywords' => 26, 'SocialMedia' => 27, 'LastPaymentUpdate' => 28, 'LastBillingDate' => 29, 'CancelledAt' => 30, 'CreatedAt' => 31, 'UpdatedAt' => 32, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'cgId' => 1, 'cimCustomerProfileId' => 2, 'cimPaymentProfileId' => 3, 'customerId' => 4, 'type' => 5, 'rank' => 6, 'firmName' => 7, 'firmType' => 8, 'websiteName' => 9, 'primaryDomainId' => 10, 'email' => 11, 'address' => 12, 'city' => 13, 'state' => 14, 'zip' => 15, 'phone' => 16, 'fax' => 17, 'templateId' => 18, 'websiteAttributeId' => 19, 'status' => 20, 'path' => 21, 'hostId' => 22, 'analyticsCode' => 23, 'paymentAccountId' => 24, 'metaDescription' => 25, 'metaKeywords' => 26, 'socialMedia' => 27, 'lastPaymentUpdate' => 28, 'lastBillingDate' => 29, 'cancelledAt' => 30, 'createdAt' => 31, 'updatedAt' => 32, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::CG_ID => 1, self::CIM_CUSTOMER_PROFILE_ID => 2, self::CIM_PAYMENT_PROFILE_ID => 3, self::CUSTOMER_ID => 4, self::TYPE => 5, self::RANK => 6, self::FIRM_NAME => 7, self::FIRM_TYPE => 8, self::WEBSITE_NAME => 9, self::PRIMARY_DOMAIN_ID => 10, self::EMAIL => 11, self::ADDRESS => 12, self::CITY => 13, self::STATE => 14, self::ZIP => 15, self::PHONE => 16, self::FAX => 17, self::TEMPLATE_ID => 18, self::WEBSITE_ATTRIBUTE_ID => 19, self::STATUS => 20, self::PATH => 21, self::HOST_ID => 22, self::ANALYTICS_CODE => 23, self::PAYMENT_ACCOUNT_ID => 24, self::META_DESCRIPTION => 25, self::META_KEYWORDS => 26, self::SOCIAL_MEDIA => 27, self::LAST_PAYMENT_UPDATE => 28, self::LAST_BILLING_DATE => 29, self::CANCELLED_AT => 30, self::CREATED_AT => 31, self::UPDATED_AT => 32, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CG_ID' => 1, 'CIM_CUSTOMER_PROFILE_ID' => 2, 'CIM_PAYMENT_PROFILE_ID' => 3, 'CUSTOMER_ID' => 4, 'TYPE' => 5, 'RANK' => 6, 'FIRM_NAME' => 7, 'FIRM_TYPE' => 8, 'WEBSITE_NAME' => 9, 'PRIMARY_DOMAIN_ID' => 10, 'EMAIL' => 11, 'ADDRESS' => 12, 'CITY' => 13, 'STATE' => 14, 'ZIP' => 15, 'PHONE' => 16, 'FAX' => 17, 'TEMPLATE_ID' => 18, 'WEBSITE_ATTRIBUTE_ID' => 19, 'STATUS' => 20, 'PATH' => 21, 'HOST_ID' => 22, 'ANALYTICS_CODE' => 23, 'PAYMENT_ACCOUNT_ID' => 24, 'META_DESCRIPTION' => 25, 'META_KEYWORDS' => 26, 'SOCIAL_MEDIA' => 27, 'LAST_PAYMENT_UPDATE' => 28, 'LAST_BILLING_DATE' => 29, 'CANCELLED_AT' => 30, 'CREATED_AT' => 31, 'UPDATED_AT' => 32, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'cg_id' => 1, 'cim_customer_profile_id' => 2, 'cim_payment_profile_id' => 3, 'customer_id' => 4, 'type' => 5, 'rank' => 6, 'firm_name' => 7, 'firm_type' => 8, 'website_name' => 9, 'primary_domain_id' => 10, 'email' => 11, 'address' => 12, 'city' => 13, 'state' => 14, 'zip' => 15, 'phone' => 16, 'fax' => 17, 'template_id' => 18, 'website_attribute_id' => 19, 'status' => 20, 'path' => 21, 'host_id' => 22, 'analytics_code' => 23, 'payment_account_id' => 24, 'meta_description' => 25, 'meta_keywords' => 26, 'social_media' => 27, 'last_payment_update' => 28, 'last_billing_date' => 29, 'cancelled_at' => 30, 'created_at' => 31, 'updated_at' => 32, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, )
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
	 * @param      string $column The column name for current table. (i.e. WebsitePeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(WebsitePeer::TABLE_NAME.'.', $alias.'.', $column);
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
			$criteria->addSelectColumn(WebsitePeer::ID);
			$criteria->addSelectColumn(WebsitePeer::CG_ID);
			$criteria->addSelectColumn(WebsitePeer::CIM_CUSTOMER_PROFILE_ID);
			$criteria->addSelectColumn(WebsitePeer::CIM_PAYMENT_PROFILE_ID);
			$criteria->addSelectColumn(WebsitePeer::CUSTOMER_ID);
			$criteria->addSelectColumn(WebsitePeer::TYPE);
			$criteria->addSelectColumn(WebsitePeer::RANK);
			$criteria->addSelectColumn(WebsitePeer::FIRM_NAME);
			$criteria->addSelectColumn(WebsitePeer::FIRM_TYPE);
			$criteria->addSelectColumn(WebsitePeer::WEBSITE_NAME);
			$criteria->addSelectColumn(WebsitePeer::PRIMARY_DOMAIN_ID);
			$criteria->addSelectColumn(WebsitePeer::EMAIL);
			$criteria->addSelectColumn(WebsitePeer::ADDRESS);
			$criteria->addSelectColumn(WebsitePeer::CITY);
			$criteria->addSelectColumn(WebsitePeer::STATE);
			$criteria->addSelectColumn(WebsitePeer::ZIP);
			$criteria->addSelectColumn(WebsitePeer::PHONE);
			$criteria->addSelectColumn(WebsitePeer::FAX);
			$criteria->addSelectColumn(WebsitePeer::TEMPLATE_ID);
			$criteria->addSelectColumn(WebsitePeer::WEBSITE_ATTRIBUTE_ID);
			$criteria->addSelectColumn(WebsitePeer::STATUS);
			$criteria->addSelectColumn(WebsitePeer::PATH);
			$criteria->addSelectColumn(WebsitePeer::HOST_ID);
			$criteria->addSelectColumn(WebsitePeer::ANALYTICS_CODE);
			$criteria->addSelectColumn(WebsitePeer::PAYMENT_ACCOUNT_ID);
			$criteria->addSelectColumn(WebsitePeer::META_DESCRIPTION);
			$criteria->addSelectColumn(WebsitePeer::META_KEYWORDS);
			$criteria->addSelectColumn(WebsitePeer::SOCIAL_MEDIA);
			$criteria->addSelectColumn(WebsitePeer::LAST_PAYMENT_UPDATE);
			$criteria->addSelectColumn(WebsitePeer::LAST_BILLING_DATE);
			$criteria->addSelectColumn(WebsitePeer::CANCELLED_AT);
			$criteria->addSelectColumn(WebsitePeer::CREATED_AT);
			$criteria->addSelectColumn(WebsitePeer::UPDATED_AT);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.CG_ID');
			$criteria->addSelectColumn($alias . '.CIM_CUSTOMER_PROFILE_ID');
			$criteria->addSelectColumn($alias . '.CIM_PAYMENT_PROFILE_ID');
			$criteria->addSelectColumn($alias . '.CUSTOMER_ID');
			$criteria->addSelectColumn($alias . '.TYPE');
			$criteria->addSelectColumn($alias . '.RANK');
			$criteria->addSelectColumn($alias . '.FIRM_NAME');
			$criteria->addSelectColumn($alias . '.FIRM_TYPE');
			$criteria->addSelectColumn($alias . '.WEBSITE_NAME');
			$criteria->addSelectColumn($alias . '.PRIMARY_DOMAIN_ID');
			$criteria->addSelectColumn($alias . '.EMAIL');
			$criteria->addSelectColumn($alias . '.ADDRESS');
			$criteria->addSelectColumn($alias . '.CITY');
			$criteria->addSelectColumn($alias . '.STATE');
			$criteria->addSelectColumn($alias . '.ZIP');
			$criteria->addSelectColumn($alias . '.PHONE');
			$criteria->addSelectColumn($alias . '.FAX');
			$criteria->addSelectColumn($alias . '.TEMPLATE_ID');
			$criteria->addSelectColumn($alias . '.WEBSITE_ATTRIBUTE_ID');
			$criteria->addSelectColumn($alias . '.STATUS');
			$criteria->addSelectColumn($alias . '.PATH');
			$criteria->addSelectColumn($alias . '.HOST_ID');
			$criteria->addSelectColumn($alias . '.ANALYTICS_CODE');
			$criteria->addSelectColumn($alias . '.PAYMENT_ACCOUNT_ID');
			$criteria->addSelectColumn($alias . '.META_DESCRIPTION');
			$criteria->addSelectColumn($alias . '.META_KEYWORDS');
			$criteria->addSelectColumn($alias . '.SOCIAL_MEDIA');
			$criteria->addSelectColumn($alias . '.LAST_PAYMENT_UPDATE');
			$criteria->addSelectColumn($alias . '.LAST_BILLING_DATE');
			$criteria->addSelectColumn($alias . '.CANCELLED_AT');
			$criteria->addSelectColumn($alias . '.CREATED_AT');
			$criteria->addSelectColumn($alias . '.UPDATED_AT');
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
		$criteria->setPrimaryTableName(WebsitePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			WebsitePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseWebsitePeer', $criteria, $con);
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
	 * @return     Website
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = WebsitePeer::doSelect($critcopy, $con);
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
		return WebsitePeer::populateObjects(WebsitePeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			WebsitePeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);
		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseWebsitePeer', $criteria, $con);
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
	 * @param      Website $value A Website object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(Website $obj, $key = null)
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
	 * @param      mixed $value A Website object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof Website) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Website object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     Website Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to esq_websites
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool()
	{
		// Invalidate objects in CheddarGetterNotificationPeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		CheddarGetterNotificationPeer::clearInstancePool();
		// Invalidate objects in DomainPeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		DomainPeer::clearInstancePool();
		// Invalidate objects in CouponUsagePeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		CouponUsagePeer::clearInstancePool();
		// Invalidate objects in EmailAccountPeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		EmailAccountPeer::clearInstancePool();
		// Invalidate objects in PagePeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		PagePeer::clearInstancePool();
		// Invalidate objects in ClientMessagePeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		ClientMessagePeer::clearInstancePool();
		// Invalidate objects in TemplateCustomizationPeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		TemplateCustomizationPeer::clearInstancePool();
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
		if ($row[$startcol] === null) {
			return null;
		}
		return (string) $row[$startcol];
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
		return (string) $row[$startcol];
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
		$cls = WebsitePeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = WebsitePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = WebsitePeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				WebsitePeer::addInstanceToPool($obj, $key);
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
	 * @return     array (Website object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = WebsitePeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = WebsitePeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + WebsitePeer::NUM_COLUMNS;
		} else {
			$cls = WebsitePeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			WebsitePeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}

	/**
	 * Returns the number of rows matching criteria, joining the related Customer table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinCustomer(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(WebsitePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			WebsitePeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(WebsitePeer::CUSTOMER_ID, CustomerPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseWebsitePeer', $criteria, $con);
		}

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
	 * Returns the number of rows matching criteria, joining the related PrimaryDomain table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinPrimaryDomain(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(WebsitePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			WebsitePeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(WebsitePeer::PRIMARY_DOMAIN_ID, DomainPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseWebsitePeer', $criteria, $con);
		}

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
	 * Returns the number of rows matching criteria, joining the related WebsiteTemplate table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinWebsiteTemplate(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(WebsitePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			WebsitePeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(WebsitePeer::TEMPLATE_ID, WebsiteTemplatePeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseWebsitePeer', $criteria, $con);
		}

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
	 * Returns the number of rows matching criteria, joining the related WebsiteAttribute table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinWebsiteAttribute(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(WebsitePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			WebsitePeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(WebsitePeer::WEBSITE_ATTRIBUTE_ID, WebsiteAttributePeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseWebsitePeer', $criteria, $con);
		}

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
	 * Returns the number of rows matching criteria, joining the related Host table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinHost(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(WebsitePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			WebsitePeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(WebsitePeer::HOST_ID, HostPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseWebsitePeer', $criteria, $con);
		}

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
	 * Selects a collection of Website objects pre-filled with their Customer objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Website objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinCustomer(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		WebsitePeer::addSelectColumns($criteria);
		$startcol = (WebsitePeer::NUM_COLUMNS - WebsitePeer::NUM_LAZY_LOAD_COLUMNS);
		CustomerPeer::addSelectColumns($criteria);

		$criteria->addJoin(WebsitePeer::CUSTOMER_ID, CustomerPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseWebsitePeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = WebsitePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = WebsitePeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = WebsitePeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				WebsitePeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = CustomerPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = CustomerPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = CustomerPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					CustomerPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Website) to $obj2 (Customer)
				$obj2->addWebsite($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Website objects pre-filled with their Domain objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Website objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinPrimaryDomain(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		WebsitePeer::addSelectColumns($criteria);
		$startcol = (WebsitePeer::NUM_COLUMNS - WebsitePeer::NUM_LAZY_LOAD_COLUMNS);
		DomainPeer::addSelectColumns($criteria);

		$criteria->addJoin(WebsitePeer::PRIMARY_DOMAIN_ID, DomainPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseWebsitePeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = WebsitePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = WebsitePeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = WebsitePeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				WebsitePeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = DomainPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = DomainPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = DomainPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					DomainPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Website) to $obj2 (Domain)
				$obj2->addWebsiteRelatedByPrimaryDomainId($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Website objects pre-filled with their WebsiteTemplate objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Website objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinWebsiteTemplate(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		WebsitePeer::addSelectColumns($criteria);
		$startcol = (WebsitePeer::NUM_COLUMNS - WebsitePeer::NUM_LAZY_LOAD_COLUMNS);
		WebsiteTemplatePeer::addSelectColumns($criteria);

		$criteria->addJoin(WebsitePeer::TEMPLATE_ID, WebsiteTemplatePeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseWebsitePeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = WebsitePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = WebsitePeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = WebsitePeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				WebsitePeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = WebsiteTemplatePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = WebsiteTemplatePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = WebsiteTemplatePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					WebsiteTemplatePeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Website) to $obj2 (WebsiteTemplate)
				$obj2->addWebsite($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Website objects pre-filled with their WebsiteAttribute objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Website objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinWebsiteAttribute(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		WebsitePeer::addSelectColumns($criteria);
		$startcol = (WebsitePeer::NUM_COLUMNS - WebsitePeer::NUM_LAZY_LOAD_COLUMNS);
		WebsiteAttributePeer::addSelectColumns($criteria);

		$criteria->addJoin(WebsitePeer::WEBSITE_ATTRIBUTE_ID, WebsiteAttributePeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseWebsitePeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = WebsitePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = WebsitePeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = WebsitePeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				WebsitePeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = WebsiteAttributePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = WebsiteAttributePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = WebsiteAttributePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					WebsiteAttributePeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Website) to $obj2 (WebsiteAttribute)
				$obj2->addWebsite($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Website objects pre-filled with their Host objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Website objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinHost(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		WebsitePeer::addSelectColumns($criteria);
		$startcol = (WebsitePeer::NUM_COLUMNS - WebsitePeer::NUM_LAZY_LOAD_COLUMNS);
		HostPeer::addSelectColumns($criteria);

		$criteria->addJoin(WebsitePeer::HOST_ID, HostPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseWebsitePeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = WebsitePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = WebsitePeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = WebsitePeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				WebsitePeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = HostPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = HostPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = HostPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					HostPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Website) to $obj2 (Host)
				$obj2->addWebsite($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining all related tables
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(WebsitePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			WebsitePeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(WebsitePeer::CUSTOMER_ID, CustomerPeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::PRIMARY_DOMAIN_ID, DomainPeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::TEMPLATE_ID, WebsiteTemplatePeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::WEBSITE_ATTRIBUTE_ID, WebsiteAttributePeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::HOST_ID, HostPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseWebsitePeer', $criteria, $con);
		}

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
	 * Selects a collection of Website objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Website objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		WebsitePeer::addSelectColumns($criteria);
		$startcol2 = (WebsitePeer::NUM_COLUMNS - WebsitePeer::NUM_LAZY_LOAD_COLUMNS);

		CustomerPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (CustomerPeer::NUM_COLUMNS - CustomerPeer::NUM_LAZY_LOAD_COLUMNS);

		DomainPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (DomainPeer::NUM_COLUMNS - DomainPeer::NUM_LAZY_LOAD_COLUMNS);

		WebsiteTemplatePeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (WebsiteTemplatePeer::NUM_COLUMNS - WebsiteTemplatePeer::NUM_LAZY_LOAD_COLUMNS);

		WebsiteAttributePeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (WebsiteAttributePeer::NUM_COLUMNS - WebsiteAttributePeer::NUM_LAZY_LOAD_COLUMNS);

		HostPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (HostPeer::NUM_COLUMNS - HostPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(WebsitePeer::CUSTOMER_ID, CustomerPeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::PRIMARY_DOMAIN_ID, DomainPeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::TEMPLATE_ID, WebsiteTemplatePeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::WEBSITE_ATTRIBUTE_ID, WebsiteAttributePeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::HOST_ID, HostPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseWebsitePeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = WebsitePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = WebsitePeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = WebsitePeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				WebsitePeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined Customer rows

			$key2 = CustomerPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = CustomerPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = CustomerPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					CustomerPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (Website) to the collection in $obj2 (Customer)
				$obj2->addWebsite($obj1);
			} // if joined row not null

			// Add objects for joined Domain rows

			$key3 = DomainPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = DomainPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = DomainPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					DomainPeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (Website) to the collection in $obj3 (Domain)
				$obj3->addWebsiteRelatedByPrimaryDomainId($obj1);
			} // if joined row not null

			// Add objects for joined WebsiteTemplate rows

			$key4 = WebsiteTemplatePeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = WebsiteTemplatePeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$cls = WebsiteTemplatePeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					WebsiteTemplatePeer::addInstanceToPool($obj4, $key4);
				} // if obj4 loaded

				// Add the $obj1 (Website) to the collection in $obj4 (WebsiteTemplate)
				$obj4->addWebsite($obj1);
			} // if joined row not null

			// Add objects for joined WebsiteAttribute rows

			$key5 = WebsiteAttributePeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = WebsiteAttributePeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$cls = WebsiteAttributePeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					WebsiteAttributePeer::addInstanceToPool($obj5, $key5);
				} // if obj5 loaded

				// Add the $obj1 (Website) to the collection in $obj5 (WebsiteAttribute)
				$obj5->addWebsite($obj1);
			} // if joined row not null

			// Add objects for joined Host rows

			$key6 = HostPeer::getPrimaryKeyHashFromRow($row, $startcol6);
			if ($key6 !== null) {
				$obj6 = HostPeer::getInstanceFromPool($key6);
				if (!$obj6) {

					$cls = HostPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					HostPeer::addInstanceToPool($obj6, $key6);
				} // if obj6 loaded

				// Add the $obj1 (Website) to the collection in $obj6 (Host)
				$obj6->addWebsite($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Customer table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptCustomer(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(WebsitePeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			WebsitePeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(WebsitePeer::PRIMARY_DOMAIN_ID, DomainPeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::TEMPLATE_ID, WebsiteTemplatePeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::WEBSITE_ATTRIBUTE_ID, WebsiteAttributePeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::HOST_ID, HostPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseWebsitePeer', $criteria, $con);
		}

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
	 * Returns the number of rows matching criteria, joining the related PrimaryDomain table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptPrimaryDomain(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(WebsitePeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			WebsitePeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(WebsitePeer::CUSTOMER_ID, CustomerPeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::TEMPLATE_ID, WebsiteTemplatePeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::WEBSITE_ATTRIBUTE_ID, WebsiteAttributePeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::HOST_ID, HostPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseWebsitePeer', $criteria, $con);
		}

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
	 * Returns the number of rows matching criteria, joining the related WebsiteTemplate table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptWebsiteTemplate(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(WebsitePeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			WebsitePeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(WebsitePeer::CUSTOMER_ID, CustomerPeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::PRIMARY_DOMAIN_ID, DomainPeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::WEBSITE_ATTRIBUTE_ID, WebsiteAttributePeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::HOST_ID, HostPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseWebsitePeer', $criteria, $con);
		}

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
	 * Returns the number of rows matching criteria, joining the related WebsiteAttribute table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptWebsiteAttribute(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(WebsitePeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			WebsitePeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(WebsitePeer::CUSTOMER_ID, CustomerPeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::PRIMARY_DOMAIN_ID, DomainPeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::TEMPLATE_ID, WebsiteTemplatePeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::HOST_ID, HostPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseWebsitePeer', $criteria, $con);
		}

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
	 * Returns the number of rows matching criteria, joining the related Host table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptHost(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(WebsitePeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			WebsitePeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(WebsitePeer::CUSTOMER_ID, CustomerPeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::PRIMARY_DOMAIN_ID, DomainPeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::TEMPLATE_ID, WebsiteTemplatePeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::WEBSITE_ATTRIBUTE_ID, WebsiteAttributePeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseWebsitePeer', $criteria, $con);
		}

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
	 * Selects a collection of Website objects pre-filled with all related objects except Customer.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Website objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptCustomer(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		WebsitePeer::addSelectColumns($criteria);
		$startcol2 = (WebsitePeer::NUM_COLUMNS - WebsitePeer::NUM_LAZY_LOAD_COLUMNS);

		DomainPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (DomainPeer::NUM_COLUMNS - DomainPeer::NUM_LAZY_LOAD_COLUMNS);

		WebsiteTemplatePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (WebsiteTemplatePeer::NUM_COLUMNS - WebsiteTemplatePeer::NUM_LAZY_LOAD_COLUMNS);

		WebsiteAttributePeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (WebsiteAttributePeer::NUM_COLUMNS - WebsiteAttributePeer::NUM_LAZY_LOAD_COLUMNS);

		HostPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (HostPeer::NUM_COLUMNS - HostPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(WebsitePeer::PRIMARY_DOMAIN_ID, DomainPeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::TEMPLATE_ID, WebsiteTemplatePeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::WEBSITE_ATTRIBUTE_ID, WebsiteAttributePeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::HOST_ID, HostPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseWebsitePeer', $criteria, $con);
		}


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = WebsitePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = WebsitePeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = WebsitePeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				WebsitePeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Domain rows

				$key2 = DomainPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = DomainPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = DomainPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DomainPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Website) to the collection in $obj2 (Domain)
				$obj2->addWebsiteRelatedByPrimaryDomainId($obj1);

			} // if joined row is not null

				// Add objects for joined WebsiteTemplate rows

				$key3 = WebsiteTemplatePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = WebsiteTemplatePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = WebsiteTemplatePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					WebsiteTemplatePeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Website) to the collection in $obj3 (WebsiteTemplate)
				$obj3->addWebsite($obj1);

			} // if joined row is not null

				// Add objects for joined WebsiteAttribute rows

				$key4 = WebsiteAttributePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = WebsiteAttributePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = WebsiteAttributePeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					WebsiteAttributePeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Website) to the collection in $obj4 (WebsiteAttribute)
				$obj4->addWebsite($obj1);

			} // if joined row is not null

				// Add objects for joined Host rows

				$key5 = HostPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = HostPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = HostPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					HostPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (Website) to the collection in $obj5 (Host)
				$obj5->addWebsite($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Website objects pre-filled with all related objects except PrimaryDomain.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Website objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptPrimaryDomain(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		WebsitePeer::addSelectColumns($criteria);
		$startcol2 = (WebsitePeer::NUM_COLUMNS - WebsitePeer::NUM_LAZY_LOAD_COLUMNS);

		CustomerPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (CustomerPeer::NUM_COLUMNS - CustomerPeer::NUM_LAZY_LOAD_COLUMNS);

		WebsiteTemplatePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (WebsiteTemplatePeer::NUM_COLUMNS - WebsiteTemplatePeer::NUM_LAZY_LOAD_COLUMNS);

		WebsiteAttributePeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (WebsiteAttributePeer::NUM_COLUMNS - WebsiteAttributePeer::NUM_LAZY_LOAD_COLUMNS);

		HostPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (HostPeer::NUM_COLUMNS - HostPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(WebsitePeer::CUSTOMER_ID, CustomerPeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::TEMPLATE_ID, WebsiteTemplatePeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::WEBSITE_ATTRIBUTE_ID, WebsiteAttributePeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::HOST_ID, HostPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseWebsitePeer', $criteria, $con);
		}


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = WebsitePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = WebsitePeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = WebsitePeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				WebsitePeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Customer rows

				$key2 = CustomerPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = CustomerPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = CustomerPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					CustomerPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Website) to the collection in $obj2 (Customer)
				$obj2->addWebsite($obj1);

			} // if joined row is not null

				// Add objects for joined WebsiteTemplate rows

				$key3 = WebsiteTemplatePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = WebsiteTemplatePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = WebsiteTemplatePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					WebsiteTemplatePeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Website) to the collection in $obj3 (WebsiteTemplate)
				$obj3->addWebsite($obj1);

			} // if joined row is not null

				// Add objects for joined WebsiteAttribute rows

				$key4 = WebsiteAttributePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = WebsiteAttributePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = WebsiteAttributePeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					WebsiteAttributePeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Website) to the collection in $obj4 (WebsiteAttribute)
				$obj4->addWebsite($obj1);

			} // if joined row is not null

				// Add objects for joined Host rows

				$key5 = HostPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = HostPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = HostPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					HostPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (Website) to the collection in $obj5 (Host)
				$obj5->addWebsite($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Website objects pre-filled with all related objects except WebsiteTemplate.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Website objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptWebsiteTemplate(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		WebsitePeer::addSelectColumns($criteria);
		$startcol2 = (WebsitePeer::NUM_COLUMNS - WebsitePeer::NUM_LAZY_LOAD_COLUMNS);

		CustomerPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (CustomerPeer::NUM_COLUMNS - CustomerPeer::NUM_LAZY_LOAD_COLUMNS);

		DomainPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (DomainPeer::NUM_COLUMNS - DomainPeer::NUM_LAZY_LOAD_COLUMNS);

		WebsiteAttributePeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (WebsiteAttributePeer::NUM_COLUMNS - WebsiteAttributePeer::NUM_LAZY_LOAD_COLUMNS);

		HostPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (HostPeer::NUM_COLUMNS - HostPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(WebsitePeer::CUSTOMER_ID, CustomerPeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::PRIMARY_DOMAIN_ID, DomainPeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::WEBSITE_ATTRIBUTE_ID, WebsiteAttributePeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::HOST_ID, HostPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseWebsitePeer', $criteria, $con);
		}


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = WebsitePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = WebsitePeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = WebsitePeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				WebsitePeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Customer rows

				$key2 = CustomerPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = CustomerPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = CustomerPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					CustomerPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Website) to the collection in $obj2 (Customer)
				$obj2->addWebsite($obj1);

			} // if joined row is not null

				// Add objects for joined Domain rows

				$key3 = DomainPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = DomainPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = DomainPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					DomainPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Website) to the collection in $obj3 (Domain)
				$obj3->addWebsiteRelatedByPrimaryDomainId($obj1);

			} // if joined row is not null

				// Add objects for joined WebsiteAttribute rows

				$key4 = WebsiteAttributePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = WebsiteAttributePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = WebsiteAttributePeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					WebsiteAttributePeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Website) to the collection in $obj4 (WebsiteAttribute)
				$obj4->addWebsite($obj1);

			} // if joined row is not null

				// Add objects for joined Host rows

				$key5 = HostPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = HostPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = HostPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					HostPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (Website) to the collection in $obj5 (Host)
				$obj5->addWebsite($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Website objects pre-filled with all related objects except WebsiteAttribute.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Website objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptWebsiteAttribute(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		WebsitePeer::addSelectColumns($criteria);
		$startcol2 = (WebsitePeer::NUM_COLUMNS - WebsitePeer::NUM_LAZY_LOAD_COLUMNS);

		CustomerPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (CustomerPeer::NUM_COLUMNS - CustomerPeer::NUM_LAZY_LOAD_COLUMNS);

		DomainPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (DomainPeer::NUM_COLUMNS - DomainPeer::NUM_LAZY_LOAD_COLUMNS);

		WebsiteTemplatePeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (WebsiteTemplatePeer::NUM_COLUMNS - WebsiteTemplatePeer::NUM_LAZY_LOAD_COLUMNS);

		HostPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (HostPeer::NUM_COLUMNS - HostPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(WebsitePeer::CUSTOMER_ID, CustomerPeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::PRIMARY_DOMAIN_ID, DomainPeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::TEMPLATE_ID, WebsiteTemplatePeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::HOST_ID, HostPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseWebsitePeer', $criteria, $con);
		}


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = WebsitePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = WebsitePeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = WebsitePeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				WebsitePeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Customer rows

				$key2 = CustomerPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = CustomerPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = CustomerPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					CustomerPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Website) to the collection in $obj2 (Customer)
				$obj2->addWebsite($obj1);

			} // if joined row is not null

				// Add objects for joined Domain rows

				$key3 = DomainPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = DomainPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = DomainPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					DomainPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Website) to the collection in $obj3 (Domain)
				$obj3->addWebsiteRelatedByPrimaryDomainId($obj1);

			} // if joined row is not null

				// Add objects for joined WebsiteTemplate rows

				$key4 = WebsiteTemplatePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = WebsiteTemplatePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = WebsiteTemplatePeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					WebsiteTemplatePeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Website) to the collection in $obj4 (WebsiteTemplate)
				$obj4->addWebsite($obj1);

			} // if joined row is not null

				// Add objects for joined Host rows

				$key5 = HostPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = HostPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = HostPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					HostPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (Website) to the collection in $obj5 (Host)
				$obj5->addWebsite($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Website objects pre-filled with all related objects except Host.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Website objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptHost(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		WebsitePeer::addSelectColumns($criteria);
		$startcol2 = (WebsitePeer::NUM_COLUMNS - WebsitePeer::NUM_LAZY_LOAD_COLUMNS);

		CustomerPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (CustomerPeer::NUM_COLUMNS - CustomerPeer::NUM_LAZY_LOAD_COLUMNS);

		DomainPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (DomainPeer::NUM_COLUMNS - DomainPeer::NUM_LAZY_LOAD_COLUMNS);

		WebsiteTemplatePeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (WebsiteTemplatePeer::NUM_COLUMNS - WebsiteTemplatePeer::NUM_LAZY_LOAD_COLUMNS);

		WebsiteAttributePeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (WebsiteAttributePeer::NUM_COLUMNS - WebsiteAttributePeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(WebsitePeer::CUSTOMER_ID, CustomerPeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::PRIMARY_DOMAIN_ID, DomainPeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::TEMPLATE_ID, WebsiteTemplatePeer::ID, $join_behavior);

		$criteria->addJoin(WebsitePeer::WEBSITE_ATTRIBUTE_ID, WebsiteAttributePeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseWebsitePeer', $criteria, $con);
		}


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = WebsitePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = WebsitePeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = WebsitePeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				WebsitePeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Customer rows

				$key2 = CustomerPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = CustomerPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = CustomerPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					CustomerPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Website) to the collection in $obj2 (Customer)
				$obj2->addWebsite($obj1);

			} // if joined row is not null

				// Add objects for joined Domain rows

				$key3 = DomainPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = DomainPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = DomainPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					DomainPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Website) to the collection in $obj3 (Domain)
				$obj3->addWebsiteRelatedByPrimaryDomainId($obj1);

			} // if joined row is not null

				// Add objects for joined WebsiteTemplate rows

				$key4 = WebsiteTemplatePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = WebsiteTemplatePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = WebsiteTemplatePeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					WebsiteTemplatePeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Website) to the collection in $obj4 (WebsiteTemplate)
				$obj4->addWebsite($obj1);

			} // if joined row is not null

				// Add objects for joined WebsiteAttribute rows

				$key5 = WebsiteAttributePeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = WebsiteAttributePeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = WebsiteAttributePeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					WebsiteAttributePeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (Website) to the collection in $obj5 (WebsiteAttribute)
				$obj5->addWebsite($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
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
	  $dbMap = Propel::getDatabaseMap(BaseWebsitePeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseWebsitePeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new WebsiteTableMap());
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
		return $withPrefix ? WebsitePeer::CLASS_DEFAULT : WebsitePeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a Website or Criteria object.
	 *
	 * @param      mixed $values Criteria or Website object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from Website object
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
	 * Method perform an UPDATE on the database, given a Website or Criteria object.
	 *
	 * @param      mixed $values Criteria or Website object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(WebsitePeer::ID);
			$value = $criteria->remove(WebsitePeer::ID);
			if ($value) {
				$selectCriteria->add(WebsitePeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(WebsitePeer::TABLE_NAME);
			}

		} else { // $values is Website object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the esq_websites table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += WebsitePeer::doOnDeleteCascade(new Criteria(WebsitePeer::DATABASE_NAME), $con);
			$affectedRows += BasePeer::doDeleteAll(WebsitePeer::TABLE_NAME, $con, WebsitePeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			WebsitePeer::clearInstancePool();
			WebsitePeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a Website or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or Website object or primary key or array of primary keys
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
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof Website) { // it's a model object
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(WebsitePeer::ID, (array) $values, Criteria::IN);
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
			$affectedRows += WebsitePeer::doOnDeleteCascade($c, $con);
			
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			if ($values instanceof Criteria) {
				WebsitePeer::clearInstancePool();
			} elseif ($values instanceof Website) { // it's a model object
				WebsitePeer::removeInstanceFromPool($values);
			} else { // it's a primary key, or an array of pks
				foreach ((array) $values as $singleval) {
					WebsitePeer::removeInstanceFromPool($singleval);
				}
			}
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			WebsitePeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * This is a method for emulating ON DELETE CASCADE for DBs that don't support this
	 * feature (like MySQL or SQLite).
	 *
	 * This method is not very speedy because it must perform a query first to get
	 * the implicated records and then perform the deletes by calling those Peer classes.
	 *
	 * This method should be used within a transaction if possible.
	 *
	 * @param      Criteria $criteria
	 * @param      PropelPDO $con
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	protected static function doOnDeleteCascade(Criteria $criteria, PropelPDO $con)
	{
		// initialize var to track total num of affected rows
		$affectedRows = 0;

		// first find the objects that are implicated by the $criteria
		$objects = WebsitePeer::doSelect($criteria, $con);
		foreach ($objects as $obj) {


			// delete related CheddarGetterNotification objects
			$criteria = new Criteria(CheddarGetterNotificationPeer::DATABASE_NAME);
			
			$criteria->add(CheddarGetterNotificationPeer::WEBSITE_ID, $obj->getId());
			$affectedRows += CheddarGetterNotificationPeer::doDelete($criteria, $con);

			// delete related Domain objects
			$criteria = new Criteria(DomainPeer::DATABASE_NAME);
			
			$criteria->add(DomainPeer::WEBSITE_ID, $obj->getId());
			$affectedRows += DomainPeer::doDelete($criteria, $con);

			// delete related CouponUsage objects
			$criteria = new Criteria(CouponUsagePeer::DATABASE_NAME);
			
			$criteria->add(CouponUsagePeer::WEBSITE_ID, $obj->getId());
			$affectedRows += CouponUsagePeer::doDelete($criteria, $con);

			// delete related EmailAccount objects
			$criteria = new Criteria(EmailAccountPeer::DATABASE_NAME);
			
			$criteria->add(EmailAccountPeer::WEBSITE_ID, $obj->getId());
			$affectedRows += EmailAccountPeer::doDelete($criteria, $con);

			// delete related Page objects
			$criteria = new Criteria(PagePeer::DATABASE_NAME);
			
			$criteria->add(PagePeer::WEBSITE_ID, $obj->getId());
			$affectedRows += PagePeer::doDelete($criteria, $con);

			// delete related ClientMessage objects
			$criteria = new Criteria(ClientMessagePeer::DATABASE_NAME);
			
			$criteria->add(ClientMessagePeer::WEBSITE_ID, $obj->getId());
			$affectedRows += ClientMessagePeer::doDelete($criteria, $con);

			// delete related TemplateCustomization objects
			$criteria = new Criteria(TemplateCustomizationPeer::DATABASE_NAME);
			
			$criteria->add(TemplateCustomizationPeer::WEBSITE_ID, $obj->getId());
			$affectedRows += TemplateCustomizationPeer::doDelete($criteria, $con);
		}
		return $affectedRows;
	}

	/**
	 * Validates all modified columns of given Website object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      Website $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(Website $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(WebsitePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(WebsitePeer::TABLE_NAME);

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

		return BasePeer::doValidate(WebsitePeer::DATABASE_NAME, WebsitePeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      string $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     Website
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = WebsitePeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(WebsitePeer::DATABASE_NAME);
		$criteria->add(WebsitePeer::ID, $pk);

		$v = WebsitePeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(WebsitePeer::DATABASE_NAME);
			$criteria->add(WebsitePeer::ID, $pks, Criteria::IN);
			$objs = WebsitePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

	// sortable behavior
	
	/**
	 * Get the highest rank
	 * 
	 * @param      int $scope		Scope to determine which suite to consider
	 * @param     PropelPDO optional connection
	 *
	 * @return    integer highest position
	 */
	public static function getMaxRank($scope = null, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME);
		}
		// shift the objects with a position lower than the one of object
		$c = new Criteria();
		$c->addSelectColumn('MAX(' . WebsitePeer::RANK_COL . ')');
		$c->add(WebsitePeer::SCOPE_COL, $scope, Criteria::EQUAL);
		$stmt = WebsitePeer::doSelectStmt($c, $con);
		
		return $stmt->fetchColumn();
	}
	
	/**
	 * Get an item from the list based on its rank
	 *
	 * @param     integer   $rank rank
	 * @param      int $scope		Scope to determine which suite to consider
	 * @param     PropelPDO $con optional connection
	 *
	 * @return Website
	 */
	public static function retrieveByRank($rank, $scope = null, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME);
		}
	
		$c = new Criteria;
		$c->add(WebsitePeer::RANK_COL, $rank);
		$c->add(WebsitePeer::SCOPE_COL, $scope, Criteria::EQUAL);
		
		return WebsitePeer::doSelectOne($c, $con);
	}
	
	/**
	 * Reorder a set of sortable objects based on a list of id/position
	 * Beware that there is no check made on the positions passed
	 * So incoherent positions will result in an incoherent list
	 *
	 * @param     array     $order id => rank pairs
	 * @param     PropelPDO $con   optional connection
	 *
	 * @return    boolean true if the reordering took place, false if a database problem prevented it
	 */
	public static function reorder(array $order, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME);
		}
		
		$con->beginTransaction();
		try {
			$ids = array_keys($order);
			$objects = WebsitePeer::retrieveByPKs($ids);
			foreach ($objects as $object) {
				$pk = $object->getPrimaryKey();
				if ($object->getRank() != $order[$pk]) {
					$object->setRank($order[$pk]);
					$object->save($con);
				}
			}
			$con->commit();
	
			return true;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}
	
	/**
	 * Return an array of sortable objects ordered by position
	 *
	 * @param     Criteria  $criteria  optional criteria object
	 * @param     string    $order     sorting order, to be chosen between Criteria::ASC (default) and Criteria::DESC
	 * @param     PropelPDO $con       optional connection
	 *
	 * @return    array list of sortable objects
	 */
	public static function doSelectOrderByRank(Criteria $criteria = null, $order = Criteria::ASC, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME);
		}
	
		if ($criteria === null) {
			$criteria = new Criteria();
		} elseif ($criteria instanceof Criteria) {
			$criteria = clone $criteria;
		}
	
		$criteria->clearOrderByColumns();
	
		if ($order == Criteria::ASC) {
			$criteria->addAscendingOrderByColumn(WebsitePeer::RANK_COL);
		} else {
			$criteria->addDescendingOrderByColumn(WebsitePeer::RANK_COL);
		}
	
		return WebsitePeer::doSelect($criteria, $con);
	}
	
	/**
	 * Return an array of sortable objects in the given scope ordered by position
	 *
	 * @param     int       $scope  the scope of the list
	 * @param     string    $order  sorting order, to be chosen between Criteria::ASC (default) and Criteria::DESC
	 * @param     PropelPDO $con    optional connection
	 *
	 * @return    array list of sortable objects
	 */
	public static function retrieveList($scope, $order = Criteria::ASC, PropelPDO $con = null)
	{
		$c = new Criteria();
		$c->add(WebsitePeer::SCOPE_COL, $scope);
		
		return WebsitePeer::doSelectOrderByRank($c, $order, $con);
	}
	
	/**
	 * Return the number of sortable objects in the given scope
	 *
	 * @param     int       $scope  the scope of the list
	 * @param     PropelPDO $con    optional connection
	 *
	 * @return    array list of sortable objects
	 */
	public static function countList($scope, PropelPDO $con = null)
	{
		$c = new Criteria();
		$c->add(WebsitePeer::SCOPE_COL, $scope);
		
		return WebsitePeer::doCount($c, $con);
	}
	
	/**
	 * Deletes the sortable objects in the given scope
	 *
	 * @param     int       $scope  the scope of the list
	 * @param     PropelPDO $con    optional connection
	 *
	 * @return    int number of deleted objects
	 */
	public static function deleteList($scope, PropelPDO $con = null)
	{
		$c = new Criteria();
		$c->add(WebsitePeer::SCOPE_COL, $scope);
		
		return WebsitePeer::doDelete($c, $con);
	}
	
	/**
	 * Adds $delta to all Rank values that are >= $first and <= $last.
	 * '$delta' can also be negative.
	 *
	 * @param      int $delta Value to be shifted by, can be negative
	 * @param      int $first First node to be shifted
	 * @param      int $last  Last node to be shifted
	 * @param      int $scope Scope to use for the shift
	 * @param      PropelPDO $con Connection to use.
	 */
	public static function shiftRank($delta, $first, $last = null, $scope = null, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(WebsitePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
	
		$whereCriteria = new Criteria(WebsitePeer::DATABASE_NAME);
		$criterion = $whereCriteria->getNewCriterion(WebsitePeer::RANK_COL, $first, Criteria::GREATER_EQUAL);
		if (null !== $last) {
			$criterion->addAnd($whereCriteria->getNewCriterion(WebsitePeer::RANK_COL, $last, Criteria::LESS_EQUAL));
		}
		$whereCriteria->add($criterion);
		$whereCriteria->add(WebsitePeer::SCOPE_COL, $scope, Criteria::EQUAL);
	
		$valuesCriteria = new Criteria(WebsitePeer::DATABASE_NAME);
		$valuesCriteria->add(WebsitePeer::RANK_COL, array('raw' => WebsitePeer::RANK_COL . ' + ?', 'value' => $delta), Criteria::CUSTOM_EQUAL);
	
		BasePeer::doUpdate($whereCriteria, $valuesCriteria, $con);
		WebsitePeer::clearInstancePool();
	}

	// symfony behavior
	
	/**
	 * Returns an array of arrays that contain columns in each unique index.
	 *
	 * @return array
	 */
	static public function getUniqueColumnNames()
	{
	  return array(array('customer_id', 'firm_name'), array('host_id', 'path'));
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
	    return sprintf('BaseWebsitePeer:%s:%1$s', 'Count' == $match[1] ? 'doCount' : $match[0]);
	  }
	
	  throw new LogicException(sprintf('Unrecognized function "%s"', $method));
	}

} // BaseWebsitePeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseWebsitePeer::buildTableMap();

