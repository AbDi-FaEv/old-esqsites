<?php



/**
 * This class defines the structure of the 'te_blog_post' table.
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
class teBlogPostTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.teBlogPlugin.lib.model.map.teBlogPostTableMap';

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
		$this->setName('te_blog_post');
		$this->setPhpName('teBlogPost');
		$this->setClassname('teBlogPost');
		$this->setPackage('plugins.teBlogPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addForeignKey('AUTHOR_ID', 'AuthorId', 'INTEGER', 'sf_guard_user', 'ID', false, null, null);
		$this->addColumn('TITLE', 'Title', 'VARCHAR', true, 255, null);
		$this->addColumn('EXTRACT', 'Extract', 'LONGVARCHAR', false, null, null);
		$this->addColumn('CONTENT', 'Content', 'LONGVARCHAR', false, null, null);
		$this->addColumn('IS_PUBLISHED', 'IsPublished', 'BOOLEAN', false, null, false);
		$this->addColumn('ALLOW_COMMENTS', 'AllowComments', 'BOOLEAN', false, null, true);
		$this->addColumn('PUBLISHED_AT', 'PublishedAt', 'TIMESTAMP', true, null, null);
		$this->addForeignKey('CREATED_BY', 'CreatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null, null);
		$this->addForeignKey('UPDATED_BY', 'UpdatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null, null);
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
    $this->addRelation('Author', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('author_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('Creator', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('created_by' => 'id', ), 'SET NULL', null);
    $this->addRelation('Updater', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('updated_by' => 'id', ), 'SET NULL', null);
    $this->addRelation('teBlogPostToCategoryLink', 'teBlogPostToCategoryLink', RelationMap::ONE_TO_MANY, array('id' => 'post_id', ), 'CASCADE', null);
    $this->addRelation('Category', 'teBlogPostCategory', RelationMap::MANY_TO_MANY, array(), 'CASCADE', null);
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
			'sluggable' => array('slug_column' => 'slug', 'slug_pattern' => '', 'replace_pattern' => '/\W+/', 'replacement' => '-', 'separator' => '-', 'permanent' => 'true', ),
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // teBlogPostTableMap
