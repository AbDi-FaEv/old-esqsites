<?php

/**
 * Migrations between versions 011 and 012.
 */
class Migration012 extends sfMigration
{
  /**
   * Migrate up to version 012.
   */
  public function up()
  {
    $this -> executeSQL("ALTER TABLE `esq_websites` ADD `cancelled_at` DATETIME NULL DEFAULT NULL AFTER `last_billing_date`;");
    $this -> loadSQL(sfConfig::get("sf_data_dir")."/sql/lib.model.cg.schema.sql");
  }

  /**
   * Migrate down to version 011.
   */
  public function down()
  {
    $this -> executeSQL("ALTER TABLE `esq_websites` DROP `cancelled_at`;");
    $this -> executeSQL("DROP TABLE `cg_notifications`;");
  }
}
