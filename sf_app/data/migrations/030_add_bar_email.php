<?php

/**
 * Migrations between versions 029 and 030.
 */
class Migration030 extends sfMigration
{
  /**
   * Migrate up to version 030.
   */
  public function up()
  {
    $this -> executeSQL("ALTER TABLE `esq_bar_associations` ADD `primary_contact_email` VARCHAR(255) NULL DEFAULT NULL AFTER `abbreviation`;");
  }

  /**
   * Migrate down to version 029.
   */
  public function down()
  {
    $this -> executeSQL("ALTER TABLE `esq_bar_associations` DROP `primary_contact_email`;");
  }
}
