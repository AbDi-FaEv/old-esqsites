<?php



/**
 * This class defines the structure of the 'esq_coupons_to_hosting_plans' table.
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
class CouponToHostingPlanLinkTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.CouponToHostingPlanLinkTableMap';

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
		$this->setName('esq_coupons_to_hosting_plans');
		$this->setPhpName('CouponToHostingPlanLink');
		$this->setClassname('CouponToHostingPlanLink');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('COUPON_ID', 'CouponId', 'VARCHAR' , 'esq_coupons', 'ID', true, 255, null);
		$this->addForeignPrimaryKey('HOSTING_PLAN_ID', 'HostingPlanId', 'VARCHAR' , 'esq_website_attributes', 'ID', true, 255, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Coupon', 'Coupon', RelationMap::MANY_TO_ONE, array('coupon_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('WebsiteAttribute', 'WebsiteAttribute', RelationMap::MANY_TO_ONE, array('hosting_plan_id' => 'id', ), 'CASCADE', null);
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
			'symfony' => array('form' => 'false', 'filter' => 'false', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // CouponToHostingPlanLinkTableMap
