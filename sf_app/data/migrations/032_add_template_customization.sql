SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `esq_template_customizations`;

CREATE TABLE `esq_template_customizations`
(
	`website_id` VARCHAR(255)  NOT NULL,
	`template_id` VARCHAR(255),
	`type` VARCHAR(255)  NOT NULL,
	`content` VARCHAR(255),
	`reference` VARCHAR(255),
	`related_file` VARCHAR(255),
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `esq_template_customizations_FI_1` (`website_id`),
	CONSTRAINT `esq_template_customizations_FK_1`
		FOREIGN KEY (`website_id`)
		REFERENCES `esq_websites` (`id`)
		ON DELETE CASCADE,
	INDEX `esq_template_customizations_FI_2` (`template_id`),
	CONSTRAINT `esq_template_customizations_FK_2`
		FOREIGN KEY (`template_id`)
		REFERENCES `esq_templates` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM;

SET FOREIGN_KEY_CHECKS = 1;