<?php



/**
 * This class defines the structure of the 'esq_website_attributes' table.
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
class WebsiteAttributeTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.WebsiteAttributeTableMap';

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
		$this->setName('esq_website_attributes');
		$this->setPhpName('WebsiteAttribute');
		$this->setClassname('WebsiteAttribute');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'VARCHAR', true, 255, null);
		$this->addColumn('CG_CODE', 'CgCode', 'VARCHAR', true, 255, null);
		$this->addColumn('RANK', 'Rank', 'INTEGER', false, null, null);
		$this->addColumn('DESCRIPTION', 'Description', 'VARCHAR', false, 255, null);
		$this->addColumn('MAX_MAIN_MENU_PAGES', 'MaxMainMenuPages', 'INTEGER', false, null, null);
		$this->addColumn('MAX_EMAILS', 'MaxEmails', 'INTEGER', false, null, null);
		$this->addColumn('PRICE', 'Price', 'FLOAT', false, null, null);
		$this->addColumn('SETUP_PRICE', 'SetupPrice', 'FLOAT', false, null, null);
		$this->addColumn('STATUS', 'Status', 'INTEGER', false, null, null);
		$this->addColumn('INCLUDES_PAYMENT_PAGE', 'IncludesPaymentPage', 'BOOLEAN', false, null, false);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Website', 'Website', RelationMap::ONE_TO_MANY, array('id' => 'website_attribute_id', ), 'SET NULL', null);
    $this->addRelation('CouponToHostingPlanLink', 'CouponToHostingPlanLink', RelationMap::ONE_TO_MANY, array('id' => 'hosting_plan_id', ), 'CASCADE', null);
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
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // WebsiteAttributeTableMap
