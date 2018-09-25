<?php



/**
 * This class defines the structure of the 'sf_moderated_content' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.plugins.sfModerationPlugin.lib.model.map
 */
class sfModeratedContentTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.sfModerationPlugin.lib.model.map.sfModeratedContentTableMap';

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
		$this->setName('sf_moderated_content');
		$this->setPhpName('sfModeratedContent');
		$this->setClassname('sfModeratedContent');
		$this->setPackage('plugins.sfModerationPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('OBJECT_ID', 'ObjectId', 'INTEGER', true, null, null);
		$this->addColumn('OBJECT_MODEL', 'ObjectModel', 'VARCHAR', false, 50, null);
		$this->addColumn('USER_NAME', 'UserName', 'VARCHAR', false, 100, null);
		$this->addColumn('USER_EMAIL', 'UserEmail', 'VARCHAR', false, 100, null);
		$this->addColumn('TITLE', 'Title', 'LONGVARCHAR', false, null, null);
		$this->addColumn('CONTENT', 'Content', 'LONGVARCHAR', false, null, null);
		$this->addColumn('URL', 'Url', 'LONGVARCHAR', false, null, null);
		$this->addColumn('STATUS', 'Status', 'INTEGER', false, null, 1);
		$this->addColumn('COMMENT', 'Comment', 'LONGVARCHAR', false, null, null);
		$this->addColumn('MODERATED_AT', 'ModeratedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('OBJECT_UPDATED_AT', 'ObjectUpdatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
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

} // sfModeratedContentTableMap
