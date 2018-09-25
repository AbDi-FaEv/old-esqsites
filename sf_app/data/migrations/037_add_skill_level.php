<?php

/**
 * Migrations between versions 036 and 037.
 */
class Migration037 extends sfMigration
{
  /**
   * Migrate up to version 037.
   */
  public function up()
  {
    $this->executeSQL("ALTER TABLE `esq_customers` ADD `skill_level` INT( 11 ) NOT NULL DEFAULT '0' AFTER `last_login`;");
  }

  /**
   * Migrate down to version 036.
   */
  public function down()
  {
    $this->executeSQL("ALTER TABLE `esq_customers` DROP `skill_level`;");
  }
}
