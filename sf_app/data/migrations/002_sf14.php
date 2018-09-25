<?php

/**
 * Migrations between versions 001 and 002.
 */
class Migration002 extends sfMigration
{
  /**
   * Migrate up to version 002.
   */
  public function up()
  {
    $this -> executeSQL('ALTER TABLE `te_blog_post` CHANGE `stripped_title` `slug` VARCHAR(255)');
  }

  /**
   * Migrate down to version 001.
   */
  public function down()
  {
    $this -> executeSQL('ALTER TABLE `te_blog_post` CHANGE `slug` `stripped_title` VARCHAR(255)');
  }
}
