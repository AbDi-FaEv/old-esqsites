<?php

/**
 * Migrations between versions 004 and 005.
 */
class Migration005 extends sfMigration
{
  /**
   * Migrate up to version 005.
   */
  public function up()
  {
    

    $this -> executeSql("CREATE TABLE `esq_bar_associations`
(
	`name` VARCHAR(255)  NOT NULL,
	`abbreviation` VARCHAR(255),
	`contact_info` TEXT,
	`notes` TEXT,
	`password` VARCHAR(255),
	`last_login` DATETIME,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`slug` VARCHAR(255),
	PRIMARY KEY (`id`),
	UNIQUE KEY `name` (`name`),
	UNIQUE KEY `esq_bar_associations_slug` (`slug`(255))
) ENGINE=MyISAM;");

    $this -> executeSql("ALTER TABLE esq_customers ADD `bar_association_id` INTEGER AFTER `id`, ADD INDEX `esq_customers_FI_1` (`bar_association_id`),
	ADD CONSTRAINT `esq_customers_FK_1`
		FOREIGN KEY (`bar_association_id`)
		REFERENCES `esq_bar_associations` (`id`)
		ON DELETE SET NULL");
  }

  /**
   * Migrate down to version 004.
   */
  public function down()
  {
    $this -> executeSql("DROP TABLE IF EXISTS `esq_bar_associations`;");
  }
}
