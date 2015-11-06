<?php
/**
 * Created by PhpStorm.
 * User: LIS
 * Date: 06.11.2015
 * Time: 15:23
 */

require( __DIR__ . '/../data/functions.php');
$xml = file_get_contents('http://www.dvaproraba.ru/newexport/ngs.xml');
$xml1 = new SimpleXMLElement($xml);
$table = 'offers';
$result = $xml1->xpath('/yml_catalog/shop/offers/offer');
foreach($result as $data){
    DB_connection()->exec("INSERT INTO {$table} (id, url, price, currencyId, categoryId, picture, vendor, model)
VALUES ('$data[id]', '$data->url', '$data->price', '$data->currencyId', '$data->categoryId',  '$data->picture',  '$data->vendor',  '$data->model')");
//    echo $data[id], "<br>";
}