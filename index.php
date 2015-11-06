<?php
/**
 * Created by PhpStorm.
 * User: LIS
 * Date: 05.11.2015
 * Time: 10:54
 */
/*
$dom = new DOMDocument;
$dom->load('http://www.dvaproraba.ru/newexport/ngs.xml');
$xpath = new DOMXPath($dom);
$query = "/shop/categories/";
$result = $xpath->query($query);

echo '<pre>';
foreach ($result as $element) {
    echo $element->getAttribute('uplevel') . "<br>";
}
echo '</pre>';
*/
$xml = file_get_contents('http://www.dvaproraba.ru/newexport/ngs.xml');
$xml1 = new SimpleXMLElement($xml);
$host = 'localhost';
$dbname = 'dvaProraba';
$table = 'offers';
$result = $xml1->xpath('/yml_catalog/shop/offers/offer');
foreach($result as $data){
//    $pdo->exec("INSERT INTO {$table} (id, category) VALUES ('$data[id]','$data')");
    echo $data->url, "<br>";
}