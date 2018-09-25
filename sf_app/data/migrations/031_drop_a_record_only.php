<?php

/**
 * Migrations between versions 030 and 031.
 */
class Migration031 extends sfMigration
{
  /**
   * Migrate up to version 031.
   */
  public function up()
  {
    $this -> executeSQL("ALTER TABLE `esq_domain_names` DROP `is_a_record_only`;");
  }

  /**
   * Migrate down to version 030.
   */
  public function down()
  {
    
  }
}
