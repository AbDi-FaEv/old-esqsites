<?php



/**
 * This class defines the structure of the 'esq_template_customizations' table.
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
class TemplateCustomizationTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.TemplateCustomizationTableMap';

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
		$this->setName('esq_template_customizations');
		$this->setPhpName('TemplateCustomization');
		$this->setClassname('TemplateCustomization');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addForeignKey('WEBSITE_ID', 'WebsiteId', 'VARCHAR', 'esq_websites', 'ID', true, 255, null);
		$this->addForeignKey('TEMPLATE_ID', 'TemplateId', 'VARCHAR', 'esq_templates', 'ID', false, 255, null);
		$this->addColumn('TYPE', 'Type', 'VARCHAR', true, 255, null);
		$this->addColumn('CONTENT', 'Content', 'VARCHAR', false, 255, null);
		$this->addColumn('REFERENCE', 'Reference', 'VARCHAR', false, 255, null);
		$this->addColumn('RELATED_FILE', 'RelatedFile', 'VARCHAR', false, 255, null);
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
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
    $this->addRelation('WebsiteTemplate', 'WebsiteTemplate', RelationMap::MANY_TO_ONE, array('template_id' => 'id', ), 'CASCADE', null);
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

} // TemplateCustomizationTableMap
