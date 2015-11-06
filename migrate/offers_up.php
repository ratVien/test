<?php
/**
 * Created by PhpStorm.
 * User: LIS
 * Date: 06.11.2015
 * Time: 15:01
 */

require( __DIR__ . '/../data/functions.php');
DB_connection()->exec("CREATE TABLE IF NOT EXISTS `offers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(256) NOT NULL,
  `price` int(9) NOT NULL,
  `currencyId` varchar(4) NOT NULL,
  `categoryId` int(5) NOT NULL,
  `picture` varchar(256) NOT NULL,
  `vendor` varchar(256) NOT NULL,
  `model` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
        ");