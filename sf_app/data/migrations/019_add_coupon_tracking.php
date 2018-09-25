<?php

/**
 * Migrations between versions 018 and 019.
 */
class Migration019 extends sfMigration
{
  /**
   * Migrate up to version 019.
   */
  public function up()
  {
    $this -> executeSQL("ALTER TABLE esq_coupons ADD current_usage INT(3) NULL DEFAULT NULL AFTER setup, ADD max_usage INT(3) NULL DEFAULT NULL AFTER current_usage;");
    $this -> executeSQL("ALTER TABLE esq_customers ADD credit_bar_association TINYINT(1) DEFAULT 0 AFTER bar_association_id;");
    $this -> executeSQL('CREATE TABLE `esq_coupon_usage`
      (
          `website_id` VARCHAR(255),
          `coupon_code` VARCHAR(255),
          `coupon_description` VARCHAR(255),
          `coupon_raw_dump` TEXT,
          `created_at` DATETIME,
          `id` INTEGER  NOT NULL AUTO_INCREMENT,
          PRIMARY KEY (`id`),
          INDEX `esq_coupon_usage_FI_1` (`website_id`),
          CONSTRAINT `esq_coupon_usage_FK_1`
              FOREIGN KEY (`website_id`)
              REFERENCES `esq_websites` (`id`)
              ON DELETE CASCADE
      ) ENGINE=MyISAM;');
  }

  /**
   * Migrate down to version 018.
   */
  public function down()
  {
    $this -> executeSQL("ALTER TABLE esq_coupons DROP max_usage, DROP current_usage;");
    $this -> executeSQL("ALTER TABLE esq_customers DROP credit_bar_association;");
    $this -> executeSQL("DROP TABLE IF EXISTS `esq_coupon_usage`;");
  }
}
