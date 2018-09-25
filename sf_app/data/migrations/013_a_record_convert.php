<?php

/**
 * Migrations between versions 012 and 013.
 */
class Migration013 extends sfMigration
{
  /**
   * Migrate up to version 013.
   */
  public function up()
  {
    $this -> executeSQL("UPDATE `esq_domain_names` SET `is_a_record_only` = 0 WHERE `is_a_record_only` != 1;");
    $this -> executeSQL("ALTER TABLE `esq_domain_names` CHANGE `is_a_record_only` `is_a_record_only` BOOL NOT NULL DEFAULT 0;");
  }

  /**
   * Migrate down to version 012.
   */
  public function down()
  {
    
  }
}
