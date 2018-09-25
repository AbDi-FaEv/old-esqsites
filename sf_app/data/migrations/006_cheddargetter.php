<?php

/**
 * Migrations between versions 005 and 006.
 */
class Migration006 extends sfMigration
{
  /**
   * Migrate up to version 006.
   */
  public function up()
  {
    $this -> executeSQL('ALTER TABLE esq_websites ADD cg_id VARCHAR(255) NULL DEFAULT NULL AFTER id,
      ADD last_billing_date DATE NULL DEFAULT NULL AFTER social_media;');
    $this -> executeSQL('ALTER TABLE esq_website_attributes ADD cg_code VARCHAR(255) NULL DEFAULT NULL AFTER id;');
    $this -> executeSQL('ALTER TABLE esq_domain_names ADD expiration_date DATE NULL DEFAULT NULL AFTER status;');

    $map = array("2ee8ff86b7a130d69f46735d313f7c2c" => "1_PAGE_WEBSITE",
      "5127e53e7d24bf89d5c1b2632537913e" => "5_PAGE_WEBSITE",
      "5da4d6a5eb921a03af3830c609d42add" => "10_PAGE_WEBSITE_OLD",
      "8abc0115affe9dfb472bcdea285e3fb5" => "10_PAGE_WEBSITE",
      "9d9a877d302cd039cbed11409c6be9ae" => "3_PAGE_WEBSITE_OLD",
      "a34ca56219830139fa31cd61e11a98b1" => "5_PAGE_WEBSITE_OLD",
      "b6adb1a1d22428b350191b654cbcfa69" => "3_PAGE_WEBSITE",
      "d800a5bd694f235c0e4a8006d73daf54" => "7_PAGE_WEBSITE",
      "e44aa8c5dc4b3ef5a1ce1413603b8b12" => "7_PAGE_WEBSITE_OLD"
      );

    foreach($map as $key => $cg_id)
    {
      $this -> executeSQL("UPDATE esq_website_attributes SET cg_code = '".$cg_id."' WHERE id = '".$key."' LIMIT 1;");
    }
  }

  /**
   * Migrate down to version 005.
   */
  public function down()
  {
    $this -> executeSQL('ALTER TABLE esq_websites DROP cg_id, DROP last_billing_date;');
    $this -> executeSQL('ALTER TABLE esq_website_attributes DROP cg_code;');
    $this -> executeSQL('ALTER TABLE esq_domain_names DROP expiration_date;');
  }
}
