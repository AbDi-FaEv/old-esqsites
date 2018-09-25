<?php

/**
 * Migrations between versions 014 and 015.
 */
class Migration015 extends sfMigration
{
  /**
   * Migrate up to version 015.
   */
  public function up()
  {
    $this -> executeSQL("
      CREATE TABLE `esq_bar_association_promo_pages`
      (
          `id` INTEGER  NOT NULL,
          `title` VARCHAR(255)  NOT NULL,
          `content` TEXT,
          `created_at` DATETIME,
          `updated_at` DATETIME,
          PRIMARY KEY (`id`),
          CONSTRAINT `esq_bar_association_promo_pages_FK_1`
              FOREIGN KEY (`id`)
              REFERENCES `esq_bar_associations` (`id`)
      ) ENGINE=MyISAM;"
      );
  }

  /**
   * Migrate down to version 014.
   */
  public function down()
  {
    $this -> executeSQL("DROP TABLE IF EXISTS `esq_bar_association_promo_pages`;");
  }
}
