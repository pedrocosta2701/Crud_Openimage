<?php
$installer = $this;
$installer->startSetup();

$installer->run("
    CREATE TABLE IF NOT EXISTS `sanp_crud_item` (
        `id`         INT(11) NOT NULL AUTO_INCREMENT,
        `name`       VARCHAR(255) NOT NULL,
        `description` TEXT,
        `status`     TINYINT(1) DEFAULT 1,
        `created_at` DATETIME,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");

$installer->endSetup();
