n<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1575140811.
 * Generated on 2019-11-30 19:06:51 by jamiehatswellhough
 */
class PropelMigration_1575140811
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

ALTER TABLE `ram`

  CHANGE `clock_speed` `memory_speed_id` INTEGER(8) NOT NULL;

CREATE INDEX `ram_fi_4b5095` ON `ram` (`memory_speed_id`);

ALTER TABLE `ram` ADD CONSTRAINT `ram_fk_4b5095`
    FOREIGN KEY (`memory_speed_id`)
    REFERENCES `memory_speed` (`id`);

CREATE TABLE `memory_speed`
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

DROP TABLE IF EXISTS `memory_speed`;

ALTER TABLE `ram` DROP FOREIGN KEY `ram_fk_4b5095`;

DROP INDEX `ram_fi_4b5095` ON `ram`;

ALTER TABLE `ram`

  CHANGE `memory_speed_id` `clock_speed` INTEGER(8) NOT NULL;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}