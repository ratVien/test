<?php
/**
 * Created by PhpStorm.
 * User: LIS
 * Date: 06.11.2015
 * Time: 15:52
 */

require( __DIR__ . '/../data/functions.php');
$xml = file_get_contents('http://www.dvaproraba.ru/newexport/ngs.xml');
$xml1 = new SimpleXMLElement($xml);
$table = 'offers';
DB_connection()->exec("TRUNCATE TABLE {$table};");