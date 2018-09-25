<?php



/**
 * This class defines the structure of the 'sf_comment' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.plugins.sfPropelActAsCommentableBehaviorPlugin.lib.model.map
 */
class sfCommentTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.sfPropelActAsCommentableBehaviorPlugin.lib.model.map.sfCommentTableMap';

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
		$this->setName('sf_comment');
		$this->setPhpName('sfComment');
		$this->setClassname('sfComment');
		$this->setPackage('plugins.sfPropelActAsCommentableBehaviorPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('COMMENTABLE_MODEL', 'CommentableModel', 'VARCHAR', false, 30, null);
		$this->addColumn('COMMENTABLE_ID', 'CommentableId', 'VARCHAR', false, 255, null);
		$this->addColumn('COMMENT_NAMESPACE', 'CommentNamespace', 'VARCHAR', false, 50, null);
		$this->addColumn('TITLE', 'Title', 'VARCHAR', false, 100, null);
		$this->addColumn('TEXT', 'Text', 'LONGVARCHAR', false, null, null);
		$this->addForeignKey('AUTHOR_ID', 'AuthorId', 'INTEGER', 'sf_guard_user', 'ID', false, null, null);
		$this->addColumn('AUTHOR_NAME', 'AuthorName', 'VARCHAR', false, 50, null);
		$this->addColumn('AUTHOR_EMAIL', 'AuthorEmail', 'VARCHAR', false, 100, null);
		$this->addColumn('AUTHOR_WEBSITE', 'AuthorWebsite', 'VARCHAR', false, 255, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Author', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('author_id' => 'id', ), 'SET NULL', null);
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
			'symfony_timestampable' => array('create_column' => 'created_at', ),
		);
	} // getBehaviors()

} // sfCommentTableMap
