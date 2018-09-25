<?php

/**
 * Migrations between versions 009 and 010.
 */
class Migration010 extends sfMigration
{
  /**
   * Migrate up to version 010.
   */
  public function up()
  {
    $this -> executeSQL('ALTER TABLE esq_domain_names DROP rank, DROP domain_name_attribute_id;');
    $this -> executeSQL('ALTER TABLE esq_website_attributes DROP domain_name_attribute_id;');
    $this -> executeSQL('ALTER TABLE esq_email_accounts DROP customer_id;');
  }

  /**
   * Migrate down to version 009.
   */
  public function down()
  {
    $this -> executeSQL('ALTER TABLE esq_domain_names ADD rank INTEGER(11) NOT NULL, ADD domain_name_attribute_id VARCHAR(255) NOT NULL;');
    $this -> executeSQL('ALTER TABLE esq_website_attributes ADD domain_name_attribute_id VARCHAR(255);');
    $this -> executeSQL('ALTER TABLE esq_email_accounts ADD customer_id VARCHAR(255);');
  }
}
