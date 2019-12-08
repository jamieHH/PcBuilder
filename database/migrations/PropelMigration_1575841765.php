<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1575841765.
 * Generated on 2019-12-08 21:49:25 by jamiehatswellhough
 */
class PropelMigration_1575841765
{
    public $comment = '';

    public function preUp(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postUp(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    public function preDown(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postDown(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        return array (
  'mysql' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE `storage_device`
(
    `id` INTEGER(255) NOT NULL AUTO_INCREMENT,
    `manufacturer_id` INTEGER(7) NOT NULL,
    `interface_type_id` INTEGER(7) NOT NULL,
    `storage_device_type_id` INTEGER(7) NOT NULL,
    `storage_device_form_factor_id` INTEGER(7) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `capacity` INTEGER(8) NOT NULL,
    `cache` INTEGER(7),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `storage_device_fi_26eba6` (`manufacturer_id`),
    INDEX `storage_device_fi_500d78` (`interface_type_id`),
    INDEX `storage_device_fi_4e376a` (`storage_device_type_id`),
    INDEX `storage_device_fi_54c8d2` (`storage_device_form_factor_id`),
    CONSTRAINT `storage_device_fk_26eba6`
        FOREIGN KEY (`manufacturer_id`)
        REFERENCES `manufacturer` (`id`),
    CONSTRAINT `storage_device_fk_500d78`
        FOREIGN KEY (`interface_type_id`)
        REFERENCES `interface_type` (`id`),
    CONSTRAINT `storage_device_fk_4e376a`
        FOREIGN KEY (`storage_device_type_id`)
        REFERENCES `storage_device_type` (`id`),
    CONSTRAINT `storage_device_fk_54c8d2`
        FOREIGN KEY (`storage_device_form_factor_id`)
        REFERENCES `storage_device_form_factor` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `storage_device_form_factor`
(
    `id` INTEGER(255) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `interface_type`
(
    `id` INTEGER(255) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `storage_device_type`
(
    `id` INTEGER(255) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        return array (
  'mysql' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `storage_device`;

DROP TABLE IF EXISTS `storage_device_form_factor`;

DROP TABLE IF EXISTS `interface_type`;

DROP TABLE IF EXISTS `storage_device_type`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}