<?php

/**
 * Migrations between versions 022 and 023.
 */
class Migration023 extends sfMigration
{
  /**
   * Migrate up to version 023.
   */
  public function up()
  {
    $this -> executeSQL("ALTER TABLE `esq_client_messages` 
      CHANGE `is_viewed` `is_viewed` BOOL NOT NULL DEFAULT '0',
      CHANGE `is_deleted` `is_deleted` BOOL NOT NULL DEFAULT '0'");
  }

  /**
   * Migrate down to version 022.
   */
  public function down()
  {
    
  }
}
