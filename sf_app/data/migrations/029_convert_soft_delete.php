<?php

/**
 * Migrations between versions 028 and 029.
 */
class Migration029 extends sfMigration
{
  /**
   * Migrate up to version 029.
   */
  public function up()
  {
    $this -> executeSQL("ALTER TABLE `esq_client_messages` ADD `deleted_at` DATETIME AFTER `is_deleted`;");
    $this -> executeSQL("UPDATE `esq_client_messages` SET `deleted_at` = `updated_at` WHERE `is_deleted` = 1;");
    $this -> executeSQL("ALTER TABLE `esq_client_messages` DROP `is_deleted`;");
  }

  /**
   * Migrate down to version 028.
   */
  public function down()
  {
    
  }
}
