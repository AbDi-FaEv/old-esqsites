<?php

/**
 * Migrations between versions 027 and 028.
 */
class Migration028 extends sfMigration
{
  /**
   * Migrate up to version 028.
   */
  public function up()
  {
    $this -> executeSQL("ALTER TABLE esq_customers ADD `referral_code` VARCHAR(255) NULL DEFAULT NULL AFTER `mb_client_id`,
      ADD `referred_by` VARCHAR(32) NULL DEFAULT NULL AFTER `referral_code`, ADD UNIQUE (`referral_code`);");
    //this needs index and constraint
  }

  /**
   * Migrate down to version 027.
   */
  public function down()
  {
    $this -> executeSQL("ALTER TABLE esq_customers DROP referral_code, DROP referred_by;");
  }
}
