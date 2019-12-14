<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1576346568.
 * Generated on 2019-12-14 18:02:48 by jamiehatswellhough
 */
class PropelMigration_1576346568
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

  ADD `cpu_socket_id` INTEGER(8) NOT NULL AFTER `manufacturer_id`;

CREATE INDEX `motherboard_fi_862920` ON `motherboard` (`cpu_socket_id`);

ALTER TABLE `motherboard` ADD CONSTRAINT `motherboard_fk_862920`
    FOREIGN KEY (`cpu_socket_id`)
    REFERENCES `cpu_socket` (`id`);

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

ALTER TABLE `motherboard` DROP FOREIGN KEY `motherboard_fk_862920`;

DROP INDEX `motherboard_fi_862920` ON `motherboard`;

ALTER TABLE `motherboard`

  DROP `cpu_socket_id`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}