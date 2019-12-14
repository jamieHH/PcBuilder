<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1576337503.
 * Generated on 2019-12-14 15:31:43 by jamiehatswellhough
 */
class PropelMigration_1576337503
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

RENAME TABLE `interface_type` TO `storage_interface_type`;

ALTER TABLE `motherboard_storage_interface_type` DROP FOREIGN KEY `motherboard_storage_interface_type_fk_aa1d06`;

DROP INDEX `motherboard_storage_interface_type_fi_aa1d06` ON `motherboard_storage_interface_type`;

CREATE INDEX `motherboard_storage_interface_type_fi_3d0d98` ON `motherboard_storage_interface_type` (`storage_interface_type_id`);

ALTER TABLE `motherboard_storage_interface_type` ADD CONSTRAINT `motherboard_storage_interface_type_fk_3d0d98`
    FOREIGN KEY (`storage_interface_type_id`)
    REFERENCES `storage_interface_type` (`id`);

ALTER TABLE `storage_device` DROP FOREIGN KEY `storage_device_fk_500d78`;

DROP INDEX `storage_device_fi_500d78` ON `storage_device`;

ALTER TABLE `storage_device`

  CHANGE `interface_type_id` `storage_interface_type_id` INTEGER(7) NOT NULL;

CREATE INDEX `storage_device_fi_3d0d98` ON `storage_device` (`storage_interface_type_id`);

ALTER TABLE `storage_device` ADD CONSTRAINT `storage_device_fk_3d0d98`
    FOREIGN KEY (`storage_interface_type_id`)
    REFERENCES `storage_interface_type` (`id`);

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

RENAME TABLE `storage_interface_type` TO `interface_type`;

ALTER TABLE `motherboard_storage_interface_type` DROP FOREIGN KEY `motherboard_storage_interface_type_fk_3d0d98`;

DROP INDEX `motherboard_storage_interface_type_fi_3d0d98` ON `motherboard_storage_interface_type`;

CREATE INDEX `motherboard_storage_interface_type_fi_aa1d06` ON `motherboard_storage_interface_type` (`storage_interface_type_id`);

ALTER TABLE `motherboard_storage_interface_type` ADD CONSTRAINT `motherboard_storage_interface_type_fk_aa1d06`
    FOREIGN KEY (`storage_interface_type_id`)
    REFERENCES `interface_type` (`id`);

ALTER TABLE `storage_device` DROP FOREIGN KEY `storage_device_fk_3d0d98`;

DROP INDEX `storage_device_fi_3d0d98` ON `storage_device`;

ALTER TABLE `storage_device`

  CHANGE `storage_interface_type_id` `interface_type_id` INTEGER(7) NOT NULL;

CREATE INDEX `storage_device_fi_500d78` ON `storage_device` (`interface_type_id`);

ALTER TABLE `storage_device` ADD CONSTRAINT `storage_device_fk_500d78`
    FOREIGN KEY (`interface_type_id`)
    REFERENCES `interface_type` (`id`);

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}