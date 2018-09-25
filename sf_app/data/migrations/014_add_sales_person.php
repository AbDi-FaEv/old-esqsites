<?php

/**
 * Migrations between versions 013 and 014.
 */
class Migration014 extends sfMigration
{
  /**
   * Migrate up to version 014.
   */
  public function up()
  {
    $this -> executeSQL("ALTER TABLE `esq_customers` ADD `sales_person_id` INT( 11 ) NULL DEFAULT NULL AFTER `bar_association_id`;");
    $this -> executeSQL("ALTER TABLE `esq_customers` ADD INDEX ( `sales_person_id` );");
  }

  /**
   * Migrate down to version 013.
   */
  public function down()
  {
    $this -> executeSQL("ALTER TABLE `esq_customers` DROP `sales_person_id`;");
  }
}
