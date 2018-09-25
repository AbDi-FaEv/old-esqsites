<?php



/**
 * This class defines the structure of the 'te_blog_post_category' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.plugins.teBlogPlugin.lib.model.map
 */
class teBlogPostCategoryTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.teBlogPlugin.lib.model.map.teBlogPostCategoryTableMap';

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
		$this->setName('te_blog_post_category');
		$this->setPhpName('teBlogPostCategory');
		$this->setClassname('teBlogPostCategory');
		$this->setPackage('plugins.teBlogPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 255, null);
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
    $this->addRelation('teBlogPostToCategoryLink', 'teBlogPostToCategoryLink', RelationMap::ONE_TO_MANY, array('id' => 'category_id', ), 'CASCADE', null);
    $this->addRelation('Post', 'teBlogPost', RelationMap::MANY_TO_MANY, array(), 'CASCADE', null);
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
			'auto_add_id' => array(),
			'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
			'sluggable' => array('slug_column' => 'slug', 'slug_pattern' => '', 'replace_pattern' => '/\W+/', 'replacement' => '-', 'separator' => '-', 'permanent' => 'true', ),
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // teBlogPostCategoryTableMap
