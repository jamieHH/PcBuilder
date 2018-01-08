<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1515449338.
 * Generated on 2018-01-08 22:08:58 by jamiehatswellhough
 */
class PropelMigration_1515449338
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
  'default' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE `manufacturer`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `cpu`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `manufacturer_id` INTEGER(8) NOT NULL,
    `core_count` INTEGER(8) NOT NULL,
    `thread_count` INTEGER(8) NOT NULL,
    `base_clock` DOUBLE(6,2) NOT NULL,
    `boost_clock` DOUBLE(6,2),
    `tdp` INTEGER(8),
    `data_width` INTEGER(8),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `cpu_fi_26eba6` (`manufacturer_id`),
    CONSTRAINT `cpu_fk_26eba6`
        FOREIGN KEY (`manufacturer_id`)
        REFERENCES `manufacturer` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `gpu`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `manufacturer_id` INTEGER(8) NOT NULL,
    `core_count` INTEGER(8) NOT NULL,
    `base_clock` DOUBLE(6,2) NOT NULL,
    `boost_clock` DOUBLE(6,2),
    `tdp` INTEGER(8),
    `cuda_core_count` INTEGER(255),
    `memory_capacity` DOUBLE(6,2),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `gpu_fi_26eba6` (`manufacturer_id`),
    CONSTRAINT `gpu_fk_26eba6`
        FOREIGN KEY (`manufacturer_id`)
        REFERENCES `manufacturer` (`id`)
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
  'default' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `manufacturer`;

DROP TABLE IF EXISTS `cpu`;

DROP TABLE IF EXISTS `gpu`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}