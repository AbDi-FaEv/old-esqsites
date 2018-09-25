<?php

/**
 * Migrations between versions 031 and 032.
 */
class Migration032 extends sfMigration
{
  /**
   * Migrate up to version 032.
   */
  public function up()
  {
    $this ->loadSql(dirname(__FILE__)."/032_add_template_customization.sql");
  }

  /**
   * Migrate down to version 031.
   */
  public function down()
  {
    $this ->executeSQL("DROP TABLE `esq_template_customizations`;");
  }
}
