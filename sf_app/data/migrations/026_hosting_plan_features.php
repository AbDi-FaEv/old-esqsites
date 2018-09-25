<?php

/**
 * Migrations between versions 025 and 026.
 */
class Migration026 extends sfMigration
{
  /**
   * Migrate up to version 026.
   */
  public function up()
  {
    $this -> executeSQL("ALTER TABLE `esq_website_attributes` ADD `includes_payment_page` TINYINT(1) DEFAULT 0 AFTER `status`;");
  }

  /**
   * Migrate down to version 025.
   */
  public function down()
  {
    $this -> executeSQL("ALTER TABLE `esq_website_attributes` DROP `includes_payment_page`;");
  }
}
