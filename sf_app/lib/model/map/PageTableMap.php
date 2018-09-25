<?php



/**
 * This class defines the structure of the 'esq_pages' table.
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
class PageTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.PageTableMap';

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
		$this->setName('esq_pages');
		$this->setPhpName('Page');
		$this->setClassname('Page');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'VARCHAR', true, 255, null);
		$this->addForeignKey('WEBSITE_ID', 'WebsiteId', 'VARCHAR', 'esq_websites', 'ID', false, 255, null);
		$this->addForeignKey('TEMPLATE_TYPE_ID', 'TemplateTypeId', 'VARCHAR', 'esq_template_types', 'ID', false, 255, null);
		$this->addColumn('MENU_TYPE', 'MenuType', 'INTEGER', false, null, null);
		$this->addForeignKey('PAGE_CONTENT_DISPLAY_TYPE_ID', 'PageContentDisplayTypeId', 'VARCHAR', 'esq_page_content_display_types', 'ID', true, 255, null);
		$this->addColumn('RANK', 'Rank', 'INTEGER', false, null, null);
		$this->addColumn('TITLE', 'Title', 'VARCHAR', true, 255, null);
		$this->addColumn('META_TITLE', 'MetaTitle', 'VARCHAR', false, 255, null);
		$this->addColumn('META_DESCRIPTION', 'MetaDescription', 'VARCHAR', false, 255, null);
		$this->addColumn('META_KEYWORDS', 'MetaKeywords', 'VARCHAR', false, 255, null);
		$this->addColumn('META_CONTENT', 'MetaContent', 'VARCHAR', false, 255, null);
		$this->addColumn('LINK_NAME', 'LinkName', 'VARCHAR', false, 255, null);
		$this->addColumn('URL', 'Url', 'VARCHAR', false, 255, null);
		$this->addColumn('STATUS', 'Status', 'INTEGER', false, null, null);
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
    $this->addRelation('TemplateType', 'TemplateType', RelationMap::MANY_TO_ONE, array('template_type_id' => 'id', ), 'SET NULL', null);
    $this->addRelation('PageContentDisplayType', 'PageContentDisplayType', RelationMap::MANY_TO_ONE, array('page_content_display_type_id' => 'id', ), 'SET NULL', null);
    $this->addRelation('PageGroup', 'PageGroup', RelationMap::ONE_TO_MANY, array('id' => 'page_id', ), 'CASCADE', null);
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
			'sluggable' => array('slug_column' => 'url', 'slug_pattern' => '{Title}', 'replace_pattern' => '/\W+/', 'replacement' => '-', 'separator' => '-', 'permanent' => 'true', ),
			'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // PageTableMap
