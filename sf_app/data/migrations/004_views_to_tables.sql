DROP VIEW IF EXISTS `esq_customers`;
RENAME TABLE `OBJECT_users` TO `esq_customers`;
ALTER TABLE `esq_customers` CHANGE `rowID` `id` VARCHAR( 32 ),
CHANGE `MB_clientID` `mb_client_id` VARCHAR(255),
CHANGE `firstName` `first_name` VARCHAR(255),
CHANGE `lastName` `last_name` VARCHAR(255),
CHANGE `middleName` `middle_name` VARCHAR(255),
CHANGE `dateOfBirth` `birthdate` VARCHAR(8),
CHANGE `created` `created_at` DATETIME,
CHANGE `modified` `updated_at` DATETIME;

DROP VIEW IF EXISTS `esq_websites`;
RENAME TABLE `OBJECT_website` TO `esq_websites`;
ALTER TABLE `esq_websites`
CHANGE `userID` `customer_id` varchar(32),
CHANGE `rowID` `id` varchar(32),
CHANGE `sortOrder` `rank` varchar(11),
CHANGE `firmName` `firm_name` varchar(255),
CHANGE `firmType` `firm_type` varchar(32),
CHANGE `websiteName` `website_name` varchar(255),
CHANGE `primaryDomainNameID` `primary_domain_id` varchar(32),
CHANGE `zipcode` `zip` varchar(20),
CHANGE `templateID` `template_id` varchar(32),
CHANGE `websiteAttributeID` `website_attribute_id` varchar(32),
CHANGE `hostID` `host_id` varchar(32),
CHANGE `created` `created_at` datetime,
CHANGE `modified` `updated_at` datetime;

DROP VIEW IF EXISTS `esq_domain_names`;
RENAME TABLE `OBJECT_domainname` TO `esq_domain_names`;
ALTER TABLE `esq_domain_names`
DROP `userID`,
CHANGE `websiteID` `website_id` varchar(32),
CHANGE `rowID` `id` varchar(32),
CHANGE `domainName` `name` varchar(255),
CHANGE `regType` `registration_type` varchar(32),
CHANGE `usingARecordOnly` `is_a_record_only` varchar(5),
CHANGE `sortOrder` `rank` varchar(11),
CHANGE `domainNameAttributeID` `domain_name_attribute_id` varchar(32),
CHANGE `MAX_emails` `max_emails` varchar(11),
CHANGE `created` `created_at` datetime,
CHANGE `modified` `updated_at` datetime;

DROP VIEW IF EXISTS `esq_client_messages`;
RENAME TABLE `messages` TO `esq_client_messages`;
ALTER TABLE `esq_client_messages`
CHANGE `rowID` `id` varchar(32),
CHANGE `userID` `customer_id` varchar(32),
CHANGE `websiteID` `website_id` varchar(32),
CHANGE `fromDomainName` `domain` varchar(32),
CHANGE `viewed` `is_viewed` varchar(50),
CHANGE `deleted` `is_deleted` int(1),
CHANGE `created` `created_at` datetime,
CHANGE `modified` `updated_at` datetime;

DROP VIEW IF EXISTS `esq_templates`;
RENAME TABLE `templates` TO `esq_templates`;
ALTER TABLE `esq_templates`
CHANGE `rowID` `id` varchar(32),
CHANGE `sortOrder` `rank` int(11),
CHANGE `categoryID` `category_id` varchar(255),
CHANGE `userID` `customer_id` varchar(32),
CHANGE `created` `created_at` datetime,
CHANGE `modified` `updated_at` datetime;

DROP VIEW IF EXISTS `esq_pages`;
RENAME TABLE `CLASS_pages` TO `esq_pages`;
ALTER TABLE `esq_pages`
CHANGE `userID` `customer_id` varchar(32),
CHANGE `websiteID` `website_id` varchar(32),
CHANGE `rowID` `id` varchar(32),
CHANGE `editStatus` `edit_status` varchar(32),
CHANGE `templateType` `template_type_id` varchar(32),
CHANGE `menuType` `menu_type` varchar(32),
CHANGE `pageContentDisplayType` `page_content_display_type_id` varchar(32),
CHANGE `sortOrder` `rank` int(11),
CHANGE `titleTag` `meta_title` text,
CHANGE `metaTag` `meta_content` text,
CHANGE `linkName` `link_name` varchar(255),
CHANGE `URL` `url` varchar(255),
CHANGE `controlPanelPictureLink` `control_panel_picture` varchar(32),
CHANGE `maxChildren` `max_children` varchar(11),
CHANGE `created` `created_at` datetime,
CHANGE `modified` `updated_at` datetime;

DROP VIEW IF EXISTS `esq_hosts`;
RENAME TABLE `host` TO `esq_hosts`;
ALTER TABLE `esq_hosts`
CHANGE `rowID` `id` varchar(32),
CHANGE `IP_external` `external_ip` varchar(100),
CHANGE `IP_internal` `internal_ip` varchar(32),
CHANGE `globalDocumentRoot` `global_document_root` text,
CHANGE `safeMax` `save_max` varchar(32),
CHANGE `created` `created_at` datetime,
CHANGE `modified` `updated_at` datetime;

DROP VIEW IF EXISTS `esq_email_accounts`;
RENAME TABLE `OBJECT_emailaccount` TO `esq_email_accounts`;
ALTER TABLE `esq_email_accounts`
CHANGE `userID` `customer_id` varchar(32),
CHANGE `websiteID` `website_id` varchar(32),
CHANGE `domainNameID` `domain_name_id` varchar(32),
CHANGE `rowID` `id` varchar(32),
CHANGE `localAddress` `local_address` varchar(255),
CHANGE `forwardingAddress` `forwarding_address` varchar(255),
CHANGE `created` `created_at` datetime,
CHANGE `modified` `updated_at` datetime;

DROP VIEW IF EXISTS `esq_template_categories`;
RENAME TABLE `templateCategory` TO `esq_template_categories`;
ALTER TABLE `esq_template_categories`
CHANGE `rowID` `id` varchar(32),
CHANGE `Name` `name` varchar(255),
CHANGE `created` `created_at` datetime,
CHANGE `modified` `updated_at` datetime;

DROP VIEW IF EXISTS `esq_website_attributes`;
RENAME TABLE `websiteAttribute` TO `esq_website_attributes`;
ALTER TABLE `esq_website_attributes`
CHANGE `rowID` `id` varchar(32),
CHANGE `sortOrder` `rank` varchar(10),
CHANGE `MAX_mainMenuPages` `max_main_menu_pages` varchar(11),
CHANGE `MAX_subMenuPages` `max_sub_menu_pages` varchar(11),
CHANGE `MAX_emails` `max_emails` int(11),
CHANGE `MB_productID` `mb_product_id` varchar(32),
CHANGE `MB_cycleID` `mb_cycle_id` varchar(32),
CHANGE `setupPrice` `setup_price` varchar(10),
CHANGE `domainNameAttributeID` `domain_name_attribute_id` varchar(32),
CHANGE `created` `created_at` datetime,
CHANGE `modified` `updated_at` datetime;

DROP VIEW IF EXISTS `esq_coupons`;
RENAME TABLE `coupon` TO `esq_coupons`;
ALTER TABLE `esq_coupons`
CHANGE `rowID` `id` varchar(32),
CHANGE `couponCode` `code` varchar(32),
CHANGE `MB_couponID` `mb_coupon_id` varchar(32),
CHANGE `cycleCouponPrice` `cycle_price` varchar(10),
CHANGE `couponNumCycles` `num_cycles` varchar(10),
CHANGE `websiteAttributeID` `website_attribute_id` varchar(32),
CHANGE `created` `created_at` datetime,
CHANGE `modified` `updated_at` datetime;

DROP VIEW IF EXISTS `esq_coupons_to_websites`;
RENAME TABLE `OBJECT_coupon` TO `esq_coupons_to_websites`;
ALTER TABLE `esq_coupons_to_websites`
CHANGE `rowID` `row_id` varchar(32),
CHANGE `websiteID` `website_id` varchar(32),
CHANGE `couponID` `coupon_id` varchar(32),
CHANGE `created` `created_at` datetime,
DROP `modified`;

DROP VIEW IF EXISTS `esq_member_feedbacks`;
RENAME TABLE `memberfeedback` TO `esq_member_feedbacks`;
ALTER TABLE `esq_member_feedbacks`
CHANGE `rowID` `id` varchar(32),
CHANGE `userID` `customer_id` varchar(32),
CHANGE `replyEmail` `reply_email` varchar(32),
CHANGE `created` `created_at` datetime,
CHANGE `modified` `updated_at` datetime;

DROP VIEW IF EXISTS `esq_page_entries`;
RENAME TABLE `CLASS_pageEntry` TO `esq_page_entries`;
ALTER TABLE `esq_page_entries`
CHANGE `userID` `customer_id` varchar(32),
CHANGE `websiteID` `website_id` varchar(32),
CHANGE `pageID` `page_id` varchar(32),
CHANGE `groupID` `group_id` varchar(32),
CHANGE `rowID` `id` varchar(32),
CHANGE `objectType` `object_type` varchar(32),
CHANGE `sortOrder` `rank` varchar(11),
CHANGE `created` `created_at` datetime,
CHANGE `modified` `updated_at` datetime;

DROP VIEW IF EXISTS `esq_page_content_display_types`;
RENAME TABLE `pageContentDisplayType` TO `esq_page_content_display_types`;
ALTER TABLE `esq_page_content_display_types`
CHANGE `rowID` `id` varchar(32),
CHANGE `sortOrder` `rank` varchar(10),
CHANGE `name` `notes` VARCHAR(255),
CHANGE `publicName` `name` varchar(255);

DROP VIEW IF EXISTS `esq_page_groups`;
RENAME TABLE `CLASS_pageGroup` TO `esq_page_groups`;
ALTER TABLE `esq_page_groups`
CHANGE `userID` `customer_id` varchar(32),
CHANGE `websiteID` `website_id` varchar(32),
CHANGE `pageID` `page_id` varchar(32),
CHANGE `rowID` `id` varchar(32),
CHANGE `objectType` `object_type` varchar(32),
CHANGE `sortOrder` `rank` varchar(11),
CHANGE `maxChildren` `max_children` int(11),
CHANGE `created` `created_at` datetime,
CHANGE `modified` `updated_at` datetime;

DROP VIEW IF EXISTS `esq_resources`;
RENAME TABLE `vendors` TO `esq_resources`;
ALTER TABLE `esq_resources`
CHANGE `rowID` `id` varchar(32),
CHANGE `image_URL` `image_url` varchar(100),
CHANGE `URL` `url` varchar(100),
CHANGE `categoryID` `category_id` varchar(32),
CHANGE `creation_date` `created_at` datetime;

DROP VIEW IF EXISTS `esq_resource_categories`;
RENAME TABLE `vendor_categorys` TO `esq_resource_categories`;
ALTER TABLE `esq_resource_categories`
CHANGE `rowID` `id` varchar(32),
CHANGE `category` `name` varchar(50),
CHANGE `URL` `url` varchar(100);

DROP VIEW IF EXISTS `esq_template_types`;
RENAME TABLE `templateType` TO `esq_template_types`;
ALTER TABLE `esq_template_types`
CHANGE `rowID` `id` varchar(32),
CHANGE `sortOrder` `rank` varchar(10);

DROP TABLE `clients_v1`;
DROP TABLE `contest_1`;
DROP TABLE `domainNameAttribute`;
DROP TABLE `editStatus`;
DROP TABLE `objectStatus`;
DROP TABLE `objectType`;
DROP TABLE `OBJECT_caseSubmit`;
DROP TABLE `OBJECT_packages`;
DROP TABLE `OBJECT_templates`;
DROP TABLE `OBJECT_freeTrial`;
DROP TABLE `freeTrial`;
DROP TABLE `pageMenuType`;
DROP TABLE `pictureLinks`;
DROP TABLE `products`;
DROP TABLE `STATUS_domainName`;
DROP TABLE `STATUS_emailAccount`;
DROP TABLE `STATUS_page`;
DROP TABLE `STATUS_user`;
DROP TABLE `STATUS_website`;
DROP TABLE `transactions`;
DROP TABLE `TYPE_caseSubmitSend`;
DROP TABLE `TYPE_domainName`;
DROP TABLE `TYPE_domainNameReg`;
DROP TABLE `TYPE_firm`;
DROP TABLE `TYPE_object`;
DROP TABLE `TYPE_product`;
DROP TABLE `TYPE_user`;
DROP TABLE `TYPE_website`;
DROP TABLE `webHosts`;
DROP TABLE `websiteAttribute_DEV`;
DROP TABLE `templates_11-11-07`;