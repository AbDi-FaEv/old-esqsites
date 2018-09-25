<?php

/**
 * Migrations between versions 015 and 016.
 */
class Migration016 extends sfMigration
{
  /**
   * Migrate up to version 016.
   */
  public function up()
  {
    $this -> executeSQL("CREATE TABLE `esq_coupons_to_hosting_plans`
    (
        `coupon_id` VARCHAR(255)  NOT NULL,
        `hosting_plan_id` VARCHAR(255)  NOT NULL,
        PRIMARY KEY (`coupon_id`,`hosting_plan_id`),
        CONSTRAINT `esq_coupons_to_hosting_plans_FK_1`
            FOREIGN KEY (`coupon_id`)
            REFERENCES `esq_coupons` (`id`)
            ON DELETE CASCADE,
        INDEX `esq_coupons_to_hosting_plans_FI_2` (`hosting_plan_id`),
        CONSTRAINT `esq_coupons_to_hosting_plans_FK_2`
            FOREIGN KEY (`hosting_plan_id`)
            REFERENCES `esq_website_attributes` (`id`)
            ON DELETE CASCADE
    ) ENGINE=MyISAM;");
  }

  /**
   * Migrate down to version 015.
   */
  public function down()
  {
    $this -> executeSQL("DROP TABLE IF EXISTS `esq_coupons_to_hosting_plans`;");
  }
}
