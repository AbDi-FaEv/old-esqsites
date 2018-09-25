<?php



/**
 * This class defines the structure of the 'esq_templates' table.
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
class WebsiteTemplateTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.WebsiteTemplateTableMap';

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
		$this->setName('esq_templates');
		$this->setPhpName('WebsiteTemplate');
		$this->setClassname('WebsiteTemplate');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'VARCHAR', true, 255, null);
		$this->addColumn('TYPE', 'Type', 'VARCHAR', true, 255, null);
		$this->addColumn('REFERENCE', 'Reference', 'VARCHAR', true, 255, null);
		$this->addForeignKey('CATEGORY_ID', 'CategoryId', 'VARCHAR', 'esq_template_categories', 'ID', false, 255, null);
		$this->addColumn('TITLE', 'Title', 'VARCHAR', false, 255, null);
		$this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null, null);
		$this->addForeignKey('CUSTOMER_ID', 'CustomerId', 'VARCHAR', 'esq_customers', 'ID', false, 255, null);
		$this->addColumn('STATUS', 'Status', 'INTEGER', false, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('RANK', 'Rank', 'INTEGER', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('TemplateCategory', 'TemplateCategory', RelationMap::MANY_TO_ONE, array('category_id' => 'id', ), 'SET NULL', null);
    $this->addRelation('Customer', 'Customer', RelationMap::MANY_TO_ONE, array('customer_id' => 'id', ), 'SET NULL', null);
    $this->addRelation('Website', 'Website', RelationMap::ONE_TO_MANY, array('id' => 'template_id', ), 'SET NULL', null);
    $this->addRelation('TemplateCustomization', 'TemplateCustomization', RelationMap::ONE_TO_MANY, array('id' => 'template_id', ), 'CASCADE', null);
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
			'sortable' => array('rank_column' => 'rank', 'use_scope' => 'false', 'scope_column' => 'sortable_scope', ),
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // WebsiteTemplateTableMap
