<?php

/**
 * Migrations between versions 002 and 003.
 */
class Migration003 extends sfMigration
{
  /**
   * Migrate up to version 003.
   */
  public function up()
  {
    $this -> loadSql(sfConfig::get("sf_root_dir")."/data/sql/plugins.teTaskLoggerPlugin.lib.model.schema.sql");
  }

  /**
   * Migrate down to version 002.
   */
  public function down()
  {
    $this -> executeSQL("DROP TABLE IF EXISTS `te_task_logs`");
  }
}
