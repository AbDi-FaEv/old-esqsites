<?php



/**
 * This class defines the structure of the 'esq_client_messages' table.
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
class ClientMessageTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ClientMessageTableMap';

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
		$this->setName('esq_client_messages');
		$this->setPhpName('ClientMessage');
		$this->setClassname('ClientMessage');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'VARCHAR', true, 255, null);
		$this->addForeignKey('WEBSITE_ID', 'WebsiteId', 'VARCHAR', 'esq_websites', 'ID', false, 255, null);
		$this->addColumn('DOMAIN', 'Domain', 'VARCHAR', false, 255, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 255, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', true, 255, null);
		$this->addColumn('PHONE', 'Phone', 'VARCHAR', false, 255, null);
		$this->addColumn('SUBJECT', 'Subject', 'VARCHAR', false, 255, null);
		$this->addColumn('MESSAGE', 'Message', 'LONGVARCHAR', false, null, null);
		$this->addColumn('SUBMITTED_BY_IP', 'SubmittedByIp', 'VARCHAR', false, 255, null);
		$this->addColumn('SUBMITTED_BY_USER_AGENT', 'SubmittedByUserAgent', 'LONGVARCHAR', false, null, null);
		$this->addColumn('IS_SPAM', 'IsSpam', 'BOOLEAN', false, null, false);
		$this->addColumn('IS_VIEWED', 'IsViewed', 'BOOLEAN', false, null, false);
		$this->addColumn('DELETED_AT', 'DeletedAt', 'TIMESTAMP', false, null, null);
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
			'soft_delete' => array('deleted_column' => 'deleted_at', ),
			'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // ClientMessageTableMap
