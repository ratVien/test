<?php
/**
 * Created by PhpStorm.
 * User: LIS
 * Date: 06.11.2015
 * Time: 14:23
 */
require( __DIR__ . '/../data/functions.php');
$xml = file_get_contents('http://www.dvaproraba.ru/newexport/ngs.xml');
$xml1 = new SimpleXMLElement($xml);
$table = 'category_id';
$result = $xml1->xpath('/yml_catalog/shop/categories/category');
foreach($result as $data){
    DB_connection()->exec("INSERT INTO {$table} (id, category) VALUES ('$data[id]','$data')");
//    echo $data[id], "<br>";
}