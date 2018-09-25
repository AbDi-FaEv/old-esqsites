<?php



/**
 * This class defines the structure of the 'te_blog_posts_to_categories' table.
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
class teBlogPostToCategoryLinkTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.teBlogPlugin.lib.model.map.teBlogPostToCategoryLinkTableMap';

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
		$this->setName('te_blog_posts_to_categories');
		$this->setPhpName('teBlogPostToCategoryLink');
		$this->setClassname('teBlogPostToCategoryLink');
		$this->setPackage('plugins.teBlogPlugin.lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('POST_ID', 'PostId', 'INTEGER' , 'te_blog_post', 'ID', true, null, null);
		$this->addForeignPrimaryKey('CATEGORY_ID', 'CategoryId', 'INTEGER' , 'te_blog_post_category', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Post', 'teBlogPost', RelationMap::MANY_TO_ONE, array('post_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('Category', 'teBlogPostCategory', RelationMap::MANY_TO_ONE, array('category_id' => 'id', ), 'CASCADE', null);
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

} // teBlogPostToCategoryLinkTableMap
