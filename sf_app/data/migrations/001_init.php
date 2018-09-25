<?php

/**
 * Migrations between versions 000 and 001.
 */
class Migration001 extends sfMigration
{
  /**
   * Migrate up to version 001.
   */
  public function up()
  {
    $this->loadSql(dirname(__FILE__).'/001_init.sql');
  }

  /**
   * Migrate down to version 000.
   */
  public function down()
  {
    $this->executeSQL('SET FOREIGN_KEY_CHECKS=0');
    
    $this->executeSQL('DROP TABLE esq_customers');
    $this->executeSQL('DROP TABLE esq_websites');
    $this->executeSQL('DROP TABLE esq_domain_names');
    $this->executeSQL('DROP TABLE esq_domain_checks');
    $this->executeSQL('DROP TABLE esq_website_attributes');
    $this->executeSQL('DROP TABLE esq_templates');
    $this->executeSQL('DROP TABLE esq_template_categories');
    $this->executeSQL('DROP TABLE esq_hosts');
    $this->executeSQL('DROP TABLE esq_coupons');
    $this->executeSQL('DROP TABLE esq_coupons_to_websites');
    $this->executeSQL('DROP TABLE esq_email_accounts');
    $this->executeSQL('DROP TABLE esq_member_feedbacks');
    $this->executeSQL('DROP TABLE esq_page_entries');
    $this->executeSQL('DROP TABLE esq_page_groups');
    $this->executeSQL('DROP TABLE esq_pages');
    $this->executeSQL('DROP TABLE esq_page_content_display_types');
    $this->executeSQL('DROP TABLE esq_client_messages');
    $this->executeSQL('DROP TABLE esq_bar_associations');
    $this->executeSQL('DROP TABLE esq_template_types');
    $this->executeSQL('DROP TABLE esq_resource_categories');
    $this->executeSQL('DROP TABLE esq_resources');
    $this->executeSQL('DROP TABLE sf_guard_group');
    $this->executeSQL('DROP TABLE sf_guard_permission');
    $this->executeSQL('DROP TABLE sf_guard_group_permission');
    $this->executeSQL('DROP TABLE sf_guard_user');
    $this->executeSQL('DROP TABLE sf_guard_user_permission');
    $this->executeSQL('DROP TABLE sf_guard_user_group');
    $this->executeSQL('DROP TABLE sf_guard_remember_key');
    $this->executeSQL('DROP TABLE sf_moderated_content');
    $this->executeSQL('DROP TABLE sf_comment');
    $this->executeSQL('DROP TABLE sf_tag');
    $this->executeSQL('DROP TABLE sf_tagging');
    $this->executeSQL('DROP TABLE te_blog_post');
    $this->executeSQL('DROP TABLE te_blog_post_category');
    $this->executeSQL('DROP TABLE te_blog_posts_to_categories');
    $this->executeSQL('DROP TABLE te_faq');
    $this->executeSQL('DROP TABLE te_testimonials');
    
    $this->executeSQL('SET FOREIGN_KEY_CHECKS=1');
  }
}
