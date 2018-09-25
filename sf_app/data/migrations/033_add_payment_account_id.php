<?php

/**
 * Migrations between versions 032 and 033.
 */
class Migration033 extends sfMigration
{
  /**
   * Migrate up to version 033.
   */
  public function up()
  {
    $this ->executeSQL("ALTER TABLE `esq_websites` ADD `payment_account_id` VARCHAR( 255 ) NULL DEFAULT NULL AFTER `analytics_code`;");
  }

  /**
   * Migrate down to version 032.
   */
  public function down()
  {
    $this -> executeSQL("ALTER TABLE `esq_websites` DROP `payment_account_id`;");
  }
}
