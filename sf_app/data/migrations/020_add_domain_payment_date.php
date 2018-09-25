<?php

/**
 * Migrations between versions 019 and 020.
 */
class Migration020 extends sfMigration
{
  /**
   * Migrate up to version 020.
   */
  public function up()
  {
    $this -> executeSQL("ALTER TABLE esq_domain_names DROP `max_emails`, 
      ADD `last_renewal_date` DATE NULL DEFAULT NULL AFTER expiration_date,
      ADD `is_auto_renew` TINYINT(1) NOT NULL DEFAULT 1 AFTER `is_a_record_only`;");
  }

  /**
   * Migrate down to version 019.
   */
  public function down()
  {
    $this -> executeSQL("ALTER TABLE esq_domain_names DROP `last_renewal_date`, ADD `max_emails` INT(11), DROP `is_auto_renew`;");
  }
}
