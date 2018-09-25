<?php

/**
 * Migrations between versions 020 and 021.
 */
class Migration021 extends sfMigration
{
  /**
   * Migrate up to version 021.
   */
  public function up()
  {
    $this -> executeSQL("ALTER TABLE esq_bar_associations ADD affinity_start_date DATE NULL DEFAULT NULL AFTER affinity_expiration_date;");
  }

  /**
   * Migrate down to version 020.
   */
  public function down()
  {
    $this -> executeSQL("ALTER TABLE esq_bar_associations DROP affinity_start_date;");
  }
}
