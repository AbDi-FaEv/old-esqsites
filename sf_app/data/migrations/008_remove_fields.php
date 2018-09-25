<?php

/**
 * Migrations between versions 007 and 008.
 */
class Migration008 extends sfMigration
{
  /**
   * Migrate up to version 008.
   */
  public function up()
  {
    $this -> executeSQL("ALTER TABLE esq_pages
      DROP control_panel_picture,
      DROP max_children,
      DROP edit_status,
      DROP customer_id,
      DROP logo;");
    $this -> executeSQL("ALTER TABLE esq_page_entries DROP customer_id, DROP website_id, DROP page_id, DROP object_type, DROP status;");
    $this -> executeSQL("ALTER TABLE esq_page_groups DROP customer_id, DROP website_id, DROP object_type, DROP status, DROP max_children;");
    $this -> executeSQL("ALTER TABLE esq_client_messages DROP customer_id;");
    $this -> executeSQL("ALTER TABLE esq_coupons_to_websites DROP row_id;");
    $this -> executeSQL("DROP TABLE membersession");
  }

  /**
   * Migrate down to version 007.
   */
  public function down()
  {
    
  }
}
