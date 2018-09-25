<?php

/**
 * Migrations between versions 024 and 025.
 */
class Migration025 extends sfMigration
{
  /**
   * Migrate up to version 025.
   */
  public function up()
  {
    $this -> executeSQL("ALTER TABLE `esq_website_attributes` DROP `max_sub_menu_pages`, DROP `mb_product_id`, DROP `mb_cycle_id`;");
  }

  /**
   * Migrate down to version 024.
   */
  public function down()
  {
    
  }
}
