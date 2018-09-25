<?php

/**
 * Migrations between versions 016 and 017.
 */
class Migration017 extends sfMigration
{
  /**
   * Migrate up to version 017.
   */
  public function up()
  {
    $this -> executeSQL("ALTER TABLE esq_coupons 
      DROP `mb_coupon_id`, 
      DROP `price`, 
      DROP `cycle_price`, 
      DROP `num_cycles`,
      DROP `website_attribute_id`,
      ADD `bar_association_id` INTEGER AFTER `setup`,
      ADD `activation_date` DATETIME AFTER `bar_association_id`,
      ADD `expiration_date` DATETIME AFTER `activation_date`");

    $this -> executeSQL("ALTER TABLE esq_coupons ADD CONSTRAINT `esq_coupons_FK_1`
		FOREIGN KEY (`bar_association_id`)
		REFERENCES `esq_bar_associations` (`id`)
		ON DELETE SET NULL");
  }

  /**
   * Migrate down to version 016.
   */
  public function down()
  {
    
  }
}
