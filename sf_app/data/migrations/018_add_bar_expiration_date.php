<?php

/**
 * Migrations between versions 017 and 018.
 */
class Migration018 extends sfMigration
{
  /**
   * Migrate up to version 018.
   */
  public function up()
  {
    $this -> executeSQL("ALTER TABLE esq_bar_associations ADD affinity_expiration_date DATE NULL DEFAULT NULL AFTER `last_login`;");
  }

  /**
   * Migrate down to version 017.
   */
  public function down()
  {
    $this -> executeSQL("ALTER TABLE esq_bar_associations DROP affinity_expiration_date;");
  }
}
