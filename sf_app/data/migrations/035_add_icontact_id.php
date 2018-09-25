<?php

/**
 * Migrations between versions 034 and 035.
 */
class Migration035 extends sfMigration
{
  /**
   * Migrate up to version 035.
   */
  public function up()
  {
    $this -> executeSQL("ALTER TABLE `esq_customers` ADD `icontact_id` VARCHAR( 255 ) NULL AFTER `mb_client_id`;");
  }

  /**
   * Migrate down to version 034.
   */
  public function down()
  {
    $this -> executeSQL("ALTER TABLE `esq_customers` DROP `icontact_id`;");
  }
}
