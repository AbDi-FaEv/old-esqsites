<?php

/**
 * Migrations between versions 010 and 011.
 */
class Migration011 extends sfMigration
{
  /**
   * Migrate up to version 011.
   */
  public function up()
  {
    $this -> executeSQL("ALTER TABLE `esq_customers` ADD `last_login` DATETIME NULL DEFAULT NULL AFTER `status`;");
    $this -> executeSQL("ALTER TABLE `esq_websites` ADD `last_payment_update` DATETIME NULL DEFAULT NULL AFTER `status`;");
  }

  /**
   * Migrate down to version 010.
   */
  public function down()
  {
    $this -> executeSQL("ALTER TABLE `esq_customers` DROP `last_login`;");
    $this -> executeSQL("ALTER TABLE `esq_websites` DROP `last_payment_update`;");
  }
}
