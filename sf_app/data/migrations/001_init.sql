
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- esq_customers
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `esq_customers`;


CREATE TABLE `esq_customers`
(
	`id` VARCHAR(32)  NOT NULL,
	`mb_client_id` INTEGER  NOT NULL,
	`type` INTEGER  NOT NULL,
	`username` VARCHAR(255)  NOT NULL,
	`password` VARCHAR(255)  NOT NULL,
	`email` VARCHAR(255)  NOT NULL,
	`first_name` VARCHAR(255)  NOT NULL,
	`middle_name` VARCHAR(255),
	`last_name` VARCHAR(255)  NOT NULL,
	`birthdate` VARCHAR(255),
	`phone` VARCHAR(255),
	`fax` VARCHAR(255),
	`status` INTEGER  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `mb_client_id` (`mb_client_id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- esq_websites
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `esq_websites`;


CREATE TABLE `esq_websites`
(
	`id` VARCHAR(255)  NOT NULL,
	`customer_id` VARCHAR(255)  NOT NULL,
	`type` INTEGER,
	`rank` INTEGER,
	`firm_name` VARCHAR(255),
	`firm_type` VARCHAR(255),
	`website_name` VARCHAR(255)  NOT NULL,
	`primary_domain_id` VARCHAR(255),
	`email` VARCHAR(255),
	`address` VARCHAR(255),
	`city` VARCHAR(255),
	`state` VARCHAR(255),
	`zip` VARCHAR(255),
	`phone` VARCHAR(255),
	`fax` VARCHAR(255),
	`template_id` VARCHAR(255),
	`website_attribute_id` VARCHAR(255),
	`status` INTEGER,
	`path` VARCHAR(255),
	`host_id` VARCHAR(255)  NOT NULL,
	`analytics_code` VARCHAR(255),
	`meta_description` VARCHAR(255),
	`meta_keywords` VARCHAR(255),
	`social_media` TEXT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `customer_name` (`customer_id`, `website_name`),
	UNIQUE KEY `host_path` (`host_id`, `path`),
	CONSTRAINT `esq_websites_FK_1`
		FOREIGN KEY (`customer_id`)
		REFERENCES `esq_customers` (`id`)
		ON DELETE CASCADE,
	INDEX `esq_websites_FI_2` (`template_id`),
	CONSTRAINT `esq_websites_FK_2`
		FOREIGN KEY (`template_id`)
		REFERENCES `esq_templates` (`id`)
		ON DELETE SET NULL,
	INDEX `esq_websites_FI_3` (`website_attribute_id`),
	CONSTRAINT `esq_websites_FK_3`
		FOREIGN KEY (`website_attribute_id`)
		REFERENCES `esq_website_attributes` (`id`)
		ON DELETE SET NULL,
	CONSTRAINT `esq_websites_FK_4`
		FOREIGN KEY (`host_id`)
		REFERENCES `esq_hosts` (`id`)
		ON DELETE SET NULL
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- esq_domain_names
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `esq_domain_names`;


CREATE TABLE `esq_domain_names`
(
	`id` VARCHAR(255)  NOT NULL,
	`website_id` VARCHAR(255)  NOT NULL,
	`name` VARCHAR(255)  NOT NULL,
	`type` VARCHAR(255),
	`registration_type` VARCHAR(255),
	`is_a_record_only` TINYINT default 0,
	`rank` INTEGER,
	`domain_name_attribute_id` VARCHAR(255),
	`max_emails` INTEGER,
	`status` INTEGER,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `esq_domain_names_FI_1` (`website_id`),
	CONSTRAINT `esq_domain_names_FK_1`
		FOREIGN KEY (`website_id`)
		REFERENCES `esq_websites` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- esq_domain_checks
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `esq_domain_checks`;


CREATE TABLE `esq_domain_checks`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`domain_id` INTEGER,
	`status_code` INTEGER,
	`host` VARCHAR(255),
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `esq_domain_checks_FI_1` (`domain_id`),
	CONSTRAINT `esq_domain_checks_FK_1`
		FOREIGN KEY (`domain_id`)
		REFERENCES `esq_domain_names` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- esq_website_attributes
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `esq_website_attributes`;


CREATE TABLE `esq_website_attributes`
(
	`id` VARCHAR(255)  NOT NULL,
	`rank` INTEGER,
	`description` VARCHAR(255),
	`max_main_menu_pages` INTEGER,
	`max_sub_menu_pages` INTEGER,
	`max_emails` INTEGER,
	`mb_product_id` INTEGER,
	`mb_cycle_id` INTEGER,
	`price` FLOAT,
	`setup_price` FLOAT,
	`domain_name_attribute_id` VARCHAR(255),
	`status` INTEGER,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- esq_templates
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `esq_templates`;


CREATE TABLE `esq_templates`
(
	`id` VARCHAR(255)  NOT NULL,
	`rank` INTEGER,
	`type` VARCHAR(255),
	`reference` VARCHAR(255)  NOT NULL,
	`category_id` VARCHAR(255),
	`title` VARCHAR(255)  NOT NULL,
	`description` TEXT,
	`customer_id` VARCHAR(255),
	`status` INTEGER,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `esq_templates_FI_1` (`category_id`),
	CONSTRAINT `esq_templates_FK_1`
		FOREIGN KEY (`category_id`)
		REFERENCES `esq_template_categories` (`id`)
		ON DELETE SET NULL,
	INDEX `esq_templates_FI_2` (`customer_id`),
	CONSTRAINT `esq_templates_FK_2`
		FOREIGN KEY (`customer_id`)
		REFERENCES `esq_customers` (`id`)
		ON DELETE SET NULL
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- esq_template_categories
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `esq_template_categories`;


CREATE TABLE `esq_template_categories`
(
	`id` VARCHAR(255)  NOT NULL,
	`name` VARCHAR(255)  NOT NULL,
	`description` TEXT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- esq_hosts
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `esq_hosts`;


CREATE TABLE `esq_hosts`
(
	`id` VARCHAR(255)  NOT NULL,
	`internal_ip` VARCHAR(255),
	`external_ip` VARCHAR(255)  NOT NULL,
	`port` INTEGER,
	`name` VARCHAR(255)  NOT NULL,
	`global_document_root` VARCHAR(255)  NOT NULL,
	`save_max` INTEGER  NOT NULL,
	`type` INTEGER,
	`status` INTEGER,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `name` (`name`),
	UNIQUE KEY `external_ip` (`external_ip`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- esq_coupons
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `esq_coupons`;


CREATE TABLE `esq_coupons`
(
	`id` VARCHAR(255)  NOT NULL,
	`code` VARCHAR(255)  NOT NULL,
	`status` INTEGER,
	`description` TEXT,
	`mb_coupon_id` VARCHAR(255),
	`price` FLOAT,
	`setup` FLOAT,
	`cycle_price` FLOAT,
	`num_cycles` INTEGER,
	`website_attribute_id` VARCHAR(255),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `esq_coupons_FI_1` (`website_attribute_id`),
	CONSTRAINT `esq_coupons_FK_1`
		FOREIGN KEY (`website_attribute_id`)
		REFERENCES `esq_website_attributes` (`id`)
		ON DELETE SET NULL
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- esq_coupons_to_websites
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `esq_coupons_to_websites`;


CREATE TABLE `esq_coupons_to_websites`
(
	`row_id` VARCHAR(255),
	`website_id` VARCHAR(255)  NOT NULL,
	`coupon_id` VARCHAR(255)  NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`website_id`,`coupon_id`),
	CONSTRAINT `esq_coupons_to_websites_FK_1`
		FOREIGN KEY (`website_id`)
		REFERENCES `esq_websites` (`id`)
		ON DELETE CASCADE,
	INDEX `esq_coupons_to_websites_FI_2` (`coupon_id`),
	CONSTRAINT `esq_coupons_to_websites_FK_2`
		FOREIGN KEY (`coupon_id`)
		REFERENCES `esq_coupons` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- esq_email_accounts
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `esq_email_accounts`;


CREATE TABLE `esq_email_accounts`
(
	`id` VARCHAR(255)  NOT NULL,
	`customer_id` VARCHAR(255),
	`website_id` VARCHAR(255),
	`domain_name_id` VARCHAR(255)  NOT NULL,
	`local_address` VARCHAR(255)  NOT NULL,
	`forwarding_address` VARCHAR(255)  NOT NULL,
	`status` INTEGER,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `local_domain` (`domain_name_id`, `local_address`),
	INDEX `esq_email_accounts_FI_1` (`customer_id`),
	CONSTRAINT `esq_email_accounts_FK_1`
		FOREIGN KEY (`customer_id`)
		REFERENCES `esq_customers` (`id`)
		ON DELETE CASCADE,
	INDEX `esq_email_accounts_FI_2` (`website_id`),
	CONSTRAINT `esq_email_accounts_FK_2`
		FOREIGN KEY (`website_id`)
		REFERENCES `esq_websites` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `esq_email_accounts_FK_3`
		FOREIGN KEY (`domain_name_id`)
		REFERENCES `esq_domain_names` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- esq_member_feedbacks
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `esq_member_feedbacks`;


CREATE TABLE `esq_member_feedbacks`
(
	`id` VARCHAR(255)  NOT NULL,
	`customer_id` VARCHAR(255),
	`reply_email` VARCHAR(255),
	`subject` VARCHAR(255),
	`message` TEXT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `esq_member_feedbacks_FI_1` (`customer_id`),
	CONSTRAINT `esq_member_feedbacks_FK_1`
		FOREIGN KEY (`customer_id`)
		REFERENCES `esq_customers` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- esq_page_entries
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `esq_page_entries`;


CREATE TABLE `esq_page_entries`
(
	`id` VARCHAR(255)  NOT NULL,
	`group_id` VARCHAR(255),
	`object_type` VARCHAR(255),
	`rank` INTEGER,
	`data` TEXT,
	`status` INTEGER,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `esq_page_entries_FI_1` (`group_id`),
	CONSTRAINT `esq_page_entries_FK_1`
		FOREIGN KEY (`group_id`)
		REFERENCES `esq_page_groups` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- esq_page_groups
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `esq_page_groups`;


CREATE TABLE `esq_page_groups`
(
	`id` VARCHAR(255)  NOT NULL,
	`page_id` VARCHAR(255),
	`object_type` VARCHAR(255),
	`rank` INTEGER,
	`data` TEXT,
	`max_children` INTEGER default 1000,
	`status` INTEGER,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `esq_page_groups_FI_1` (`page_id`),
	CONSTRAINT `esq_page_groups_FK_1`
		FOREIGN KEY (`page_id`)
		REFERENCES `esq_pages` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- esq_pages
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `esq_pages`;


CREATE TABLE `esq_pages`
(
	`id` VARCHAR(255)  NOT NULL,
	`website_id` VARCHAR(255),
	`edit_status` INTEGER,
	`template_type_id` VARCHAR(255),
	`menu_type` INTEGER,
	`page_content_display_type_id` VARCHAR(255)  NOT NULL,
	`rank` INTEGER,
	`logo` VARCHAR(255),
	`title` VARCHAR(255)  NOT NULL,
	`meta_title` VARCHAR(255),
	`meta_description` VARCHAR(255),
	`meta_keywords` VARCHAR(255),
	`meta_content` VARCHAR(255),
	`link_name` VARCHAR(255)  NOT NULL,
	`url` VARCHAR(255)  NOT NULL,
	`control_panel_picture` VARCHAR(255),
	`max_children` INTEGER default 1000,
	`status` INTEGER,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `url` (`url`, `website_id`),
	UNIQUE KEY `link` (`link_name`, `website_id`),
	UNIQUE KEY `title` (`title`, `website_id`),
	INDEX `esq_pages_FI_1` (`website_id`),
	CONSTRAINT `esq_pages_FK_1`
		FOREIGN KEY (`website_id`)
		REFERENCES `esq_websites` (`id`)
		ON DELETE CASCADE,
	INDEX `esq_pages_FI_2` (`template_type_id`),
	CONSTRAINT `esq_pages_FK_2`
		FOREIGN KEY (`template_type_id`)
		REFERENCES `esq_template_types` (`id`)
		ON DELETE SET NULL,
	INDEX `esq_pages_FI_3` (`page_content_display_type_id`),
	CONSTRAINT `esq_pages_FK_3`
		FOREIGN KEY (`page_content_display_type_id`)
		REFERENCES `esq_page_content_display_types` (`id`)
		ON DELETE SET NULL
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- esq_page_content_display_types
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `esq_page_content_display_types`;


CREATE TABLE `esq_page_content_display_types`
(
	`id` VARCHAR(255)  NOT NULL,
	`rank` INTEGER,
	`name` VARCHAR(255)  NOT NULL,
	`notes` VARCHAR(255),
	`description` TEXT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- esq_client_messages
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `esq_client_messages`;


CREATE TABLE `esq_client_messages`
(
	`id` VARCHAR(255)  NOT NULL,
	`customer_id` VARCHAR(255),
	`website_id` VARCHAR(255),
	`domain` VARCHAR(255),
	`name` VARCHAR(255)  NOT NULL,
	`email` VARCHAR(255)  NOT NULL,
	`phone` VARCHAR(255),
	`subject` VARCHAR(255),
	`message` TEXT,
	`is_viewed` TINYINT default 0,
	`is_deleted` TINYINT default 0,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `esq_client_messages_FI_1` (`customer_id`),
	CONSTRAINT `esq_client_messages_FK_1`
		FOREIGN KEY (`customer_id`)
		REFERENCES `esq_customers` (`id`)
		ON DELETE SET NULL,
	INDEX `esq_client_messages_FI_2` (`website_id`),
	CONSTRAINT `esq_client_messages_FK_2`
		FOREIGN KEY (`website_id`)
		REFERENCES `esq_websites` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- esq_bar_associations
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `esq_bar_associations`;


CREATE TABLE `esq_bar_associations`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`slug` VARCHAR(255),
	`password` VARCHAR(255),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`last_login` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `name` (`name`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- esq_template_types
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `esq_template_types`;


CREATE TABLE `esq_template_types`
(
	`id` VARCHAR(255)  NOT NULL,
	`rank` INTEGER,
	`name` VARCHAR(255)  NOT NULL,
	`description` TEXT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `name` (`name`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- esq_resource_categories
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `esq_resource_categories`;


CREATE TABLE `esq_resource_categories`
(
	`id` VARCHAR(255)  NOT NULL,
	`name` VARCHAR(255)  NOT NULL,
	`url` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- esq_resources
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `esq_resources`;


CREATE TABLE `esq_resources`
(
	`id` VARCHAR(255)  NOT NULL,
	`category_id` VARCHAR(255),
	`company_name` VARCHAR(255)  NOT NULL,
	`image_url` VARCHAR(255),
	`url` VARCHAR(255),
	`url_title` VARCHAR(255),
	`email` VARCHAR(255),
	`description` TEXT,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `esq_resources_FI_1` (`category_id`),
	CONSTRAINT `esq_resources_FK_1`
		FOREIGN KEY (`category_id`)
		REFERENCES `esq_resource_categories` (`id`)
		ON DELETE SET NULL
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;

# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- sf_guard_group
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_guard_group`;


CREATE TABLE `sf_guard_group`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`description` TEXT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `sf_guard_group_U_1` (`name`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_guard_permission
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_guard_permission`;


CREATE TABLE `sf_guard_permission`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`description` TEXT,
	`title` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `sf_guard_permission_U_1` (`name`),
	UNIQUE KEY `sf_guard_permission_U_2` (`title`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_guard_group_permission
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_guard_group_permission`;


CREATE TABLE `sf_guard_group_permission`
(
	`group_id` INTEGER  NOT NULL,
	`permission_id` INTEGER  NOT NULL,
	PRIMARY KEY (`group_id`,`permission_id`),
	CONSTRAINT `sf_guard_group_permission_FK_1`
		FOREIGN KEY (`group_id`)
		REFERENCES `sf_guard_group` (`id`)
		ON DELETE CASCADE,
	INDEX `sf_guard_group_permission_FI_2` (`permission_id`),
	CONSTRAINT `sf_guard_group_permission_FK_2`
		FOREIGN KEY (`permission_id`)
		REFERENCES `sf_guard_permission` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_guard_user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_guard_user`;


CREATE TABLE `sf_guard_user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(128)  NOT NULL,
	`algorithm` VARCHAR(128) default 'sha1' NOT NULL,
	`salt` VARCHAR(128)  NOT NULL,
	`password` VARCHAR(128)  NOT NULL,
	`created_at` DATETIME,
	`last_login` DATETIME,
	`is_active` TINYINT default 1 NOT NULL,
	`is_super_admin` TINYINT default 0 NOT NULL,
	`email` VARCHAR(255)  NOT NULL,
	`first_name` VARCHAR(255),
	`last_name` VARCHAR(255),
	PRIMARY KEY (`id`),
	UNIQUE KEY `sf_guard_user_U_1` (`username`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_guard_user_permission
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_guard_user_permission`;


CREATE TABLE `sf_guard_user_permission`
(
	`user_id` INTEGER  NOT NULL,
	`permission_id` INTEGER  NOT NULL,
	PRIMARY KEY (`user_id`,`permission_id`),
	CONSTRAINT `sf_guard_user_permission_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `sf_guard_user_permission_FI_2` (`permission_id`),
	CONSTRAINT `sf_guard_user_permission_FK_2`
		FOREIGN KEY (`permission_id`)
		REFERENCES `sf_guard_permission` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_guard_user_group
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_guard_user_group`;


CREATE TABLE `sf_guard_user_group`
(
	`user_id` INTEGER  NOT NULL,
	`group_id` INTEGER  NOT NULL,
	PRIMARY KEY (`user_id`,`group_id`),
	CONSTRAINT `sf_guard_user_group_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `sf_guard_user_group_FI_2` (`group_id`),
	CONSTRAINT `sf_guard_user_group_FK_2`
		FOREIGN KEY (`group_id`)
		REFERENCES `sf_guard_group` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_guard_remember_key
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_guard_remember_key`;


CREATE TABLE `sf_guard_remember_key`
(
	`user_id` INTEGER  NOT NULL,
	`remember_key` VARCHAR(32),
	`ip_address` VARCHAR(50)  NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`user_id`,`ip_address`),
	CONSTRAINT `sf_guard_remember_key_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;

# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- sf_moderated_content
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_moderated_content`;


CREATE TABLE `sf_moderated_content`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`object_id` INTEGER  NOT NULL,
	`object_model` VARCHAR(50),
	`user_name` VARCHAR(100),
	`user_email` VARCHAR(100),
	`title` TEXT,
	`content` TEXT,
	`url` TEXT,
	`status` INTEGER default 1,
	`comment` TEXT,
	`moderated_at` DATETIME,
	`object_updated_at` DATETIME,
	PRIMARY KEY (`id`),
	KEY `sf_moderated_content_I_1`(`status`),
	KEY `sf_moderated_content_I_2`(`moderated_at`),
	KEY `sf_moderated_content_I_3`(`object_updated_at`),
	KEY `model_id`(`object_id`, `object_model`),
	KEY `model_id_date`(`object_id`, `object_model`, `moderated_at`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;

# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- sf_comment
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_comment`;


CREATE TABLE `sf_comment`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`commentable_model` VARCHAR(30),
	`commentable_id` VARCHAR(255),
	`comment_namespace` VARCHAR(50),
	`title` VARCHAR(100),
	`text` TEXT,
	`author_id` INTEGER,
	`author_name` VARCHAR(50),
	`author_email` VARCHAR(100),
	`author_website` VARCHAR(255),
	`created_at` DATETIME,
	`moderation_status` INTEGER default 1,
	PRIMARY KEY (`id`),
	KEY `comments_index`(`comment_namespace`, `commentable_model`, `commentable_id`),
	KEY `object_index`(`commentable_model`, `commentable_id`),
	KEY `author_index`(`author_id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;

# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- sf_tag
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_tag`;


CREATE TABLE `sf_tag`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100),
	`is_triple` TINYINT,
	`triple_namespace` VARCHAR(100),
	`triple_key` VARCHAR(100),
	`triple_value` VARCHAR(100),
	PRIMARY KEY (`id`),
	KEY `name`(`name`),
	KEY `triple1`(`triple_namespace`),
	KEY `triple2`(`triple_key`),
	KEY `triple3`(`triple_value`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_tagging
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_tagging`;


CREATE TABLE `sf_tagging`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`tag_id` INTEGER  NOT NULL,
	`taggable_model` VARCHAR(30),
	`taggable_id` INTEGER,
	PRIMARY KEY (`id`),
	KEY `tag`(`tag_id`),
	KEY `taggable`(`taggable_model`, `taggable_id`),
	CONSTRAINT `sf_tagging_FK_1`
		FOREIGN KEY (`tag_id`)
		REFERENCES `sf_tag` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;

# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- te_blog_post
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `te_blog_post`;


CREATE TABLE `te_blog_post`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`author_id` INTEGER,
	`title` VARCHAR(255)  NOT NULL,
	`stripped_title` VARCHAR(255),
	`extract` TEXT,
	`content` TEXT,
	`is_published` TINYINT default 0,
	`allow_comments` TINYINT default 1,
	`published_at` DATETIME  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`created_by` INTEGER,
	`updated_by` INTEGER,
	PRIMARY KEY (`id`),
	UNIQUE KEY `stripped_title_published_at` (`stripped_title`, `published_at`),
	INDEX `te_blog_post_FI_1` (`author_id`),
	CONSTRAINT `te_blog_post_FK_1`
		FOREIGN KEY (`author_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `te_blog_post_FI_2` (`created_by`),
	CONSTRAINT `te_blog_post_FK_2`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE SET NULL,
	INDEX `te_blog_post_FI_3` (`updated_by`),
	CONSTRAINT `te_blog_post_FK_3`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE SET NULL
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- te_blog_post_category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `te_blog_post_category`;


CREATE TABLE `te_blog_post_category`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`slug` VARCHAR(255),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- te_blog_posts_to_categories
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `te_blog_posts_to_categories`;


CREATE TABLE `te_blog_posts_to_categories`
(
	`post_id` INTEGER  NOT NULL,
	`category_id` INTEGER  NOT NULL,
	PRIMARY KEY (`post_id`,`category_id`),
	CONSTRAINT `te_blog_posts_to_categories_FK_1`
		FOREIGN KEY (`post_id`)
		REFERENCES `te_blog_post` (`id`)
		ON DELETE CASCADE,
	INDEX `te_blog_posts_to_categories_FI_2` (`category_id`),
	CONSTRAINT `te_blog_posts_to_categories_FK_2`
		FOREIGN KEY (`category_id`)
		REFERENCES `te_blog_post_category` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;

# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- te_faq
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `te_faq`;


CREATE TABLE `te_faq`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`question` TEXT  NOT NULL,
	`answer` TEXT  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;

# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- te_testimonials
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `te_testimonials`;


CREATE TABLE `te_testimonials`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`source` VARCHAR(255),
	`location` VARCHAR(255),
	`company` VARCHAR(255),
	`content` TEXT,
	`date` DATE,
	`is_published` TINYINT default 0,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`created_by` INTEGER,
	`updated_by` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `te_testimonials_FI_1` (`created_by`),
	CONSTRAINT `te_testimonials_FK_1`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE SET NULL,
	INDEX `te_testimonials_FI_2` (`updated_by`),
	CONSTRAINT `te_testimonials_FK_2`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE SET NULL
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
DROP VIEW IF EXISTS esq_resource_categories;
CREATE VIEW esq_resource_categories AS SELECT
rowID id,
category name,
URL url
FROM vendor_categorys;

DROP VIEW IF EXISTS esq_resources;
CREATE VIEW esq_resources AS SELECT
rowID id,
categoryID category_id,
company_name,
image_URL image_url,
URL url,
description,
email,
url_title,
creation_date created_at
FROM vendors;