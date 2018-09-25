<?php



/**
 * This class defines the structure of the 'esq_customers' table.
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
class CustomerTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.CustomerTableMap';

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
		$this->setName('esq_customers');
		$this->setPhpName('Customer');
		$this->setClassname('Customer');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'VARCHAR', true, 32, null);
		$this->addForeignKey('BAR_ASSOCIATION_ID', 'BarAssociationId', 'INTEGER', 'esq_bar_associations', 'ID', false, null, null);
		$this->addColumn('CREDIT_BAR_ASSOCIATION', 'CreditBarAssociation', 'BOOLEAN', false, null, false);
		$this->addForeignKey('SALES_PERSON_ID', 'SalesPersonId', 'INTEGER', 'sf_guard_user', 'ID', false, null, null);
		$this->addColumn('MB_CLIENT_ID', 'MbClientId', 'INTEGER', false, null, null);
		$this->addColumn('ICONTACT_ID', 'IcontactId', 'VARCHAR', false, 255, null);
		$this->addColumn('REFERRAL_CODE', 'ReferralCode', 'VARCHAR', false, 255, null);
		$this->addForeignKey('REFERRED_BY', 'ReferredBy', 'VARCHAR', 'esq_customers', 'ID', false, 32, null);
		$this->addColumn('TYPE', 'Type', 'INTEGER', true, null, null);
		$this->addColumn('USERNAME', 'Username', 'VARCHAR', true, 255, null);
		$this->addColumn('PASSWORD', 'Password', 'VARCHAR', true, 255, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', true, 255, null);
		$this->addColumn('FIRST_NAME', 'FirstName', 'VARCHAR', true, 255, null);
		$this->addColumn('MIDDLE_NAME', 'MiddleName', 'VARCHAR', false, 255, null);
		$this->addColumn('LAST_NAME', 'LastName', 'VARCHAR', true, 255, null);
		$this->addColumn('BIRTHDATE', 'Birthdate', 'VARCHAR', false, 255, null);
		$this->addColumn('PHONE', 'Phone', 'VARCHAR', false, 255, null);
		$this->addColumn('FAX', 'Fax', 'VARCHAR', false, 255, null);
		$this->addColumn('STATUS', 'Status', 'INTEGER', true, null, null);
		$this->addColumn('LAST_LOGIN', 'LastLogin', 'TIMESTAMP', false, null, null);
		$this->addColumn('SKILL_LEVEL', 'SkillLevel', 'INTEGER', false, null, 0);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('BarAssociation', 'BarAssociation', RelationMap::MANY_TO_ONE, array('bar_association_id' => 'id', ), 'SET NULL', null);
    $this->addRelation('SalesPerson', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('sales_person_id' => 'id', ), 'SET NULL', null);
    $this->addRelation('Referrer', 'Customer', RelationMap::MANY_TO_ONE, array('referred_by' => 'id', ), 'SET NULL', null);
    $this->addRelation('CustomerRelatedById', 'Customer', RelationMap::ONE_TO_MANY, array('id' => 'referred_by', ), 'SET NULL', null);
    $this->addRelation('Website', 'Website', RelationMap::ONE_TO_MANY, array('id' => 'customer_id', ), 'CASCADE', null);
    $this->addRelation('WebsiteTemplate', 'WebsiteTemplate', RelationMap::ONE_TO_MANY, array('id' => 'customer_id', ), 'SET NULL', null);
    $this->addRelation('MemberFeedback', 'MemberFeedback', RelationMap::ONE_TO_MANY, array('id' => 'customer_id', ), 'CASCADE', null);
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
			'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // CustomerTableMap
