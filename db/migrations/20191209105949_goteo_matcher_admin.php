<?php
/**
 * Migration Task class.
 */
class GoteoMatcherAdmin
{
  public function preUp()
  {
      // add the pre-migration code here
  }

  public function postUp()
  {
      // add the post-migration code here
  }

  public function preDown()
  {
      // add the pre-migration code here
  }

  public function postDown()
  {
      // add the post-migration code here
  }

  /**
   * Return the SQL statements for the Up migration
   *
   * @return string The SQL string to execute for the Up migration.
   */
  public function getUpSQL()
  {
     return "
            ALTER TABLE `matcher` ADD COLUMN description TEXT DEFAULT NULL after `name`;
            ALTER TABLE `matcher` ADD COLUMN status INT(1) DEFAULT 0 after `description`;
            ALTER TABLE `matcher_lang` ADD COLUMN description TEXT DEFAULT NULL after `status`;

            CREATE TABLE `matcher_conf` (
                `matcher` varchar(50) CHARACTER SET utf8 NOT NULL,
                `budget` INT(6),
                `algorithm` varchar(50) NOT NULL,
                `max_donation_per_invest` INT(6),
                `max_donation_per_project`INT(6),
                `percent_of_donation` INT(6),
                `donation_per_project` INT(6),
                PRIMARY KEY (`matcher`),
                CONSTRAINT `matcher_conf_ibfk_1` FOREIGN KEY (`matcher`) REFERENCES `matcher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
            )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
     ";
  }

  /**
   * Return the SQL statements for the Down migration
   *
   * @return string The SQL string to execute for the Down migration.
   */
  public function getDownSQL()
  {
     return "
            ALTER TABLE `matcher` DROP COLUMN description;
            ALTER TABLE `matcher_lang` DROP COLUMN description;

            DROP TABLE `matcher_conf`;
     ";
  }

}