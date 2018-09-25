<?php



/**
 * This class defines the structure of the 'esq_websites' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class WebsiteTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.WebsiteTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('esq_websites');
		$this->setPhpName('Website');
		$this->setClassname('Website');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'VARCHAR', true, 255, null);
		$this->addColumn('CG_ID', 'CgId', 'VARCHAR', false, 255, null);
		$this->addColumn('CIM_CUSTOMER_PROFILE_ID', 'CimCustomerProfileId', 'VARCHAR', false, 255, null);
		$this->addColumn('CIM_PAYMENT_PROFILE_ID', 'CimPaymentProfileId', 'VARCHAR', false, 255, null);
		$this->addForeignKey('CUSTOMER_ID', 'CustomerId', 'VARCHAR', 'esq_customers', 'ID', true, 255, null);
		$this->addColumn('TYPE', 'Type', 'INTEGER', false, null, null);
		$this->addColumn('RANK', 'Rank', 'INTEGER', false, null, null);
		$this->addColumn('FIRM_NAME', 'FirmName', 'VARCHAR', true, 255, null);
		$this->addColumn('FIRM_TYPE', 'FirmType', 'VARCHAR', false, 255, null);
		$this->addColumn('WEBSITE_NAME', 'WebsiteName', 'VARCHAR', false, 255, null);
		$this->addForeignKey('PRIMARY_DOMAIN_ID', 'PrimaryDomainId', 'VARCHAR', 'esq_domain_names', 'ID', false, 255, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 255, null);
		$this->addColumn('ADDRESS', 'Address', 'VARCHAR', false, 255, null);
		$this->addColumn('CITY', 'City', 'VARCHAR', false, 255, null);
		$this->addColumn('STATE', 'State', 'VARCHAR', false, 255, null);
		$this->addColumn('ZIP', 'Zip', 'VARCHAR', false, 255, null);
		$this->addColumn('PHONE', 'Phone', 'VARCHAR', false, 255, null);
		$this->addColumn('FAX', 'Fax', 'VARCHAR', false, 255, null);
		$this->addForeignKey('TEMPLATE_ID', 'TemplateId', 'VARCHAR', 'esq_templates', 'ID', false, 255, null);
		$this->addForeignKey('WEBSITE_ATTRIBUTE_ID', 'WebsiteAttributeId', 'VARCHAR', 'esq_website_attributes', 'ID', false, 255, null);
		$this->addColumn('STATUS', 'Status', 'INTEGER', false, null, null);
		$this->addColumn('PATH', 'Path', 'VARCHAR', false, 255, null);
		$this->addForeignKey('HOST_ID', 'HostId', 'VARCHAR', 'esq_hosts', 'ID', true, 255, null);
		$this->addColumn('ANALYTICS_CODE', 'AnalyticsCode', 'VARCHAR', false, 255, null);
		$this->addColumn('PAYMENT_ACCOUNT_ID', 'PaymentAccountId', 'VARCHAR', false, 255, null);
		$this->addColumn('META_DESCRIPTION', 'MetaDescription', 'VARCHAR', false, 255, null);
		$this->addColumn('META_KEYWORDS', 'MetaKeywords', 'VARCHAR', false, 255, null);
		$this->addColumn('SOCIAL_MEDIA', 'SocialMedia', 'LONGVARCHAR', false, null, null);
		$this->addColumn('LAST_PAYMENT_UPDATE', 'LastPaymentUpdate', 'TIMESTAMP', false, null, null);
		$this->addColumn('LAST_BILLING_DATE', 'LastBillingDate', 'DATE', false, null, null);
		$this->addColumn('CANCELLED_AT', 'CancelledAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Customer', 'Customer', RelationMap::MANY_TO_ONE, array('customer_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('PrimaryDomain', 'Domain', RelationMap::MANY_TO_ONE, array('primary_domain_id' => 'id', ), 'SET NULL', null);
    $this->addRelation('WebsiteTemplate', 'WebsiteTemplate', RelationMap::MANY_TO_ONE, array('template_id' => 'id', ), 'SET NULL', null);
    $this->addRelation('WebsiteAttribute', 'WebsiteAttribute', RelationMap::MANY_TO_ONE, array('website_attribute_id' => 'id', ), 'SET NULL', null);
    $this->addRelation('Host', 'Host', RelationMap::MANY_TO_ONE, array('host_id' => 'id', ), 'SET NULL', null);
    $this->addRelation('CheddarGetterNotification', 'CheddarGetterNotification', RelationMap::ONE_TO_MANY, array('id' => 'website_id', ), 'CASCADE', null);
    $this->addRelation('Domain', 'Domain', RelationMap::ONE_TO_MANY, array('id' => 'website_id', ), 'CASCADE', null);
    $this->addRelation('CouponUsage', 'CouponUsage', RelationMap::ONE_TO_MANY, array('id' => 'website_id', ), 'CASCADE', null);
    $this->addRelation('EmailAccount', 'EmailAccount', RelationMap::ONE_TO_MANY, array('id' => 'website_id', ), 'CASCADE', null);
    $this->addRelation('Page', 'Page', RelationMap::ONE_TO_MANY, array('id' => 'website_id', ), 'CASCADE', null);
    $this->addRelation('ClientMessage', 'ClientMessage', RelationMap::ONE_TO_MANY, array('id' => 'website_id', ), 'CASCADE', null);
    $this->addRelation('TemplateCustomization', 'TemplateCustomization', RelationMap::ONE_TO_MANY, array('id' => 'website_id', ), 'CASCADE', null);
    $this->addRelation('Coupon', 'Coupon', RelationMap::MANY_TO_MANY, array(), 'CASCADE', null);
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'sortable' => array('rank_column' => 'rank', 'use_scope' => 'true', 'scope_column' => 'customer_id', ),
			'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // WebsiteTableMap
