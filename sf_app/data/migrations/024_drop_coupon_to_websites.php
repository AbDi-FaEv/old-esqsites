<?php

/**
 * Migrations between versions 023 and 024.
 */
class Migration024 extends sfMigration
{
  /**
   * Migrate up to version 024.
   */
  public function up()
  {
    $this -> executeSQL("DROP TABLE `esq_coupons_to_websites`;");
  }

  /**
   * Migrate down to version 023.
   */
  public function down()
  {
    
  }
}
