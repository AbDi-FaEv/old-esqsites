<?php

/**
 * Migrations between versions 033 and 034.
 */
class Migration034 extends sfMigration
{
  /**
   * Migrate up to version 034.
   */
  public function up()
  {
    $this -> executeSQL("ALTER TABLE `esq_client_messages` ADD `submitted_by_ip` VARCHAR( 255 ) NULL DEFAULT NULL AFTER `is_viewed`;");
  }

  /**
   * Migrate down to version 033.
   */
  public function down()
  {
    $this -> executeSQL("ALTER TABLE `esq_client_messages` DROP `submitted_by_id`;");
  }
}
