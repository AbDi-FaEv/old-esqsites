<?php

/**
 * Migrations between versions 006 and 007.
 */
class Migration007 extends sfMigration
{
  /**
   * Migrate up to version 007.
   */
  public function up()
  {
    $this -> loadSQL(sfConfig::get("sf_data_dir")."/sql/lib.model.cg.schema.sql");
  }

  /**
   * Migrate down to version 006.
   */
  public function down()
  {
    $this -> executeSQL("DROP TABLE `cg_notifications`;");
  }
}
