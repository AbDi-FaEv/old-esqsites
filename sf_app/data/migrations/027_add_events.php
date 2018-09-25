<?php

/**
 * Migrations between versions 026 and 027.
 */
class Migration027 extends sfMigration
{
  /**
   * Migrate up to version 027.
   */
  public function up()
  {
    $this -> loadSql(sfConfig::get("sf_data_dir")."/sql/plugins.teEventCalendarPlugin.lib.model.schema.sql");
  }

  /**
   * Migrate down to version 026.
   */
  public function down()
  {
    $this -> executeSQL("DROP TABLE IF EXISTS `te_calendar_events`;");
  }
}
