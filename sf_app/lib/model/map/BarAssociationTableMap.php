<?php



/**
 * This class defines the structure of the 'esq_bar_associations' table.
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
class BarAssociationTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.BarAssociationTableMap';

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
		$this->setName('esq_bar_associations');
		$this->setPhpName('BarAssociation');
		$this->setClassname('BarAssociation');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 255, null);
		$this->addColumn('ABBREVIATION', 'Abbreviation', 'VARCHAR', false, 255, null);
		$this->addColumn('PRIMARY_CONTACT_EMAIL', 'PrimaryContactEmail', 'VARCHAR', false, 255, null);
		$this->addColumn('CONTACT_INFO', 'ContactInfo', 'LONGVARCHAR', false, null, null);
		$this->addColumn('NOTES', 'Notes', 'LONGVARCHAR', false, null, null);
		$this->addColumn('PASSWORD', 'Password', 'VARCHAR', false, 255, null);
		$this->addColumn('LAST_LOGIN', 'LastLogin', 'TIMESTAMP', false, null, null);
		$this->addColumn('AFFINITY_EXPIRATION_DATE', 'AffinityExpirationDate', 'DATE', false, null, null);
		$this->addColumn('AFFINITY_START_DATE', 'AffinityStartDate', 'DATE', false, null, null);
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('SLUG', 'Slug', 'VARCHAR', false, 255, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Customer', 'Customer', RelationMap::ONE_TO_MANY, array('id' => 'bar_association_id', ), 'SET NULL', null);
    $this->addRelation('Coupon', 'Coupon', RelationMap::ONE_TO_MANY, array('id' => 'bar_association_id', ), 'SET NULL', null);
    $this->addRelation('BarAssociationPromoPage', 'BarAssociationPromoPage', RelationMap::ONE_TO_ONE, array('id' => 'id', ), null, null);
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
			'auto_add_id' => array(),
			'sluggable' => array('slug_column' => 'slug', 'slug_pattern' => '', 'replace_pattern' => '/\W+/', 'replacement' => '-', 'separator' => '-', 'permanent' => 'true', ),
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // BarAssociationTableMap
