<?php

/**
 * Migrations between versions 035 and 036.
 */
class Migration036 extends sfMigration
{
  /**
   * Migrate up to version 036.
   */
  public function up()
  {
    $this -> executeSQL("ALTER TABLE `esq_client_messages` 
      ADD `submitted_by_user_agent` TEXT NULL AFTER `submitted_by_ip`,
      ADD `is_spam` BOOL NULL DEFAULT NULL AFTER `is_viewed`;");
  }

  /**
   * Migrate down to version 035.
   */
  public function down()
  {
    $this -> executeSQL("ALTER TABLE `esq_client_messages` DROP `submitted_by_user_agent`, DROP `is_spam`;");
  }
}
