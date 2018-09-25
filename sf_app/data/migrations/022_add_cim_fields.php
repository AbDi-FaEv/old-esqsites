<?php

/**
 * Migrations between versions 021 and 022.
 */
class Migration022 extends sfMigration
{
  /**
   * Migrate up to version 022.
   */
  public function up()
  {
    $this -> executeSQL("ALTER TABLE esq_websites ADD `cim_customer_profile_id` VARCHAR(255) NULL DEFAULT NULL AFTER `cg_id`,
      ADD `cim_payment_profile_id` VARCHAR(255) NULL DEFAULT NULL AFTER `cim_customer_profile_id`;");
  }

  /**
   * Migrate down to version 021.
   */
  public function down()
  {
    $this -> executeSQL("ALTER TABLE esq_websites DROP `cim_customer_profile_id`, `cim_payment_profile_id`;");
  }
}
