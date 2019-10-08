<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1570549629.
 * Generated on 2019-10-08 15:47:09 by jamiehatswellhough
 */
class PropelMigration_1570549629
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

CREATE TABLE `cpu`
(
    `id` INTEGER(255) NOT NULL AUTO_INCREMENT,
    `manufacturer_id` INTEGER(7) NOT NULL,
    `cpu_socket_id` INTEGER(7) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `core_count` INTEGER(7) NOT NULL,
    `thread_count` INTEGER(7) NOT NULL,
    `base_clock` INTEGER(7) NOT NULL,
    `boost_clock` INTEGER(7),
    `l3_cache` INTEGER(7),
    `tdp` INTEGER(8),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `cpu_fi_26eba6` (`manufacturer_id`),
    INDEX `cpu_fi_862920` (`cpu_socket_id`),
    CONSTRAINT `cpu_fk_26eba6`
        FOREIGN KEY (`manufacturer_id`)
        REFERENCES `manufacturer` (`id`),
    CONSTRAINT `cpu_fk_862920`
        FOREIGN KEY (`cpu_socket_id`)
        REFERENCES `cpu_socket` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `ram`
(
    `id` INTEGER(255) NOT NULL AUTO_INCREMENT,
    `manufacturer_id` INTEGER(8) NOT NULL,
    `memory_type_id` INTEGER(8) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `clock_speed` INTEGER(8) NOT NULL,
    `capacity` INTEGER(8) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `ram_fi_26eba6` (`manufacturer_id`),
    INDEX `ram_fi_9650fe` (`memory_type_id`),
    CONSTRAINT `ram_fk_26eba6`
        FOREIGN KEY (`manufacturer_id`)
        REFERENCES `manufacturer` (`id`),
    CONSTRAINT `ram_fk_9650fe`
        FOREIGN KEY (`memory_type_id`)
        REFERENCES `memory_type` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `motherboard`
(
    `id` INTEGER(255) NOT NULL AUTO_INCREMENT,
    `manufacturer_id` INTEGER(8) NOT NULL,
    `memory_type_id` INTEGER(8) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `motherboard_fi_26eba6` (`manufacturer_id`),
    INDEX `motherboard_fi_9650fe` (`memory_type_id`),
    CONSTRAINT `motherboard_fk_26eba6`
        FOREIGN KEY (`manufacturer_id`)
        REFERENCES `manufacturer` (`id`),
    CONSTRAINT `motherboard_fk_9650fe`
        FOREIGN KEY (`memory_type_id`)
        REFERENCES `memory_type` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `gpu`
(
    `id` INTEGER(255) NOT NULL AUTO_INCREMENT,
    `manufacturer_id` INTEGER(8) NOT NULL,
    `memory_type_id` INTEGER(8) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `base_clock` INTEGER(8) NOT NULL,
    `boost_clock` INTEGER(8),
    `memory_capacity` INTEGER(6) NOT NULL,
    `tdp` INTEGER(8),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `gpu_fi_26eba6` (`manufacturer_id`),
    INDEX `gpu_fi_9650fe` (`memory_type_id`),
    CONSTRAINT `gpu_fk_26eba6`
        FOREIGN KEY (`manufacturer_id`)
        REFERENCES `manufacturer` (`id`),
    CONSTRAINT `gpu_fk_9650fe`
        FOREIGN KEY (`memory_type_id`)
        REFERENCES `memory_type` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `memory_type`
(
    `id` INTEGER(255) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `cpu_socket`
(
    `id` INTEGER(255) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `manufacturer`
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

DROP TABLE IF EXISTS `cpu`;

DROP TABLE IF EXISTS `ram`;

DROP TABLE IF EXISTS `motherboard`;

DROP TABLE IF EXISTS `gpu`;

DROP TABLE IF EXISTS `memory_type`;

DROP TABLE IF EXISTS `cpu_socket`;

DROP TABLE IF EXISTS `manufacturer`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}