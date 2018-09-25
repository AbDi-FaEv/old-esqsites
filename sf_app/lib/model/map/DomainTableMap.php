<?php



/**
 * This class defines the structure of the 'esq_domain_names' table.
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
class DomainTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.DomainTableMap';

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
		$this->setName('esq_domain_names');
		$this->setPhpName('Domain');
		$this->setClassname('Domain');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'VARCHAR', true, 255, null);
		$this->addForeignKey('WEBSITE_ID', 'WebsiteId', 'VARCHAR', 'esq_websites', 'ID', true, 255, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 255, null);
		$this->addColumn('TYPE', 'Type', 'VARCHAR', false, 255, null);
		$this->addColumn('REGISTRATION_TYPE', 'RegistrationType', 'VARCHAR', false, 255, null);
		$this->addColumn('IS_AUTO_RENEW', 'IsAutoRenew', 'BOOLEAN', false, null, true);
		$this->addColumn('STATUS', 'Status', 'INTEGER', false, null, null);
		$this->addColumn('EXPIRATION_DATE', 'ExpirationDate', 'DATE', false, null, null);
		$this->addColumn('LAST_RENEWAL_DATE', 'LastRenewalDate', 'DATE', false, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Website', 'Website', RelationMap::MANY_TO_ONE, array('website_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('WebsiteRelatedByPrimaryDomainId', 'Website', RelationMap::ONE_TO_MANY, array('id' => 'primary_domain_id', ), 'SET NULL', null);
    $this->addRelation('DomainCheck', 'DomainCheck', RelationMap::ONE_TO_MANY, array('id' => 'domain_id', ), 'CASCADE', null);
    $this->addRelation('EmailAccount', 'EmailAccount', RelationMap::ONE_TO_MANY, array('id' => 'domain_name_id', ), 'CASCADE', null);
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

} // DomainTableMap
