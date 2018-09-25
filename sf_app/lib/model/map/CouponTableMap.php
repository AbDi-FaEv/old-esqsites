<?php



/**
 * This class defines the structure of the 'esq_coupons' table.
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
class CouponTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.CouponTableMap';

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
		$this->setName('esq_coupons');
		$this->setPhpName('Coupon');
		$this->setClassname('Coupon');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'VARCHAR', true, 255, null);
		$this->addColumn('CODE', 'Code', 'VARCHAR', true, 255, null);
		$this->addColumn('STATUS', 'Status', 'INTEGER', false, null, null);
		$this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', true, null, null);
		$this->addColumn('SETUP', 'Setup', 'FLOAT', false, null, null);
		$this->addColumn('CURRENT_USAGE', 'CurrentUsage', 'INTEGER', false, null, null);
		$this->addColumn('MAX_USAGE', 'MaxUsage', 'INTEGER', false, null, null);
		$this->addForeignKey('BAR_ASSOCIATION_ID', 'BarAssociationId', 'INTEGER', 'esq_bar_associations', 'ID', false, null, null);
		$this->addColumn('ACTIVATION_DATE', 'ActivationDate', 'TIMESTAMP', false, null, null);
		$this->addColumn('EXPIRATION_DATE', 'ExpirationDate', 'TIMESTAMP', false, null, null);
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
    $this->addRelation('CouponToHostingPlanLink', 'CouponToHostingPlanLink', RelationMap::ONE_TO_MANY, array('id' => 'coupon_id', ), 'CASCADE', null);
    $this->addRelation('CouponUsage', 'CouponUsage', RelationMap::ONE_TO_MANY, array('code' => 'coupon_code', ), null, null);
    $this->addRelation('WebsiteAttribute', 'WebsiteAttribute', RelationMap::MANY_TO_MANY, array(), null, null);
    $this->addRelation('Website', 'Website', RelationMap::MANY_TO_MANY, array(), null, null);
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

} // CouponTableMap
