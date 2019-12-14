<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1576336957.
 * Generated on 2019-12-14 15:22:37 by jamiehatswellhough
 */
class PropelMigration_1576336957
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

ALTER TABLE `motherboard`

  CHANGE `memory_type_id` `mainboard_chipset_id` INTEGER(8) NOT NULL,

  ADD `motherboard_form_factor_id` INTEGER(8) NOT NULL AFTER `mainboard_chipset_id`;

CREATE INDEX `motherboard_fi_15fead` ON `motherboard` (`mainboard_chipset_id`);

CREATE INDEX `motherboard_fi_f3fac6` ON `motherboard` (`motherboard_form_factor_id`);

ALTER TABLE `motherboard` ADD CONSTRAINT `motherboard_fk_15fead`
    FOREIGN KEY (`mainboard_chipset_id`)
    REFERENCES `mainboard_chipset` (`id`);

ALTER TABLE `motherboard` ADD CONSTRAINT `motherboard_fk_f3fac6`
    FOREIGN KEY (`motherboard_form_factor_id`)
    REFERENCES `motherboard_form_factor` (`id`);

CREATE TABLE `motherboard_memory_interface_type`
(
    `motherboard_id` INTEGER NOT NULL,
    `memory_interface_type_id` INTEGER NOT NULL,
    PRIMARY KEY (`motherboard_id`,`memory_interface_type_id`),
    INDEX `motherboard_memory_interface_type_fi_728b59` (`memory_interface_type_id`),
    CONSTRAINT `motherboard_memory_interface_type_fk_4c4971`
        FOREIGN KEY (`motherboard_id`)
        REFERENCES `motherboard` (`id`),
    CONSTRAINT `motherboard_memory_interface_type_fk_728b59`
        FOREIGN KEY (`memory_interface_type_id`)
        REFERENCES `memory_interface_type` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `motherboard_storage_interface_type`
(
    `motherboard_id` INTEGER NOT NULL,
    `storage_interface_type_id` INTEGER NOT NULL,
    PRIMARY KEY (`motherboard_id`,`storage_interface_type_id`),
    INDEX `motherboard_storage_interface_type_fi_aa1d06` (`storage_interface_type_id`),
    CONSTRAINT `motherboard_storage_interface_type_fk_4c4971`
        FOREIGN KEY (`motherboard_id`)
        REFERENCES `motherboard` (`id`),
    CONSTRAINT `motherboard_storage_interface_type_fk_aa1d06`
        FOREIGN KEY (`storage_interface_type_id`)
        REFERENCES `interface_type` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `motherboard_pci_interface_type`
(
    `motherboard_id` INTEGER NOT NULL,
    `pci_interface_type_id` INTEGER NOT NULL,
    PRIMARY KEY (`motherboard_id`,`pci_interface_type_id`),
    INDEX `motherboard_pci_interface_type_fi_e2a461` (`pci_interface_type_id`),
    CONSTRAINT `motherboard_pci_interface_type_fk_4c4971`
        FOREIGN KEY (`motherboard_id`)
        REFERENCES `motherboard` (`id`),
    CONSTRAINT `motherboard_pci_interface_type_fk_e2a461`
        FOREIGN KEY (`pci_interface_type_id`)
        REFERENCES `pci_interface_type` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `motherboard_form_factor`
(
    `id` INTEGER(255) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `mainboard_chipset`
(
    `id` INTEGER(255) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `memory_interface_type`
(
    `id` INTEGER(255) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `pci_interface_type`
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

DROP TABLE IF EXISTS `motherboard_memory_interface_type`;

DROP TABLE IF EXISTS `motherboard_storage_interface_type`;

DROP TABLE IF EXISTS `motherboard_pci_interface_type`;

DROP TABLE IF EXISTS `motherboard_form_factor`;

DROP TABLE IF EXISTS `mainboard_chipset`;

DROP TABLE IF EXISTS `memory_interface_type`;

DROP TABLE IF EXISTS `pci_interface_type`;

ALTER TABLE `motherboard` DROP FOREIGN KEY `motherboard_fk_15fead`;

ALTER TABLE `motherboard` DROP FOREIGN KEY `motherboard_fk_f3fac6`;

DROP INDEX `motherboard_fi_15fead` ON `motherboard`;

DROP INDEX `motherboard_fi_f3fac6` ON `motherboard`;

ALTER TABLE `motherboard`

  CHANGE `mainboard_chipset_id` `memory_type_id` INTEGER(8) NOT NULL,

  DROP `motherboard_form_factor_id`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}