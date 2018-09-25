<?php

/**
 * Migrations between versions 008 and 009.
 */
class Migration009 extends sfMigration
{
  /**
   * Migrate up to version 009.
   */
  public function up()
  {
    $this -> executeSQL("ALTER TABLE `esq_page_entries` CHANGE `rank` `rank` INT( 11 ) NULL DEFAULT NULL;");
    $this -> executeSQL("ALTER TABLE `esq_page_groups` CHANGE `rank` `rank` INT( 11 ) NULL DEFAULT NULL;");
  }

  /**
   * Migrate down to version 008.
   */
  public function down()
  {
    $this -> executeSQL("ALTER TABLE `esq_page_entries` CHANGE `rank` `rank` VARCHAR( 11 ) NULL DEFAULT NULL;");
    $this -> executeSQL("ALTER TABLE `esq_page_groups` CHANGE `rank` `rank` VARCHAR( 11 ) NULL DEFAULT NULL;");
  }
}
