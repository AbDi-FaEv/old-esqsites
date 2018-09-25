<?php



/**
 * This class defines the structure of the 'te_task_logs' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.plugins.teTaskLoggerPlugin.lib.model.map
 */
class teTaskLogTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.teTaskLoggerPlugin.lib.model.map.teTaskLogTableMap';

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
		$this->setName('te_task_logs');
		$this->setPhpName('teTaskLog');
		$this->setClassname('teTaskLog');
		$this->setPackage('plugins.teTaskLoggerPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('TASK_NAME', 'TaskName', 'VARCHAR', true, 255, null);
		$this->addColumn('ARGUMENTS', 'Arguments', 'VARCHAR', false, 255, null);
		$this->addColumn('OPTIONS', 'Options', 'VARCHAR', false, 255, null);
		$this->addColumn('SUMMARY', 'Summary', 'VARCHAR', false, 255, null);
		$this->addColumn('STARTED_AT', 'StartedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('ENDED_AT', 'EndedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('STATUS', 'Status', 'VARCHAR', false, 255, null);
		$this->addColumn('LOG_FILE', 'LogFile', 'VARCHAR', false, 255, null);
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
			'timestampable' => array('create_column' => 'started_at', 'update_column' => 'ended_at', ),
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // teTaskLogTableMap
