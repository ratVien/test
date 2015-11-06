<?php
/**
 * Created by PhpStorm.
 * User: LIS
 * Date: 06.11.2015
 * Time: 13:52
 */
require( __DIR__ . '/../data/functions.php');
DB_connection()->exec("CREATE TABLE IF NOT EXISTS `category_id` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `category` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
        ");