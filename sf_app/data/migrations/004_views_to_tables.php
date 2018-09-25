<?php

/**
 * Migrations between versions 003 and 004.
 */
class Migration004 extends sfMigration
{
  /**
   * Migrate up to version 004.
   */
  public function up()
  {
    $this -> loadSql(sfConfig::get("sf_data_dir")."/migrations/004_views_to_tables.sql");
  }

  /**
   * Migrate down to version 003.
   */
  public function down()
  {
    
  }
}
